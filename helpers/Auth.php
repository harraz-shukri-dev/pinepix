<?php
class Auth {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password_hash'])) {
            // Check approval status for entrepreneurs
            if ($user['role'] === 'entrepreneur') {
                if ($user['approval_status'] === 'pending') {
                    return ['success' => false, 'message' => 'Your application is under review. Please wait for admin approval.', 'status' => 'pending'];
                }
                if ($user['approval_status'] === 'rejected') {
                    $reason = $user['rejection_reason'] ? ' Reason: ' . htmlspecialchars($user['rejection_reason']) : '';
                    return ['success' => false, 'message' => 'Your application has been rejected.' . $reason, 'status' => 'rejected'];
                }
            }
            
            $this->setSession($user);
            return ['success' => true, 'user' => $user];
        }
        
        return ['success' => false, 'message' => 'Invalid email or password'];
    }
    
    public function register($data) {
        // Check if email exists and get user status
        $stmt = $this->db->prepare("SELECT id, approval_status, role FROM users WHERE email = ?");
        $stmt->execute([$data['email']]);
        $existingUser = $stmt->fetch();
        
        if ($existingUser) {
            // If user exists and is not rejected, prevent registration
            if ($existingUser['approval_status'] !== 'rejected') {
                return ['success' => false, 'message' => 'Email already registered'];
            }
            // If user is rejected, we'll update their record instead of creating new one
            // This allows rejected users to re-apply with corrected information
        }
        
        // Validate SSM number for entrepreneurs (document is handled separately in register.php)
        if (($data['role'] ?? 'entrepreneur') === 'entrepreneur') {
            if (empty($data['ssm_no'])) {
                return ['success' => false, 'message' => 'SSM number is required'];
            }
            // Note: SSM document validation and upload is handled in register.php before calling this method
        }
        
        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
        
        $approvalStatus = ($data['role'] ?? 'entrepreneur') === 'entrepreneur' ? 'pending' : 'approved';
        
        // If user exists and is rejected, update their record instead of inserting
        if ($existingUser && $existingUser['approval_status'] === 'rejected') {
            $userId = $existingUser['id'];
            
            // Delete old SSM document if exists
            $stmt = $this->db->prepare("SELECT ssm_document FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            $oldUser = $stmt->fetch();
            if (!empty($oldUser['ssm_document'])) {
                require_once __DIR__ . '/Helper.php';
                Helper::deleteFile($oldUser['ssm_document']);
            }
            
            // Update existing rejected user record
            // Note: ssm_document will be updated separately in register.php after file upload
            $stmt = $this->db->prepare("
                UPDATE users SET 
                    role = ?, 
                    name = ?, 
                    password_hash = ?, 
                    phone = ?, 
                    address = ?, 
                    gender = ?, 
                    ic_passport = ?, 
                    business_category = ?, 
                    ssm_no = ?, 
                    ssm_document = NULL,
                    approval_status = ?,
                    rejection_reason = NULL,
                    approved_by = NULL,
                    approved_at = NULL,
                    first_login_completed = 0,
                    updated_at = NOW()
                WHERE id = ?
            ");
            
            $result = $stmt->execute([
                $data['role'] ?? 'entrepreneur',
                $data['name'],
                $passwordHash,
                $data['phone'] ?? null,
                $data['address'] ?? null,
                $data['gender'] ?? null,
                $data['ic_passport'] ?? null,
                $data['business_category'] ?? null,
                $data['ssm_no'] ?? null,
                $approvalStatus,
                $userId
            ]);
        } else {
            // Insert new user record
            $stmt = $this->db->prepare("
                INSERT INTO users (role, name, email, password_hash, phone, address, gender, ic_passport, business_category, ssm_no, ssm_document, approval_status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            
            $result = $stmt->execute([
                $data['role'] ?? 'entrepreneur',
                $data['name'],
                $data['email'],
                $passwordHash,
                $data['phone'] ?? null,
                $data['address'] ?? null,
                $data['gender'] ?? null,
                $data['ic_passport'] ?? null,
                $data['business_category'] ?? null,
                $data['ssm_no'] ?? null,
                $data['ssm_document'] ?? null,
                $approvalStatus
            ]);
            
            if ($result) {
                $userId = $this->db->lastInsertId();
            }
        }
        
        if ($result) {
            
            // Send notification email to admin about new registration (if entrepreneur)
            if ($approvalStatus === 'pending') {
                require_once __DIR__ . '/Mail.php';
                $isReapplication = ($existingUser && $existingUser['approval_status'] === 'rejected');
                Mail::sendNewRegistrationNotification($data['name'], $data['email'], $userId, $isReapplication);
            }
            
            // Don't auto-login entrepreneurs - they need approval
            if ($approvalStatus === 'pending') {
                $message = ($existingUser && $existingUser['approval_status'] === 'rejected') 
                    ? 'Re-application submitted successfully! Your updated application is pending admin approval. You will receive an email once your account is approved.'
                    : 'Registration successful! Your application is pending admin approval. You will receive an email once your account is approved.';
                return ['success' => true, 'message' => $message, 'requires_approval' => true, 'user_id' => $userId];
            }
            
            $user = $this->getUserById($userId);
            $this->setSession($user);
            return ['success' => true, 'user' => $user, 'user_id' => $userId];
        }
        
        return ['success' => false, 'message' => 'Registration failed'];
    }
    
    public function forgotPassword($email) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if (!$user) {
            return ['success' => false, 'message' => 'Email not found'];
        }
        
        $token = bin2hex(random_bytes(32));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $stmt = $this->db->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?");
        $stmt->execute([$token, $expiry, $email]);
        
        // Send email with reset link
        require_once __DIR__ . '/Mail.php';
        $emailSent = Mail::sendPasswordReset($email, $token);
        
        if ($emailSent) {
            return ['success' => true, 'message' => 'Password reset link has been sent to your email address. Please check your inbox.'];
        } else {
            // Even if email fails, don't expose the token for security
            // Log the error for admin to see
            error_log("Failed to send password reset email to: $email");
            return ['success' => true, 'message' => 'If an account exists with this email, a password reset link has been sent. Please check your inbox.'];
        }
    }
    
    public function resetPassword($token, $newPassword) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()");
        $stmt->execute([$token]);
        $user = $stmt->fetch();
        
        if (!$user) {
            return ['success' => false, 'message' => 'Invalid or expired reset token'];
        }
        
        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE users SET password_hash = ?, reset_token = NULL, reset_token_expiry = NULL WHERE id = ?");
        $result = $stmt->execute([$passwordHash, $user['id']]);
        
        if ($result) {
            return ['success' => true, 'message' => 'Password reset successfully'];
        }
        
        return ['success' => false, 'message' => 'Failed to reset password'];
    }
    
    public function setSession($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
    }
    
    public function logout() {
        session_destroy();
        session_start();
    }
    
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
    
    public function isAdmin() {
        return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
    }
    
    public function isEntrepreneur() {
        return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'entrepreneur';
    }
    
    public function getUser() {
        if (!$this->isLoggedIn()) {
            return null;
        }
        
        return $this->getUserById($_SESSION['user_id']);
    }
    
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function requireLogin() {
        if (!$this->isLoggedIn()) {
            header('Location: ' . BASE_URL . 'auth/login.php');
            exit;
        }
    }
    
    public function requireAdmin() {
        $this->requireLogin();
        if (!$this->isAdmin()) {
            header('Location: ' . BASE_URL . 'index.php');
            exit;
        }
    }
    
    /**
     * Approve entrepreneur account
     * @param int $userId
     * @param int $adminId
     * @return bool
     */
    public function approveEntrepreneur($userId, $adminId) {
        $stmt = $this->db->prepare("UPDATE users SET approval_status = 'approved', approved_by = ?, approved_at = NOW(), rejection_reason = NULL WHERE id = ? AND role = 'entrepreneur'");
        $result = $stmt->execute([$adminId, $userId]);
        
        if ($result) {
            // Send approval email
            $user = $this->getUserById($userId);
            if ($user) {
                require_once __DIR__ . '/Mail.php';
                Mail::sendApprovalNotification($user['email'], $user['name']);
            }
        }
        
        return $result;
    }
    
    /**
     * Reject entrepreneur account
     * @param int $userId
     * @param int $adminId
     * @param string $reason
     * @return bool
     */
    public function rejectEntrepreneur($userId, $adminId, $reason) {
        if (empty($reason)) {
            return false;
        }
        
        $stmt = $this->db->prepare("UPDATE users SET approval_status = 'rejected', approved_by = ?, approved_at = NOW(), rejection_reason = ? WHERE id = ? AND role = 'entrepreneur'");
        $result = $stmt->execute([$adminId, $reason, $userId]);
        
        if ($result) {
            // Send rejection email
            $user = $this->getUserById($userId);
            if ($user) {
                require_once __DIR__ . '/Mail.php';
                Mail::sendRejectionNotification($user['email'], $user['name'], $reason);
            }
        }
        
        return $result;
    }
    
    /**
     * Mark first login as completed
     * @param int $userId
     * @return bool
     */
    public function markFirstLoginCompleted($userId) {
        $stmt = $this->db->prepare("UPDATE users SET first_login_completed = 1 WHERE id = ?");
        return $stmt->execute([$userId]);
    }
}

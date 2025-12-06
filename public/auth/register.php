<?php
session_start();
require_once __DIR__ . '/../../config/autoload.php';

$auth = new Auth();

if ($auth->isLoggedIn()) {
    Helper::redirect(BASE_URL . 'dashboard.php');
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => Helper::sanitize($_POST['name'] ?? ''),
        'email' => Helper::sanitize($_POST['email'] ?? ''),
        'password' => $_POST['password'] ?? '',
        'phone' => Helper::sanitize($_POST['phone'] ?? ''),
        'address' => Helper::sanitize($_POST['address'] ?? ''),
        'gender' => Helper::sanitize($_POST['gender'] ?? ''),
        'ic_passport' => Helper::sanitize($_POST['ic_passport'] ?? ''),
        'business_category' => Helper::sanitize($_POST['business_category'] ?? ''),
        'ssm_no' => Helper::sanitize($_POST['ssm_no'] ?? ''),
    ];
    
    // Validate SSM document - Check if file exists and is valid
    $ssmFileValid = false;
    $ssmFileError = '';
    
    if (!isset($_FILES['ssm_document'])) {
        $ssmFileError = 'SSM document is required.';
    } elseif (!isset($_FILES['ssm_document']['error'])) {
        $ssmFileError = 'SSM document upload error: error code not set.';
    } elseif ($_FILES['ssm_document']['error'] !== UPLOAD_ERR_OK) {
        $uploadErrors = [
            UPLOAD_ERR_INI_SIZE => 'File size exceeds server limit (' . ini_get('upload_max_filesize') . ')',
            UPLOAD_ERR_FORM_SIZE => 'File size exceeds form limit',
            UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
            UPLOAD_ERR_EXTENSION => 'File upload stopped by extension',
        ];
        $errorCode = $_FILES['ssm_document']['error'];
        $ssmFileError = 'SSM document upload failed: ' . ($uploadErrors[$errorCode] ?? 'Unknown error (Code: ' . $errorCode . ')');
    } elseif (empty($_FILES['ssm_document']['name'])) {
        $ssmFileError = 'SSM document is required. Please select a file.';
    } elseif (empty($_FILES['ssm_document']['tmp_name']) || !is_uploaded_file($_FILES['ssm_document']['tmp_name'])) {
        $ssmFileError = 'SSM document upload failed: Invalid temporary file.';
    } else {
        // Validate file size and type
        $maxSize = 10 * 1024 * 1024; // 10MB
        if ($_FILES['ssm_document']['size'] > $maxSize) {
            $ssmFileError = 'File size (' . round($_FILES['ssm_document']['size'] / 1024 / 1024, 2) . 'MB) exceeds 10MB limit';
        } elseif ($_FILES['ssm_document']['size'] == 0) {
            $ssmFileError = 'The uploaded file is empty.';
        } else {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $_FILES['ssm_document']['tmp_name']);
            finfo_close($finfo);
            
            $allowedTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
            if (!in_array($mimeType, $allowedTypes)) {
                $ssmFileError = 'Invalid file type (' . $mimeType . '). Only PDF, JPG, and PNG files are allowed.';
            } else {
                // File is valid
                $ssmFileValid = true;
            }
        }
    }
    
    if (!$ssmFileValid) {
        $error = $ssmFileError;
    }
    
    if (empty($error) && $ssmFileValid) {
        // Register user first (without SSM document path)
        // Don't pass ssm_document to register() - we'll handle it separately
        $result = $auth->register($data);
        
        if ($result['success'] && isset($result['user_id'])) {
            $userId = $result['user_id'];
            
            // Now upload SSM document with user ID
            $uploadResult = Helper::uploadSSMDocument($_FILES['ssm_document'], $userId);
            
            if ($uploadResult['success']) {
                // Update user record with SSM document path
                $db = Database::getInstance()->getConnection();
                $stmt = $db->prepare("UPDATE users SET ssm_document = ? WHERE id = ?");
                $stmt->execute([$uploadResult['path'], $userId]);
                
                if (isset($result['requires_approval']) && $result['requires_approval']) {
                    $success = $result['message'];
                } else {
                    Helper::redirect(BASE_URL . 'dashboard.php');
                }
            } else {
                // Delete user if SSM upload failed
                $db = Database::getInstance()->getConnection();
                $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
                $stmt->execute([$userId]);
                $error = 'Registration failed: ' . $uploadResult['message'];
            }
        } else {
            $error = $result['message'] ?? 'Registration failed';
        }
    }
}

include VIEWS_PATH . 'auth/register.php';


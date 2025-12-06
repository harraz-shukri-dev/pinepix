<?php
$pageTitle = 'Register';
include VIEWS_PATH . 'partials/header.php';
?>

<div class="min-h-screen flex items-center justify-center bg-gray-50 p-4 py-16">
    <div class="w-full max-w-3xl">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            <div class="p-8">
                <div class="text-center mb-6">
                    <div class="flex justify-center mb-4">
                        <img src="<?= BASE_URL ?>assets/images/logoblack.png" alt="PinePix Logo" class="h-24 object-contain">
                    </div>
                    <p class="text-gray-600 text-lg">Create your entrepreneur account</p>
                </div>
                
                <?php if (isset($error) && $error): ?>
                    <div class="mb-4 p-4 bg-red-50 border-2 border-red-200 rounded-lg text-red-800 flex items-center justify-between">
                        <span><i class="fas fa-exclamation-circle mr-2"></i><?= htmlspecialchars($error) ?></span>
                        <button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($success) && $success): ?>
                    <div class="mb-4 p-4 bg-green-50 border-2 border-green-200 rounded-lg text-green-800 flex items-center justify-between">
                        <span><i class="fas fa-check-circle mr-2"></i><?= $success ?></span>
                        <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="" enctype="multipart/form-data" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400 focus:border-primary-400 outline-none transition">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400 focus:border-primary-400 outline-none transition">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="password" id="password" name="password" required minlength="6"
                                       class="w-full px-4 py-3 pr-10 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400 focus:border-primary-400 outline-none transition">
                                <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-eye" id="password-toggle-icon"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="60123456789"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400 focus:border-primary-400 outline-none transition">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                            <select id="gender" name="gender" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400 focus:border-primary-400 outline-none transition bg-white">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="ic_passport" class="block text-sm font-medium text-gray-700 mb-2">IC/Passport</label>
                            <input type="text" id="ic_passport" name="ic_passport" placeholder="010203040506"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400 focus:border-primary-400 outline-none transition">
                        </div>
                    </div>
                    
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <textarea id="address" name="address" rows="2"
                                  class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400 focus:border-primary-400 outline-none transition resize-none"></textarea>
                    </div>
                    
                    <div>
                        <label for="business_category" class="block text-sm font-medium text-gray-700 mb-2">Business Category</label>
                        <select id="business_category" name="business_category" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400 focus:border-primary-400 outline-none transition bg-white">
                            <option value="">Select Category</option>
                            <option value="Pineapple Farming">Pineapple Farming</option>
                            <option value="Pineapple Processing">Pineapple Processing</option>
                            <option value="Pineapple Retail">Pineapple Retail</option>
                            <option value="Pineapple Export">Pineapple Export</option>
                            <option value="Agri-Tourism">Agri-Tourism</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="ssm_no" class="block text-sm font-medium text-gray-700 mb-2">SSM Number <span class="text-red-500">*</span></label>
                            <input type="text" id="ssm_no" name="ssm_no" required placeholder="e.g., 123456789"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400 focus:border-primary-400 outline-none transition">
                            <p class="mt-1 text-xs text-gray-500">Your SSM (Suruhanjaya Syarikat Malaysia) registration number</p>
                        </div>
                        
                        <div>
                            <label for="ssm_document" class="block text-sm font-medium text-gray-700 mb-2">SSM Document <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="file" id="ssm_document" name="ssm_document" required accept=".pdf,.jpg,.jpeg,.png"
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-400 focus:border-primary-400 outline-none transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Upload SSM certificate (PDF, JPG, or PNG, max 10MB)</p>
                        </div>
                    </div>
                    
                    <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-4">
                        <div class="flex items-start">
                            <i class="fas fa-info-circle text-blue-600 mt-1 mr-3"></i>
                            <div class="text-sm text-blue-800">
                                <p class="font-semibold mb-1">Account Approval Required</p>
                                <p>Your registration will be reviewed by our admin team. You will receive an email notification once your account is approved. This process typically takes 1-2 business days.</p>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-primary-400 text-white py-3 rounded-lg font-semibold hover:bg-primary-500 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fas fa-user-plus mr-2"></i>Create Account
                    </button>
                </form>
                
                <div class="mt-6 text-center space-y-2">
                    <p class="text-sm text-gray-600">Already have an account? 
                        <a href="<?= BASE_URL ?>auth/login.php" class="text-primary-400 hover:text-primary-500 font-semibold">Sign In</a>
                    </p>
                    <a href="<?= BASE_URL ?>index.php" class="text-sm text-gray-600 hover:text-primary-400 inline-flex items-center">
                        <i class="fas fa-arrow-left mr-1"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(fieldId + '-toggle-icon');
        
        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
    
    // Client-side file validation
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form[enctype="multipart/form-data"]');
        const fileInput = document.getElementById('ssm_document');
        
        if (form && fileInput) {
            form.addEventListener('submit', function(e) {
                // Validate file before submit
                if (fileInput.files.length === 0) {
                    e.preventDefault();
                    alert('Please select an SSM document file.');
                    return false;
                }
                
                const file = fileInput.files[0];
                const maxSize = 10 * 1024 * 1024; // 10MB
                
                if (file.size > maxSize) {
                    e.preventDefault();
                    alert(`File size (${(file.size / 1024 / 1024).toFixed(2)}MB) exceeds 10MB limit.`);
                    return false;
                }
                
                const allowedTypes = ['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'];
                if (!allowedTypes.includes(file.type)) {
                    e.preventDefault();
                    alert(`Invalid file type: ${file.type}. Only PDF, JPG, and PNG files are allowed.`);
                    return false;
                }
            });
        }
    });
</script>

<?php include VIEWS_PATH . 'partials/footer.php'; ?>

<!-- Welcome Modal for First-Time Approved Entrepreneurs -->
<div id="welcomeModal" class="fixed inset-0 z-50 items-center justify-center bg-black/50 backdrop-blur-sm p-2 sm:p-3 md:p-4 hidden" style="display: none;">
    <div class="bg-white rounded-lg sm:rounded-xl md:rounded-2xl shadow-2xl max-w-4xl w-full max-h-[98vh] sm:max-h-[95vh] md:max-h-[90vh] overflow-hidden flex flex-col mx-2 sm:mx-4">
        <!-- Header -->
        <div class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-5 bg-gradient-to-r from-primary-50 to-amber-50 border-b-2 border-gray-200 rounded-t-lg sm:rounded-t-xl md:rounded-t-2xl flex justify-between items-center">
            <h5 class="text-base sm:text-lg md:text-xl font-bold text-gray-900 flex items-center">
                <i class="fas fa-rocket mr-2 text-primary-600 text-sm sm:text-base md:text-lg"></i>
                <span class="truncate">Welcome to <?= APP_NAME ?>!</span>
            </h5>
            <button type="button" onclick="closeWelcomeModal()" class="modal-close p-1.5 sm:p-2 flex-shrink-0 ml-2">
                <i class="fas fa-times text-base sm:text-lg md:text-xl"></i>
            </button>
        </div>
        
        <!-- Content -->
        <div class="flex-1 overflow-y-auto p-3 sm:p-4 md:p-6">
            <!-- Step Indicator -->
            <div class="mb-4 sm:mb-6">
                <div class="flex items-center justify-between mb-3 sm:mb-4">
                    <div class="flex items-center flex-1 min-w-0">
                        <div id="step-indicator-1" class="flex items-center flex-1 min-w-0">
                            <div class="step-circle active">1</div>
                            <div class="step-line"></div>
                        </div>
                        <div id="step-indicator-2" class="flex items-center flex-1 min-w-0">
                            <div class="step-circle">2</div>
                            <div class="step-line"></div>
                        </div>
                        <div id="step-indicator-3" class="flex items-center flex-1 min-w-0">
                            <div class="step-circle">3</div>
                            <div class="step-line"></div>
                        </div>
                        <div id="step-indicator-4" class="flex items-center flex-shrink-0">
                            <div class="step-circle">4</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Step Content -->
            <div id="step-content">
                <!-- Step 1: Welcome -->
                <div id="step-1" class="step-content active">
                    <div class="text-center mb-4 sm:mb-6">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-gradient-to-br from-primary-400 to-amber-400 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                            <i class="fas fa-check-circle text-3xl sm:text-4xl md:text-5xl text-white"></i>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2">Welcome, <?= htmlspecialchars($_SESSION['user_name'] ?? 'Entrepreneur') ?>!</h3>
                        <p class="text-sm sm:text-base text-gray-600 px-2">Your account has been approved. Let's get you started with <?= APP_NAME ?>.</p>
                    </div>
                    
                    <div class="bg-gradient-to-r from-primary-50 to-amber-50 rounded-lg p-4 sm:p-6 mb-4 sm:mb-6">
                        <h4 class="text-sm sm:text-base font-semibold text-gray-900 mb-2 sm:mb-3 flex items-center">
                            <i class="fas fa-info-circle text-primary-600 mr-2 text-sm sm:text-base"></i>
                            What is <?= APP_NAME ?>?
                        </h4>
                        <p class="text-sm sm:text-base text-gray-700 leading-relaxed">
                            <?= APP_NAME ?> is a comprehensive platform designed to connect pineapple entrepreneurs, farms, and businesses. 
                            Manage your farms, showcase your shops, track announcements, and connect with the pineapple community all in one place.
                        </p>
                    </div>
                </div>
                
                <!-- Step 2: Features Overview -->
                <div id="step-2" class="step-content">
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4 sm:mb-6 text-center">Key Features</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4 mb-4 sm:mb-6">
                        <div class="bg-white border-2 border-gray-200 rounded-lg p-3 sm:p-4 hover:border-primary-400 transition">
                            <div class="flex items-start">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-100 rounded-lg flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                                    <i class="fas fa-seedling text-green-600 text-lg sm:text-xl"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4 class="text-sm sm:text-base font-semibold text-gray-900 mb-1">Farm Management</h4>
                                    <p class="text-xs sm:text-sm text-gray-600">Add and manage your pineapple farms with location, size, and images.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white border-2 border-gray-200 rounded-lg p-3 sm:p-4 hover:border-primary-400 transition">
                            <div class="flex items-start">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                                    <i class="fas fa-store text-blue-600 text-lg sm:text-xl"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4 class="text-sm sm:text-base font-semibold text-gray-900 mb-1">Shop Management</h4>
                                    <p class="text-xs sm:text-sm text-gray-600">Showcase your retail shops and business locations to customers.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white border-2 border-gray-200 rounded-lg p-3 sm:p-4 hover:border-primary-400 transition">
                            <div class="flex items-start">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                                    <i class="fas fa-bullhorn text-purple-600 text-lg sm:text-xl"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4 class="text-sm sm:text-base font-semibold text-gray-900 mb-1">Announcements</h4>
                                    <p class="text-xs sm:text-sm text-gray-600">Share price updates, promotions, and news with the community.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white border-2 border-gray-200 rounded-lg p-3 sm:p-4 hover:border-primary-400 transition">
                            <div class="flex items-start">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-amber-100 rounded-lg flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0">
                                    <i class="fas fa-chart-line text-amber-600 text-lg sm:text-xl"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4 class="text-sm sm:text-base font-semibold text-gray-900 mb-1">Price Tracking</h4>
                                    <p class="text-xs sm:text-sm text-gray-600">Monitor pineapple prices across different states in Malaysia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 3: Getting Started -->
                <div id="step-3" class="step-content">
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4 sm:mb-6 text-center">Getting Started</h3>
                    
                    <div class="space-y-3 sm:space-y-4 mb-4 sm:mb-6">
                        <div class="flex items-start p-3 sm:p-4 bg-gray-50 rounded-lg">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 bg-primary-400 text-white rounded-full flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0 font-bold text-sm sm:text-base">1</div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-sm sm:text-base font-semibold text-gray-900 mb-1">Complete Your Profile</h4>
                                <p class="text-xs sm:text-sm text-gray-600">Add your profile picture and update your business information.</p>
                                <a href="<?= BASE_URL ?>profile.php" class="text-primary-600 text-xs sm:text-sm hover:underline mt-1 inline-flex items-center">
                                    Go to Profile <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-3 sm:p-4 bg-gray-50 rounded-lg">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 bg-primary-400 text-white rounded-full flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0 font-bold text-sm sm:text-base">2</div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-sm sm:text-base font-semibold text-gray-900 mb-1">Add Your First Farm</h4>
                                <p class="text-xs sm:text-sm text-gray-600">Register your pineapple farm with location and details.</p>
                                <a href="<?= BASE_URL ?>farm.php" class="text-primary-600 text-xs sm:text-sm hover:underline mt-1 inline-flex items-center">
                                    Add Farm <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-3 sm:p-4 bg-gray-50 rounded-lg">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 bg-primary-400 text-white rounded-full flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0 font-bold text-sm sm:text-base">3</div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-sm sm:text-base font-semibold text-gray-900 mb-1">Set Up Your Shop</h4>
                                <p class="text-xs sm:text-sm text-gray-600">Create a listing for your retail shop or business location.</p>
                                <a href="<?= BASE_URL ?>shop.php" class="text-primary-600 text-xs sm:text-sm hover:underline mt-1 inline-flex items-center">
                                    Add Shop <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-3 sm:p-4 bg-gray-50 rounded-lg">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 bg-primary-400 text-white rounded-full flex items-center justify-center mr-3 sm:mr-4 flex-shrink-0 font-bold text-sm sm:text-base">4</div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-sm sm:text-base font-semibold text-gray-900 mb-1">Share Announcements</h4>
                                <p class="text-xs sm:text-sm text-gray-600">Post price updates, promotions, or news to engage with the community.</p>
                                <a href="<?= BASE_URL ?>announcements.php" class="text-primary-600 text-xs sm:text-sm hover:underline mt-1 inline-flex items-center">
                                    View Announcements <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 4: Tips & Support -->
                <div id="step-4" class="step-content">
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4 sm:mb-6 text-center">Tips & Support</h3>
                    
                    <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-4 sm:p-6 mb-4 sm:mb-6">
                        <h4 class="text-sm sm:text-base font-semibold text-blue-900 mb-2 sm:mb-3 flex items-center">
                            <i class="fas fa-lightbulb text-blue-600 mr-2 text-sm sm:text-base"></i>
                            Pro Tips
                        </h4>
                        <ul class="space-y-2 text-xs sm:text-sm text-blue-800">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Keep your profile and business information up to date for better visibility.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Upload high-quality images of your farms and shops to attract more customers.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Regularly post announcements to keep your audience engaged.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5 flex-shrink-0"></i>
                                <span>Use the price tracking feature to stay competitive in the market.</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="bg-gray-50 border-2 border-gray-200 rounded-lg p-4 sm:p-6">
                        <h4 class="text-sm sm:text-base font-semibold text-gray-900 mb-2 sm:mb-3 flex items-center">
                            <i class="fas fa-headset text-primary-600 mr-2 text-sm sm:text-base"></i>
                            Need Help?
                        </h4>
                        <p class="text-xs sm:text-sm text-gray-700 mb-3 sm:mb-4">If you have any questions or need assistance, feel free to contact our support team.</p>
                        <a href="<?= BASE_URL ?>contact.php" class="inline-flex items-center px-3 py-2 sm:px-4 sm:py-2 bg-primary-400 text-white rounded-lg hover:bg-primary-500 transition text-sm sm:text-base">
                            <i class="fas fa-envelope mr-2"></i>Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="px-3 py-3 sm:px-4 sm:py-4 md:px-6 md:py-5 bg-gray-50 border-t-2 border-gray-200 flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-2 sm:gap-3">
            <button type="button" onclick="previousStep()" id="prevBtn" class="btn-outline-primary px-3 py-2 sm:px-4 sm:py-2.5 md:px-6 text-xs sm:text-sm md:text-base w-full sm:w-auto order-2 sm:order-1 hidden">
                <i class="fas fa-arrow-left mr-1.5 sm:mr-2"></i><span>Previous</span>
            </button>
            <div class="flex-1 hidden sm:block"></div>
            <button type="button" onclick="nextStep()" id="nextBtn" class="btn-primary px-3 py-2 sm:px-4 sm:py-2.5 md:px-6 text-xs sm:text-sm md:text-base w-full sm:w-auto order-1 sm:order-2">
                <span>Next</span> <i class="fas fa-arrow-right ml-1.5 sm:ml-2"></i>
            </button>
            <button type="button" onclick="closeWelcomeModal()" id="finishBtn" class="btn-primary px-3 py-2 sm:px-4 sm:py-2.5 md:px-6 text-xs sm:text-sm md:text-base w-full sm:w-auto order-1 sm:order-2 hidden">
                <i class="fas fa-check mr-1.5 sm:mr-2"></i><span>Get Started</span>
            </button>
        </div>
    </div>
</div>

<style>
.step-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #e5e7eb;
    color: #6b7280;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 0.75rem;
    transition: all 0.3s;
    flex-shrink: 0;
}

@media (min-width: 640px) {
    .step-circle {
        width: 36px;
        height: 36px;
        font-size: 0.875rem;
    }
}

@media (min-width: 768px) {
    .step-circle {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
}

.step-circle.active {
    background: #f59e0b;
    color: white;
}

.step-circle.completed {
    background: #10b981;
    color: white;
}

.step-line {
    flex: 1;
    height: 2px;
    background: #e5e7eb;
    margin: 0 4px;
    transition: all 0.3s;
    min-width: 0;
}

@media (min-width: 640px) {
    .step-line {
        margin: 0 6px;
    }
}

@media (min-width: 768px) {
    .step-line {
        margin: 0 8px;
    }
}

.step-line.completed {
    background: #10b981;
}

.step-content {
    display: none;
    animation: fadeIn 0.3s;
}

.step-content.active {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Mobile button improvements */
@media (max-width: 640px) {
    #welcomeModal .btn-primary,
    #welcomeModal .btn-outline-primary {
        font-size: 0.875rem;
        padding: 0.5rem 0.75rem;
    }
    
    #welcomeModal .btn-primary i,
    #welcomeModal .btn-outline-primary i {
        font-size: 0.75rem;
    }
}
</style>

<script>
let currentStep = 1;
const totalSteps = 4;

function updateStepIndicator() {
    // Update step circles
    for (let i = 1; i <= totalSteps; i++) {
        const circle = document.querySelector(`#step-indicator-${i} .step-circle`);
        const line = document.querySelector(`#step-indicator-${i} .step-line`);
        
        if (i < currentStep) {
            circle.classList.add('completed');
            circle.classList.remove('active');
            if (line) line.classList.add('completed');
        } else if (i === currentStep) {
            circle.classList.add('active');
            circle.classList.remove('completed');
            if (line) line.classList.remove('completed');
        } else {
            circle.classList.remove('active', 'completed');
            if (line) line.classList.remove('completed');
        }
    }
    
    // Update step content
    document.querySelectorAll('.step-content').forEach((step, index) => {
        if (index + 1 === currentStep) {
            step.classList.add('active');
        } else {
            step.classList.remove('active');
        }
    });
    
    // Update buttons
    document.getElementById('prevBtn').classList.toggle('hidden', currentStep === 1);
    document.getElementById('nextBtn').classList.toggle('hidden', currentStep === totalSteps);
    document.getElementById('finishBtn').classList.toggle('hidden', currentStep !== totalSteps);
}

function nextStep() {
    if (currentStep < totalSteps) {
        currentStep++;
        updateStepIndicator();
    }
}

function previousStep() {
    if (currentStep > 1) {
        currentStep--;
        updateStepIndicator();
    }
}

function closeWelcomeModal() {
    document.getElementById('welcomeModal').style.display = 'none';
    
    // Mark first login as completed
    fetch('<?= BASE_URL ?>api/mark-first-login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({})
    }).catch(err => console.error('Error marking first login:', err));
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateStepIndicator();
    
    // Show modal automatically
    const modal = document.getElementById('welcomeModal');
    if (modal) {
        modal.style.display = 'flex';
    }
});
</script>


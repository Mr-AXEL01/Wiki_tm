<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6">Register for Your Wiki Platform</h2>
        <form id="registerForm" action="<?php echo URLROOT; ?>/users/register" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        
            <!-- Picture Upload -->
            <div class="mb-4">
                <label for="pictureUser" class="block text-gray-700 text-sm font-medium mb-2">Profile Picture</label>
                <div class="flex items-center">
                    <label for="pictureUser" class="cursor-pointer">
                        <div class="bg-gray-200 rounded-full p-2">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                    </label>
                    <input type="file" id="pictureUser" name="pictureUser" class="hidden" accept="image/*">
                    <span class="ml-2 text-gray-600">Choose a file</span>
                </div>
            </div>

            <!-- Full Name -->
            <div class="mb-4">
                <label for="fullName" class="block text-gray-700 text-sm font-medium mb-2">Full Name</label>
                <input type="text" id="fullName" name="fullName" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                <div id="fullNameError" class="text-red-500 text-xs mt-1"></div>
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-medium mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                <div id="usernameError" class="text-red-500 text-xs mt-1"></div>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                <div id="emailError" class="text-red-500 text-xs mt-1"></div>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                <div id="passwordError" class="text-red-500 text-xs mt-1"></div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="confirm_password" class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                <div id="confirmPasswordError" class="text-red-500 text-xs mt-1"></div>
            </div>

            <div class="subimtion flex justify-between items-center">
                <!-- Submit Button -->
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-400 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-300">Register</button>
                <a href="<?php echo URLROOT;?>/users/login" class="text-blue-500">
                    already have an account.
                </a>
            </div>
        </form>
    </div>
</section>

<script>
    function validateForm() {
        resetForm();

        const fullName = document.getElementById('fullName').value;
        if (fullName.trim() === '') {
            displayError('fullName', 'Full Name is required');
            return false;
        }

        const username = document.getElementById('username').value;
        if (username.trim() === '') {
            displayError('username', 'Username is required');
            return false;
        }

        const email = document.getElementById('email').value;
        if (email.trim() === '' || !isValidEmail(email)) {
            displayError('email', 'Invalid email address');
            return false;
        }

        const password = document.getElementById('password').value;
        if (password.trim() === '' || password.length < 6) {
            displayError('password', 'Password must be at least 6 characters');
            return false;
        }

        const confirmPassword = document.getElementById('confirm_password').value;
        if (confirmPassword !== password) {
            displayError('confirmPassword', 'Passwords do not match');
            return false;
        }
        
        return true;
    }

    function displayError(fieldId, errorMessage) {
        const inputField = document.getElementById(fieldId);
        const errorDiv = document.getElementById(`${fieldId}Error`);

        inputField.style.border = '1px solid red';
        errorDiv.innerText = errorMessage;
    }

    function resetForm() {
        const inputFields = document.getElementsByTagName('input');
        for (const inputField of inputFields) {
            inputField.style.border = '1px solid #e2e8f0';
        }

        const errorDivs = document.querySelectorAll('[id$="Error"]');
        for (const errorDiv of errorDivs) {
            errorDiv.innerText = '';
        }
    }

    function isValidEmail(email) {
        // Basic email validation, you may want to enhance it
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>

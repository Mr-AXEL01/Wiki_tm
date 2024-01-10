<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6">Register for Your Wiki Platform</h2>
        <form action="<?php echo URLROOT; ?>/controllers/users/register" method="POST" enctype="multipart/form-data">
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
                <input type="text" id="fullName" name="fullName" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required>
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-medium mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required>
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="confirm_password" class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-400 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-300">Register</button>
        </form>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>

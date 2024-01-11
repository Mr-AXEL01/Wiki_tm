<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6">Login into your wiki</h2>
        <form action="" method="POST">
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
            </div>

            <div class="subimtion flex justify-between items-center">
                <!-- Submit Button -->
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-400 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-300">login</button>
                <a href="<?php echo URLROOT;?>/users/register" class="text-blue-500">
                    don't have an account.
                </a>
            </div>
        </form>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>

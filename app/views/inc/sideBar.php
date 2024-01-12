<div class="">
        <link
            href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
            rel="stylesheet" />

        <div class="fixed bg-white text-blue-800 px-10 py-1 z-10 w-full navv">
            <div class="flex items-center justify-between py-2 text-5x1">
                <a href="<?= URLROOT ?>Pages/index"><img src="<?= URLROOT ?>public/img/WIKI.png" loading="lazy"
                        style="color:transparent" width="100" height="100"></a>

                <div class="flex items-center text-gray-500">
                    <span class="material-icons-outlined p-2" style="font-size: 30px">search</span>
                    <span class="material-icons-outlined p-2" style="font-size: 30px">notifications</span>
                    <div class="bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12 ml-2"
                        style="background-image: url(<?= URLROOT ?>public/images/Wallpaper.jpg)">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-grey-100 min-h-screen">

            <div class="flex flex-row pt-24 px-10 pb-4 h-screen">
                <div class="w-2/12 mr-6 asidd">
                    <div
                        class="bg-white flex flex-col content-stretch justify-evenly rounded-xl shadow-lg mb-6 px-6 py-4 aside h-5/6">
                        <a href="<?= URLROOT ?>admin/dashboard"
                            class="inline-block text-gray-600 hover:text-black my-4 w-full">
                            <span class="material-icons-outlined float-left pr-2">dashboard</span>
                            Dashboard
                            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                        </a>
                        <a href="<?= URLROOT ?>admin/categories"
                            class="inline-block text-gray-600 hover:text-black my-4 w-full">
                            <span class="material-icons-outlined float-left pr-2">tune</span>
                            Categories
                            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                        </a>
                        <a href="<?= URLROOT ?>admin/tags"
                            class="inline-block text-gray-600 hover:text-black my-4 w-full">
                            <span class="material-icons-outlined float-left pr-2">file_copy</span>
                            Tags
                            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                        </a>
                        <a href="<?= URLROOT ?>admin/wikis"
                            class="inline-block text-gray-600 hover:text-black my-4 w-full">
                            <span class="material-icons-outlined float-left pr-2">file_copy</span>
                            Wiki's
                            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                        </a>
                        <a href="<?= URLROOT ?>admin/users"
                            class="inline-block text-gray-600 hover:text-black my-4 w-full">
                            <span class="material-icons-outlined float-left pr-2">file_copy</span>
                            Users
                            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                        </a>
                        <a href="<?= URLROOT ?>admin/profile"
                            class="inline-block text-gray-600 hover:text-black my-4 w-full">
                            <span class="material-icons-outlined float-left pr-2">face</span>
                            Profile
                            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                        </a>
                        <a href="<?= URLROOT ?>auth/logout"
                            class="inline-block text-gray-600 hover:text-black my-4 w-full">
                            <span class="material-icons-outlined float-left pr-2">power_settings_new</span>
                            Log out
                            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
                        </a>
                    </div>

                </div>

                <div class="w-10/12">
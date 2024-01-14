<?php
require_once(__DIR__ . '/../../controllers/ConUser.php');
require_once(__DIR__ . '/../../controllers/ConCategorie.php');
require_once(__DIR__ . '/../../controllers/ConTags.php');
require_once(__DIR__ . '/../../controllers/ConWikis.php');

if($_SESSION['role'] == 'admin' && isset($_SESSION['user'])){
    $welcom =  'WELCOM :'. $_SESSION['username'];
}
else{
    header('Location: ../authentification/login.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="flex flex-col min-h-screen bg-gray-100 ">



        <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
        

            <div class="flex items-center">
                <div class="flex items-center gap-2 ml-4">
                    <img src="../../../public/images/logowiki.png" alt="Logo" class="w-24 h-18 mr-2">
                    <p class="text-transparent bg-clip-text  text-[20px] font-bold bg-gradient-to-r to-blue-400 from-blue-900">Administration</p>

                </div>
            </div>
            <!-- --------------------------------burger icon ----------------------------- -->
            <div class="space-x-5">
                <button type="button" id="burger" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <!-- --------------------------------burger icon ----------------------------- -->

        </div>
        <!-- --------------------------------burger menu ----------------------------- -->

        <div id="burgerbar" class="hidden absolute top-0 right-0 w-72 md:w-1/6 bg-slate-200 opacity-75 flex flex-col font-bold text-xl gap-6 min-h-screen pl-2">
            <a class="hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 h-12" id="close" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="36" viewBox="0 -960 960 960" width="36">
                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                </svg></a>
            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="index.php">
                <i class="fas fa-home mr-2"></i>Dashboard
            </a>


            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="Categories.php">
                <i class="fas fa-file-alt mr-2"></i>Categorys
            </a>

            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="wikis.php">
                <i class="fas fa-store mr-2"></i>Wikis
            </a>
            <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="tags.php">
                <i class="fas fa-store mr-2"></i>Tags
            </a>
            <a class="block text-black font-bold py-2.5 px-4 my-2 rounded duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white mt-auto" href="../authentification/login.php">
                    <i class="fas fa-sign-out-alt mr-2"></i>Log Out
                </a>
        </div>
        <!-- --------------------------------burger menu ----------------------------- -->

        <div class="flex-1 flex flex-wrap">
            <!-- --------------------------------SideBar ----------------------------- -->

            <div class="p-2 bg-white w-full md:w-60 flex flex-col md:flex hidden" id="sideNav">
                <nav><a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="index.php">
                        <i class="fas fa-home mr-2"></i>Dashboard
                    </a>


                    <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="Categories.php">
                        <i class="fas fa-file-alt mr-2"></i>Categorys
                    </a>

                    <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="wikis.php">
                        <i class="fas fa-store mr-2"></i>Wikis
                    </a>
                    <a class="block text-black font-bold py-2.5 px-4 my-4 rounded  duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white" href="tags.php">
                        <i class="fas fa-store mr-2"></i>Tags
                    </a>

                </nav>

                <a class="block text-black font-bold py-2.5 px-4 my-2 rounded duration-300 hover:bg-gradient-to-r hover:from-sky-200 hover:to-sky-800 hover:text-white mt-auto" href="../authentification/login.php">
                    <i class="fas fa-sign-out-alt mr-2"></i>Log Out
                </a>


            </div>
            <!-- --------------------------------SideBar ----------------------------- -->

            <div class="flex-1 p-4 w-full md:w-1/2">
            <div class="w-full"> <h1><?= $welcom?></h1></div>

                <div class="mt-8 md:flex jmd:ustify-rounded  space-x-0 space-y-2 md:space-x-4 md:space-y-0">
                    <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">

                        <h2 class="text-gray-500 text-lg font-semibold pb-1">Authors</h2>
                        <div class="my-1"></div>
                        <div class="bg-gradient-to-r from-sky-300 to-sky-800 h-px mb-6"></div>
                        <div class="flex">
                            <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                            </svg>
                            <span class="py-2 px-8 bg-grey-lightest font-bold uppercase text-l text-grey-light ">
                                <?=$authors?>
                            </span>
                            <h3 class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-gray-500 border-b border-grey-light">
                                Active Authors</h3>
                        </div>
                    </div>


                    <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                        <h2 class="text-gray-500 text-lg font-semibold pb-1">categorys</h2>
                        <div class="my-1"></div>
                        <div class="bg-gradient-to-r from-sky-300 to-sky-800 h-px mb-6"></div>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path d="M120-520v-320h320v320H120Zm0 400v-320h320v320H120Zm400-400v-320h320v320H520Zm0 
                        400v-320h320v320H520ZM200-600h160v-160H200v160Zm400 0h160v-160H600v160Zm0 400h160v-160H600v160Zm-400 0h160v-160H200v160Zm400-400Zm0 240Zm-240 0Zm0-240Z" />
                            </svg>
                            <span class="py-2 px-10 bg-grey-lightest font-bold uppercase text-l text-grey-light ">
                            <?=$category?>

                            </span>
                            <h3 class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-gray-500 border-b border-grey-light">
                                Available categorys</h3>

                        </div>
                    </div>
                    <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                        <h2 class="text-gray-500 text-lg font-semibold pb-1">Wikis</h2>
                        <div class="my-1"></div>
                        <div class="bg-gradient-to-r from-sky-300 to-sky-800 h-px mb-6"></div>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path d="M240-320h320v-80H240v80Zm0-160h480v-80H240v80Zm-80 320q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h240l80 80h320q33
                         0 56.5 23.5T880-640v400q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H447l-80-80H160v480Zm0 0v-480 480Z" />
                            </svg>
                            <span class="py-2 px-16 bg-grey-lightest font-bold uppercase text-l text-grey-light ">
                           <?= $wikiTot ?>
                            </span>
                            <h3 class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-gray-500 border-b border-grey-light">
                                Available Wikis</h3>
                        </div>
                    </div>
                </div>
                <div class="mt-2 md:flex md:justify-rounded   space-x-0 space-y-2 md:space-x-4 md:space-y-0">



                    <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">

                        <h2 class="text-gray-500 text-lg font-semibold pb-1">Tags</h2>
                        <div class="my-1"></div>
                        <div class="bg-gradient-to-r from-sky-300 to-sky-800 h-px mb-6"></div>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path d="M570-104q-23 23-57 23t-57-23L104-456q-11-11-17.5-26T80-514v-286q0-33 23.5-56.5T160-880h286q17 0 32 6.5t26 17.5l352 353q23 23 23 56.5T856-390L570-104Zm-57-56 286-286-353-354H160v286l353 354ZM260-640q25 0 42.5-17.5T320-700q0-25-17.5-42.5T260-760q-25 0-42.5 17.5T200-700q0 25 17.5 42.5T260-640ZM160-800Z" />
                            </svg>
                            <span class="py-2 px-8 bg-grey-lightest font-bold uppercase text-l text-grey-light ">
                            <?=$tags?>
                            </span>
                            <h3 class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-gray-500 border-b border-grey-light">
                                Available Tags</h3>
                        </div>
                    </div>
                    <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                        <h2 class="text-gray-500 text-lg font-semibold pb-1">Archived Wikis</h2>
                        <div class="my-1"></div>
                        <div class="bg-gradient-to-r from-sky-300 to-sky-800 h-px mb-6"></div>
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                <path d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                            </svg>
                            <span class="py-2 px-10 bg-grey-lightest font-bold uppercase text-l text-grey-light ">
                          <?=  $wikiArchived ?>
                            </span>
                            <h3 class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-gray-500 border-b border-grey-light">
                                Wiki Archived</h3>

                        </div>
                    </div>

                </div>
                <div class="mt-8 bg-white p-4 shadow rounded-lg mx-auto min-h-1/2">

                    <h2 class="text-gray-500 text-lg font-semibold pb-4">Authors</h2>
                    <div class="my-1"></div>
                    <div class="bg-gradient-to-r from-sky-100 to-sky-900 h-px mb-6"></div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white font-[sans-serif]">
                            <thead class="bg-gradient-to-r from-sky-300 to-sky-800 whitespace-nowrap">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        User Id
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Full Name
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Email
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Role
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="whitespace-nowrap">
                                <?php
                                foreach($users as $user):
                                ?>
                                <tr class="even:bg-blue-50">
                                    <td class="px-6 py-4 text-sm">
                                        <?= $user->getId(); ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                    <?= $user->getFullname(); ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                    <?= $user->getEmail(); ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                    <?= $user->getRole(); ?>
                                    </td>

                                </tr>
                       <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <script src="../../../public/js/burgerMenu.js"></script>

</body>

</html>
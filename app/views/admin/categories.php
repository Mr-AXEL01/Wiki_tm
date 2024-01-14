<?Php
require_once(__DIR__ . '/../../controllers/ConCategorie.php');


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

<body class="bg-gray-100">
    <div class="flex flex-col h-screen bg-gray-100">


        <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
            <div class="flex items-center justify-between px-4 w-[95%]">
                <div class="flex items-center gap-2">
                    <img src="../../../public/images/logowiki.png" alt="Logo" class="w-24 h-18 mr-2">
                    <p class="text-transparent bg-clip-text bg-gradient-to-r text-[20px] font-bold to-blue-400 from-blue-900">Administration</p>

                </div>

                <div class="text-right ">
                    <button id="addcategory" class="hover:bg-gradient-to-r md:w-auto w-16 hover:from-sky-300 hover:to-sky-800 md:text-[17px] text-[10px] bg-gradient-to-r from-sky-800 to-sky-300 text-white font-semibold py-2 px-4 rounded">


                        add Category

                    </button>
                </div>
            </div>

            <!-- --------------------------------burger icon ----------------------------- -->
            <div class="space-x-5">
                <button type="button" id="burger" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <!-- --------------------------------burger icon ----------------------------- -->

        </div>
        <!-- --------------------------------burger menu ----------------------------- -->

        <div id="burgerbar" class="hidden absolute z-50	 top-0 right-0 w-72 md:w-1/6 bg-slate-200 opacity-75 flex flex-col font-bold text-xl gap-6 min-h-screen pl-2">
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

            <div class="flex-1 p-4 w-full md:w-1/2">


                <div class="mt-8 bg-white p-4 shadow rounded-lg mx-auto min-h-1/2">

                    <h2 class="text-gray-500 text-lg font-semibold pb-4">Categorys</h2>
                    <div class="my-1"></div>
                    <div class="bg-gradient-to-r from-sky-100 to-sky-900 h-px mb-6"></div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white font-[sans-serif]">
                            <thead class="bg-gradient-to-r from-sky-300 to-sky-800 whitespace-nowrap">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Category Id
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Name
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Image
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Description
                                    </th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-white">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="whitespace-nowrap">
                                <?php
                                foreach ($Categorys as $cat) :
                                ?>
                                    <tr class="even:bg-blue-50">
                                        <td class="pl-10 py-4 text-sm">
                                            <?= $cat->getId(); ?>
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <?= $cat->getCategory_name(); ?>
                                        </td>
                                        <td class="pr-6 py-4 ">
                                            <img class="w-24 h-12" src="<?= $cat->getCategory_image(); ?>" alt="">
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <?= $cat->getCategory_desc(); ?>
                                        </td>
                                        <td class="px-6 py-4 flex">
                                            <form action="../../controllers/ConCategorie.php" method="post">
                                                <button class="mr-4" title="Edit" name="update" value="<?= $cat->getId(); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700" viewBox="0 0 348.882 348.882">
                                                        <path d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z" data-original="#000000" />
                                                        <path d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z" data-original="#000000" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="../../controllers/ConCategorie.php" method="post">

                                                <button class="mr-4" title="Delete" name="delete" value="<?= $cat->getId(); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                                        <path d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z" data-original="#000000" />
                                                        <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z" data-original="#000000" />
                                                    </svg>
                                                </button>
                                            </form>
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
    </div>


    <div id="overlay" class="hidden h-screen w-full fixed top-0 left-0 bg-black/10  flex justify-center items-center">

                    <!------------------------- Displaying Data for update------------------------------ -->

                        <?php
                        if (isset($_SESSION['category'])) {
                            $Data = $_SESSION['category'];

                            [$name, $desc, $img] = $Data;
                        ?>
                            <script>
                                document.getElementById("overlay").classList.remove("hidden");
                            </script>
                        <?php
                            unset($_SESSION['category']);
                        }
                        ?>
                    <!------------------------- Displaying Data for update------------------------------ -->


        <div class="w-full md:w-1/2 mx-auto bg-white p-6 rounded-md shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Add Catgory</h2>


                    <!------------------------------ Regex for existing category------------------------- -->

                            <?php
                            if (isset($_GET['error']) && $_GET['error'] === 'true') { ?>
                                <script>
                                    document.getElementById('overlay').classList.remove('hidden');
                                </script>
                                <p class="text-red-600"><?= $_SESSION['error'] ?>  </p>
                            <?php
                                unset($_GET['error']);
                            } ?>
                    <!------------------------------ Regex for existing category--------------------------- -->

            <form action="../../controllers/ConCategorie.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="CategoryName" class="block text-gray-700 text-sm font-bold mb-2">Catgory Name </label>
                    <input type="text" id="CategoryName" name="CategoryName" value="<?= $name ?>" placeholder="Enter catgory name" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="CategoryName" class="block text-gray-700 text-sm font-bold mb-2">Category Description </label>
                    <input type="text" id="CategoryDesc" name="CategoryDesc" value="<?= $desc ?>" placeholder="Enter Catgory Description" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                </div>

                <div class="mb-4">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4" for="user_avatar">Upload file</label>
                    <input name="image" value="<?= $img ?>" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  id="Category_image" type="file">
                </div>

                <div class="flex justify-end">
                <?php if (isset($_SESSION['IdCat'])) {
                        $id = $_SESSION['IdCat'] ?>
                        <button type="submit" name="updateCat" value="<?= $id ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Edit Category
                        </button>

                    <?php } else { ?>
                        <button type="submit" name="addCat" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Add Category
                        </button>
                    <?php } ?>
                </div>
            </form>
        </div>

    </div>

    <script src="../../../public/js/burgerMenu.js"></script>
    <script src="../../../public/js/PopUp.js">
    </script>
</body>

</html>
<?php
require_once(__DIR__ . "/../../controllers/ConCategorie.php");
require_once(__DIR__ . "/../../controllers/ConTags.php");
require_once(__DIR__ . "/../../controllers/ConWikis.php");
if($_SESSION['role'] == 'author' && isset($_SESSION['user'])){
    $welcom =  'WELCOM :'. $_SESSION['username'];
}
else{
    header('Location: ../authentification/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body class="bg-gradient-to-r to-blue-300 from-black  min-h-screen p-4 flex flex-col justify-center gap-y-4	">

    <div class="h-[7vh] min-w-1/2 mx-auto bg-gray-300 flex justify-center items-center rounded-md">
        <h1 class="text-transparent bg-clip-text m-4 text-[15px] sm:text-[15px]  lg:text-[21px] font-bold bg-gradient-to-r to-blue-400 from-blue-700"><?= $_SESSION['username'] ?> Thank you for generously sharing your knowledge by creating a Wiki</h1>
    </div>
    <!------------------------- Displaying Data for update------------------------------ -->

    <?php
    if (isset($_SESSION['wikis'])) {
        $Data = $_SESSION['wikis'];

        [$img, $title, $content, $summary] = $Data;

        unset($_SESSION['wikis']);
    }
    ?>
    <!------------------------- Displaying Data for update------------------------------ -->



    <form action="../../controllers/ConWikis.php" method="post" class=" min-w-screen mt-4 " enctype="multipart/form-data">


        <!------------------------------ Regex for existing wikis------------------------- -->

        <?php
        if (isset($_GET['error']) && $_GET['error'] === 'true') { ?>

            <p class="text-red-600 w-1/2 mx-auto"><?= $_SESSION['error'] ?> </p>
        <?php
            unset($_GET['error']);
        } ?>
        <!------------------------------ Regex for existing wikis--------------------------- -->
        <div class="grid md:grid-cols-2 md:gap-6 mx-4 lg:w-1/2 lg:mx-auto">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-white dark:text-white">Wiki Title</label>
                <input type="text" id="name" name="Title" value="<?= $title ?>" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Title">
            </div>
            <div class="mb-5">


                <label class="block mb-2 text-sm font-medium text-white " for="multiple_files">Wiki Image</label>
                <input type="file" name="image" value="<?= $img ?>" class="block w-full bg-white rounded-lg text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>
        </div>
        <div class="mb-5 mx-4 lg:w-1/2 lg:mx-auto">
            <label for="summary" class="block mb-2 text-sm font-medium text-white dark:text-white">Wiki summary</label>
            <input type="text" name="summary" value="<?= $summary ?>" id="summary" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="summary">
        </div>
        <div class="mb-10 mx-4 lg:w-1/2 lg:mx-auto h-[30vh]">

            <label for="message" class="block mb-2 text-sm font-medium text-white dark:text-white">Wiki Content</label>
            <textarea id="message" name="content" rows="4" class="block  p-2.5 w-full h-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Share Your content here ..."><?= $content ?></textarea>

        </div>
        <?php if (isset($_SESSION['Idwiki'])) {
        } else { ?>

            <div class="grid mb-10 md:grid-cols-2 md:gap-6 mx-4 lg:w-1/2 lg:mx-auto">

                <select id="Catgories" name="category" class="bg-gray-50 border h-[65px] border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a Category</option>

                    <?php foreach ($Categorys as $cat) : ?>

                        <option value="<?= $cat->getId() ?>"><?= $cat->getCategory_name() ?></option>
                    <?php endforeach; ?>

                </select>
                <div class="space-y-6 mt-4 md:mt-0 h-[65px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  p-2.5  overflow-auto scrollbar-w-2 scrollbar-track-gray-100 scrollbar-thumb-[#007bff]">
                    <?php foreach ($Tags as $tag) : ?>
                        <div class="flex items-center">
                            <input id="checkbox1" type="checkbox" name="nametag[]" value="<?= $tag->getId() ?>" class="w-4 h-4 mr-3 focus:ring-1 focus:ring-offset-slate-200 focus:ring-offset-4 focus:ring-[#007bff]" />
                            <label for="checkbox1" class="text-black text-sm"><?= $tag->getTag_name() ?></label>
                        </div>
                    <?php endforeach; ?>





                </div>

            </div>
        <?php } ?>
        </div>
        <?php if (isset($_SESSION['Idwiki'])) {
            $id = $_SESSION['Idwiki'] ?>
            <div class="mx-4 lg:w-1/2 lg:mx-auto ">
                <button type="submit" name="updatewiki" value="<?= $id ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Wiki</button>
            </div>
        <?php     } else { ?>
            <div class="mx-4 lg:w-1/2 lg:mx-auto ">
                <button type="submit" name="addWiki" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Wiki</button>
            </div>
        <?php } ?>
    </form>

</body>

</html>
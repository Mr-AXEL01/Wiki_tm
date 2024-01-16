<?php
require_once(__DIR__ . "/../controllers/ConCategorie.php");
require_once(__DIR__ . "/../controllers/Conwikis.php");
unset($_SESSION["CatId"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>Document</title>
</head>

<body class="font-sans bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div>
                    <a href="#">
                        <img class="w-[150px] h-[70px] md:w-[100px]" src="../../public/images/Wiki-black.png" alt="WIKI Logo" />
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <a href="Author/dashboardWikis.php" class="text-blue-800 text-xs hover:text-gray-900">My WIKIS</a>
                        <a href="authentification/login.php" class="mr-3 inline-block rounded bg-blue-500 px-6 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase leading-normal text-white  transition duration-150  hover:bg-primary-600  focus:bg-primary-600  focus:outline-none focus:ring-0 active:bg-primary-700">Log Out</a>
                    <?php } else { ?>
                        <a href="authentification/login.php" class="text-gray-700 hover:text-gray-900">Login</a>
                        <a href="authentification/register.php" class="mr-3 inline-block rounded bg-blue-500 px-6 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase leading-normal text-white  transition duration-150  hover:bg-primary-600  focus:bg-primary-600  focus:outline-none focus:ring-0 active:bg-primary-700">Sign up</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <section class="bg-gradient-to-r from-blue-900 via-black to-blue-700 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="sm:text-5xl text-3xl font-extrabold">Discover, learn, and contribute! Welcome to our Wiki</h1>
            <div class="my-10 text-sm">
                <p>Explore and contribute to our collection of knowledge. Our wiki is a collaborative platform where you can find information on various topics and share your expertise with the community</p>
                <p class="font-bold">Start by browsing our <a class="text-blue-300" href="visiteur/wikis.php">wikis</a> or create your own.</p>
            </div>
            <hr class="border-white" />
            <div class="mt-10 flex max-sm:flex-col justify-center sm:gap-6 gap-4">
                <a href="visiteur/wikis.php">
                    <button type="button" class="px-6 py-3 rounded text-sm tracking-wider font-semibold border border-white outline-none bg-transparent hover:bg-white hover:text-blue-700  ">See More</button>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 p-8">
        <div class="container mx-auto">
            <div class="text-center max-w-xl mx-auto">
                <h2 class="text-3xl font-extrabold text-[#333] inline-block">LATEST CATEGORYS</h2>
                <p class="text-gray-600 text-sm mt-6">Explore our freshest categories, each a gateway to a world of specialized knowledge. Dive in and discover the latest additions to our diverse collection!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 max-md:max-w-lg mx-auto">
                <?php foreach ($categories as $Categorie) : ?>
                    <div>
                        <form action="../controllers/ConWikis.php" method="post">
                            <input type="hidden" name="catId" value="<?= $Categorie->getId() ?>">

                            <div class="bg-white cursor-pointer rounded-t-md overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-50">
                                <img src="<?= $Categorie->getCategory_image() ?>" alt="Category Image" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
                                <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
                                    <h3 class="text-xl font-bold text-white"><?= $Categorie->getCategory_name() ?></h3>
                                    <div class="mt-4">
                                        <p class="text-gray-200 text-sm"><?= $Categorie->getCategory_desc() ?></p>
                                    </div>
                                </div>
                            </div>
                            <button class="w-full h-[45px] bg-blue-700 hover:bg-blue-600 text-white md:text-[17px] font-bold rounded-b-md" type="submit">Wikis of <?= $Categorie->getCategory_name() ?></button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 p-8">
        <div class="container mx-auto">
            <div class="text-center max-w-xl mx-auto">
                <h2 class="text-3xl font-extrabold text-[#333] inline-block">LATEST WIKIS</h2>
                <p class="text-gray-600 text-sm mt-6">Stay up-to-date with our ever-expanding encyclopedia of knowledge. The latest wikis showcase the continuous collaboration and commitment to shared learning</p>
            </div>

            <form action="../controllers/ConWikis.php" method="post" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 max-md:max-w-lg mx-auto">
                <?php foreach ($wikiHome as $wiki) : ?>
                    <button type="submit" name="wikiId" value="<?= $wiki->getId() ?>">
                        <div class="bg-white cursor-pointer rounded-[20px] overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-50">
                            <img src="<?= $wiki->getWikiImage() ?>" alt="Wiki Image" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
                            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
                                <h3 class="text-xl font-bold text-white"><?= $wiki->getWikiTitle() ?></h3>
                                <div class="mt-4">
                                    <p class="text-gray-200 text-sm"><?= $wiki->getWikiSummarize() ?></p>
                                </div>
                            </div>
                        </div>
                    </button>
                <?php endforeach; ?>
            </form>
        </div>
    </section>

    <footer class="bg-gray-700 text-white py-8 mt-16">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center justify-between">
                <div class="w-full md:w-auto text-center md:text-left mb-6 md:mb-0">
                    <a href="javascript:void(0)" class="text-xl font-extrabold">Wiki-tm</a>
                </div>
                <div class="w-full md:w-auto text-center">
                    <ul class="flex items-center justify-center flex-wrap space-x-4">
                        <li><a href="../index.php" class="hover:text-gray-300">Home</a></li>
                        <li><a href="wikis.php" class="hover:text-gray-300">Wikis</a></li>
                        <li><a href="../authentification/login.php" class="hover:text-gray-300">Log in</a></li>
                        <li><a href="../authentification/register.php" class="hover:text-gray-300">Sign up</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-6 border-gray-600" />
            <p class='text-center text-gray-500'>Copyright © 2023 <a href='../index.php' target='_blank' class="hover:underline mx-1">Wiki-tm</a> All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var searchTerm = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'search.php',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        $('#searchcontainer').html(response);
                        $('#searchcontainer').show();
                        $('#wikisContainer').hide();
                    }
                });
            });
        });
    </script>
</body>

</html>

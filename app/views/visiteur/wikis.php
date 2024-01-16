<?php
require_once(__DIR__ . "/../../controllers/ConWikis.php");
require_once(__DIR__ . "/../../controllers/ConCategorie.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Your Wiki Title</title>
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <nav class="relative flex w-full  flex-wrap items-center justify-between bg-gray-700 py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 mb-[5vh] lg:pt-2"
        data-te-navbar-ref>
        <div class="flex w-full items-center justify-between px-2">
            <div>
                <a class="" href="../index.php">
                    <img class="mr-2 md:ml-10 w-[150px] h-[70px] md:w-[100px] "
                        src="../../../public/images/Wiki-black.png" alt="WIKI Logo" />
                </a>
            </div>

            <div class="   flex  items-center lg:mt-0  md:justify-between" id="navbarSupportedContent4"
                data-te-collapse-item>
                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:mt-1 lg:flex-row"></ul>

                <?php if (!empty($wikisCat)) { ?>
                    <div class="flex items-center md:justify-right lg:mr-24 md:gap-x-10 lg:gap-x-32 md:gap-x-0 gap-x-2">
                    <?php } else { ?>
                        <div
                            class="flex items-center md:justify-rounded lg:w-[40vw] md:gap-x-10 lg:gap-x-32 md:gap-x-0 gap-x-2">
                            <input type="search" id="searchInput" placeholder="Search"
                                class="h-[40px] w-[140px] md:w-auto p-4 rounded-xl outline-none border border-gray-500 ">
                        <?php } ?>

                        <div class="flex  gap-4">
                            <?php if (isset($_SESSION['user']) && $_SESSION['role'] === 'author') { ?>
                                <a href="../Author/dashboardWikis.php">
                                    <button value=""
                                        class="flex gap-x-2 md:font-bold items-center text-[10px] md:text-[14px] h-10 px-5 text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white"
                                            viewBox="0 -960 960 960" width="24">
                                            <path
                                                d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z" />
                                        </svg>
                                        My WIKIS
                                    </button>
                                </a>
                                <a href="../authentification/login.php">
                                    <button type="button"
                                        class="flex gap-x-2 md:font-bold items-center text-[10px] md:text-[14px] h-10 px-5 text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-gray-700">
                                        Log Out
                                    </button>
                                </a>
                            <?php } else { ?>
                                <a href="../authentification/login.php">
                                    <button type="button"
                                        class="mr-3 inline-block rounded px-4 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase text-white transition duration-150  hover:bg-neutral-200 hover:text-black focus:outline-none ">
                                        Login
                                    </button>
                                </a>
                                <a href="../authentification/register.php">
                                    <button type="button"
                                        class="mr-3 inline-block rounded bg-blue-500 px-6 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase leading-normal text-white  transition duration-150  hover:bg-primary-600  focus:bg-primary-600  focus:outline-none focus:ring-0 active:bg-primary-700 ">
                                        Sign up
                                    </button>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
    </nav>

    <section class="container mx-auto my-8">
        <?php if (isset($_SESSION['user']) && $_SESSION['role'] === 'author') { ?>
            <div class="flex justify-end">
                <a href="../Author/AddWiki.php">
                    <button
                        class="flex gap-x-2 font-bold items-center h-10 px-5 text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960"
                            width="24">
                            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                        </svg>
                        <span>Create your own WIKI</span>
                    </button>
                </a>
            </div>
        <?php } else { ?>
            <div class="flex justify-between">
                <a href="../authentification/login.php">
                    <button
                        class="flex gap-x-2 font-bold items-center h-10 px-5 text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960"
                            width="24">
                            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                        </svg>
                        <span>Create your own WIKI</span>
                    </button>
                </a>
            </div>
        <?php } ?>
    </section>

    <div id="searchcontainer" ></div>

        <section class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 min-h-screen" id="wikisContainer">
            <?php
            $wikisToShow = (!empty($wikisCat)) ? $wikisCat : $wikis;

            foreach ($wikisToShow as $wiki): ?>
                <div class="bg-white rounded-lg h-max overflow-hidden shadow-md hover:shadow-lg transition-transform transform hover:scale-105">
                    <img class="w-full h-48 object-cover" src="<?= $wiki['pictureWiki'] ?>" alt="<?= $wiki['titleWiki'] ?>">

                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-2">
                            <?= $wiki['titleWiki'] ?>
                        </h2>
                        <p class="text-gray-600">
                            <?= $wiki['summaryWiki'] ?>
                        </p>

                        <div class="flex items-center justify-between mt-4">
                            <div class="text-gray-500">
                                <?= $wiki['username'] ?>
                            </div>
                            <div class="text-right text-gray-500">
                                <?= $wiki['dateCreated'] ?>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4">
                            <?php
                            foreach ($wiki['tags'] as $tag):
                                ?>
                                <span
                                    class="m-1 mr-1 text-[10px] sm:text-sm bg-gray-200 hover:bg-gray-300 rounded-full px-3 py-1 font-semibold">
                                    <?= $tag ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-4 text-center">
                            <form action="../../controllers/ConWikis.php" method="post">
                                <button type="submit" name="wikiId"
                                    class="w-full bg-blue-500 text-white rounded-full py-2 px-4 transition-colors duration-300 hover:bg-blue-700"
                                    value="<?= $wiki['idWiki'] ?>">
                                    Read More
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
            <p class='text-center text-gray-500'>Copyright © 2023 <a href='../index.php' target='_blank'
                    class="hover:underline mx-1">Wiki-tm</a> All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#searchInput').on('input', function () {
                var searchTerm = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'search.php',
                    data: {
                        search: searchTerm
                    },
                    success: function (response) {
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
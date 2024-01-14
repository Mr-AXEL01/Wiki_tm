<?php
require_once(__DIR__ . "/../../controllers/ConWikis.php");
require_once(__DIR__ . "/../../controllers/ConCategorie.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    <nav class="relative flex w-full  flex-wrap items-center justify-between bg-[#FBFBFB] py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 mb-[5vh] lg:pt-2" data-te-navbar-ref>
        <div class="flex w-full items-center justify-between px-2">
            <div>
                <a class="" href="../index.php">
                    <img class="mr-2 md:ml-10 w-[150px] h-[70px] md:w-[100px] " src="../../../public/images/logowiki.png" alt="WIKI Logo" />
                </a>
            </div>



            <div class="   flex  items-center lg:mt-0  md:justify-between" id="navbarSupportedContent4" data-te-collapse-item>
                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:mt-1 lg:flex-row">

                </ul>

                    <?php
                    if (!empty($wikisCat)) {?>
                        <div class="flex items-center md:justify-right lg:mr-24 md:gap-x-10 lg:gap-x-32 md:gap-x-0 gap-x-2">

              <?php      } else {
                    ?>
                                    <div class="flex items-center md:justify-rounded lg:w-[40vw] md:gap-x-10 lg:gap-x-32 md:gap-x-0 gap-x-2">

                        <input type="search" id="searchInput" placeholder="Search" class="h-[40px] w-[140px] md:w-auto p-4 rounded-xl outline-none border border-gray-500 ">
                    <?php
                    }
                    ?>
                    <div class="flex  gap-4">
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['role'] === 'author') {

                        ?>
                            <a href="../Author/dashboardWikis.php"><button value="" class="flex gap-x-2 md:font-bold items-center text-[10px] md:text-[14px] h-10 px-5 text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960" width="24">
                                        <path d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z" />
                                    </svg>
                                    My WIKIS

                                </button></a>
                            <a href="../authentification/login.php"><button type="button" class="flex gap-x-2 md:font-bold items-center text-[10px] md:text-[14px] h-10 px-5 text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-gray-700">
                                    Log Out
                                </button></a>
                        <?php  } else { ?>
                            <a href="../authentification/login.php"><button type="button" class="mr-3 inline-block rounded px-4 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase  text-primary transition duration-150  hover:bg-neutral-200  focus:outline-none  ">
                                    Login
                                </button></a>
                            <a href="../authentification/register.php"><button type="button" class="mr-3 inline-block rounded bg-blue-500 px-6 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase leading-normal text-white  transition duration-150  hover:bg-primary-600  focus:bg-primary-600  focus:outline-none focus:ring-0 active:bg-primary-700 ">
                                    Sign up
                                </button></a>
                        <?php   }
                        ?>
                    </div>


                </div>
            </div>
        </div>
    </nav>
    <div>
        <?php
        if (isset($_SESSION['user']) && $_SESSION['role'] === 'author') {

        ?>
            <div class="w-[91%] mx-auto flex justify-between h-16 items-center">
                <form action="../../controllers/ConWikis.php" method="post"><button name="Unset" class="px-2 py-2.5 min-w-[140px] lg:w-[290px] shadow-lg rounded-full text-black text-sm  font-medium border-none outline-none bg-sky-200 active:shadow-inner">All Wikis</button></form>

                <a href="../Author/AddWiki.php"><button class="flex gap-x-2 font-bold items-center h-10 px-5 text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">

                        <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960" width="24">
                            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                        </svg>
                        <span>Create your own WIKI</span>
                    </button></a>

            </div>
        <?php  } else { ?>
            <div class="w-[90%] mx-auto flex justify-between h-16 items-center">
                <form action="../../controllers/ConWikis.php" method="post"><button name="Unset" class="px-2 py-2.5 min-w-[140px] shadow-lg rounded-full text-black text-sm  font-medium border-none outline-none bg-sky-200 active:shadow-inner">All Wikis</button></form>

                <a href="../authentification/login.php"><button class="flex gap-x-2 font-bold items-center h-10 px-5 text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960" width="24">
                            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                        </svg>
                        <span>Create your own WIKI</span>
                    </button>
                </a>

            </div>
        <?php   }
        ?>
    </div>

    <section class="flex min-h-screen ">
        <!-------------------------------------------------------------Categorys------------------------------------------------- -->
        <div class="w-[19%] ml-auto">
            <div class="md:min-h-fit min-h-[50px] w-[100%]   rounded-xl bg-slate-100 flex flex-col gap-y-4 items-center py-4">
                <div class="w-full text-center text-sm md:text-xl font-semibold md:font-bold">
                    <h1>Categorys</h1>
                </div>


                <?php
                foreach ($Categorys as $Category) :
                ?>
                    <div>
                        <form action="../../controllers/ConWikis.php" method="post">
                            <input type="hidden" name="catId" value="<?= $Category->getId() ?>">
                            <div class="flex flex-col w-[93%] rounded-t	 mx-auto items-center shadow-md rounded-[40px]">
                                <a href="#">
                                    <img class="w-full rounded-t" src="<?= $Category->getCategory_image(); ?>" alt="Sunset in the mountains">


                                </a>

                                <button type="submit" class="text-center rounded-b w-full bg-blue-600 px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ">
                                    <?= $Category->getCategory_name(); ?>
                                </button>



                            </div>
                        </form>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
        <!--------------------------------------------------------------WIKIS------------------------------------------------- -->
        <div id="searchcontainer" class="hidden min-h-full w-[70%] mx-auto rounded-xl">
        </div>

        <div id="wikisContainer" class="min-h-full w-[70%] mx-auto rounded-xl">

            <?php

            $wik = (!empty($wikisCat)) ? $wikisCat : $wikis;



            foreach ($wik as $wiki) : ?>
                <div class="md:flex cursor-pointer md:flex-col lg:flex-row w-full lg:min-h-[25vh] min-h-fit bg-slate-100 rounded-xl p-8 md:p-0  hover:scale-105 mb-6 md:mb-4">
                    <img class="lg:max-w-1/4  lg:min-h-[25vh] h-[5%]  md:h-auto md:rounded-xl rounded-xl mx-auto lg:mx-0" src="<?= $wiki['wiki_image'] ?>" alt="" width="384" height="512">
                    <div class="pt-6 w-[100%] md:p-8 text-center md:text-left space-y-4">
                        <div class="text-slate-700 text-2xl font-bold">
                            <h1><?= $wiki['wiki_title'] ?></h1>
                        </div>
                        <div class="w-full">
                            <p class="text-lg  font-medium">
                                <?= $wiki['wiki_summarize'] ?>
                            </p>
                        </div>
                        <div class="font-medium flex justify-between w-[100%] text-sky-500">

                            <p class="w-1/2"><?= $wiki['username'] ?></p>
                            <div class="w-full text-right font-medium text-gray-500 mt-2"> <?= $wiki['created_at'] ?></div>

                        </div>
                        <div class="flex flex-wrap">
                            <?php

                            foreach ($wiki['tags'] as $tag) :
                            ?>
                                <p class="m-1 mr-1 w-[7%] mb-4  flex justify-center text-[10px] sm:text-sm bg-gray-200 hover:bg-gray-300  rounded-[40px] px-4 py-2 font-bold leading-loose   "><?= $tag ?> </p>

                            <?php endforeach;
                            ?>

                        </div>

                    </div>
                    <div class="w-[100%] lg:mr-6 lg:w-1/3 flex lg:flex-col justify-between   md:items-end md:gap-4 lg:gap-0 my-4 lg:items-right">
                        <p class="md:ml-4 lg:ml-0 font-bold text-[12px] md:text-[17px]">Category : <?= $wiki['category'] ?></p>
                        <form action="../../controllers/ConWikis.php" method="post">

                            <button type="submit" name="wikiId" class=" md:w-[150px] w-[70px] text-[10px] md:text-[15px] h-[40px] md:mr-4 lg:mr-0 bg-black rounded duration-300 hover:bg-blue-700  text-white" value="<?= $wiki['wiki_id'] ?>">Read More</button>
                        </form>
                    </div>

                </div>
            <?php endforeach;
            ?>



        </div>
    </section>
    <footer class="bg-gray-200 md:w-full font-[sans-serif]">
        <div class="py-8 px-4 sm:px-12">
            <div class="flex flex-wrap items-center justify-between">
                <div class="w-full md:w-auto text-center md:text-left mb-6 md:mb-0">
                    <a href="javascript:void(0)" class="text-gray-700 hover:text-gray-900 font-extrabold text-2xl">ReadymadeUI</a>
                </div>
                <div class="w-full md:w-auto text-center">
                    <ul class="flex items-center justify-center flex-wrap gap-y-2 md:justify-end space-x-6">
                        <li><a href="../index.php" class="text-gray-700 hover:text-gray-900 text-base">Home</a></li>
                        <li><a href="wikis.php" class="text-gray-700 hover:text-gray-900 text-base">Wikis</a></li>
                        <li><a href="../authentification/login.php" class="text-gray-700 hover:text-gray-900 text-base">Log in</a></li>
                        <li><a href="../authentification/register.php" class="text-gray-700 hover:text-gray-900 text-base">Sing up</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-6 border-gray-300" />
            <p class='text-center text-gray-700 text-base'>Copyright © 2023<a href='../index.php' target='_blank' class="hover:underline mx-1">Wiki</a>All Rights Reserved.</p>
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
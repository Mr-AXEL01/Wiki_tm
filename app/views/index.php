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

    <title>Document</title>
</head>

<body>
    <nav class="relative flex w-full flex-wrap items-center justify-between bg-[#FBFBFB] py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700  lg:pt-2" data-te-navbar-ref>
        <div class="flex w-full items-center justify-between px-2">
            <div>
                <a class="" href="#">
                    <img class="mr-2 md:ml-10 w-[150px] h-[70px] md:w-[100px] " src="../../public/images/logowiki.png" alt="WIKI Logo" />
                </a>
            </div>



            <div class="   flex  items-center lg:mt-0  md:justify-between" id="navbarSupportedContent4" data-te-collapse-item>
                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:mt-1 lg:flex-row">

                </ul>

                <div class="flex items-center md:justify-end md:mr-24 md:w-[40vw] md:gap-x-32 gap-x-2">


                    <div class="flex gap-4">
                        <?php
                        if (isset($_SESSION['user'])) {

                        ?>
                            <a href="Author/dashboardWikis.php"><button title="Delete" name="delete" value="" class="flex gap-x-2 md:font-bold items-center text-[10px] md:text-[14px] h-10 px-5 text-indigo-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="white" viewBox="0 -960 960 960" width="24">
                                        <path d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z" />
                                    </svg>
                                    My WIKIS

                                </button></a>
                            <a href="authentification/login.php"><button type="button" class="flex gap-x-2 md:font-bold items-center text-[10px] md:text-[14px] h-10 px-5 text-indigo-100 transition-colors duration-150 bg-gray-600 rounded-lg focus:shadow-outline hover:bg-gray-700">
                                    Log Out
                                </button></a>
                        <?php  } else { ?>
                            <a href="authentification/login.php"><button type="button" class="mr-3 inline-block rounded px-4 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase  text-primary transition duration-150  hover:bg-neutral-200  focus:outline-none  ">
                                    Login
                                </button></a>
                            <a href="authentification/register.php"><button type="button" class="mr-3 inline-block rounded bg-blue-500 px-6 pb-2 pt-2.5 text-[10px] md:text-xs font-medium uppercase leading-normal text-white  transition duration-150  hover:bg-primary-600  focus:bg-primary-600  focus:outline-none focus:ring-0 active:bg-primary-700 ">
                                    Sign up
                                </button></a>
                        <?php   }
                        ?>
                    </div>


                </div>
            </div>
        </div>
    </nav>
    <div class="bg-gradient-to-r from-blue-700 via-blue-400 to-blue-700 text-[#333] p-8 w-full rounded font-[sans-serif]">
        <div class="max-w-2xl mx-auto text-center">
            <h1 class="sm:text-5xl text-3xl font-extrabold">Discover, learn, and contribute! Welcome to our Wiki</h1>
            <div class="my-10">

                <p class="text-sm"> Explore and contribute to our collection of knowledge. Our wiki is a collaborative platform where you can find information on various topics and share your expertise with the community</p>
                <p class="font-bold"> Start by browsing our <a class="text-blue-800" href="visiteur/wikis.php">wikis</a> or create your own.
                </p>
            </div>
            <hr class="border-[#333]" />
            <div class="mt-10 flex max-sm:flex-col justify-center sm:gap-6 gap-4">
                <a href="visiteur/wikis.php"> <button type="button" class="px-6 py-3 rounded text-sm tracking-wider font-semibold border border-[#333] outline-none bg-transparent hover:bg-[#333] hover:text-white transition-all duration-300">See More</button></a>
            </div>
        </div>
    </div>
    <div class=" font-[sans-serif] p-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-xl mx-auto">
                <h2 class="text-3xl font-extrabold text-[#333] inline-block">LATEST CATEGORYS</h2>
                <p class="text-gray-600 text-sm mt-6  ">Explore our freshest categories, each a gateway to a world of specialized knowledge. Dive in and discover the latest additions to our diverse collection!</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 max-md:max-w-lg mx-auto">
                <?php
                foreach ($categories as $Categorie) :
                ?>
                    <div>
                        <form action="../controllers/ConWikis.php" method="post">
                            <input type="hidden" name="catId" value="<?= $Categorie->getId() ?>">

                            <div class="bg-white cursor-pointer rounded-t-md overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-50">
                                <img src="<?= $Categorie->getCategory_image() ?>" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
                                <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
                                    <h3 class="text-xl font-bold text-white"><?= $Categorie->getCategory_name() ?></h3>
                                    <div class="mt-4">
                                        <p class="text-gray-200 text-sm "><?= $Categorie->getCategory_desc() ?></p>
                                    </div>
                                </div>
                            </div>
                            <button class="w-full h-[45px] bg-blue-700 hover:bg-blue-600 text-white  md:text-[17px] font-bold rounded-b-md" type="submit">Wikis of <?= $Categorie->getCategory_name() ?> </button>
                        </form>
                    </div>
                <?php
                endforeach;
                ?>

            </div>
        </div>
    </div>
    <div class=" font-[sans-serif] p-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-xl mx-auto">
                <h2 class="text-3xl font-extrabold text-[#333] inline-block">LATEST WIKIS</h2>
                <p class="text-gray-600 text-sm mt-6  ">Stay up-to-date with our ever-expanding encyclopedia of knowledge. The latest wikis showcase the continuous collaboration and commitment to shared learning</p>
            </div>
            <form action="../controllers/ConWikis.php" method="post" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 max-md:max-w-lg mx-auto">
                <?php
                foreach ($wikiHome as $wiki) :
                ?>

                    <button type="submit" name="wikiId" value="<?= $wiki->getId() ?>">
                        <div class="bg-white cursor-pointer rounded overflow-hidden group relative before:absolute before:inset-0 before:z-10 before:bg-black before:opacity-50">
                            <img src="<?= $wiki->getWikiImage() ?>" alt="Blog Post 3" class="w-full h-96 object-cover group-hover:scale-110 transition-all duration-300" />
                            <div class="p-6 absolute bottom-0 left-0 right-0 z-20">
                                <h3 class="text-xl font-bold text-white"><?= $wiki->getWikiTitle() ?></h3>
                                <div class="mt-4">
                                    <p class="text-gray-200 text-sm "><?= $wiki->getWikiSummarize() ?></p>
                                </div>
                            </div>
                        </div>
                    </button>

                <?php
                endforeach;
                ?>
            </form>

            <!-- </div> -->
        </div>
    </div>
    <footer class="bg-gray-100 font-[sans-serif]">
      <div class="py-8 px-4 sm:px-12">
        <div class="flex flex-wrap items-center justify-between">
          <div class="w-full md:w-auto  mb-6 md:mb-0">
            <a href="javascript:void(0)" class=" w-full flex justify-center md:justify-start"><img class="mr-2 md:ml-10 w-[150px] h-[70px] md:w-[100px] " src="../../public/images/logowiki.png" alt="WIKI Logo" /></a>
          </div>
          <div class="w-full md:w-auto text-center">
            <ul class="flex items-center justify-center flex-wrap gap-y-2 md:justify-end space-x-6">
              <li><a href="index.php" class="text-gray-700 hover:text-gray-900 text-base">Home</a></li>
              <li><a href="visiteur/wikis.php" class="text-gray-700 hover:text-gray-900 text-base">Wikis</a></li>
              <li><a href="authentification/login.php" class="text-gray-700 hover:text-gray-900 text-base">Log in</a></li>
              <li><a href="authentification/register.php" class="text-gray-700 hover:text-gray-900 text-base">Sing up</a></li>
            </ul>
          </div>
        </div>
        <hr class="my-6 border-gray-300" />
          <p class='text-center text-gray-700 text-base'>Copyright © 2023<a href='index.php'
        target='_blank' class="hover:underline mx-1">Wiki</a>All Rights Reserved.</p>
      </div>
    </footer>
</body>

</html>
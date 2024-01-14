<?php
require_once(__DIR__ . "/../../controllers/ConWikis.php");




    $wik = (!empty($wikisCat)) ? $wikisCat : $wikis;



    foreach ($wik as $wiki) : ?>
        <div class="md:flex cursor-pointer md:flex-col lg:flex-row w-full lg:min-h-[25vh] min-h-fit bg-slate-100 rounded-xl p-8 md:p-0  hover:scale-105 mb-6 md:mb-4">
            <img class="lg:max-w-1/4  lg:min-h-[25vh] h-[5%]  md:h-auto md:rounded-xl rounded-xl mx-auto lg:mx-0" src="<?= $wiki['pictureWiki'] ?>" alt="<?= $wiki['titleWiki'] ?>" width="384" height="512">
            <div class="pt-6 w-[100%] md:p-8 text-center md:text-left space-y-4">
                <div class="text-slate-700 text-2xl font-bold">
                    <h1><?= $wiki['titleWiki'] ?></h1>
                </div>
                <div class="w-full">
                    <p class="text-lg  font-medium">
                        <?= $wiki['summaryWiki'] ?>
                    </p>
                </div>
                <div class="font-medium flex justify-between w-[100%] text-sky-500">

                    <p class="w-1/2"><?= $wiki['username'] ?></p>
                    <div class="w-full text-right font-medium text-gray-500 mt-2"> <?= $wiki['dateCreated'] ?></div>

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
              <form action="../../controllers/ConWikis.php" method="post" >

                <button type="submit" name="wikiId" class=" md:w-[150px] w-[70px] text-[10px] md:text-[15px] h-[40px] md:mr-4 lg:mr-0 bg-black rounded duration-300 hover:bg-blue-700  text-white" value="<?= $wiki['idWiki'] ?>">Read More</button>
            </form>
            </div>
          
        </div>
    <?php endforeach;

                    
    ?>


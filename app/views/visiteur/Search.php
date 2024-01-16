<?php
require_once(__DIR__ . "/../../controllers/ConWikis.php");


    $wik = (!empty($wikisCat)) ? $wikisCat : $wikis;

    foreach ($wik as $wiki) : ?>
        <div class="bg-white w-1/3 ml-2 rounded-lg h-max overflow-hidden shadow-md hover:shadow-lg transition-transform transform hover:scale-90">
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
    <?php endforeach;

                    
    ?>


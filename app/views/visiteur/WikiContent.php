<?php
require_once(__DIR__ . "/../../controllers/ConWikis.php");
[$idwiki, $image, $title, $summary, $content, $date] = $wiki
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
    <div class="h-[35vh] w-full bg-gray-100 mt-2  overflow-hidden  ">
        <img src="<?= $image ?>" class="hover:scale-110	rounded transition-all  duration-300 w-[95%]  mx-auto h-full" alt="">

    </div>
    <div class="font-[sans-serif]  min-h-[100vh] bg-gray-100">
        <div class="min-h-screen px-8 py-12 text-center bg-gray-100 text-black  shadow-xl">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-extrabold mb-6"><?= $title ?></h2>
                <p class="text-base mb-4"><?= $content ?></p>
                <p class="text-base"><?= $summary ?></p>
                <a href="wikis.php" class="inline-block mt-10 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-base font-medium rounded-md">More wikis</a>
            </div>
        </div>
    </div>
</body>

</html>
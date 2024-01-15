<?php
require_once(__DIR__ . "/../../controllers/ConWikis.php");
[$idwiki, $image, $title, $summary, $content, $date] = $wiki;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title><?= $title ?></title>
</head>

<body class="font-sans antialiased bg-gray-300 text-black">
    <header class="bg-gray-700 py-4">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl text-white font-extrabold"><?= $title ?></h1>
            <p class="text-gray-400 text-sm"><?= date('F j, Y', strtotime($date)) ?></p>
        </div>
    </header>

    <main class="container mx-auto mt-8 px-4 lg:px-0">
        <img src="<?= $image ?>" class="object-cover w-full h-96 rounded-lg mb-8" alt="<?= $title ?>">

        <section class="text-lg leading-relaxed mb-8">
            <?= $content ?>
        </section>

        <section class="text-base mb-8">
            <h3 class="text-yellow-700 text-lg mb-2">Summary:</h3>
            <?= $summary ?>
        </section>

        <section class="text-center">
            <a href="wikis.php" class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-800 text-white text-base font-medium rounded-md">Back to Wikis</a>
        </section>
    </main>
</body>

</html>

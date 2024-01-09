<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="relative bg-cover bg-center text-white min-h-[85vh] flex flex-col justify-center items-start" style="background-image: url('<?php echo URLROOT . '/public/images/siteImages/background_landingPage.png'; ?>');">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative text-left p-8">
        <h1 class="text-7xl font-bold mb-4">Welcome to Your Wiki Platform</h1>
        <p class="text-xl px-2 mb-8">A place to collaborate, create, and share knowledge.</p>
        <a href="#signup" class="bg-white text-black py-2 px-7 rounded-full hover:bg-gray-400 hover:text-white transition duration-300">Get Started</a>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>

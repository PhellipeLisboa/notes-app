<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>
<?php require('partials/banner.php'); ?>



<div class="flex flex-col justify-around mb-2 px-5 py-4 bg-neutral-200 rounded-lg shadow-inner min-h-[625px]">

    <div class="mx-auto max-w-7xl  sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold drop-shadow-lg">Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?></h2>
    </div>

    <a href="<?= empty($_SESSION) ? '/login-for-note' : '/notes/create' ?>"
        class="bg-indigo-900 mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 hover:bg-indigo-700 mt-5 rounded-lg shadow-lg text-center  text-white font-lg font-bold">
        Start taking notes
    </a>

</div>



<?php require('partials/footer.php')?>
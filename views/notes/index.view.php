<?php require(base_path('views/partials/head.php')); ?>
<?php require(base_path('views/partials/nav.php')); ?>
<?php require(base_path('views/partials/banner.php')); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <?php if (Count($notes) > 0) :?>
        <?php require(base_path('views/partials/search-bar.php')); ?>
        <?php require(base_path('views/partials/notes-list.php')); ?>
        <?php require(base_path('views/partials/pagination.php')); ?>
        <?php endif; ?>

    </div>
</main>

<?php require(base_path('views/partials/footer.php'))?>
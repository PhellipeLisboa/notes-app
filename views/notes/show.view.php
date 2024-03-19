<?php require(base_path('views/partials/head.php')); ?>
<?php require(base_path('views/partials/nav.php')); ?>
<?php require(base_path('views/partials/banner.php')); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 bg-gray-400 mt-5 rounded-lg shadow-lg">


        <div class="bg-neutral-200 rounded-lg p-3 shadow-xl">

            <h1 class="text-lg font-bold "><?= htmlspecialchars($note['title']) ?></h1>
            <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
            <p class="mt-3  break-all"><?= htmlspecialchars($note['body']) ?></p>
        </div>


        <footer class="mt-6">

            <a href="/notes"
                class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">
                Go back
            </a>

            <a href="/note/edit?id=<?= $note['id'] ?>"
                class="rounded-md bg-gray-800 px-3 py-2 ml-4 px-6 text-sm font-semibold text-white shadow-sm hover:bg-neutral-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Edit</a>

        </footer>
    </div>

    <div class="space-y-12">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-5 rounded-lg">
            <div class="col-span-full">
                <form action="/note" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id']?>">

                    <button type="submit"
                        class="rounded-md bg-red-700 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">Delete
                        Note</button>

                </form>
            </div>
        </div>
    </div>
</main>

<?php require(base_path('views/partials/footer.php'))?>
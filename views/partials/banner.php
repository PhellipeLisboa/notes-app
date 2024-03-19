<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <div class="grid grid-cols-6 gap-4">
            <div class="col-start-1 ">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $heading ?></h1>
            </div>
            <div class="col-end-9 ">
                <div class="flex-end">
                    <?php if (isset($heading) && $heading == 'My Notes') : ?>
                    <a href="/notes/create">
                        <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-1 px-2 mr-4 rounded">
                            Create Note
                        </button>
                    </a>
                    <?php endif;?>
                </div>
            </div>
        </div>



    </div>
</header>
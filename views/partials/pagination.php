<div class="flex items-center justify-between border-t rounded-lg bg-gray-900 px-4 py-3 mt-4 sm:px-6">
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-white">
                Showing
                <span class="font-medium"><?= $pages[$current_page ?? 0]['start'] + 1; ?></span>
                to
                <span class="font-medium"><?= $pages[$current_page ?? 0]['end'] + 1;?>
                </span>
                of
                <span class="font-medium"><?= $total_notes; ?></span>
                results
            </p>
        </div>
        <div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <form action="/notes" method="POST">
                    <input type="hidden" name="_method" value="GET">

                    <button type="submit" name="last" value="<?= $current_page ?>"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-neutral-300 rounded-l-md hover:bg-neutral-300 hover:text-black hover:font-bold focus:z-20 focus:outline-offset-0"><?= '<' ?>
                    </button>

                    <?php for ($i=1; $i <= $total_pages; $i++) : ?>

                    <button type="submit" name="current" value="<?= $i - 1; ?>"
                        <?= $current_page + 1 == $i ? 'class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-neutral-900 bg-white ring-1 ring-inset ring-neutral-300  hover:text-black hover:font-bold focus:z-20 focus:outline-offset-0"' : 'class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-neutral-300 hover:bg-neutral-300 hover:text-black hover:font-bold focus:z-20 focus:outline-offset-0"' ?>><?= $i; ?>
                    </button>

                    <?php endfor; ?>

                    <button type="submit" name="next" value="<?= $current_page ?>"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-neutral-300 rounded-r-md hover:bg-neutral-300 hover:text-black hover:font-bold focus:z-20 focus:outline-offset-0"><?= '>' ?>
                    </button>

                </form>
            </nav>
        </div>
    </div>
</div>
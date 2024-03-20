<div class="flex items-center justify-between border-t rounded-lg bg-gray-900 px-4 py-3 mt-4 sm:px-6">
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">

        <div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <form action="/notes" method="POST">
                    <input type="hidden" name="_method" value="GET">

                    <div>
                        <label for="elements_per_page"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Itens per page:</label>
                        <div class="relative flex items-center max-w-[8rem]">
                            <input type="text" id="elements_per_page" name="elements_per_page" data-input-counter
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border-x-0 border-gray-300 h-9 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-l-md"
                                placeholder="<?= isset($elements_per_page) ? $elements_per_page : 5 ?>"
                                value="<?= isset($elements_per_page) ? $elements_per_page : 5 ?>" />
                            <button type="submit" name="btn_elements_per_page"
                                class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-neutral-900 bg-white ring-1 ring-inset ring-neutral-300  hover:text-black hover:font-bold focus:z-20 focus:outline-offset-0 rounded-r-md">
                                Apply
                            </button>
                        </div>
                        <p id="helper-text-explanation"
                            class="mt-2 mb-2 text-sm text-truncate text-gray-500 dark:text-gray-400">
                            Number must be greater than zero.</p>
                    </div>

                    <!--
                </form>

                     <form action="/notes" method="POST"
                    class=" ml-5 px-5 sm:flex sm:flex-1 sm:items-center sm:justify-between">
                    <input type="hidden" name="_method" value="GET">
                 -->

                    <div>
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
                    </div>

                </form>
            </nav>
        </div>
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
    </div>
</div>
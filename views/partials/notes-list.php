<div class="min-h-[435px]">

    <ul role="list" class="divide-y divide-gray-100">
        <?php for ($i=$pages[$current_page ?? 1]['start']; $i <= $pages[$current_page ?? 0]['end']; $i++) : ?>

        <li class="flex justify-between gap-x-6 mb-2 px-5 py-4 bg-neutral-200 rounded-lg shadow-inner">
            <div class="flex min-w-0 gap-x-4">
                <div class="min-w-0 flex-initial">
                    <a href="/note?id=<?= $notes[$i]['id'] ?>"
                        class="text-neutral-900 hover:underline hover:text-blue-500">
                        <p class="text-lg font-semibold leading-6 texte-gray-900">
                            <?= htmlspecialchars($notes[$i]['title']) ?>
                        </p>
                    </a>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                        <?= htmlspecialchars($notes[$i]['body']) ?>
                    </p>
                </div>
            </div>

            <div class="hidden flex-auto shrink-0 sm:flex sm:flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-900">Created at</p>
                <p class="mt-1 text-xs leading-5 text-gray-500">
                    <?= $notes[$i]['created_at'] ?>
                </p>
            </div>

            <div class="border-black border-l-2 rounded-xl"></div>

            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                <form action="/note" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $notes[$i]['id']?>">

                    <button type="submit"
                        class="rounded-md bg-red-700 mt-1 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">Delete
                        Note</button>
                </form>
            </div>
        </li>

        <?php endfor; ?>
    </ul>

</div>
<ul role="list" class="divide-y divide-gray-100">

    <!-- tamanho do array // 5 = número de páginas completas -->
    <!-- tamanho do array % 5 = número de elementos na página incompleta -->
    <!-- variável de página atual será sempre um número (1, 2, 3, 4, ...) -->
    <!-- porém irei mapear a variável para um array de item inicial: 0 => 0, 1 => 5, 2 => 10, ... -->
    <!-- a paginação será feita assim:
    
    while n < len(array(item_inicial)):
        for k in range (0, 5):
            $start = item_inicial[n];

            $notes[$start + k]['key']

-->
    <!-- 0, 1, 2, 3, 4 -->
    <!-- 5, 6, 7, 8, 9 -->
    <!-- 10, 11, 12, 14, 14 -->


    <?php for ($i=$pages[$current_page ?? 1]['start']; $i <= $pages[$current_page ?? 0]['end']; $i++) : ?>

    <li class="flex justify-between gap-x-6 mb-3 px-5 py-5 bg-neutral-200 rounded-lg shadow-inner">
        <div class="flex min-w-0 gap-x-4">
            <div class="min-w-0 flex-auto">
                <a href="/note?id=<?= $notes[$i]['id'] ?>" class="text-neutral-900 hover:underline hover:text-blue-500">
                    <p class="text-lg font-semibold leading-6 texte-gray-900">
                        <?= htmlspecialchars($notes[$i]['title']) ?>
                    </p>
                </a>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                    <?= htmlspecialchars($notes[$i]['body']) ?>
                </p>
            </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-gray-900">Created at</p>
            <p class="mt-1 text-xs leading-5 text-gray-500">
                <?= $notes[$i]['created_at'] ?>
            </p>
        </div>
    </li>

    <?php endfor; ?>

</ul>
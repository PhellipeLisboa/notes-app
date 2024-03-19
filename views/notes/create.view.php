<?php require(base_path('views/partials/head.php')); ?>
<?php require(base_path('views/partials/nav.php')); ?>
<?php require(base_path('views/partials/banner.php')); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <form method="POST" action="/notes">
            <div class="space-y-12">
                <div class="border-b bg-gray-200 border-gray-900/10 pb-3 px-2 rounded-lg shadow-lg">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="about" class="block text-lg font-bold leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <input id="title" name="title" rows="3"
                                    class="block w-full rounded-md border-0 px-3 py-3 text-black-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 shadow-inner"
                                    placeholder="Here's an idea for a note..."><?= $_POST['title'] ?? '' ?></input>

                                <?php if (isset($errors['title'])) : ?>
                                <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="about" class="block text-lg font-bold leading-6 text-gray-900">Body</label>
                            <div class="mt-2">
                                <textarea id="body" name="body" rows="3"
                                    class="block w-full rounded-md border-0 px-3 py-3 text-black-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 shadow-inner resize-none"
                                    placeholder="Here's an idea for a note..."><?= $_POST['body'] ?? '' ?></textarea>

                                <?php if (isset($errors['body'])) : ?>
                                <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-2">

                        <a href="/notes"
                            class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Cancel
                        </a>

                        <button type="submit"
                            class="rounded-md bg-indigo-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>

                </div>
            </div>


        </form>

    </div>
</main>

<?php require(base_path('views/partials/footer.php'))?>
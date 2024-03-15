<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10" src="https://images.emojiterra.com/google/android-pie/512px/2615.png"
                        alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/"
                            class="<?= urlIS('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">Home</a>
                        <?php if ($_SESSION['user'] ?? false) : ?>
                        <a href="/notes"
                            class="<?= urlIS('/notes') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Notes</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <?php if ($_SESSION['user'] ?? false) : ?>
                            <button type="button"
                                class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>

                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="data:image/png;base64,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"
                                    alt="">
                            </button>

                            <?php else : ?>
                            <a href="/register"
                                class="<?= urlIS('/register') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Register</a>
                            <a href="/login"
                                class="<?= urlIS('/login') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Login</a>
                            <?php endif; ?>

                        </div>

                    </div>

                    <?php if ($_SESSION['user'] ?? false) : ?>
                    <div class="ml-3">
                        <form action="/session" method="POST">
                            <input type="hidden" name="_method" value="DELETE">

                            <button
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Log
                                out</button>

                        </form>
                    </div>
                    <?php endif; ?>

                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">Dashboard</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Reports</a>
            </div>
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                            src="data:image/png;base64,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"
                            alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                        <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                        Profile</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                        out</a>
                </div>
            </div>
        </div>
</nav>
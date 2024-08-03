<!DOCTYPE html>
<html class="h-full scroll-pt-20 scroll-smooth" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <title>e-commerce Dashboard</title>
</head>

<body>
    <header class="sticky inset-x-0 top-0 z-50 border-b border-gray-200 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 relative flex h-16 items-center justify-between gap-4 sm:gap-8">
            <div class="flex items-center gap-4">
                <a href="/">
                    <div class="inline-flex gap-1.5 text-sm">
                        <span class="font-medium text-gray-900">HyperUI</span>
                        <span aria-hidden="true" role="img">🚀</span>
                    </div>
                </a>
                <nav class="hidden md:block">
                    <ul class="gap-4 flex">
                        <li>
                            <a class="inline-flex items-center gap-1 text-sm font-medium text-gray-900 hover:opacity-75"
                                href="/components/application-ui">Application UI</a>
                        </li>
                        <li>
                            <a class="inline-flex items-center gap-1 text-sm font-medium text-gray-900 hover:opacity-75"
                                href="/components/marketing">Marketing</a>
                        </li>
                        <li>
                            <a class="inline-flex items-center gap-1 text-sm font-medium text-gray-900 hover:opacity-75"
                                href="/blog">Blog</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="flex flex-1 items-center justify-end gap-2 sm:gap-4">
                <div class="relative flex h-16 max-w-[300px] flex-1 items-center">
                    <form role="search" class="flex-1">
                        <label for="SiteSearch" class="sr-only">Search</label>
                        <input type="text" placeholder="Search..." id="SiteSearch"
                            class="w-full rounded-md border-gray-200 sm:text-sm" value="">
                        <button tabindex="-1" class="sr-only">Submit</button>
                    </form>
                </div>
                <a href="https://github.com/markmead/hyperui" rel="noreferrer" target="_blank"
                    class="text-gray-900 hover:opacity-75">
                    <span class="sr-only"> GitHub </span>
                    <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path clip-rule="evenodd"
                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                            fill-rule="evenodd"></path>
                    </svg>
                </a>
                <div class="flex items-center md:hidden">
                    <button id="menu-toggle" class="text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <span class="sr-only">Toggle menu</span>
                    </button>
                    <div id="mobile-menu" class="absolute inset-x-0 top-14 px-2 hidden">
                        <nav class="bg-white border p-4 border-gray-200 shadow-lg rounded-md">
                            <ul class="space-y-4">
                                <li>
                                    <a class="inline-flex items-center gap-1 text-sm font-medium text-gray-900 hover:opacity-75"
                                        href="/components/application-ui">Application UI</a>
                                </li>
                                <li>
                                    <a class="inline-flex items-center gap-1 text-sm font-medium text-gray-900 hover:opacity-75"
                                        href="/components/marketing">Marketing</a>
                                </li>
                                <li>
                                    <a class="inline-flex items-center gap-1 text-sm font-medium text-gray-900 hover:opacity-75"
                                        href="/blog">Blog</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- <section class="-mt-px border-y border-gray-200 bg-gray-100">
        <div class="mx-auto max-w-screen-xl px-4 py-2"><a href="https://github.com/markmead/hyperui" rel="noreferrer"
                target="_blank" class="flex items-center justify-center gap-1.5 transition hover:opacity-75"><span
                    class="text-sm/none font-medium">Enjoy HyperUI? Give it a star on GitHub</span><span
                    aria-hidden="true" role="img">🎉</span></a></div>
    </section> --}}
    <div class="">
        @yield('c')
    </div>


    <footer class="border-t border-gray-200 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:py-12"><a href="/">
                <div class="inline-flex gap-1.5 text-lg"><span class="font-medium text-gray-900">HyperUI</span><span
                        aria-hidden="true" role="img">🚀</span></div>
            </a>
            <div class="mt-6">
                <p class="max-w-md text-pretty leading-relaxed text-gray-700">Free open source Tailwind CSS components
                    for marketing and eCommerce websites, as well as application UI.</p>
                <div class="mt-4 lg:flex lg:items-end lg:justify-between">
                    <ul class="flex gap-4">
                        <li><a class="block text-sm font-medium text-gray-900 hover:opacity-75"
                                href="/about/faqs">FAQs</a></li>
                        <li><a class="block text-sm font-medium text-gray-900 hover:opacity-75"
                                href="/about/acknowledgements">Acknowledgements</a></li>
                    </ul>
                    <p class="mt-4 text-sm text-gray-700 lg:mt-0">Created by<!-- --> <a
                            href="https://github.com/markmead" rel="noreferrer" target="_blank"
                            class="inline-block font-medium hover:text-gray-900">Mark Mead</a></p>
                </div>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            menuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
            document.addEventListener('click', function(event) {
                if (!menuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

</body>

</html>

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
                    <div class="inline-flex gap-1.5 text-base">
                        <span class="font-medium text-gray-900">E-Commerce</span>
                        <span aria-hidden="true" role="img"></span>
                    </div>
                </a>
                <nav class="hidden md:block">
                    <ul class="gap-4 flex">
                        <li>
                            <a class="inline-flex items-center gap-1 text-base font-medium text-gray-900 hover:opacity-75"
                                href="">Products</a>
                        </li>
                        <li>
                            <a class="inline-flex items-center gap-1 text-base font-medium text-gray-900 hover:opacity-75"
                                href="">Product</a>
                        </li>
                        <li>
                            <a class="inline-flex items-center gap-1 text-base font-medium text-gray-900 hover:opacity-75"
                                href="/">Product</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="flex flex-1 items-center justify-end gap-2 sm:gap-4">
                <div class="relative flex h-16 max-w-[300px] flex-1 items-center">
                    <form action="" method="" role="search" class="flex-1">
                        <label for="SiteSearch" class="sr-only">Search</label>
                        <input name="search" type="text" placeholder="{{ $search === '' ? 'Search...' : $search }}" value="{{ old('search', $search) }}" id="SiteSearch"
                            class="w-full rounded-md border-gray-200 sm:text-base" value="">
                        <button tabindex="-1" class="sr-only">Submit</button>
                    </form>
                </div>
                @auth
                    <p>{{ Auth()->user()->email }}</p>
                    <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                        class="inline-flex items-center p-2 text-base font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none  focus:ring-gray-50 "
                        type="button">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 4 15">
                            <path
                                d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDots" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-base text-gray-700 " aria-labelledby="dropdownMenuIconButton">
                            <li>
                                <a href="/logout" class="block px-4 py-2 hover:bg-gray-100">Logout</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="https://github.com/unix-waltz/e-commerce" rel="noreferrer" target="_blank"
                        class="text-gray-900 hover:opacity-75">
                        <span class="sr-only"> GitHub </span>
                        <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path clip-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </a>

                @endauth
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
                                    <a class="inline-flex items-center gap-1 text-base font-medium text-gray-900 hover:opacity-75"
                                        href="">Product</a>
                                </li>
                                <li>
                                    <a class="inline-flex items-center gap-1 text-base font-medium text-gray-900 hover:opacity-75"
                                        href="">Product</a>
                                </li>
                                <li>
                                    <a class="inline-flex items-center gap-1 text-base font-medium text-gray-900 hover:opacity-75"
                                        href="">Product</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @guest
        <section class="-mt-px border-y border-gray-200 bg-gray-100">
            <div class="mx-auto max-w-screen-xl px-4 py-2"><a href="/login" rel="noreferrer"
                    class="flex items-center justify-center gap-1.5 transition hover:opacity-75"><span
                        class="text-base/none font-medium"> <span
                            class="text-blue-400 hover:italic hover:text-black">Login</span> For Continue</span><span
                        aria-hidden="true" role="img">-></span></a></div>
        </section>
    @endguest
    @if (Auth()->user()->role == 'admin')
        <header class="border-b border-gray-200 bg-gray-50">
            <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                <div class="flex flex-col items-start gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Hello, {{ Auth()->user()->name }}!</h1>

                        <p class="mt-1.5 text-sm text-gray-500">
                            Track and Manage your products.
                        </p>
                    </div>

                    <div class="flex items-center gap-4">
                        <a href="/admin"
                            class="inline-flex items-center justify-center gap-1.5 rounded border border-gray-200 bg-white px-5 py-3 text-gray-900 transition hover:text-gray-700 focus:outline-none focus:ring">
                            <span class="text-sm font-medium"> View Dashboard </span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>

                        <a href="/admin"
                            class="inline-block rounded bg-gray-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-gray-700 focus:outline-none focus:ring">
                            New Product
                        </a>
                    </div>
                </div>
            </div>
        </header>
    @endif
    <div class="">
        @yield('c')
    </div>


    <footer class="border-t border-gray-200 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:py-12"><a href="/">
                <div class="inline-flex gap-1.5 text-lg"><span
                        class="font-medium text-gray-900">E-Commerce</span><span aria-hidden="true"
                        role="img"></span></div>
            </a>
            <div class="mt-6">
                <p class="max-w-md text-pretty leading-relaxed text-gray-700">Most Best deal Platform.</p>
                <div class="mt-4 lg:flex lg:items-end lg:justify-between">
                    <ul class="flex gap-4">
                        <li><a class="block text-base font-medium text-gray-900 hover:opacity-75"
                                href="">FAQs</a></li>
                        <li><a class="block text-base font-medium text-gray-900 hover:opacity-75"
                                href="">Acknowledgements</a></li>
                    </ul>
                    <p class="mt-4 text-base text-gray-700 lg:mt-0">Created by<!-- --> <a
                            href="https://github.com/unix-waltz" rel="noreferrer" target="_blank"
                            class="inline-block font-medium hover:text-gray-900">Unix-Waltz ( Rio Putra )</a></p>
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

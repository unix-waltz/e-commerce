<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>

<body class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-16 flex-shrink-0 flex flex-col justify-between border-e bg-white">
        <div>
            <div class="inline-flex size-16 items-center justify-center">
                <span class="grid size-10 place-content-center rounded-lg bg-gray-100 text-xs text-gray-600">
                    E
                </span>
            </div>

            <div class="border-t border-gray-100">
                <div class="px-2">
                    <div class="py-4">
                        <a href="/admin/"
                            class="group relative flex justify-center rounded bg-gray-50 px-2 py-1.5 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 opacity-75" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span
                                class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                General
                            </span>
                        </a>
                    </div>
                    <li>
                        <a href="#"
                            class="group relative flex justify-center rounded px-2 py-1.5 text-gray-500 hover:bg-gray-50 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 opacity-75" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span
                                class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                Billing
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="group relative flex justify-center rounded px-2 py-1.5 text-gray-500 hover:bg-gray-50 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 opacity-75" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            <span
                                class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                                Invoices
                            </span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="sticky inset-x-0 bottom-0 border-t border-gray-100 bg-white p-2">
            <form action="#">
                <button type="submit"
                    class="group relative flex w-full justify-center rounded-lg px-2 py-1.5 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 opacity-75" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span
                        class="invisible absolute start-full top-1/2 ms-4 -translate-y-1/2 rounded bg-gray-900 px-2 py-1.5 text-xs font-medium text-white group-hover:visible">
                        Logout
                    </span>
                </button>
            </form>
        </div>
    </div>
    <div class="flex-1 flex flex-col">
        @if ($errors->any())
            
        <div class="w-1/4 mx-auto">
            <br>

            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Danger</span>
                <div>
                    <span class="font-medium">Failed:</span>
                    <ul class="mt-1.5 list-disc list-inside">
                        @foreach ($errors->all() as $e )
                        <li>{{$e}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        @endif



        <main class="flex-grow p-6">
            @if (session('success'))
                <div class="w-1/5 mx-auto">
                    <div role="alert" class="rounded-xl border border-gray-100 bg-white p-4">
                        <div class="flex items-start gap-4">
                            <span class="text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>

                            <div class="flex-1">
                                <strong class="block font-medium text-gray-900"> {{ session('success') }}</strong>

                                <p class="mt-1 text-sm text-gray-700">{{ session('msg') }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
            @yield('c')
        </main>
    </div>
</body>

</html>

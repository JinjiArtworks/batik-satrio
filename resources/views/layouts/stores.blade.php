<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}">
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
    @if (Auth::user()->role != 'Customer')
        <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
            <!-- Desktop sidebar -->

            <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
                <div class="py-4 text-gray-500 dark:text-gray-400">
                    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                        Satrio Batik
                    </a>
                    <div>
                        @if (Auth::user()->role == 'Super Admin')
                            <ul class="mt-4">
                                <li class="relative px-6 py-3">
                                    <span class="absolute inset-y-0 left-0 w-1  rounded-br-lg"
                                        aria-hidden="true"></span>
                                    <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150  dark:hover:text-gray-200 dark:text-gray-100"
                                        href="/data-reports">

                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                            </path>
                                        </svg>
                                        <span class="ml-4">Laporan Penjualan</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="mt-4">

                                <li class="relative px-6 py-3">
                                    <span class="absolute inset-y-0 left-0 w-1  rounded-br-lg"
                                        aria-hidden="true"></span>
                                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150  dark:hover:text-gray-200"
                                        href="/data-product">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                            </path>
                                        </svg>
                                        <span class="ml-4">Produk</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="mt-4">

                                <li class="relative px-6 py-3">
                                    <span class="absolute inset-y-0 left-0 w-1rounded-br-lg" aria-hidden="true"></span>
                                    <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150  dark:hover:text-gray-200"
                                        href="/data-return">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                        </svg>
                                        <span class="ml-4">Pengembalian Pesanan</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="mt-4">

                                <li class="relative px-6 py-3">
                                    <span class="absolute inset-y-0 left-0 w-1rounded-br-lg" aria-hidden="true"></span>
                                    <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150  dark:hover:text-gray-200"
                                        href="/data-resources">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                        </svg>
                                        <span class="ml-4">Tambah Resources</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="mt-4">
                                <li class="relative px-6 py-3">
                                    <span class="absolute inset-y-0 left-0 w-1rounded-br-lg" aria-hidden="true"></span>
                                    <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150  dark:hover:text-gray-200"
                                        href="/data-blog">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                        </svg>
                                        <span class="ml-4">Blog</span>
                                    </a>
                                </li>
                            </ul>
                        @elseif (Auth::user()->role == 'Admin')
                            <ul class="mt-4">
                                <li class="relative px-6 py-3">
                                    <span class="absolute inset-y-0 left-0 w-1   rounded-br-lg"
                                        aria-hidden="true"></span>
                                    <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150  dark:hover:text-gray-200 dark:text-gray-100"
                                        href="/data-reports">

                                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                            </path>
                                        </svg>
                                        <span class="ml-4">Laporan Penjualan</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="mt-4">

                                <li class="relative px-6 py-3">
                                    <span class="absolute inset-y-0 left-0 w-1  rounded-br-lg"
                                        aria-hidden="true"></span>
                                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150  dark:hover:text-gray-200"
                                        href="/data-product">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                            </path>
                                        </svg>
                                        <span class="ml-4">Produk</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="mt-4">

                                <li class="relative px-6 py-3">
                                    <span class="absolute inset-y-0 left-0 w-1rounded-br-lg"
                                        aria-hidden="true"></span>
                                    <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150  dark:hover:text-gray-200"
                                        href="/data-return">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                        </svg>
                                        <span class="ml-4">Pengembalian Pesanan</span>
                                    </a>
                                </li>
                            </ul>
                        @elseif (Auth::user()->role == 'Staff')
                            <ul class="mt-4">
                                <li class="relative px-6 py-3">
                                    <span class="absolute inset-y-0 left-0 w-1rounded-br-lg"
                                        aria-hidden="true"></span>
                                    <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150  dark:hover:text-gray-200"
                                        href="/data-resources">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                        </svg>
                                        <span class="ml-4">Tambah Resources</span>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </aside>
            <div class="flex flex-col flex-1 w-full">
                <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                    <div
                        class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                        <div class="flex justify-center flex-1 lg:mr-32">
                            <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                                <div class="absolute inset-y-0 flex items-center pl-2">
                                </div>
                            </div>
                        </div>
                        <ul class="flex items-center flex-shrink-0 space-x-6">
                            <li class="relative">
                                <button type="button"
                                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                    data-dropdown-placement="bottom">
                                    <img class="w-8 h-8 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                        alt="user photo">
                                </button>
                                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                                    id="user-dropdown">
                                    <div class="px-4 py-4">
                                        <span
                                            class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}
                                            - {{ Auth::user()->role }}</span>
                                    </div>
                                    <ul class="py-2" aria-labelledby="user-menu-button">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <li>
                                                <button type="submit" class="block px-4 py-2 text-sm text-red-700">
                                                    Sign Out
                                                </button>
                                            </li>
                                        </form>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                @yield('content')
            </div>
        </div>
    @else
        Anda harus login sebagai admin
    @endif
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js"></script>

@yield('script')

</html>

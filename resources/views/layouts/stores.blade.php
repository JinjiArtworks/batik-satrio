<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

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
                        <!-- Mobile hamburger -->
                        <button
                            class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                            @click="toggleSideMenu" aria-label="Menu">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <!-- Search input -->
                        <div class="flex justify-center flex-1 lg:mr-32">
                            <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                                <div class="absolute inset-y-0 flex items-center pl-2">

                                </div>

                            </div>
                        </div>
                        <ul class="flex items-center flex-shrink-0 space-x-6">
                            <!-- Profile menu -->
                            <li class="relative">
                                <button
                                    class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                                    @click="toggleProfileMenu" @keydown.escape="closeProfileMenu"
                                    aria-label="Account" aria-haspopup="true">
                                    <img class="object-cover w-8 h-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                                        alt="" aria-hidden="true" />
                                </button>
                                <template x-if="isProfileMenuOpen">
                                    <ul x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                        aria-label="submenu">
                                        <li class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100  dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                                href="#">
                                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                                <span>{{ Auth::user()->name }} - {{ Auth::user()->role }} </span>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100  dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                                href="#">
                                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                    </path>
                                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <li class="flex">
                                                <button type="submit"
                                                    class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100  dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                                    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path
                                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                        </path>
                                                    </svg>
                                                    <span>Log out</span>
                                                </button>
                                            </li>
                                        </form>
                                    </ul>
                                </template>
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

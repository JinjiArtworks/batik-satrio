<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Satrio Batik</title>
    <!-- from cdn -->
    <link rel="stylesheet" href="{{ asset('css/cust.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"
        type='text/css'>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900" data-theme="light">
        <div class=" max-w-screen-lg flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Satrio Batik</span>
            </a>
            @if (Auth::check())
                <div class="flex items-center md:order-2">
                    <button type="button"
                        class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 "
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="user photo">
                    </button>
                    @if (Auth::user()->role == 'Customers')
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span
                                    class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                <span class="block text-sm  text-gray-500 truncate ">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="/profile"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Profile</a>
                                </li>
                                <li>
                                    <a href="/cart"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Keranjang</a>
                                </li>
                                <li>
                                    <a href="/wishlist"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Wishlist</a>
                                </li>
                                <li>
                                    <a href="/history-order"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Pesanan</a>
                                </li>
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
                    @else
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span
                                    class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                <span class="block text-sm  text-gray-500 truncate ">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="/data-reports"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lihat Toko</a>
                                </li>
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
                    @endif
                </div>
                <div class="items-center hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
                        <li>
                            <a href="/"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 ">Home</a>
                        </li>
                        <li>
                            <a href="/belanja"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 ">Belanja</a>
                        </li>
                        <li>
                            <a href="/list-produk-custom"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 ">Custom
                                Batik</a>
                        </li>
                        <li>
                            <a href="/sejarah"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 ">Sejarah
                                Kami</a>
                        </li>
                    </ul>
                </div>
                {{-- gada yang login --}}
            @else
                <div class="flex items-center md:order-2">
                    <button type="button"
                        class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">Guest</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="/login"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Login</a>
                            </li>
                            <li>
                                <a href="/register"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Register</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="items-center hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
                        <li>
                            <a href="/"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 ">Home</a>
                        </li>
                        <li>
                            <a href="/belanja"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 ">Belanja</a>
                        </li>
                        <li>
                            <a href="/list-produk-custom"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 ">Custom
                                Batik</a>
                        </li>
                        <li>
                            <a href="/sejarah"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 ">Sejarah
                                Kami</a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>

        <hr class=" border-gray-200 sm:mx-auto dark:border-gray-700" />
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            @yield('breadcum')
        </div>

    </nav>

    @yield('content')

    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <footer class="bg-white dark:bg-gray-900">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="https://flowbite.com/" class="flex items-center">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="FlowBite Logo" />
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                        <ul class="text-gray-600  font-medium">
                            <li class="mb-4">
                                <a href="https://flowbite.com/" class="hover:underline">Flowbite</a>
                            </li>
                            <li>
                                <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                        <ul class="text-gray-600  font-medium">
                            <li class="mb-4">
                                <a href="https://github.com/themesberg/flowbite" class="hover:underline ">Github</a>
                            </li>
                            <li>
                                <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                        <ul class="text-gray-600  font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="https://wa.me/+6282249165561"
                    class=" bg-blue-600 w-14 h-14 rounded-full flex justify-center items-center text-white text-2xl hover:bg-blue-700">
                    <i class="fab fa-whatsapp"></i></a>
            </div>

            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center ">© 2023 <a href="https://flowbite.com/"
                        class="hover:underline">Flowbite™</a>. All Rights Reserved.
                </span>

            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"></script>
    <script type="text/javascript">
        $('.confirmTopUp').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Konfirmasi?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>
    @yield('script')
</body>

</html>

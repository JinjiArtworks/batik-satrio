@extends('layouts.stores')
@section('aside')
    <div>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg   rounded-br-lg" aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="/data-reports">

                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Laporan Penjualan</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg bg-purple-600  rounded-br-lg"
                    aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="/data-product">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Produk</span>
                </a>
            </li>

          
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1  rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="/data-return">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Pengembalian Pesanan</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="/data-resources">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Tambah Resources</span>
                </a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Produk
            </h2>
            @if ($message = Session::get('success'))
                <div id="message"
                    class="flex items-center  p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="font-medium"> {{ $message }}</span>
                </div>
            @elseif ($message = Session::get('info'))
                <div id="message"
                    class="flex items-center  p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="font-medium">{{ $message }}</span>
                </div>
            @endif
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <span class="flex col-span-4 mt-4 ml-4 ">
                        <a href="/create-product"
                            class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Tambah Produk
                        </a>
                    </span>
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Kategori</th>
                                <th class="px-4 py-3">Ukuran</th>
                                <th class="px-4 py-3">Stock</th>
                                <th class="px-4 py-3">Terjual</th>
                                <th class="px-4 py-3">Harga</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($products as $item)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div class="relative hidden h-12 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full"
                                                    src="{{ asset('images/' . $item->gambar) }}" alt=""
                                                    loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                    aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{ $item->nama }}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->categories->nama }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->ukuran }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->stok }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->terjual }}
                                    </td>
                                    @if ($item->harga_grosir != null)
                                        <td class="px-4 py-3 text-sm">
                                            @currency($item->harga_grosir)
                                        </td> 
                                    @elseif ($item->harga_meter != null)
                                        <td class="px-4 py-3 text-sm">
                                            @currency($item->harga_meter)
                                        </td>
                                    @else
                                        <td class="px-4 py-3 text-sm">
                                            @currency($item->harga)
                                        </td>
                                    @endif

                                    <td class="px-4 py-3 text-sm">
                                        <form action="{{ route('products.edit', ['id' => $item->id]) }}">
                                            <button type="submit" class="flex items-center px-2 py-1 pl-0 space-x-1 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 512 512" class="w-4 h-4 fill-current text-blue-500">
                                                    <path
                                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <form method="GET" action="{{ route('products.delete', ['id' => $item->id]) }}">
                                            <button type="submit"
                                                class="deleteProduk flex items-center px-2 py-1 pl-0 space-x-1 text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="w-4 h-4 fill-current">
                                                    <path
                                                        d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z">
                                                    </path>
                                                    <rect width="32" height="200" x="168" y="216">
                                                    </rect>
                                                    <rect width="32" height="200" x="240" y="216">
                                                    </rect>
                                                    <rect width="32" height="200" x="312" y="216">
                                                    </rect>
                                                    <path
                                                        d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    <form action="{{ route('products.details', ['id' => $item->id]) }}">
                                        <td class="px-4 py-3 text-sm">
                                            <button type="submit"
                                                class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Details
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                        Showing 21-30 of 100
                    </span>
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center">
                                <li>
                                    <button
                                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                        aria-label="Previous">
                                        <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        1
                                    </button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        2
                                    </button>
                                </li>
                                <li>
                                    <button
                                        class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        3
                                    </button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        4
                                    </button>
                                </li>
                                <li>
                                    <span class="px-3 py-1">...</span>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        8
                                    </button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        9
                                    </button>
                                </li>
                                <li>
                                    <button
                                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                        aria-label="Next">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                            <path
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </li>
                            </ul>
                        </nav>
                    </span>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script type="text/javascript">
        $('.deleteProduk').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Hapus Produk?',
                icon: 'warning',
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
        setTimeout(function() {
            $('#message').fadeOut('fast');
        }, 3000);
    </script>
@endsection

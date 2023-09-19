@extends('layouts.stores')
@section('aside')
    <div>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
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
                <span class="absolute inset-y-0 left-0  bg-purple-600  w-1rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                <a class="inline-flex items-center w-full  text-sm text-gray-800 font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
                <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
                Detail Produk
            </h2>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Motif Produk</th>
                                <th class="px-4 py-3">Model Produk</th>
                                <th class="px-4 py-3">Bahan Produk</th>
                                <th class="px-4 py-3">Teknik Pembuatan Produk</th>
                                <th class="px-4 py-3">Diskon</th>
                                <th class="px-4 py-3">Berat Produk</th>
                                <th class="px-4 py-3">Harga Grosir</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <tr class="text-gray-700 dark:text-gray-400">

                                <td class="px-4 py-3 text-sm">
                                    {{ $products->motif->nama }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $products->model->nama }}
                                    {{-- {{ $products->model }}  --}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $products->bahan->nama }}
                                    {{-- {{ $products->bahan }}  --}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $products->teknik->nama }}
                                    {{-- {{ $products->teknik }}  --}}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @currency($products->diskon)
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $products->berat }} gram
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @currency($products->harga_grosir)
                                </td>
                            </tr>
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

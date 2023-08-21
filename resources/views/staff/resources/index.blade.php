@extends('layouts.stores')
@section('aside')
    <div>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
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
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="/data-history">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Riwayat Pesanan</span>
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
                <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg  bg-purple-600 rounded-br-lg"
                    aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold  text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
                Tambah Resources
            </h2>
            <!-- Cards -->
            <div class="flex justify-between">
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-models">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Model Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-motif">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Motif Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-bahan">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Bahan Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-teknik">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Teknik Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-warna">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Warna Batik</h5>
                    </div>
                </div>

            </div>
            <div class="flex justify-between">

                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-custom">
                        <img class="p-2 w-full" src="{{ asset('images/no-profile.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Contoh Custom Batik</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

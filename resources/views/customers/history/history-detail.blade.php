@extends('layouts.customer')
@section('breadcum')
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
            <a href="#"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
                Home
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <a href="#"
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Belanja</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <a href="#"
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                    Riwayat Pesanan</a>
            </div>
        </li>
    </ol>
@endsection
@section('content')
    <div class="container grid items-start gap-6 pt-4 pb-16">
        <div class="col-span-9 space-y-4">
            <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                <div class="w-28">
                    <img src="../images/products/product6.jpg" alt="product 6" class="w-full">
                </div>
                <div class="w-1/3">
                    <h2 class="text-gray-800 text-xl font-medium ">Italian L shape</h2>
                    <p class="text-gray-500 text-sm">Status: <span class="text-green-600">Pesanan Selesai</span></p>
                </div>
                <div class="w-1/3">
                    <div class="text-gray-600 text-sm">x 3</div>
                </div>
                <div class="text-gray-600 text-lg font-semibold">$320.00</div>
            </div>
        </div>
        <div class="col-span-9 space-y-4">
            <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                <div class="w-28">
                    <img src="../images/products/product6.jpg" alt="product 6" class="w-full">
                </div>
                <div class="w-1/3">
                    <h2 class="text-gray-800 text-xl font-medium ">Italian L shape</h2>
                    <p class="text-gray-500 text-sm">Status: <span class="text-green-600">Pesanan Selesai</span></p>
                </div>
                <div class="w-1/3">
                    <div class="text-gray-600 text-sm">x 3</div>
                </div>
                <div class="text-gray-600 text-lg font-semibold">$320.00</div>
            </div>
        </div>
        <div class="col-span-9 space-y-4">
            <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                <div class="w-1/3">
                    <h2 class="text-gray-800 text-xl font-medium">Penerima: </h2>
                    <p class="text-gray-500 text-sm">Alamat : </p>
                    <p class="text-gray-500 text-sm">Nomor Handphone : </p>
                </div>
                <div class="w-1/3">
                    <p class="text-gray-500 text-sm">x</p>
                </div>
                <div class="text-primary text-lg font-semibold"></div>
            </div>
        </div>
    </div>
@endsection

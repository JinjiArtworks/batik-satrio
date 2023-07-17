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
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Custom
                    Batik</a>
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
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Custom
                    Batik {{ $gender }}</a>
            </div>
        </li>
    </ol>
@endsection
@section('content')
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 border-b">
        <p>Proses pemesanan custom batik akan dikerjakan dalam waktu 3 hari. Silahkan mengisikan formulir berikut ini.</p>
    </div>
    <form method="POST" action="{{ route('custom.add', ['id' => $gender_id]) }}" enctype="multipart/form-data">
        @csrf
        {{-- <input type="hidden" value="350" name="weight">
        <input type="hidden" value="jne" name="courier">
        <input type="hidden" value="444" name="origin">
        <input type="hidden" value="{{ Auth::user()->city_id }}" name="destination"> --}}
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <input type="hidden" value="50000" name="harga">
            <input type="hidden" value="{{ $gender_id }}" name="gender_id">

            <h3 class=" font-semibold text-gray-900 mt-4">Pilih Model Baju</h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <div class="flex items-center mb-4">
                        <select name="model"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required>
                            <option selected>-- Pilih Jenis Kain --</option>
                            <option value="Slim Fit">Slim Fit</option>
                            <option value="Reguler">Reguler</option>
                        </select>
                    </div>
                </li>
            </ul>
            <h3 class=" font-semibold text-gray-900">Pilih Bahan Kain</h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <div class="flex items-center mb-4">
                        <select name="kain"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required>
                            <option selected>-- Pilih Bahan Kain --</option>
                            <option value="Sutra">Kain Sutra</option>
                            <option value="Mori">Kain Mori</option>
                        </select>

                    </div>
                </li>
            </ul>
            <h3 class=" font-semibold text-gray-900">Pilih Lengan</h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <div class="flex items-center mb-4">
                        <select id="lengan" name="lengan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required>
                            <option selected>-- Pilih Ukuran Lengan-- </option>
                            <option value="Lengan Panjang">Lengan Panjang</option>
                            <option value="Lengan Pendek">Lengan Pendek</option>
                        </select>
                    </div>
                </li>
            </ul>
            <h3 class=" font-semibold text-gray-900">Quantity</h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <div class="flex items-center mb-4">
                        <input type="number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="quantity" required>
                    </div>
                </li>
            </ul>
            <h3 class=" font-semibold text-gray-900 ">Masukkan Detail Ukuran </h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <div class="flex items-center">
                        <textarea
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="size" placeholder="Contoh : XL = 3 Pcs" required></textarea>
                    </div>
                    <div class="mb-4">
                        <small>Ukuran XXL menambah biaya sebesar Rp. 10.000</small>
                    </div>
                </li>
            </ul>

            {{-- <h3 class=" font-semibold text-gray-900 ">Masukkan Ukuran dan Quantity </h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <div class="flex items-center mb-4">
                        <textarea
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="size" placeholder="Contoh : Ukuran XL = 3 Pcs" required></textarea>
                </li>
            </ul> --}}
            <h3 class=" font-semibold text-gray-900 ">Pilih Warna Dasar</h3>
            <ul
                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex ">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="horizontal-list-radio-license" type="radio" value="Coklat" name="warna"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="horizontal-list-radio-license" class="w-full ml-2 text-sm font-medium text-gray-900 ">
                            <img src="../images/products/product3.jpg" alt="product2" class="w-60 mt-4 cursor-pointer">
                            <p class="font-semibold flex justify-center">Coklat</p>
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="horizontal-list-radio-license" type="radio" value="Biru" name="warna"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="horizontal-list-radio-license" class="w-full ml-2 text-sm font-medium text-gray-900 ">
                            <img src="../images/products/product3.jpg" alt="product2" class="w-60 mt-4 cursor-pointer">
                            <p class="font-semibold flex justify-center">Biru</p>
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="horizontal-list-radio-license" type="radio" value="Putih" name="warna"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="horizontal-list-radio-license" class="w-full ml-2 text-sm font-medium text-gray-900 ">
                            <img src="../images/products/product3.jpg" alt="product2" class="w-60 mt-4 cursor-pointer">
                            <p class="font-semibold flex justify-center">Putih</p>
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="horizontal-list-radio-license" type="radio" value="Hitam" name="warna"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="horizontal-list-radio-license" class="w-full ml-2 text-sm font-medium text-gray-900 ">
                            <img src="../images/products/product3.jpg" alt="product2" class="w-60 mt-4 cursor-pointer">
                            <p class="font-semibold flex justify-center">Hitam</p>
                        </label>
                    </div>
                </li>
            </ul>
            <h3 class=" mt-4 font-semibold text-gray-900 ">Pilih Motif</h3>
            <ul
                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex ">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="horizontal-list-radio-license" type="radio" value="Semar" name="motif"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="horizontal-list-radio-license" class="w-full ml-2 text-sm font-medium text-gray-900 ">
                            <img src="{{ asset('images/motif2.jpg') }}" alt="product2" class="w-60 mt-4 cursor-pointer">
                            <p class="font-semibold flex justify-center">Batik Semar</p>
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="horizontal-list-radio-license" type="radio" value="Keraton" name="motif"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="horizontal-list-radio-license" class="w-full ml-2 text-sm font-medium text-gray-900 ">
                            <img src="{{ asset('images/motif3.jpg') }}" alt="product2" class="w-60 mt-4 cursor-pointer">
                            <p class="font-semibold flex justify-center">Batik Keraton</p>
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="horizontal-list-radio-license" type="radio" value="Mega Mendung" name="motif"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="horizontal-list-radio-license" class="w-full ml-2 text-sm font-medium text-gray-900 ">
                            <img src="{{ asset('images/mega.png') }}" alt="product2" class="w-60 mt-4 cursor-pointer">
                            <p class="font-semibold flex justify-center">Mega Mendung</p>
                        </label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="horizontal-list-radio-license" type="radio" value="Batik Jogja" name="motif"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="horizontal-list-radio-license" class="w-full ml-2 text-sm font-medium text-gray-900 ">
                            <img src="{{ asset('images/semar.jpg') }}" alt="product2" class="w-60 mt-4 cursor-pointer">
                            <p class="font-semibold flex justify-center">Batik Jogja</p>
                        </label>
                    </div>
                </li>
            </ul>
            @if (Auth::user()->role == 'Customer')
                <div class="flex justify justify-end">
                    <button type="submit"
                        class="bg-blue-600 border my-4  border-blue-600 text-white px-4 py-2 font-medium rounded  gap-2 hover:bg-transparent hover:text-blue-600 transition">
                        Checkout
                    </button>
                </div>
            @endif

        </div>
    </form>
@endsection

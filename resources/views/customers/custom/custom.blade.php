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
        {{-- <input type="hidden" value="{{ $get_results }}" name="hasil_request"> --}}
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <input type="hidden" value="50000" name="harga">
            <input type="hidden" value="{{ $gender_id }}" name="gender_id">
            <input type="hidden" value="{{ $motif }}" name="motif">
            <input type="hidden" value="{{ $warna }}" name="warna">
            <input type="hidden" value="{{ $gender }}" name="gender">
            <input type="hidden" value="{{ $getImages }}" name="images">
            {{-- {{ dd($images->gambar) }} --}}
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <div class="flex w-full space-x-2 sm:space-x-4">
                        <img class="flex-shrink-0 object-cover w-20 h-22 dark:border-transparent rounded outline-none sm:w-32 sm:h-32 dark:bg-gray-500"
                            src="{{ asset('images/' . $getImages) }}">
                        <div class="flex flex-col justify-between w-full pb-4">
                            <div class="flex justify-between w-full pb-2 space-x-2">
                                <div class="space-y-1">
                                    <h3 class="text-lg font-semibold leadi sm:pr-8"> Custom Batik
                                        @if ($gender_id == 1)
                                            Wanita
                                        @else
                                            Pria
                                        @endif
                                    </h3>
                                    <p class="text-sm  dark:text-gray-400"> Motif : {{ $motif }}</p>
                                    <p class="text-sm  dark:text-gray-400">Warna : {{ $warna }}</p>
                                </div>
                                {{--                               
                                <div class="text-right">
                                    <form action="{{ route('custom.remove', ['id' => $c['id']]) }}" method="GET">
                                        <button type="submit"
                                            class="flex items-center px-2 py-1 pl-0 space-x-1 text-red-600">
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
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <h3 class="font-semibold text-gray-900 mt-4">Pilih Model Baju</h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <div class="flex items-center mb-4">
                        <select name="model"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required>
                            <option value="">-- Pilih Jenis Kain --</option>
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
                            <option value="">-- Pilih Bahan Kain --</option>
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
                            <option value="">-- Pilih Ukuran Lengan-- </option>
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
            <div class="flex justify justify-end" id="check_results">
                <button type="submit"
                    class="bg-blue-600 border  border-blue-600 text-white px-4 py-2 font-medium rounded  gap-2 hover:bg-transparent hover:text-blue-600 transition">
                    Checkout
                </button>
            </div>
        </div>
    </form>
@endsection

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
                    Batik</a>
            </div>
        </li>
    </ol>
@endsection
@section('content')
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 border-b">
        <p>Proses pemesanan custom batik akan dikerjakan dalam waktu 3 hari. Silahkan mengisikan formulir berikut ini.</p>
    </div>
    <form method="POST" action="{{ route('custom.add') }}" enctype="multipart/form-data">
        @csrf
        {{-- <input type="hidden" value="{{ $get_results }}" name="hasil_request"> --}}
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <input type="hidden" value="50000" name="harga">
            <input type="hidden" value="{{ $metode }}" name="metode">
            {{-- {{ dd($images->gambar) }} --}}
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                @if ($metode == 'Custom')
                    <input type="hidden" value="{{ $motif }}" name="motif">
                    <input type="hidden" value="{{ $tipe }}" name="tipe">
                    <li class="w-full">
                        @foreach ($results as $item)
                            @if ($item->tipe == $tipe && $item->motif == $motif)
                                <div class="flex justify-center w-full space-x-2 sm:space-x-4">
                                    <img class="flex-shrink-0 object-cover w-80 h-80  rounded outline-none "
                                        src="{{ asset('images/' . $item->results_images) }}">
                                </div>
                                <input type="hidden" value="{{ $item->results_images }}" name="images_custom">
                            @endif
                        @endforeach
                        <div class="flex flex-col w-full pb-4 text-center mt-4">
                            <div class="flex justify-center w-full pb-2 space-x-2 ">
                                <div class="space-y-1">
                                    <h3 class="text-lg font-semibold"> Hasil produk custom Anda :
                                    </h3>
                                    <p class="text-sm"> Tipe Lengan: {{ $tipe }}</p>
                                    <p class="text-sm"> Motif : {{ $motif }}</p>
                                    <div class="mt-4">
                                        <p class="text-md font-semibold ">Hasil Kurang Sesuai ? <a
                                                href="/list-produk-custom" class="underline text-blue-600">Pilih Ulang</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    <input type="hidden" value="{{ $images }}" name="images">
                    <li class="w-full">
                        <div class="flex justify-center w-full space-x-2 sm:space-x-4">
                            <img src="" class="flex-shrink-0 object-cover w-80 h-80  rounded outline-none" alt="Preview" id="imgPreview">
                        </div>
                    </li>
                @endif

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
            <h3 class=" font-semibold text-gray-900 ">Masukkan qty dan detail ukuran </h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <div class="flex items-center mb-4">
                        <textarea
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="size" placeholder="Contoh : XL = 3 Pcs" required></textarea>
                    </div>
                </li>
            </ul>
            {{-- <h3 class=" font-semibold text-gray-900 ">Masukkan Quantity</h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex mb-4 ">
                <li class="w-full">
                    <div class="flex items-center">
                        <a
                            class="btn btn-reduce h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                            -</a>
                        <input type="number"
                            class="count bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                            pattern="[0-9]*" name="quantity" value="1" data-max="120" required>
                        <a
                            class="btn btn-increase h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                            +</a>
                    </div>
                </li>
            </ul> --}}



            <div class="flex justify justify-end" id="check_results">
                <button type="submit"
                    class="bg-blue-600 border  border-blue-600 text-white px-4 py-2 font-medium rounded  gap-2 hover:bg-transparent hover:text-blue-600 transition">
                    Checkout
                </button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-increase', function() {
                $('.count').val(parseInt($('.count').val()) + 1);
            });
            $(document).on('click', '.btn-reduce', function() {
                $('.count').val(parseInt($('.count').val()) - 1);
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
            });
        });
        if (localStorage.getItem('recent-items')) {
            document.querySelector('#imgPreview').src = localStorage.getItem('recent-items');
            // Retrieve data from local storage or any other source
            var dataFromLocalStorage = localStorage.getItem('recent-items');
            // Send data to Laravel controller using AJAX
            $.ajax({
                url: '/list-order', // Replace with your Laravel controller route
                method: 'POST', // Use POST method to send data
                data: {
                    data: dataFromLocalStorage
                }, // Data to send
                success: function(response) {
                    // Handle the response from the server
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.error(error);
                }
            });
        }
        // document.addEventListener('DOMContentLoaded', () => {
        //     const recentImageDataUrl = localStorage.getItem('recent-image');
        //     if (recentImageDataUrl) {
        //         document.querySelector('#imgPreview').setAttribute('src', recentImageDataUrl);
        //     }
        // });
    </script>
@endsection

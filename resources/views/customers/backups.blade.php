@extends('layouts.customer')
<style>
    .input-hidden {
        /* For Hiding Radio Button Circles */
        position: absolute;
        left: -9999px;
    }

    input[type="radio"]:checked+label>img {
        border: 1px solid rgb(157, 255, 0);
        box-shadow: 0 0 3px 3px #e65b0b;
    }

    input[type="radio"]+label>img {
        transition: 500ms all;
        border-style: solid;
    }

    input[type="radio"]:checked+label {
        border: 1px solid rgb(157, 255, 0);
        box-shadow: 0 0 3px 3px #e65b0b;
    }

    input[type="radio"]+label {
        transition: 500ms all;
        border-style: solid;
    }

    /* input[type="radio"]:checked+label>img {
        transform: rotateZ(-10deg) rotateX(10deg);
    } */
</style>
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
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Detail
                    Produk</a>
            </div>
        </li>
    </ol>
@endsection
@section('content')
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- product-detail -->
        <div class="container grid grid-cols-2 gap-6">
            <div>
                <img id="results-img" src="{{ asset('images/products/product1.jpg') }}" alt="product" class="w-full">
            </div>
            <form method="POST" action="{{ route('custom.details') }}" enctype="multipart/form-data">
                @csrf
                <div class="space-y-2">
                    {{-- <p class="space-x-2">
                        <span class="text-gray-800 font-semibold">Tipe Pakaian: </span>
                        <span class="text-gray-600">
                            <div class="flex items-center gap-2">
                                @foreach ($tipe as $tipes)
                                    <div class="color-selector">
                                        <input type="radio" name="tipe" value="{{ $tipes->nama }}"
                                            id="{{ $tipes->nama }}" class="hidden">
                                        <label for="{{ $tipes->nama }}"
                                            class="border border-gray-200 rounded-sm w-24  cursor-pointer shadow-sm block">
                                            <img src="{{ asset('images/' . $tipes->gambar) }}" alt="">
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </span>
                    </p> --}}

                    <div class="space-y-2">
                        <p class="space-x-2">
                            <span class="text-gray-800 font-semibold">Color: </span>
                            <span class="text-gray-600">
                                <div class="flex items-center gap-2">
                                    <div class="color-selector">
                                        <input type="radio" name="color" value="{{ $getColors[0]['nama'] }}"
                                            id="{{ $getColors[0]['nama'] }}" class=" colors hidden">
                                        <label for="{{ $getColors[0]['nama'] }}"
                                            class="border border-gray-200 rounded-sm h-20 w-20  cursor-pointer shadow-sm block"
                                            style="background-color: {{ $getColors[0]['hexacode'] }}"></label>
                                        {{-- <input type="color" id="colorpicker" value="#0000ff"> --}}
                                    </div>
                                    <div class="color-selector">
                                        <input type="radio" name="color" value="{{ $getColors[1]['nama'] }}"
                                            id="{{ $getColors[1]['nama'] }}" class="hidden">
                                        <label for="{{ $getColors[1]['nama'] }}"
                                            class="border border-gray-200 rounded-sm h-20 w-20  cursor-pointer shadow-sm block"
                                            style="background-color: {{ $getColors[1]['hexacode'] }}"></label>
                                        {{-- <input type="color" id="colorpicker" value="#0000ff"> --}}
                                    </div>
                                </div>
                            </span>
                        </p>
                        <p class="space-x-2">
                            <span class="text-gray-800 font-semibold">Motif: </span>
                            <span class="text-gray-600">
                                <div class="flex items-center gap-2">
                                    <div class="color-selector">
                                        <input type="radio" name="motif"
                                            value="{{ $getMotifs[0]['nama'] }} {{ $getColors[0]['nama'] }}"
                                            id="{{ $getMotifs[0]['nama'] }}" class="hidden">
                                        <label for="{{ $getMotifs[0]['nama'] }}"
                                            class="border border-gray-200 rounded-sm w-32  cursor-pointer shadow-sm block">
                                            <img src="{{ asset('images/' . $getMotifs[0]['gambar']) }}" alt="">
                                        </label>
                                        <p class="my-2 flex justify-center text-sm">{{ $getMotifs[0]['nama'] }}</p>
                                    </div>
                                    <div class="color-selector">
                                        <input type="radio" name="motif"
                                            value="{{ $getMotifs[1]['nama'] }} {{ $getColors[0]['nama'] }}"
                                            id="{{ $getMotifs[1]['nama'] }}" class="hidden">
                                        <label for="{{ $getMotifs[1]['nama'] }}"
                                            class="border border-gray-200 rounded-sm w-32  cursor-pointer shadow-sm block">
                                            <img src="{{ asset('images/' . $getMotifs[1]['gambar']) }}" alt="">
                                        </label>
                                        <p class="my-2 flex justify-center text-sm">{{ $getMotifs[1]['nama'] }}</p>
                                    </div>
                                </div>
                            </span>
                        </p>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 border border-blue-600 text-white px-4 py-2 font-medium rounded  gap-2 hover:bg-transparent hover:text-blue-600 transition">
                        Konfirmasi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[name="color"]:radio').click(function() {
                switch ($(this).val()) {
                    case "{{ $getColors[0]['nama'] }}":
                        $("#results-img").attr("src", "images/" + "{{ $getColors[0]['gambar'] }}");
                        break;
                    case "{{ $getColors[1]['nama'] }}":
                        $("#results-img").attr("src", "images/" + "{{ $getColors[1]['gambar'] }}");
                        break;
                }
            });
            $('input[name="motif"]:radio').click(function() {
                let MegaMendungMerah = "{{ $getMotifs[0]['nama'] }} {{ $getColors[0]['nama'] }}";
                let GentonganMerah = "{{ $getMotifs[1]['nama'] }} {{ $getColors[0]['nama'] }}";

                let MegaMendungHitam = "{{ $getMotifs[0]['nama'] }} {{ $getColors[1]['nama'] }}";
                let GentonganHitam = "{{ $getMotifs[1]['nama'] }} {{ $getColors[1]['nama'] }}";
                if ($(this).val() == MegaMendungMerah) {
                    $("#results-img").attr("src", "images/" + "results_mega_merah.webp");
                } else if ($(this).val() == GentonganMerah) {
                    $("#results-img").attr("src", "images/" + "batikkraton.webp");
                }
            });
        });
    </script>
@endsection

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
    </ol>
@endsection
@section('content')
    <div class="max-w-screen-xl flex flex-wrap items-center justify-center mx-auto p-4 ">
        @if (Auth::user()->role == 'Customers')
            @if ($list == null)
                <form action="{{ route('custom.check', ['id' => 1]) }}" method="POST">
                    @csrf
                    <input type="hidden" name='gender' value='Wanita'>
                    <input type="hidden" name='gender_id' value='1'>
                    <div
                        class=" mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                        <img class="p-2 w-full" src="{{ asset('images/wanita.png') }}" alt="product image" />
                        <div class="px-5 pb-5">
                            <button type="submit">
                                <h5 class="font-semibold text-gray-900 dark:text-white">Batik Wanita</h5>
                            </button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('custom.check', ['id' => 2]) }}" method="POST">
                    @csrf
                    <input type="hidden" name='gender' value='Pria'>
                    <input type="hidden" name='gender_id' value='2'>
                    <div
                        class=" mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                        <img class="p-2 w-full" src="{{ asset('images/pria.png') }}" alt="product image" />
                        <div class="px-5 pb-5">
                            <button type="submit">
                                <h5 class="font-semibold text-gray-900 dark:text-white">Batik Pria</h5>
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <p>Anda sudah memesan produk custom sebelumnya. Selesaikan pesanan tersebut untuk memesan produk custom
                    lainnya.
                    <span>
                        <a href='/list-order' class="underline text-blue-600"> Lihat Pesanan Anda</a>
                    </span>
                </p>
            @endif
        @else
            <h2>Anda Login Sebagai Admin. <a href="/data-reports" class="text-blue-700 underline">Lihat Halaman
                    Dashboard.</a></h2>
        @endif


    </div>
@endsection

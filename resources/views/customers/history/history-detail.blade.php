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
                <a href="/history-order"
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                    Riwayat Pesanan</a>
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
                    Detail Riwayat Pesanan</a>
            </div>
        </li>
    </ol>
@endsection
@section('content')
    <div class="max-w-screen-xl items-center justify-between mx-auto p-4">
        <div class="container grid items-start gap-6 pt-4 pb-16">
            <div class="col-span-9 space-y-4">
                <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                    <div class="w-full">
                        <h2 class="text-gray-800 text-xl font-medium">Penerima: {{ Auth::user()->name }}</h2>
                        <p class="text-gray-500 text-sm">Alamat : {{ Auth::user()->address }} </p>
                        <p class="text-gray-500 text-sm">Nomor Handphone : {{ Auth::user()->phone }}</p>
                    </div>
                </div>
            </div>
            @foreach ($details as $item)
                @if ($item->product_id == null)
                    <div class="col-span-9 space-y-4">
                        <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                            <div class="w-28">
                                @if ($item->request_gender == 'Wanita')
                                    <img src="{{ asset('images/wanita.png') }}" alt="product 6" class="w-full">
                                @else
                                    <img src="{{ asset('images/pria.png') }}" alt="product 6" class="w-full">
                                @endif
                            </div>
                            <h2 class="text-gray-800 text-xl font-medium ">Custom Batik

                                @if ($item->request_gender == 'Wanita')
                                    Wanita
                                @else
                                    Pria
                                @endif
                                <p class="text-gray-500 text-sm">Status: <span
                                        class="text-green-600">{{ $item->order->status }}</span>
                                </p>
                            </h2>
                            <div class="text-gray-600 text-sm">@currency($item->harga)</div>
                            <div class="text-gray-600 text-sm">x {{ $item->quantity }}</div>
                            <div class="text-gray-600 text-lg font-semibold">@currency($item->quantity * $item->harga)</div>

                        </div>
                    </div>
                    <div class="col-span-9 space-y-4">
                        <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm">
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Ongkos Kirim</th>
                                <th class="py-2 px-4 border border-gray-300 ">@currency($item->order->ongkos_kirim )
                                </th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Gender</th>
                                <th class="py-2 px-4 border border-gray-300 ">
                                    @if ($item->request_gender == 'Wanita')
                                        Wanita
                                    @else
                                        Pria
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Warna Dasar</th>
                                <th class="py-2 px-4 border border-gray-300 ">{{ $item->request_warna }}</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Motif </th>
                                <th class="py-2 px-4 border border-gray-300 ">{{ $item->request_motif }}</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Model</th>
                                <th class="py-2 px-4 border border-gray-300 ">{{ $item->request_model }}</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Lengan</th>
                                <th class="py-2 px-4 border border-gray-300 ">{{ $item->request_lengan }}</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Kain</th>
                                <th class="py-2 px-4 border border-gray-300 ">{{ $item->request_kain }}</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Ukuran Detail</th>
                                <th class="py-2 px-4 border border-gray-300 ">{{ $item->request_ukuran }}</th>
                            </tr>

                        </table>
                    </div>
                @else
                    <div class="col-span-9 space-y-4">
                        <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                            <div class="w-28">
                                <img src="{{ asset('images/' . $item->product->gambar) }}" alt="product 6" class="w-full">
                            </div>
                            <h2 class="text-gray-800 text-xl font-medium ">{{ $item->product->nama }}
                                <p class="text-gray-500 text-sm">Status: <span
                                        class="text-green-600">{{ $item->order->status }}</span>
                                </p>
                            </h2>
                            <div class="text-gray-600 text-sm">@currency($item->harga)</div>
                            <div class="text-gray-600 text-sm">x {{ $item->quantity }}</div>
                            <div class="text-gray-600 text-lg font-semibold">@currency($item->quantity * $item->harga)</div>
                        </div>
                        <div class="col-span-9 space-y-4">
                            <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm">
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Ongkos Kirim</th>
                                    <th class="py-2 px-4 border border-gray-300 ">@currency($item->order->ongkos_kirim )
                                    </th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Kategori</th>
                                    <th class="py-2 px-4 border border-gray-300 ">{{ $item->product->categories->nama }}
                                    </th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Motif </th>
                                    <th class="py-2 px-4 border border-gray-300 ">{{ $item->product->motif->nama }}</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Model</th>
                                    <th class="py-2 px-4 border border-gray-300 ">{{ $item->product->model }}</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Teknik Pembuatan</th>
                                    <th class="py-2 px-4 border border-gray-300 ">{{ $item->product->teknik }}</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Bahan</th>
                                    <th class="py-2 px-4 border border-gray-300 ">{{ $item->product->bahan }}</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Ukuran </th>
                                    <th class="py-2 px-4 border border-gray-300 ">{{ $item->product->ukuran }}</th>
                                </tr>

                            </table>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

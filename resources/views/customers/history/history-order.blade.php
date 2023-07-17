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
    <div class="max-w-screen-xl items-center justify-between mx-auto p-4">
        <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
            <!-- sidebar -->
            <div class="col-span-3">
                <div class="px-4 py-3 shadow flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <img src="../images/avatar.png" alt="profile"
                            class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="text-gray-600">Hello, {{ Auth::user()->name }}</p>
                        <h4 class="text-gray-800 font-medium">{{ Auth::user()->address }}</h4>
                        <h4 class="text-gray-800 font-medium">{{ Auth::user()->phone }}</h4>
                    </div>
                </div>

                <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">

                    <div class="space-y-1 pl-8">
                        <a href="/wishlist" class="relative hover:text-blue-600 block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            My wishlist
                        </a>
                    </div>
                    @if (Auth::user()->role == 'Customer')
                    <div class="space-y-1 pl-8 pt-4">
                        <a href="/profile" class="relative text-blue-600 block capitalize transition" type="button">
                            <span class="absolute -left-8 top-0 text-base mt-1">
                                <i class="fa-regular fa-user"></i>
                            </span>
                            Ubah Data Profile
                        </a>
                    </div>
                @endif

                    <div class="space-y-1 pl-8 pt-4">
                        <a href="/history-order" class="relative text-blue-600 block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-solid fa-box-archive"></i>
                            </span>
                            Riwayat Pesanan
                        </a>
                    </div>
                    <div class="space-y-1 pl-8 pt-4">
                        <a href="#" class="relative hover:text-blue-600 block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </span>
                            Logout
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-span-9 space-y-4">

                @foreach ($orders as $item)
                    @if ($item->jenis_pesanan == 'Custom')
                        <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                            <div class="w-28">
                                @if ($item->orderdetail->request_gender == 'Wanita')
                                    <img src="{{ asset('images/wanita.png') }}" alt="product 6" class="w-full">
                                @else
                                    <img src="{{ asset('images/pria.png') }}" alt="product 6" class="w-full">
                                @endif
                            </div>
                            <div class="w-1/3">
                                <h2 class="text-gray-800 text-xl font-medium ">Produk Custom
                                    @if ($item->orderdetail->request_gender == 'Wanita')
                                        Wanita
                                    @else
                                        Pria
                                    @endif
                                </h2>
                                <p class="text-gray-500 text-sm">Status: <span
                                        class="text-green-600">{{ $item->status }}</span>
                                </p>
                            </div>
                            {{-- <div class="text-gray-600 text-sm ">@currency($item->orderdetail->harga)</div> --}}
                            <div class="text-gray-600 text-sm ">x{{ $item->orderdetail->quantity }}</div>
                            <div class="text-gray-600 text-lg font-semibold">@currency($item->total)</div>
                            <a href="/history-detail/{{ $item->orderdetail->order_id }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Details</a>
                        </div>
                    @else
                        <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                            <div class="w-28">
                                <img src="{{ asset('images/' . $item->orderdetail->product->gambar) }}" alt="product 6"
                                    class="w-full">
                            </div>
                            <div class="w-1/3">
                                <h2 class="text-gray-800 text-xl font-medium ">{{ $item->orderdetail->product->nama }}
                                </h2>
                                <p class="text-gray-500 text-sm">Status: <span
                                        class="text-green-600">{{ $item->status }}</span>
                                </p>
                            </div>
                            <div class="text-gray-600 text-sm ">x{{ $item->orderdetail->quantity }}</div>
                            <div class="text-gray-600 text-lg font-semibold">@currency($item->total)</div>
                            <a href="/history-detail/{{ $item->orderdetail->order_id }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Details</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endsection

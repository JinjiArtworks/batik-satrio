@extends('layouts.stores')
@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Laporan Penjualan
            </h2>
            @if ($message = Session::get('success'))
                <div id="message"
                    class="flex items-center  p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="font-medium"> {{ $message }}</span>
                </div>
            @elseif ($message = Session::get('info'))
                <div id="message"
                    class="flex items-center  p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="font-medium">{{ $message }}</span>
                </div>
            @endif
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div
                        class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Total Customers
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $totalClients }}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Total Pendapatan
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            @currency($pendapatanBersih)
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Total Pesanan
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $totalOrders }}

                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Ajuan Pengembalian
                        </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $totalReturns }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="pb-4 bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only text-sm p-4" >Cari Berdasarkan Status: </label>
                <div class="relative mt-1 ml-4 ">
                    <form action="" method="get">
                        <select id="countries" name="filter_status"
                            class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  mb-4  p-4 ">
                            <option value="">-- Pilih Status -- </option>
                            <option
                                value="Menunggu Konfirmasi Penjual"{{ Request::get('filter_status') == 'Menunggu Konfirmasi Penjual' ? 'selected' : '' }}>
                                Menunggu Konfirmasi Penjual</option>
                            <option value="Selesai"{{ Request::get('filter_status') == 'Selesai' ? 'selected' : '' }}>
                                Selesai</option>
                            <option
                                value="Sedang Diproses"{{ Request::get('filter_status') == 'Sedang Diproses' ? 'selected' : '' }}>
                                Sedang Diproses</option>
                            <option
                                value="Pengembalian Diterima Penjual"{{ Request::get('filter_status') == 'Pengembalian Diterima Penjual' ? 'selected' : '' }}>
                                Pengembalian Diterima Penjual</option>
                            <option
                                value="Proses Pengembalian"{{ Request::get('filter_status') == 'Proses Pengembalian' ? 'selected' : '' }}>
                                Proses Pengembalian</option>
                        </select>
                        <button type="submit"
                            class=" p-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Filter
                        </button>
                    </form>
                </div>
            </div>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Alamat</th>
                                <th class="px-4 py-3">Jenis Pesanan</th>
                                <th class="px-4 py-3">Grand Total</th>
                                <th class="px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($orders as $item)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        <p class="font-semibold">{{ $item->nama }}</p>
                                    </td>
                                    {{-- <td class="px-4 py-3 text-sm">
                                        {{ $item->nomor_hp }}
                                    </td> --}}
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->tanggal }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->alamat }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->jenis_pesanan }}
                                    </td>
                                    {{-- <td class="px-4 py-3 text-sm">
                                        @currency($item->ongkos_kirim)
                                    </td> --}}
                                    <td class="px-4 py-3 text-sm">
                                        @currency($item->total)
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        @if ($item->status == 'Selesai')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                {{ $item->status }}
                                            </span>
                                        @elseif ($item->status == 'Proses Pengembalian')
                                            <span class="px-2 py-1 font-semibold leading-tight  bg-blue-100 rounded-full ">
                                                {{ $item->status }}
                                            </span>
                                            <p class="mt-2">*Pembeli Mengajukan Pengembalian.</p>
                                        @else
                                            <span class="px-2 py-1 font-semibold leading-tight  bg-blue-100 rounded-full ">
                                                {{ $item->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <form method="GET" action="{{ route('reports.details', ['id' => $item->id]) }}">
                                        <td class="px-4 py-3 text-sm">
                                            <button type="submit"
                                                class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                Details
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </main>
@endsection
@section('script')
    <script>
        setTimeout(function() {
            $('#message').fadeOut('fast');
        }, 3000);
    </script>
@endsection

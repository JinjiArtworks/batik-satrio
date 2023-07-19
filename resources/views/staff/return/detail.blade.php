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
                <span class="absolute inset-y-0 left-0 w-1  bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="/data-return">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Ajuan Pengembalian</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
                Detail Riwayat Pesanan
            </h2>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="text-sm flex flex-wrap">
                    <span class="text-gray-700 dark:text-gray-400">
                        Status Pesanan :
                    </span><span
                        class="px-2 py-1 ml-2 font-semibold text-sm leading-tight text-blue-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        {{ $orderdetails->order->status }}
                    </span>
                </label>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Pesanan yang dikembalikan
                    </span>
                    <img src="{{ asset('images/no-profile.png') }}" id="blah" width="150px" height="150px"
                        class="mt-1 mb-2">
                </label>
                <label class=" block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Nama
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        type="text" name="name" value="{{ $orderdetails->order->nama }}" readonly />
                    {{-- <span class="text-xs text-gray-600 dark:text-gray-400">
                        Your password must be at least 6 characters long.
                    </span> --}}
                </label>

                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Tanggal Order
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        type="text" name="date" value="{{ $orderdetails->order->tanggal }}" readonly />

                </label>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Nomor Handphone
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        type="text" name="phone" value="{{ $orderdetails->order->nomor_hp }}" readonly />

                </label>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Alamat
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        type="text" name="address" value="{{ $orderdetails->order->alamat }}" readonly />

                </label>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Jenis Pesanan
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        type="text" name="ph" value="{{ $orderdetails->order->nomor_hp }}" readonly />

                </label>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Total Transaksi
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        type="text" name="name" value="@currency($orderdetails->order->total)" readonly />

                </label>


                {{-- @if ($products->status = 'Proses Pengembalian') --}}
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Tanggal Pengembalian
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        type="text" name="date" value="{{ $returns->tanggal }}" readonly />

                </label>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Bukti foto produk yang dikembalikan
                    </span>
                    <img src="{{ asset('images/' . $returns->bukti) }}" id="blah" width="150px" height="150px"
                        class="mt-1 mb-2">
                </label> <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Alasan dikembalikan
                    </span>
                    <textarea
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        type="text" name="alasan" readonly>{{ $returns->alasan }}</textarea>
                </label>
                <form method="POST" action="{{ route('return.update', ['id' => $orderdetails->order->id]) }}">
                    @csrf
                    {{ method_field('put') }}
                    <td class="px-4 py-3 text-sm">
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Aksi
                            </span>
                            <select name="status"
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                <option value="Pengembalian Diterima">Terima Pengembalian</option>
                                <option value="Pengembalian Ditolak">Tolak Pengembalian</option>
                            </select>
                        </label>
                        <button
                            class="px-3 py-1 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Konfirmasi
                        </button>
                </form>
                {{-- @endif --}}
                {{-- @if ($products->status = 'Proses Pengembalian') --}}

                {{-- @endif --}}
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script type="text/javascript">
        image.onchange = evt => {
            const [file] = image.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
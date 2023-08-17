@extends('layouts.stores')
@section('aside')
    <div>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1  bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold   text-gray-800  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
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
                <span class="absolute inset-y-0 left-0 w-1   rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
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
                <span class="absolute inset-y-0 left-0 w-1  rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semiboldtransition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
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
        <div class="container mx-auto grid">
            <h2 class=" mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Detail Pesanan
            </h2>
            @if ($getOrderDetails->order->jenis_pesanan == 'Custom')
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Order Nomor </th>
                                    <th class="px-4 py-3">Quantity </th>
                                    <th class="px-4 py-3">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <div class="py-4 px-4">
                                    <label class="text-sm flex flex-wrap">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Status Pesanan :
                                        </span><span
                                            class="px-2 py-1 ml-2 font-semibold text-sm leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-green-100">
                                            {{ $item->order->status }}
                                        </span>
                                    </label>
                                </div>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm font-semibold">
                                        #{{ $item->order->id }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        @currency($item->order->total)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($item->order->status == 'Pesanan Custom Diterima')
                    <div class="flex justify-end">
                        <form method="POST" action="{{ route('reports.update', ['id' => $item->order->id]) }}">
                            @csrf
                            {{ method_field('put') }}
                            <button type="submit"
                                class="sendCustomOrder px-3 py-1 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Kirim Pesanan</button>
                        </form>
                    </div>
                @endif
                <div class="w-full overflow-hidden mt-4 ">
                    <h2 class="font-semibold ">Detail pesanan : </h2>
                    <div class="container items-start gap-6">
                        <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm  mb-6">
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Nama Pesanan</th>
                                <th class="py-2 px-4 border border-gray-300 ">Produk Custom Batik</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Gambar Pesanan </th>
                                <th class="py-2 px-4 border border-gray-300 ">
                                    <img src="{{ asset('images/' . $item->request_result) }}" style="width: 120px">
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
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Total Pesanan </th>
                                <th class="py-2 px-4 border border-gray-300 ">@currency($item->harga * $item->quantity)</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Ongkos Kirim </th>
                                <th class="py-2 px-4 border border-gray-300 ">@currency($item->order->ongkos_kirim)</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Pre Order</th>
                                <th class="py-2 px-4 border border-gray-300 ">3 Hari</th>
                            </tr>
                            @if ($item->order->status == 'Proses Pengembalian')
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Alasan Pengembalian
                                        Pesanan </th>
                                    <th class="py-2 px-4 border border-gray-300 ">{{ $returnOrder->alasan }}</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Bukti Pengembalian
                                    </th>
                                    <th class="py-2 px-4 border border-gray-300 ">
                                        <img src="{{ asset('images/' . $returnOrder->bukti) }}" style="width: 120px">
                                    </th>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>

                <div class="w-full overflow-hidden mt-4 ">
                    @if ($item->order->status == 'Menunggu Konfirmasi Penjual')
                        <form method="POST" action="{{ route('reports.updateCustom', ['id' => $item->order->id]) }}">
                            @csrf
                            {{ method_field('put') }}
                            <h2 class="font-semibold">Aksi : </h2>
                            <select name="action"
                                class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple ">
                                <option value="Pesanan Custom Diterima">Terima Pesanan</option>
                                <option value="Pesanan Custom Ditolak">Tolak Pesanan</option>
                            </select>
                            <div class="flex justify-end mr-4">
                                <button type="submit" id="confirmOrder"
                                    class="confirmOrder px-3 py-1 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Konfirmasi</button>
                            </div>
                        </form>
                    @elseif ($item->order->status == 'Proses Pengembalian')
                        <form method="POST" action="{{ route('reports.updateCustom', ['id' => $item->order->id]) }}">
                            @csrf
                            {{ method_field('put') }}
                            <h2 class="font-semibold">Aksi : </h2>
                            <select name="action"
                                class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple ">
                                <option value="Ajuan Pengembalian Diterima">Terima Ajuan Pengembalian</option>
                                <option value="Ajuan Pengembalian Ditolak">Tolak Ajuan Pengembalian</option>
                            </select>
                            <div class="flex justify-end mr-4">
                                <button type="submit" id="confirmOrder"
                                    class="confirmReturnOrder px-3 py-1 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Konfirmasi</button>
                            </div>
                        </form>
                    @endif
                </div>
            @else
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">

                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Gambar </th>
                                    <th class="px-4 py-3">Nama </th>
                                    <th class="px-4 py-3">Ukuran </th>
                                    <th class="px-4 py-3">Harga </th>
                                    <th class="px-4 py-3">Quantity</th>
                                    <th class="px-4 py-3">Motif </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <div class="py-4 px-4">
                                    <label class="text-sm flex flex-wrap">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Status Pesanan :
                                        </span><span
                                            class="px-2 py-1 ml-2 font-semibold text-sm leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-green-100">
                                            {{ $getOrderDetails->order->status }}
                                        </span>
                                    </label>
                                </div>
                                @foreach ($orderdetails as $item)
                                    <tr class="text-gray-700 dark:text-gray-400">

                                      
                                        <td class="px-4 py-3 text-sm">
                                            <img src="{{ asset('images/' . $item->product->gambar) }}"
                                                style="width: 120px">
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $item->product->nama }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $item->product->ukuran }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            @currency($item->product->harga)
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $item->product->motif->nama }}
                                        </td>
                                       
                                      
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table class="w-full text-left">
                            @if ($item->order->status == 'Proses Pengembalian')
                                <h2 class="font-semibold mb-2">Details pengembalian : </h2>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Alasan Pengembalian
                                        Pesanan </th>
                                    <th class="py-2 px-4 border border-gray-300 ">{{ $returnOrder->alasan }}</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Bukti Pengembalian
                                    </th>
                                    <th class="py-2 px-4 border border-gray-300 ">
                                        <img src="{{ asset('images/' . $returnOrder->bukti) }}" style="width: 120px">
                                    </th>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
                @if ($item->order->status == 'Sedang Diproses')
                    <form method="POST" action="{{ route('reports.update', ['id' => $item->order->id]) }}">
                        @csrf
                        {{ method_field('put') }}
                        <div class="flex justify-end mr-4 mt-4">
                            <button type="submit"
                                class="sendOrder px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Kirim Pesanan
                            </button>
                        </div>
                    </form>
                @elseif ($item->order->status == 'Proses Pengembalian')
                    <form method="POST" action="{{ route('reports.update-return', ['id' => $item->order->id]) }}">
                        @csrf
                        {{ method_field('put') }}
                        <input type="hidden" value="{{ $getOrderDetails->order->total }}" name="grandTotal">
                        <h2 class="font-semibold">Aksi : </h2>
                        <select name="action"
                            class="block w-full mt-1 text-sm form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple ">
                            <option value="Ajuan Pengembalian Diterima">Terima Ajuan Pengembalian</option>
                            <option value="Ajuan Pengembalian Ditolak">Tolak Ajuan Pengembalian</option>
                        </select>
                        <div class="flex justify-end mr-4">
                            <button type="submit" id="confirmOrder"
                                class="confirmReturnOrder px-3 py-1 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Konfirmasi</button>
                        </div>
                    </form>
                @endif
            @endif
        </div>
    </main>
@endsection
@section('script')
    <script type="text/javascript">
        $('.confirmOrder').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Konfirmasi Pesanan?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
        $('.confirmReturnOrder').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Konfirmasi Pengembalian Pesanan?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
        $('.sendCustomOrder').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Kirim Pesanan?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });

        $('.sendOrder').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Kirim Pesanan?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
        setTimeout(function() {
            $('#message').fadeOut('fast');
        }, 3000);
    </script>
@endsection

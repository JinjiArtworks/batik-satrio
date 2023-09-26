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
        <div class="container grid items-start gap-6 pt-4 pb-10">
            <div class="col-span-9 space-y-4">
                <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                    <div class="w-full">
                        @if ($detailStatus->order->status == 'Menunggu Konfirmasi Penjual')
                            <p class="text-gray-500 text-sm mb-2">Status Pesanan :
                                <span
                                    class="px-2 py-1 leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $detailStatus->order->status }}
                                </span>
                            </p>
                        @elseif ($detailStatus->order->status == 'Ajuan Pengembalian Diterima')
                            <form method="POST"
                                action="{{ route('history-order.sendReturnsBack', ['id' => $detailStatus->order->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <p class="text-gray-500 text-sm mb-2">Status Pesanan :
                                    <span
                                        class="px-2 py-1 leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $detailStatus->order->status }}
                                    </span>
                                    <button type="submit"
                                        class="sendItemBack ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Kirim Balik Pesanan
                                    </button>
                                </p>
                            </form>
                        @elseif ($detailStatus->order->status == 'Pesanan Dikirim')
                            <form method="POST"
                                action="{{ route('history-order.acceptOrder', ['id' => $detailStatus->order->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <p class="text-gray-500 text-sm mb-2">Status Pesanan :
                                    <span class="px-2 py-1 leading-tight text-green-700 bg-green-100 rounded-full ">
                                        {{ $detailStatus->order->status }}
                                    </span>
                                    <button type="submit"
                                        class="acceptOrder ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Terima Pesanan
                                    </button>
                                </p>
                            </form>
                        @elseif ($detailStatus->order->status == 'Pesanan Dikirim Balik Kepada Penjual')
                            <span
                                class="px-2 py-1 leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                {{ $detailStatus->order->status }} - Menunggu Dikonfirmasi
                            </span>
                        @elseif ($detailStatus->order->status == 'Pengembalian Diterima Penjual')
                            <span
                                class="px-2 py-1 leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                {{ $detailStatus->order->status }}
                            </span>
                        @else
                            <span
                                class="px-2 py-1 leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                {{ $detailStatus->order->status }}
                            </span>
                        @endif

                        @if ($detailStatus->order->status == 'Selesai')
                            <!-- Modal toggle -->
                            {{-- Updated_at dsini yaitu menentukan kapan pesanan tersebut diterima oleh penjual --}}
                            @if ($detailStatus->product_id != null)
                                @if ($detailStatus->order->updated_at == $mytime)
                                    <button data-modal-target="authentication-modal"
                                        data-modal-toggle="authentication-modal"
                                        class="ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 "
                                        type="button">
                                        Ajukan Pengembalian
                                    </button>
                                @endif
                            @endif

                            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="authentication-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="px-6 py-6 lg:px-8">
                                            <p class="font-semibold mb-4">Order Id : #{{ $detailStatus->order->id }}</p>
                                            <form method="POST"
                                                action="{{ route('history-order.returns', ['id' => $detailStatus->order->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $detailStatus->order->id }}"
                                                    name="order_id">
                                                <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="tanggal">
                                                <div>
                                                    <label for="pesanan"
                                                        class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Pesanan
                                                        yang dikembalikan :
                                                    </label>
                                                    @if ($detailStatus->product_id == null)
                                                        <img src="" id="imgPreview" alt="product 6"
                                                            class="w-40">
                                                    @else
                                                        <img src="{{ asset('images/' . $detailStatus->product->gambar) }}"
                                                            alt="product 6" class="w-40">
                                                    @endif
                                                </div>
                                                <div class="mt-4">
                                                    <label for="alasan"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alasan
                                                        Mengembalikan : </label>
                                                    <textarea type="text" name="alasan"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                                                </div>
                                                <div>
                                                    <label for="bukti"
                                                        class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Bukti
                                                        Mengembalikan :
                                                    </label>
                                                    <img src="{{ asset('images/no-profile.png') }}" id="blah"
                                                        width="150px" height="150px" class="mt-1 mb-2">
                                                    <input class=" fomt-sm mt-2" accept="image/*" id="image"
                                                        type="file" name="bukti" required>
                                                </div>
                                                <button type="submit"
                                                    class="confirmSendItem w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <h2 class="text-gray-800 text-xl font-medium">Penerima: {{ Auth::user()->name }}</h2>
                        <p class="text-gray-500 text-sm">Alamat : {{ Auth::user()->address }} </p>
                        <p class="text-gray-500 text-sm">Nomor Handphone : {{ Auth::user()->phone }}</p>
                    </div>
                </div>
            </div>
            @foreach ($details as $item)
                {{-- For Custom --}}
                @if ($item->product_id == null)
                    <div class="col-span-9 space-y-4">
                        <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                            <div class="w-28">
                                <img src="{{ asset('images/' . $item->request_result) }}" alt="product 6"
                                    class="w-full">
                            </div>
                            <h2 class="text-gray-800 text-xl font-medium ">Custom Batik
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
                                <th class="py-2 px-4 border border-gray-300 ">@currency($item->order->ongkos_kirim)
                                </th>
                            </tr>
                            @if ($item->request_result != null)
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Warna Dasar</th>
                                    <th class="py-2 px-4 border border-gray-300 ">{{ $item->request_warna }}</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Motif </th>
                                    <th class="py-2 px-4 border border-gray-300 ">{{ $item->request_motif }}</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Lengan</th>
                                    <th class="py-2 px-4 border border-gray-300 ">{{ $item->request_lengan }}</th>
                                </tr>
                            @endif
                            <tr>
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Model</th>
                                <th class="py-2 px-4 border border-gray-300 ">{{ $item->request_model }}</th>
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
                                <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Pre Order</th>
                                <th class="py-2 px-4 border border-gray-300 ">3 Hari</th>
                            </tr>
                        </table>
                    </div>
                @else
                    <div class="col-span-9 space-y-4">
                        <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                            <div class="w-28">
                                <img src="{{ asset('images/' . $item->product->gambar) }}" alt="product 6"
                                    class="w-full">
                            </div>
                            <h2 class="text-gray-800 text-xl font-medium ">{{ $item->product->nama }}
                                <p class="text-gray-500 text-sm">Status: <span
                                        class="text-green-600">{{ $item->order->status }}</span>
                                </p>
                            </h2>
                            <div class="text-gray-600 text-sm">x {{ $item->quantity }}</div>
                            @if ($item->harga_grosir == null)
                                @if ($item->diskon != null)
                                    <div class="text-gray-600 text-sm">@currency($item->harga)</div>
                                    <div class="text-gray-600 text-lg font-semibold">@currency($item->quantity * $item->harga)</div>
                                @else
                                    <div class="text-gray-600 text-sm">@currency($item->harga)</div>
                                    <div class="text-gray-600 text-lg font-semibold">@currency($item->quantity * $item->harga)</div>
                                @endif
                            @else
                                <div class="text-gray-600 text-sm">@currency($item->harga_grosir)</div>
                                <div class="text-gray-600 text-lg font-semibold">@currency($item->quantity * $item->harga_grosir)</div>
                            @endif
                        </div>
                        <div class="col-span-9 space-y-4">
                            <table class="table-auto border-collapse w-full text-left  text-sm">
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Ongkos Kirim</th>
                                    <th class="py-2 px-4 border border-gray-300 font-medium">@currency($item->order->ongkos_kirim)
                                    </th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Kategori</th>
                                    <th class="py-2 px-4 border border-gray-300 font-medium">
                                        {{ $item->product->categories->nama }}
                                    </th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Motif </th>
                                    <th class="py-2 px-4 border border-gray-300 font-medium">
                                        {{ $item->product->motif->nama }}</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Model</th>
                                    <th class="py-2 px-4 border border-gray-300 font-medium">
                                        {{ $item->product->model->nama }}</th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Teknik Pembuatan</th>
                                    <th class="py-2 px-4 border border-gray-300 font-medium">
                                        {{ $item->product->teknik->nama }}
                                        <span class="flex">- {{ $item->product->teknik->deskripsi }}</span>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Bahan</th>
                                    <th class="py-2 px-4 border border-gray-300 font-medium">
                                        {{ $item->product->bahan->nama }}
                                        <span class="flex">- {{ $item->product->bahan->deskripsi }}</span>
                                    </th>

                                </tr>
                                <tr>
                                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Ukuran </th>
                                    <th class="py-2 px-4 border border-gray-300 font-medium ">
                                        {{ $item->product->ukuran }}
                                    </th>
                                </tr>

                            </table>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        {{-- Review hanya untuk produk NON Custom! --}}
        {{-- {{ dd($item->product_id) }} --}}
        @if ($item->product_id != null)
            @if ($item->order->status == 'Selesai')
                {{-- Kalo belum ngirim review --}}
                <div class="container grid items-start ">
                    <div class="col-span-9 space-y-2">
                        <h3>Kirim Review</h3>
                        <form action="{{ route('history-order.review', ['id' => $item->product_id]) }}" method="POST">
                            @csrf

                            <div class="flex items-center space-x-1 mb-4">
                                <input type="radio" name="rating" value="1">
                                <input type="radio" name="rating" value="2">
                                <input type="radio" name="rating" value="3">
                                <input type="radio" name="rating" value="4">
                                <input type="radio" name="rating" value="5">
                            </div>
                            <textarea
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="comment" placeholder="Berikan Komentar Anda" required></textarea>
                            <div class="flex justify justify-end">
                                <button type="submit"
                                    class="bg-blue-600 border my-4  border-blue-600 text-white px-4 py-2 font-medium rounded  gap-2 hover:bg-transparent hover:text-blue-600 transition">
                                    Kirim Review
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        // Delete Cart
        $('.acceptOrder').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Terima Pesanan?',
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

        $('.sendItemBack').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Kirim Balik Pesanan?',
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
        $('.confirmSendItem').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Kirim Ajuan Pengembalian?',
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
        if (localStorage.getItem('recent-items')) {
            document.querySelector('#imgPreview').src = localStorage.getItem('recent-items');
        }
    </script>
    <script type="text/javascript">
        image.onchange = evt => {
            const [file] = image.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection

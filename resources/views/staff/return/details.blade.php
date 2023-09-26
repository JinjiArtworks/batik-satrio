@extends('layouts.stores')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class=" mt-4 mb-2 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Konfirmasi Pengembalian Pesanan
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
            {{-- tabel konfimrasi pengembalian --}}
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
                                        <img src="{{ asset('images/' . $item->product->gambar) }}" style="width: 120px">
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
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <h2 class="font-semibold mb-2 mt-4">Alasan pengembalian : </h2>
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
                        </tbody>
                        <form method="POST" action="{{ route('return.confirm', ['id' => $getOrderDetails->order_id]) }}"
                            enctype="multipart/form-data" id="submit_form">
                            <input type="hidden" name="json" id="json_callback">
                            @csrf
                        </form>
                    </table>
                    <div class="flex justify-end mt-4 mb-4">
                        <button id="pay-button"
                            class=" pay px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Konfirmasi Pesanan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.pay', function() {
                // alert('asdas');
                var payButton = document.getElementById('pay-button');
                payButton.addEventListener('click', function() {
                    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                    window.snap.pay('{{ $snap_token }}', {
                        onSuccess: function(result) {
                            /* You may add your own implementation here */
                            console.log(result);
                            send_response_to_form(result);
                        },
                        onPending: function(result) {
                            alert(
                                'Harap menyelesaikan pembayaran dalam waktu 24 Jam'
                            );
                        },
                        onError: function(result) {
                            alert('Pembayaran gagal.');

                        },
                        onClose: function() {
                            /* You may add your own implementation here */
                            alert('Batalkan pembayaran ? ');
                        }
                    })
                });

                function send_response_to_form(result) {
                    document.getElementById('json_callback').value = JSON.stringify(result);
                    $('#submit_form').submit();
                }
            });

        });
    </script>
@endsection

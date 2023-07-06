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
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Detail
                    Produk</a>
            </div>
        </li>
    </ol>
@endsection
@section('content')
    @php
        $total = 0;
        if ($cart != null) {
            foreach ($cart as $key => $value) {
                $total = $value['total_after_disc'] + $total;
            }
            $grandTotal = $total + $cekongkir;
        
            // echo $grandTotal;
        }
    @endphp
    <div class="max-w-screen-xl items-center justify-between mx-auto">
        <h2 class="text-xl font-semibold pl-4">Checkout </h2>
        <form method="POST" action="{{ route('checkout.store') }}" enctype="multipart/form-data" id="submit_form">
            @csrf
            <input type="hidden" name="json" id="json_callback">
            <input type="hidden" value="{{ Auth::user()->alamat }}" name="address">
            <input type="hidden" value="{{ $grandTotal }}" name="grandTotal">
            <input type="hidden" value="{{ $courierName }}" name="courierName">
            <input type="hidden" value="{{ $cekongkir }}" name="ongkir">
            <div class="container items-start pt-4 gap-6">
                <div class="col-span-8 border mb-8 border-gray-200 p-4 rounded">
                    <div class="space-y-4">
                        <div>
                            <label for="penerima" class="text-gray-600">Nama Penerima</label>
                            <input type="text" name="penerima" id="penerima" class="input-box">
                        </div>
                        <div>
                            <label for="phone" class="text-gray-600">Nomor Handphone Penerima</label>
                            <input type="number" name="phone" id="phone" class="input-box">
                        </div>
                    </div>
                </div>

            </div>
            <div class="grid grid-cols-12 container items-start gap-6">
                <div class="col-span-4 border border-gray-200 p-4 rounded">
                    <h4 class="text-gray-800 text-lg mb-2 font-medium">Detail Informasi</h4>
                    <hr class="border-gray-200 sm:mx-auto dark:border-gray-700 " />
                    <div class="mt-1 text-gray-800 font-medium py-3 ">
                        <p class="font-bold">Alamat Penerima : </p>
                        <span>
                            <p>{{ Auth::user()->alamat }}</p>
                        </span>
                    </div>
                </div>
                <div class="col-span-8 border border-gray-200 p-4 rounded">
                    <h4 class="text-gray-800 text-lg mb-2 font-medium">Detail Pesanan</h4>
                    <hr class=" border-gray-200 sm:mx-auto dark:border-gray-700 mb-4" />
                    @foreach ($cart as $key => $c)
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <img class="object-cover w-20 h-22" src="{{ asset('images/' . $c['image']) }}">
                                <div>
                                    <h5 class="text-gray-800 text-lg font-semibold">{{ $c['name'] }}</h5>
                                    <p class="text-sm text-gray-600">Size: {{ $c['size'] }}</p>
                                </div>
                                <p class="text-gray-600">
                                    x {{ $c['quantity'] }}
                                </p>
                                <p class="text-gray-800 font-medium">@currency($c['total_after_disc'])</p>
                            </div>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 ">
                            <p>Sub Total</p>
                            <p>@currency($total)</p>
                        </div>

                        <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 ">
                            <p>Biaya Pengiriman</p>
                            <p>@currency($cekongkir)</p>
                        </div>

                        <div class="flex justify-between text-gray-800 font-medium py-3 ">
                            <p class="font-bold">Total</p>
                            <p class="font-bold">@currency($grandTotal)</p>
                        </div>
                    @endforeach
                    <div class="flex items-center mb-4 mt-2">
                        <input type="checkbox" name="aggrement" id="aggrement"
                            class="text-primary focus:ring-0 rounded-sm cursor-pointer w-3 h-3" required>
                        <label for="aggrement" class="text-gray-600 ml-3 cursor-pointer text-sm">I agree to the <a
                                href="#" class="text-blue-600">terms & conditions</a></label>
                    </div>

                </div>
            </div>
        </form>
        <button id="pay-button"
            class="pay block w-full px-2 py-2 text-center bg-blue-600 border border-blue-600 text-white font-medium rounded gap-2 hover:bg-transparent hover:text-blue-600 transition">
            Checkout
        </button>
    </div>
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

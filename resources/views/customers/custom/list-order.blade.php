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
                    Pesanan Custom Batik</a>
            </div>
        </li>
    </ol>
@endsection
@section('content')
    @php
        $total = 0;
        $berat = 0;
        $totalBerat = 0;
        if ($list != null) {
            foreach ($list as $key => $value) {
                $total = $value['total_after_disc'] + $total;
                $berat = $value['weight'] * $value['quantity'];
                $totalBerat += $berat;
            }
        }
    @endphp
    @if ($list == null)
        <div class="wrap-iten-in-cart">
            <div class="container-fluid ">
                <div class="row">
                    <div class="card-body cart">
                        <div class="col-sm-12 empty-cart-cls text-center">
                            <h4><strong>Pesanan Custom Kosong</strong></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="max-w-screen-xl items-center justify-between mx-auto p-4">
            @if ($message = Session::get('success'))
                <div id="message"
                    class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium"> {{ $message }}</span>
                    </div>
                </div>
            @elseif ($message = Session::get('info'))
                <div id="message"
                    class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">{{ $message }}</span>
                    </div>
                </div>
            @endif
            <h2 class="text-xl font-semibold">Pesanan Custom Batik</h2>
            @foreach ($list as $key => $c)
                <ul class="flex flex-col divide-y divide-gray-700">
                    <li class="flex flex-col py-6 sm:flex-row sm:justify-between">
                        <div class="flex w-full space-x-2 sm:space-x-4">
                            <img class="flex-shrink-0 object-cover w-20 h-22 dark:border-transparent rounded outline-none sm:w-32 sm:h-32 dark:bg-gray-500"
                                src="{{ asset('images/' . $c['images']) }}">
                            <div class="flex flex-col justify-between w-full pb-4">
                                <div class="flex justify-between w-full pb-2 space-x-2">
                                    <div class="space-y-1">
                                        <h3 class="text-lg font-semibold leadi sm:pr-8"> Custom Batik {{ $c['motif'] }}
                                            @if ($c['id'] == 1)
                                                Wanita
                                            @else
                                                Pria
                                            @endif
                                        </h3>
                                        <p class="text-sm  dark:text-gray-400">Request Ukuran : {{ $c['size'] }}</p>
                                    </div>
                                    <div class="text-sm">
                                        <p class="font-semibold mb-2">Quantity </p>
                                        <p> {{ $c['quantity'] }} Pcs</p>
                                    </div>
                                    <div class="text-sm">
                                        <p class="font-semibold mb-2">Harga Satuan </p>
                                        <p> @currency($c['harga'])</p>
                                    </div>
                                    {{-- <div class="text-sm">
                                        <p class="font-semibold mb-2">Request Kain </p>
                                        <p> {{ $c['kain'] }}</p>
                                    </div>
                                    <div class="text-sm">
                                        <p class="font-semibold mb-2">Request Warna Dasar</p>
                                        <p> {{ $c['warna'] }} </p>
                                    </div> --}}
                                    <div class="text-sm">
                                        <p class="font-semibold mb-2">Total </p>
                                        <p> @currency($c['total_after_disc']) </p>
                                    </div>
                                    <div class="text-right">
                                        <form action="{{ route('custom.remove', ['id' => $c['id']]) }}" method="GET">
                                            <button type="submit"
                                                class="deleteList flex items-center px-2 py-1 pl-0 space-x-1 text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="w-4 h-4 fill-current">
                                                    <path
                                                        d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z">
                                                    </path>
                                                    <rect width="32" height="200" x="168" y="216">
                                                    </rect>
                                                    <rect width="32" height="200" x="240" y="216">
                                                    </rect>
                                                    <rect width="32" height="200" x="312" y="216">
                                                    </rect>
                                                    <path
                                                        d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            @endforeach
            <hr class=" border-gray-200 sm:mx-auto dark:border-gray-700" />

        </div>
        <form method="POST" action="{{ route('custom.checkout') }}" enctype="multipart/form-data">
            @csrf
            <div class="max-w-screen-xl items-center justify-between mx-auto">
                <div class="container items-start gap-6">
                    <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm mt-2 mb-6">
                        <tr>
                            <h4 class="text-gray-800 text-lg font-medium">Detail Pesanan</h4>
                        </tr>
                        <tr>
                            <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Gender</th>
                            <th class="py-2 px-4 border border-gray-300 ">
                                @if ($c['id'] == 1)
                                    <input type="hidden" name="gender" value="Wanita">Wanita
                                @else
                                    <input type="hidden" name="gender" value="Pria">Pria
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Warna Dasar</th>
                            <th class="py-2 px-4 border border-gray-300 ">{{ $c['warna'] }}</th>
                        </tr>
                        <tr>
                            <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Motif </th>
                            <th class="py-2 px-4 border border-gray-300 ">{{ $c['motif'] }}</th>
                        </tr>
                        <tr>
                            <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Model</th>
                            <th class="py-2 px-4 border border-gray-300 ">{{ $c['model'] }}</th>
                        </tr>
                        <tr>
                            <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Lengan</th>
                            <th class="py-2 px-4 border border-gray-300 ">{{ $c['lengan'] }}</th>
                        </tr>
                        <tr>
                            <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Kain</th>
                            <th class="py-2 px-4 border border-gray-300 ">{{ $c['kain'] }}</th>
                        </tr>
                        <tr>
                            <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Ukuran Detail</th>
                            <th class="py-2 px-4 border border-gray-300 ">{{ $c['size'] }}</th>
                        </tr>

                        <tr>
                            <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Weight</th>
                            <th class="py-2 px-4 border border-gray-300 ">{{ $totalBerat }} gram</th>
                        </tr>
                        <tr>
                            <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Pre Order</th>
                            <th class="py-2 px-4 border border-gray-300 ">3 Hari</th>
                        </tr>
                    </table>
                    <div class="col-span-12 border border-gray-200 p-4 rounded">
                        <h4 class="text-gray-800 text-lg mb-2 font-medium">Detail Pengiriman</h4>
                        <hr class="border-gray-200 sm:mx-auto dark:border-gray-700 " />
                        <div class="flex mt-4  text-gray-800 font-medium ">
                            <p class="font-bold ">Alamat Tujuan : </p>
                            <div class="items-center ml-2">
                                @if (Auth::user()->address && $usersProvince && $usersCity != null)
                                    <div class="items-center ml-2">
                                        <p>{{ Auth::user()->address }}, {{ $city[0]['name'] }},
                                            {{ $province[0]['name'] }}. </p>
                                    </div>
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        @if (Auth::user()->address && $usersProvince && $usersCity != null)
                            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                                class="underline text-blue-700" type="button">
                                Ubah
                            </button>
                        @else
                            <a href="/profile" class="underline text-blue-700" type="button">
                                Tambah Alamat
                            </a>
                        @endif
                        <div class="flex mt-4  text-gray-800 font-medium ">
                            <p class="font-bold ">Ekspedisi : </p>
                            <div class="items-center ml-2">
                                <select id="courier" name="courier"
                                    class="bg-gray-50  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($allEkspedisi as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <select id="service" name="service"
                                    class="bg-gray-50  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="OKE">OKE (4-5 Hari)</option>
                                    <option value="REG">REG (2-3 Hari)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-1 text-right mt-4">
                        <p>Total belanja:
                            <span class="font-semibold">@currency($total)</span>
                        </p>
                    </div>
                    <div class="flex justify-end space-x-4 mt-4">
                        {{-- <form action="POST"> --}}
                        <input type="hidden" value="{{ $totalBerat }}" name="weight">
                        <input type="hidden" value="{{ $total }}" name="total">
                        <input type="hidden" value="444" name="origin">
                        <input type="hidden" value="{{ Auth::user()->city_id }}" name="destination">
                        <input type="hidden" value="{{ Auth::user()->province_id }}" name="province">
                        @if (Auth::user()->address && $usersProvince && $usersCity != null)
                            <button type="submit"
                                class=" confirm bg-blue-600 border border-blue-600 text-white px-4 py-2 font-medium rounded flex items-center gap-2 hover:bg-transparent hover:text-blue-600 transition">
                                Checkout
                            </button>
                        @else
                            <button type="submit" disabled
                                class="confirm bg-blue-600 border border-blue-600 text-white px-4 py-2 font-medium rounded flex items-center gap-2 hover:bg-transparent hover:text-blue-600 transition">
                                Checkout
                            </button>
                        @endif
                    </div>
                </div>

            </div>
        </form>
        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        @if (Auth::user()->address && $usersProvince && $usersCity != null)
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ubah Alamat</h3>
                            <form method="POST" action="{{ route('cart.update', ['id' => Auth::user()->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for="address"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                    <input type="text" name="address" value="{{ Auth::user()->address }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label for="city"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Kota</label>
                                    <select id="" name="city"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        required>
                                        <option value="{{ $usersCity }}"> {{ $city[0]['name'] }}</option>
                                        @foreach ($allCities as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="province"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Province</label>
                                    <select id="" name="province"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        required>
                                        <option value="{{ $usersProvince }}"> {{ $province[0]['name'] }}</option>
                                        @foreach ($allProvince as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit"
                                    class="confirmAddress w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Submit
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
@section('script')
    <script>
        $('.confirm').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Checkout Produk?',
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
        $('.deleteList').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Hapus Pesanan?',
                icon: 'warning',
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
        $('.confirmAddress').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Konfirmasi Perubahan? ',
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

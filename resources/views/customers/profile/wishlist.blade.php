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
                    Wishlist</a>
            </div>
        </li>
    </ol>
@endsection
@section('content')
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
                <span class="sr-only">Success</span>
                <div>
                    <span class="font-medium"> {{ $message }}</span>
                </div>
            </div>
        @endif
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
                        <a href="/wishlist" class="relative text-blue-600 block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            My wishlist
                        </a>
                    </div>
                    @if (Auth::user()->role == 'Customers')
                        <div class="space-y-1 pl-8 pt-4">
                            <a href="/profile" class="relative hover:text-blue-600 block capitalize transition"
                                type="button">
                                <span class="absolute -left-8 top-0 text-base mt-1">
                                    <i class="fa-regular fa-user"></i>
                                </span>
                                Ubah Data Profile
                            </a>
                        </div>
                    @endif

                    <div class="space-y-1 pl-8 pt-4">
                        <a href="/history-order"
                            class="relative hover:text-blue-600 block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-solid fa-box-archive"></i>
                            </span>
                            Riwayat Pesanan
                        </a>
                    </div>
                    <div class="space-y-1 pl-8 pt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="relative hover:text-blue-600 block font-medium capitalize transition">
                                Log Out
                                <span class="absolute -left-8 top-0 text-base">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-span-9 space-y-4">
                @foreach ($getWishlist as $item)
                    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                        <div class="w-28">
                            <img src="{{ asset('images/' . $item->product->gambar) }}" alt="product 6" class="w-full">
                        </div>
                        <div class="w-1/3">
                            <h2 class="text-gray-800 text-xl font-medium ">{{ $item->product->nama }}</h2>
                            <p class="text-gray-500 text-sm">Stock: <span
                                    class="text-green-600">{{ $item->product->stok }}</span></p>
                        </div>
                        @if ($item->product->harga_grosir == null)
                            <div class="text-gray-600 text-lg font-semibold">@currency($item->product->harga)</div>
                        @else
                            <div class="text-gray-600 text-lg font-semibold">@currency($item->product->harga_grosir)</div>
                        @endif
                        <a href="/detail-product/{{ $item->product->id }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lihat
                            Produk</a>
                        <div class="text-gray-600 cursor-pointer hover:text-blue-600">
                            <form action="{{ route('wishlist.remove', ['id' => $item->product->id]) }}" method="GET">
                                <input type="hidden" name="products" value="{{ $item->product->id }}">
                                <button type="submit" class="deleteWish mt-4">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
        setTimeout(function() {
            $('#message').fadeOut('fast');
        }, 3000);

        // Delete Cart
        $('.deleteWish').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Hapus Produk Dari Wishlist?',
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
    </script>
@endsection

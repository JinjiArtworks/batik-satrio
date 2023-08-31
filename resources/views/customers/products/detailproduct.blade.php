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
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="container grid grid-cols-2 gap-6">
            <div>
                <img src="{{ asset('images/' . $products->gambar) }}" alt="product" class="w-full">
                {{-- <div class="grid grid-cols-5 gap-4 mt-4 rounded-r-lg">
                    <img src="../images/products/product2.jpg" alt="product2"
                        class="w-full cursor-pointer border border-primary">
                    <img src="../images/products/product3.jpg" alt="product2" class="w-full cursor-pointer border">
                    <img src="../images/products/product4.jpg" alt="product2" class="w-full cursor-pointer border">
                    <img src="../images/products/product5.jpg" alt="product2" class="w-full cursor-pointer border">
                    <img src="../images/products/product6.jpg" alt="product2" class="w-full cursor-pointer border">
                </div> --}}
            </div>


            <div>

                <div class="flex justify-between">
                    <h2 class="text-3xl font-semibold tracking-tight mb-2">{{ $products->nama }}</h2>
                    @if (Auth::check())
                        @if (Auth::user()->role == 'Customers')
                            {{-- @foreach ($wishlist as $w) --}}
                            {{-- @if ($w->products_id == $products->id) --}}
                            <form action="{{ route('products.wishlist', ['id' => $products->id]) }}" method="POST">
                                @csrf
                                {{-- @if ($wishlist[0]['products_id'] == $getIdProducts) --}}
                                <input type="hidden" name="products" value="{{ $products->id }}">
                                <button type="submit"
                                    class="addWishlist font-sm px-8 py-2 rounded  flex items-center gap-2 hover:text-blue-600 transition underline">
                                    Wishlist<i class="fa-solid fa-heart justify-between"></i>
                                </button>
                            </form>
                            {{-- @else
                                    asd
                                @endif --}}
                            {{-- @endforeach --}}
                        @endif
                    @endif
                </div>
                <hr class=" border-gray-200 sm:mx-auto dark:border-gray-700 mb-5" />
                <div class="space-y-2">
                    <p class="text-gray-800 font-semibold space-x-2">
                        <span>Stok: </span>
                        <span class="text-green-600">{{ $products->stok }} pcs</span>
                    </p>
                    <p class="space-x-2">
                        <span class="text-gray-800 font-semibold">Motif: </span>
                        <span class="text-gray-600">{{ $products->motif->nama }}</span>
                    </p>
                    @if ($products->minimal_order != null)
                        <p class="space-x-2">
                            <span class="text-gray-800 font-semibold">Minimal Order:</span>
                            <span class="text-gray-600">{{ $products->minimal_order }} pcs</span>
                        </p>
                    @endif

                    <p class="space-x-2">
                        <span class="text-gray-800 font-semibold">Kategori: </span>
                        <span class="text-gray-600">{{ $products->categories->nama }}</span>
                    </p>
                    <p class="space-x-2">
                        <span class="text-gray-800 font-semibold">Terjual: </span>
                        <span class="text-gray-600">{{ $products->terjual }} pcs</span>
                    </p>
                </div>
                <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                    @if ($products->harga_grosir == null)
                        <p class="text-xl text-green-600 font-semibold">@currency($products->harga - $products->diskon)</p>
                        @if ($products->diskon != null)
                            <p class="text-base text-gray-400 line-through">@currency($products->harga)</p>
                        @endif
                    @else
                        <p class="text-xl text-green-600 font-semibold">@currency($products->harga_grosir)</p>
                    @endif
                </div>
                <p class="mt-6 text-gray-800 font-semibold">Deskripsi: </p>
                <p class="text-gray-800">{{ $products->deskripsi }} </p>
                <form action="{{ route('cart.add', ['id' => $products->id]) }}" method="POST">
                    @csrf
                    <div class="pt-4">
                        <h3 class="text-sm text-gray-800 uppercase mb-1">Size</h3>
                        @if ($products->ukuran == 'All Size')
                            <div class="flex items-center gap-2">
                                <div class="size-selector">
                                    <input type="radio" name="size"  id="size-s" class="hidden"value="S"required>
                                    <label for="size-s"
                                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">S</label>
                                </div>
                                <div class="size-selector">
                                    <input type="radio" name="size" id="size-m"
                                        class="hidden"value="M"required>
                                    <label for="size-m"
                                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">M</label>
                                </div>
                                <div class="size-selector">
                                    <input type="radio" name="size" id="size-l" class="hidden"value="L"
                                        required>
                                    <label for="size-l"
                                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">L</label>
                                </div>
                                <div class="size-selector">
                                    <input type="radio" name="size" id="size-xl" class="hidden"
                                        value="XL"required>
                                    <label for="size-xl"
                                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XL</label>
                                </div>
                                <div class="size-selector">
                                    <input type="radio" name="size" id="size-xxl" class="hidden"
                                        value="XXL"required>
                                    <label for="size-xxl"
                                        class="text-xs border border-gray-200 rounded-sm h-6 w-8 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XXL</label>
                                </div>
                            </div>
                        @elseif ($products->ukuran == 'S')
                            <div class="flex items-center gap-2">
                                <div class="size-selector">
                                    <input type="radio" name="size" class="hidden"value="S"required>
                                    <label for="size-sm"
                                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">S</label>
                                </div>
                            </div>
                        @elseif ($products->ukuran == 'M')
                            <div class="flex items-center gap-2">
                                <div class="size-selector">
                                    <input type="radio" name="size" class="hidden"value="M"required>
                                    <label for="size-sm"
                                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">M</label>
                                </div>
                            </div>
                        @elseif ($products->ukuran == 'L')
                            <div class="flex items-center gap-2">
                                <div class="size-selector">
                                    <input type="radio" name="size" class="hidden"value="L"required>
                                    <label for="size-sm"
                                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">L</label>
                                </div>
                            </div>
                        @elseif ($products->ukuran == 'XL')
                            <div class="flex items-center gap-2">
                                <div class="size-selector">
                                    <input type="radio" name="size" class="hidden"value="XL"required>
                                    <label for="size-sm"
                                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XL</label>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($products->harga_grosir == null)
                        <div class="mt-4">
                            <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
                            <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                                <a
                                    class="btn btn-reduce h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                                    -</a>
                                <input class="count" type="number" name="quantity" value="1" data-max="120"
                                    pattern="[0-9]*" style="width: 5rem">
                                <a
                                    class="btn btn-increase h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                                    +</a>
                            </div>
                        </div>
                    @else
                        <div class="mt-4">
                            <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
                            <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                                <a
                                    class="btn btn-reduce h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                                    -</a>
                                <input class="count2" type="number" name="quantity" data-max="120" pattern="[0-9]*"
                                    style="width: 5rem" value="{{ $products->minimal_order }}">
                                <a
                                    class="btn btn-increase h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                                    +</a>
                            </div>
                        </div>
                    @endif

                    @if (Auth::check())
                        @if (Auth::user()->role == 'Customers')
                            <div class="mt-6 flex gap-3 border-gray-200 pb-5 pt-5">
                                <button type="submit"
                                    class="add-to-cart bg-blue-600 border border-blue-600 text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-blue-600 transition">
                                    <i class="fa-solid fa-bag-shopping"></i> Add to cart
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="mt-6 flex gap-3 border-gray-200 pb-5 pt-5">
                            <button type="submit" id=""
                                class="add-to-cart bg-blue-600 border border-blue-600 text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-blue-600 transition">
                                <i class="fa-solid fa-bag-shopping"></i> Add to cart
                            </button>

                        </div>
                    @endif
                </form>
            </div>
        </div>
        <div class="container pb-16 mt-4">
            <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-semibold font-xl uppercase">Product
                details</h3>
            <div class="w-full pt-6">
                <div class="text-gray-600">
                    <p>{{ $products->deskripsi }}</p>
                </div>

                <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm mt-6">
                    <tr>
                        <th class="py-2 px-4 border border-gray-300 w-40 ">Bahan</th>
                        <th class="py-2 px-4 border border-gray-300 font-medium">{{ $products->bahan->nama }}</th>
                    </tr>
                    <tr>
                        <th class="py-2 px-4 border border-gray-300 w-40 ">Teknik Pembuatan</th>
                        <th class="py-2 px-4 border border-gray-300 font-medium">{{ $products->teknik->nama }}
                            <span class="flex">{{ $products->teknik->deskripsi }}</span>
                        </th>
                    </tr>
                    <tr>
                        <th class="py-2 px-4 border border-gray-300 w-40 ">Berat</th>
                        <th class="py-2 px-4 border border-gray-300 font-medium">{{ $products->berat }} gram</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        // alert('test');
        $(document).ready(function() {
            $(document).on('click', '.btn-increase', function() {
                $('.count').val(parseInt($('.count').val()) + 1);
                // alert('asd');
                if ($('.count').val() > {{ $products->stok }}) {
                    $(':input[type="submit"]').prop('disabled', true);
                }
            });
            $(document).on('click', '.btn-reduce', function() {
                $('.count').val(parseInt($('.count').val()) - 1);
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
                if ($('.count').val() <= {{ $products->stok }}) {
                    $(':input[type="submit"]').prop('disabled', false);
                }
            });
            $(document).on('click', '.add-to-cart', function() {
                if ($('.count').val() > {{ $products->stok }}) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Stock Tidak Tersedia',
                        icon: 'error',
                    })
                }
            });
        });
    </script>

    {{-- Grosir --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.btn-increase', function() {
                $('.count2').val(parseInt($('.count2').val()) + {{ $products->minimal_order }});
                if ($('.count2').val() > {{ $products->stok }}) {
                    $(':input[type="submit"]').prop('disabled', true);
                }
            });
            $(document).on('click', '.btn-reduce', function() {
                $('.count2').val(parseInt($('.count2').val()) - {{ $products->minimal_order }});
                if ($('.count2').val() <= 0) {
                    $('.count2').val({{ $products->minimal_order }});
                    $(':input[type="submit"]').prop('disabled', true);
                }
                if ($('.count2').val() <= {{ $products->minimal_order }}) {
                    $(':input[type="submit"]').prop('disabled', false);

                }
                if ($('.count2').val() <= {{ $products->stok }}) {
                    $(':input[type="submit"]').prop('disabled', false);
                }
            });
            // btn

            $(document).on('click', '.add-to-cart', function() {
                if ($('.count2').val() > {{ $products->stok }}) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Stock Tidak Tersedia',
                        icon: 'error',
                    })
                }
                if ($('.count2').val() < {{ $products->minimal_order }}) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Minimum Order adalah {{ $products->minimal_order }} pcs',
                        icon: 'warning',
                    })
                }

            });
        });
    </script>
    <script>
        $('.addWishlist').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Masukkan Kedalam Wishlist?',
                icon: 'info',
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

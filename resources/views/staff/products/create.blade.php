@extends('layouts.stores')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Tambah Produk
            </h2>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form method="POST" action="/store-product" enctype="multipart/form-data">
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Nama Produk
                        </span>
                        <input
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            type="text" name="name" placeholder="Nama Produk" required />
                        {{-- <span class="text-xs text-gray-600 dark:text-gray-400">
                        Your password must be at least 6 characters long.
                    </span> --}}
                    </label>
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            Gambar Produk
                        </span>
                        <img src="{{ asset('images/no-profile.png') }}" id="blah" width="150px" height="150px"
                            class="mt-1 mb-2">
                        <input class="mt-2" accept="image/*" id="image" type="file" name="image"required>
                    </label>
                    <label class="block  mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Kategori
                        </span>
                        <select name="categories" required id="categories"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block text-sm mt-4" id="select_jenis">
                        <span class="text-gray-700 dark:text-gray-400">
                            Jenis Produk
                        </span>
                        <select required id="jenis"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="Normal">Normal</option>
                            <option value="Grosir">Grosir</option>
                        </select>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Motif
                        </span>
                        <select name="motif" required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach ($motif as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block mt-4 text-sm" id="select_model">
                        <span class="text-gray-700 dark:text-gray-400">
                            Model
                        </span>
                        <select name="model" required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach ($models as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Bahan
                        </span>
                        <select name="bahan" required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach ($bahan as $item)
                                @if ($item->stock_bahan != null)
                                    <option value="{{ $item->id }}">{{ $item->nama }} -> Stock :
                                        {{ $item->stock_bahan }} {{ $item->satuan }}</option>
                                @endif
                            @endforeach
                        </select>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Teknik Pembuatan
                        </span>
                        <select name="teknik" required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach ($teknik as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block text-sm mt-4" id="select_ukuran">
                        <span class="text-gray-700 dark:text-gray-400">
                            Ukuran
                        </span>
                        <select name="size"required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="All Size">All Size</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </label>

                    <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            Deskripsi
                        </span>
                        <textarea required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            type="text" name="description" placeholder="Deskripsi Produk"></textarea>
                    </label>
                    <label class="block text-sm mt-4" id="select_harga">
                        <span class="text-gray-700 dark:text-gray-400">
                            Harga
                        </span>
                        <input
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            type="number" name="price" placeholder="Harga Produk" />
                        <span class="text-xs text-gray-600 dark:text-gray-400" id="select_meter" style="display: none">
                            Masukkan harga / meter untuk kategori produk kain.
                        </span>
                    </label>
                    <label class="block text-sm mt-4" id="select_grosir">
                        <span class="text-gray-700 dark:text-gray-400">
                            Harga Grosirss
                        </span>
                        <input
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            type="number" name="price_grosir" placeholder="Harga Produk Grosir" />
                        <span class="text-xs text-gray-600 dark:text-gray-400">
                            Kosongkan jika tidak ada harga grosir.
                        </span>
                    </label>
                    {{-- <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            Harga Per Meter
                        </span>
                        <input 
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            type="number" name="price_meter" placeholder="Harga Produk Kain" />
                        <span class="text-xs text-gray-600 dark:text-gray-400">
                            Kosongkan jika tidak ada harga per meter.

                        </span>
                    </label> --}}
                    <label class="block text-sm mt-4" id="select_min">
                        <span class="text-gray-700 dark:text-gray-400">
                            Minimal Order
                        </span>
                        <input
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            type="number" name="minimal_order" placeholder="Minimal Order" />
                        <span class="text-xs text-gray-600 dark:text-gray-400">
                            Kosongkan jika tidak ada minimal order.
                        </span>
                    </label>
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            Stok
                        </span>
                        <input required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            type="number" name="stock" placeholder="Stok Produk" />
                    </label>
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            Diskon
                        </span>
                        <input
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            type="number" name="discount" placeholder="Diskon Produk" />
                        <span class="text-xs text-gray-600 dark:text-gray-400">
                            Kosongkan jika tidak ada diskon.
                        </span>
                    </label>
                    <button type="submit"
                        class="px-3 py-1 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Submit
                    </button>
                </form>
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
        $("#categories").change(function() {
            var control = $(this);
            if (control.val() == "1") { // jika produk kategori baju
                $("#select_grosir").show();
                $("#select_ukuran").show();
                $("#select_model").show();
                $("#select_min").show(); // min order
                $("#select_meter").hide();
                $("#select_jenis").show();
            } else if (control.val() == '2') { // jika produk kategori kain
                $("#select_grosir").hide();
                $("#select_ukuran").hide();
                $("#select_model").hide();
                $("#select_min").hide();
                $("#select_jenis").hide();
            }
        });
        $("#jenis").change(function() {
            var control = $(this);
            if (control.val() == "Normal") { // jika produk kategori baju
                $("#select_grosir").hide();
                $("#select_harga").show();
                $("#select_min").hide(); // min order
            } else if (control.val() == 'Grosir') { // jika produk kategori kain
                $("#select_grosir").show();
                $("#select_harga").hide();
                $("#select_min").show();
            }
        });
    </script>
@endsection

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
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Custom
                    Batik</a>
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
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Custom
                    Batik {{ $gender }}</a>
            </div>
        </li>
    </ol>
@endsection
@section('content')
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 border-b">
        <p>Proses pemesanan custom batik akan dikerjakan dalam waktu 3 hari. Silahkan mengisikan formulir berikut ini.</p>
    </div>
    {{-- <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 border-b">
        <div class="gallery border-2 rounded mx-auto m-5 bg-white" style="width:1250px;">
            <div class="top flex p-2 border-b select-none">
                <div class="heading text-gray-800 w-full pl-3 font-semibold my-auto"></div>
                <div class="buttons ml-auto flex text-gray-600 mr-1">
                    <svg action="prev" class="w-7 border-2 rounded-l-lg p-1 cursor-pointer border-r-0"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path action="prev" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <svg action="next" class="w-7 border-2 rounded-r-lg p-1 cursor-pointer"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path action="next" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </div>
            </div>
            <div class="content-area w-full h-96 overflow-hidden">
                <div class="platform shadow-xl h-full flex">
                    @foreach ($previews as $item)
                        <div class="each-frame border-box flex-none h-full" title="Pilihan Custom Batik">
                            <div class="main flex w-full p-8">
                                <div class="sub w-4/6 my-auto">
                                    <img class=" w-96 p-8" src="{{ asset('images/' . $item->gambar) }}" alt="">
                                </div>
                                <div class="sub w-full my-auto">
                                    <div class="head text-3xl font-bold mb-4">{{ $item->nama }}</div>
                                    <div class="long-text text-lg">{{ $item->deskripsi }}</div>
                                    <!-- this buttons are usable everywhere inside gallery element -->
                                    <div class="goto border border-gray-400 text-sm font-semibold inline-block mt-2 p-1 px-2 rounded cursor-pointer"
                                        action="goto" goto="2">Goto Third Frame</div>
                                    <!-- add (action="goto" goto="[val]{0 means first frame and so on}") attribute to jump into frames -->
                                    <div class="goto border border-gray-400 text-sm font-semibold inline-block mt-2 p-1 px-2 rounded cursor-pointer"
                                        action="goto" goto="end">Goto Last Frame</div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div> --}}
    <form method="POST" action="{{ route('custom.checkResults', ['id' => $gender_id]) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="gender" value="{{ $gender }}">
        <input type="hidden" name="gender_id" value="{{ $gender_id }}">
        {{-- begitu hasil sudah di dapatkan, return redirect back ke halaman ini, dan kirimkan data kehalaman itu sendiri --}}
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <h3 class=" font-semibold text-gray-900 mt-4">Pilih Warna Batik</h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <div class="flex items-center mb-4">
                        <select name="warna" id="warna_select"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required>
                            <option value="">-- Pilih Warna Batik --</option>
                            @foreach ($colors as $item)
                                <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ($colors as $item)
                        <div id="warna{{ $item->nama }}" class="img_1">
                            <img src="{{ asset('images/' . $item->gambar) }}"
                                class="w-48" /><span>{{ $item->nama }}</span>
                        </div>
                    @endforeach
                </li>
            </ul>
            <h3 class=" font-semibold text-gray-900">Pilih Motif Batik</h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <div class="flex items-center mb-4">
                        <select name="motif" id="motif_select"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required>
                            <option value="">-- Pilih Motif Batik --</option>
                            @foreach ($motif as $item)
                                <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ($motif as $item)
                        <div id="motif{{ $item->nama }}" class="img_2">
                            <img src="{{ asset('images/' . $item->gambar) }}"
                                class="w-48" /><span>{{ $item->nama }}</span>
                        </div>
                    @endforeach
                </li>
            </ul>
            <button type="submit"
                class="bg-blue-600 border border-blue-600 text-white px-4 py-2 font-medium rounded  gap-2 hover:bg-transparent hover:text-blue-600 transition">
                Selanjutnya
            </button>
{{-- 
            <h3 class=" font-semibold text-gray-900">Hasil : </h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900 rounded-lg sm:flex ">
                <li class="w-full">
                    @foreach ($motif as $item)
                        <div id="motif{{ $item->nama }}" class="img_2">
                            <img src="{{ asset('images/' . $item->gambar) }}"
                                class="w-48" /><span>{{ $item->nama }}</span>
                        </div>
                    @endforeach
                </li>
            </ul> --}}
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#warna_select').on('change', function() {
                var val = $(this).val();
                $("div.img_1").hide();
                $("#warna" + val).show();
            });
            $('#motif_select').on('change', function() {
                var vals = $(this).val();
                $("div.img_2").hide();
                $("#motif" + vals).show();
            });
            $('#check_hasil').on('click', function() {
                var demovalue = $(this).val();
                $("#radios").show();
                $("div.img_3").show();
            });
        });
    </script>

    <script>
        function gallery() {
            this.index = 0;
            this.load = function() {
                this.rootEl = document.querySelector(".gallery");
                this.platform = this.rootEl.querySelector(".platform");
                this.frames = this.platform.querySelectorAll(".each-frame");
                this.contentArea = this.rootEl.querySelector(".content-area");
                this.width = parseInt(this.rootEl.style.width);
                this.limit = {
                    start: 0,
                    end: this.frames.length - 1
                };
                this.frames.forEach(each => {
                    each.style.width = this.width + "px";
                });
                this.goto(this.index);
            }
            this.set_title = function() {
                this.rootEl.querySelector(".heading").innerText = this.frames[this.index].getAttribute("title");
            }
            this.next = function() {
                this.platform.style.right = this.width * ++this.index + "px";
                this.set_title();
            }
            this.prev = function() {
                this.platform.style.right = this.width * --this.index + "px";
                this.set_title();
            }
            this.goto = function(index) {
                this.platform.style.right = this.width * index + "px";
                this.index = index;
                this.set_title();
            }
            this.load();
        }
        var G = new gallery();
        G.rootEl.addEventListener("click", function(t) {
            var val = t.target.getAttribute("action");
            if (val == "next" && G.index != G.limit.end) {
                G.next();
            }
            if (val == "prev" && G.index != G.limit.start) {
                G.prev();
            }
            if (val == "goto") {
                let rv = t.target.getAttribute("goto");
                rv = rv == "end" ? G.limit.end : rv;
                G.goto(parseInt(rv));
            }
        });
        document.addEventListener("keyup", function(t) {
            var val = t.keyCode;
            if (val == 39 && G.index != G.limit.end) {
                G.next();
            }
            if (val == 37 && G.index != G.limit.start) {
                G.prev();
            }
        });
    </script>
@endsection

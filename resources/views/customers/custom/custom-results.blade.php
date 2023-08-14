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
    <form method="POST" action="{{ route('custom.details', ['id' => $gender_id]) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="gender" value="{{ $gender }}">
        <input type="hidden" name="gender_id" value="{{ $gender_id }}">
        {{-- begitu hasil sudah di dapatkan, return redirect back ke halaman ini, dan kirimkan data kehalaman itu sendiri --}}
        <div class="max-w-screen-xl flex justify-between items-center mx-auto p-4">
            <ul class=" text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <input type="hidden" value="{{ $colors->nama }}" name="warna_select">
                    <div>
                        <img src="{{ asset('images/' . $colors->gambar) }}" class="w-60" />
                        <span>
                            <h3 class=" font-semibold text-gray-900 mt-4">Warna {{ $colors->nama }}</h3>
                        </span>
                    </div>
                </li>
            </ul>
            <h3 class=" font-semibold text-gray-900">+ </h3>
            <ul class=" text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    <input type="hidden" value="{{ $motif->nama }}" name="motif_select">
                    <img src="{{ asset('images/' . $motif->gambar) }}" class="w-60" /> <span>
                        <h3 class=" font-semibold text-gray-900 mt-4">Motif {{ $motif->nama }}</h3>
                    </span>
                </li>
            </ul>
            <h3 class=" font-semibold text-gray-900">= </h3>
            <ul class=" text-sm font-medium text-gray-900  rounded-lg sm:flex ">
                <li class="w-full">
                    @foreach ($results as $item)
                        @if ($motif->nama == $item->motif && $colors->nama == $item->warna)
                            <img src="{{ asset('images/' . $item->results_images) }}"
                                class="w-60" /><span>{{ $item->results_name }}</span>
                        @endif
                        <input type="hidden" value="{{ $item->results_name }}" name="motif_select">
                    @endforeach
                </li>
            </ul>
            {{-- 
            <h3 class=" font-semibold text-gray-900">Hasil : </h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900 rounded-lg sm:flex ">
                <li class="w-full">
                    @foreach ($motif as $item)
                        <div id="motif{{ $motif->nama }}" class="img_2">
                            <img src="{{ asset('images/' . $item->gambar) }}"
                                class="w-48" /><span>{{ $item->nama }}</span>
                        </div>
                    @endforeach
                </li>
            </ul> --}}
        </div>
        <div class="max-w-screen-xl flex justify-between items-center mx-auto p-4">
            <button type="submit"
                class="check_results bg-blue-600 border border-blue-600 text-white px-4 py-2 font-medium rounded  gap-2 hover:bg-transparent hover:text-blue-600 transition">
                Konfirmasi
            </button>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#check_results').on('change', function() {
                var vals = $(this).val();
                $("div.img_2").hide();
                $("#`motif" + vals + '`').show();
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

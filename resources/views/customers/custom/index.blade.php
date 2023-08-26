@extends('layouts.customer')
<style>
    .input-hidden {
        /* For Hiding Radio Button Circles */
        position: absolute;
        left: -9999px;
    }

    /* input[type="radio"]:checked+label>img {
        border: 1px solid rgb(157, 255, 0);
        box-shadow: 0 0 3px 3px #e65b0b;
    }

    input[type="radio"]+label>img {
        transition: 500ms all;
        border-style: solid;
    }

    input[type="radio"]:checked+label {
        border: 1px solid rgb(157, 255, 0);
        box-shadow: 0 0 3px 3px #e65b0b;
    }

    input[type="radio"]+label {
        transition: 500ms all;
        border-style: solid;
    } */

    /*
** Author : Chafik Amraoui
** Date   : 14/09/2020
** Title  : T-shirt Color Generator
*/

    :root {
        --color: rgb(255, 255, 255);
    }

    /* Global Rules  */
    *,
    *::after,
    *::before {
        box-sizing: border-box
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        position: relative;
        height: 2000px;
        background-color: rgb(255, 255, 255);
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    /* End Global Rules  */
    .container {
        width: 90%;
        margin: auto;
        display: flex;
        flex-direction: column;
    }

    .image_container {
        width: 100%;
        height: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .image_container img {
        width: 400px;
        display: block;
        background-color: var(--color);
        background-image: var(--bg-image);
        content: var(--bg-lengan);
    }

    .colors {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100px;
    }

    .colors ul li {
        width: 30px;
        height: 30px;
        display: inline-block;
        cursor: pointer;

    }

    /* input[type="radio"]:checked+label>img {
        transform: rotateZ(-10deg) rotateX(10deg);
    } */
</style>
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
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 border-b">
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
    </div>
    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6 mt-4">
        <div class="image_container">
            <img id="results-img" src="{{ asset('images/bajus.png') }}" alt="">
        </div>
        <form method="POST" action="{{ route('custom.details') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-2">

                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Tipe Pakaian: </span>
                    <span class="text-gray-600">
                        <div class="flex items-center gap-2">
                                @foreach ($getTipe as $tipes)
                                    <div class="color-selector">
                                        <input type="radio" name="tipe" value="{{ $tipes->nama }}"
                                            id="{{ $tipes->nama }}" class="hidden">
                                        <label for="{{ $tipes->nama }}" id="lengan"
                                            class="border border-gray-200 rounded-sm w-24  cursor-pointer shadow-sm block"
                                            data-lengan="url('images/{{ $tipes->gambar }}')">
                                            <img src="{{ asset('images/' . $tipes->gambar) }}" alt="">
                                        </label>
                                    </div>
                                @endforeach
                        </div>
                    </span>
                </p>
                {{-- <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Pilih Warna: </span>
                    <span class="text-gray-600">
                        <div class="flex items-center gap-2">
                            @foreach ($getColors as $colors)
                                <div class="color-selector">
                                    <input type="radio" name="warna" value="{{ $colors->nama }}"
                                        id="{{ $colors->nama }}" class="hidden">
                                    <label for="{{ $colors->nama }}" id="colors"
                                        class="border border-gray-200 rounded-sm h-20 w-20 cursor-pointer shadow-sm block"
                                        data-color="{{ $colors->hexacode }}"
                                        style="background-color: {{ $colors->hexacode }}">
                                    </label>
                                    <p class="my-2 flex justify-center text-sm">{{ $colors->nama }}</p>
                                </div>
                            @endforeach
                        </div>
                    </span>
                </p> --}}
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Motif: </span>
                    <span class="text-gray-600">
                        <div class="flex items-center gap-2">
                            @foreach ($getMotifs as $motifs)
                                <div class="color-selector">
                                    <input type="radio" name="motif" value="{{ $motifs->nama }}"
                                        id="{{ $motifs->nama }}" class="hidden">
                                    <label for="{{ $motifs->nama }}" id="motif"
                                        class="border border-gray-200 rounded-sm w-32 cursor-pointer shadow-sm block"
                                        data-motif="url('images/{{ $motifs->gambar }}')">
                                        <img src="{{ asset('images/' . $motifs->gambar) }}">
                                    </label>
                                    <p class="my-2 flex justify-center text-sm">{{ $motifs->nama }}</p>
                                </div>
                            @endforeach
                        </div>
                    </span>
                </p>
                <button type="submit"
                    class="bg-blue-600 border border-blue-600 text-white px-4 py-2 font-medium rounded  gap-2 hover:bg-transparent hover:text-blue-600 transition">
                    Konfirmasi
                </button>
            </div>
        </form>
        <button id="btn">Show Selected Value</button>
        <p id="output"></p>
    </div>
@endsection
@section('script')
    <script>
        // $('input[name="motif"]:radio').click(function() {
        //     switch ($(this).val()) {
        //         case "{{ $getMotifs[0]['nama'] }}":
        //             $("#results-img").attr("src", "images/" + "{{ $getMotifs[0]['gambar'] }}");
        //             break;
        //         case "{{ $motifs->nama }}":
        //             $("#results-img").attr("src", "images/" + "{{ $motifs->gambar }}");
        //             break;
        //     }
        // });

        const btn = document.querySelector('#btn');
        const radioButtonsWarna = document.querySelectorAll('input[name="warna"]');
        const radioButtonsMotifs = document.querySelectorAll('input[name="motif"]');

        // let listColors = document.querySelectorAll('#colors');
        let listMotif = document.querySelectorAll('#motif');
        let listLengans = document.querySelectorAll('#lengan');
        // listColors.forEach(element => {
        //     element.addEventListener('click', function() {
        //         let clr = this.getAttribute('data-color');
        //         document.documentElement.style.setProperty('--color', clr);
        //     })
        // });
        listMotif.forEach(element => {
            element.addEventListener('click', function() {
                let motif = this.getAttribute('data-motif');
                document.documentElement.style.setProperty('--bg-image', motif);
            });
        });
        listLengans.forEach(element => {
            element.addEventListener('click', function() {
                let lengan = this.getAttribute('data-lengan');
                alert(lengan);
                document.documentElement.style.setProperty('--bg-lengan', lengan);
            });
        });
        // btn.addEventListener("click", () => {
        //     let selectedWarna;
        //     let selectedMotif;

        //     for (const radioButton of radioButtonsWarna) {
        //         if (radioButton.checked) {
        //             selectedWarna = radioButton.value;
        //             break;
        //         }
        //     }
        //     for (const radioButton of radioButtonsMotifs) {
        //         if (radioButton.checked) {
        //             selectedMotif = radioButton.value;
        //             break;
        //         }
        //     }
        //     if (selectedWarna == 'Merah' && selectedMotif == 'Mega Mendung') {
        //         output.innerHTML = "<img src=\"images/no-profile.png\" width=\"400px\" height=\"150px\">";
        //     }
        //     // show the output:
        //     // output.innerText = selectedWarna ? `You selected ${selectedWarna} and ${selectedMotif}` : `You haven't selected any size`;
        //     //
        // });
    </script>
    {{-- for carousel --}}
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

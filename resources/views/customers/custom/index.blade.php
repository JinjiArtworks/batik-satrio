@extends('layouts.customer')
<style>
    .input-hidden {
        /* For Hiding Radio Button Circles */
        position: absolute;
        left: -9999px;
    }

    :root {
        --color: rgb(255, 255, 255);
    }

    /* Global Rules  */
    *,
    *::after,
    *::before {
        box-sizing: border-box
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
        /* background-color: var(--color); */
        background-image: var(--bg-image);
        content: var(--bg-lengan);
    }
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
                        clip-rule="evenodd">
                    </path>
                </svg>
                <a href="#"
                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                    Custom Batik
                </a>
            </div>
        </li>
    </ol>
@endsection
@section('content')
    <div class="max-w-screen-xl flex-wrap items-center justify-between mx-auto p-4">
        <div class="container grid grid-cols-2 gap-6 mt-4">
            <div class="image_container">
                <img id="results-img" src="{{ asset('images/bajus.png') }}" alt="">
            </div>
            <form method="POST" action="{{ route('custom.details') }}" enctype="multipart/form-data">
                @csrf
                <div class="space-y-2">
                    <div class="space-y-2">
                        <p class="space-x-2">
                            <span class="text-gray-800 font-semibold">Pilih Metode Custom: </span>
                            <span class="text-gray-600">
                                <div class="flex items-center gap-2">
                                    <select name="metode" id="order-method" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 ">
                                        <option value="Upload"> Upload File</option>
                                        <option value="Custom"> Custom Manual</option>
                                    </select>
                                </div>
                            </span>
                        </p>
                    </div>
                    <div class="space-y-2" id="upload-method">
                        <p class="space-x-2">
                            <span class="text-gray-800 font-semibold">Upload File </span>
                            <span class="text-gray-600">
                                <img src="{{ asset('images/no-profile.png') }}" id="blah" width="200px" height="200px"
                                    class="mt-1 mb-2">
                                {{-- <input accept="image/*" id="input_image" type="file"
                                name="upload_custom"required> --}}
                                <input id="myFileInput" type="file" name="images">
                            </span>
                        </p>
                    </div>
                    <div class="space-y-2" id="custom-method" style="display: none">
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
                    </div>
                    @if (Auth::user()->role == 'Customers')
                        <button type="submit"
                            class="bg-blue-600 border border-blue-600 text-white px-4 py-2 font-medium rounded  gap-2 hover:bg-transparent hover:text-blue-600 transition">
                            Konfirmasi
                        </button>
                    @endif

                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        myFileInput.onchange = evt => {
            const [file] = myFileInput.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
        // access local storage
        function getBase64(file) {
            return new Promise((resolve, reject) => {
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    resolve(reader.result)
                };
                reader.onerror = reject
            })
        }
        document.querySelector('#myFileInput').addEventListener('change', async (e) => {
            // console.log(e.target.files);
            const data = await getBase64(e.target.files[0])
            localStorage.setItem('recent-items', data)
        });
    </script>
    <script>
        $("#order-method").change(function() {
            var control = $(this);
            if (control.val() == "Upload") {
                $("#upload-method").show();
                $("#custom-method").hide();
            } else if (control.val() == 'Custom') {
                $("#upload-method").hide();
                $("#custom-method").show();
            }
        });
        let listMotif = document.querySelectorAll('#motif');
        let listLengans = document.querySelectorAll('#lengan');

        listMotif.forEach(element => {
            element.addEventListener('click', function() {
                let motif = this.getAttribute('data-motif');
                document.documentElement.style.setProperty('--bg-image', motif);
            });
        });
        listLengans.forEach(element => {
            element.addEventListener('click', function() {
                let lengan = this.getAttribute('data-lengan');
                document.documentElement.style.setProperty('--bg-lengan', lengan);
            });
        });
    </script>
@endsection

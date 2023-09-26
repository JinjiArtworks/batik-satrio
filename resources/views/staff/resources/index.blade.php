@extends('layouts.stores')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Tambah Resources
            </h2>
            <!-- Cards -->
            <div class="flex justify-between">
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-models">
                        <img class="p-6" src="{{ asset('images/adds.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Model Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-motif">
                        <img class="p-6" src="{{ asset('images/adds.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Motif Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-bahan">
                        <img class="p-6" src="{{ asset('images/adds.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Bahan Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-teknik">
                        <img class="p-6" src="{{ asset('images/adds.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Teknik Batik</h5>
                    </div>
                </div>
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-warna">
                        <img class="p-6" src="{{ asset('images/adds.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Warna Batik</h5>
                    </div>
                </div>
                
            </div>
            <div class="flex">
                <div
                    class="mr-4 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 w-56">
                    <a href="/add-results">
                        <img class="p-6" src="{{ asset('images/adds.png') }}" alt="product image" />
                    </a>
                    <div class="flex justify-center ">
                        <h5 class="font-semibold text-gray-900 dark:text-white">Hasil Custom Batik</h5>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

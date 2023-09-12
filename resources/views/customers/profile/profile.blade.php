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
                        <a href="/wishlist" class="relative hover:text-blue-600 block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            My wishlist
                        </a>
                    </div>
                    @if (Auth::user()->role == 'Customers')
                        <div class="space-y-1 pl-8 pt-4">
                            <a href="/profile" class="relative text-blue-600 block capitalize transition" type="button">
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
            <!-- ./sidebar -->

            <!-- wishlist -->

            <div class="col-span-9">
                <form method="POST" action="{{ route('profile.update', ['id' => Auth::user()->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <h3 class=" flex font-semibold text-gray-900">Username </h3>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">


                    <h3 class=" flex font-semibold text-gray-900 mt-4">Email </h3>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">


                    <h3 class=" flex font-semibold text-gray-900 mt-4">Alamat </h3>
                    <input type="text" name="address" value="{{ Auth::user()->address }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <h3 class=" flex font-semibold text-gray-900 mt-4">Kota </h3>
                    <select id="" name="city"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                        @if (Auth::user()->address && $usersProvince && $usersCity != null)
                            <option value="{{ $usersCity }}"> {{ $city[0]['name'] }}</option>
                            @foreach ($allCities as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @else
                            @foreach ($allCities as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <h3 class=" flex font-semibold text-gray-900 mt-4">Provinsi </h3>
                    <select id="" name="province"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                        @if (Auth::user()->address && $usersProvince && $usersCity != null)
                            <option value="{{ $usersProvince }}"> {{ $province[0]['name'] }}</option>
                            @foreach ($allProvince as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @else
                            @foreach ($allProvince as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    {{-- <input type="text" name="address" value=""
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"> --}}

                    <h3 class=" flex font-semibold text-gray-900 mt-4">Nomor Handphone </h3>
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <button type="submit"
                        class=" bg-blue-600 border my-4 border-blue-600 text-white px-4 py-2 font-medium rounded  gap-2 hover:bg-transparent hover:text-blue-600 transition">
                        Submit
                    </button>
                </form>

            </div>
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
    </script>
@endsection

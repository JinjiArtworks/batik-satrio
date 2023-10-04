@extends('layouts.stores')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Ubah Models
            </h2>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form method="POST" action="{{ route('resources.update-model', ['id' => $models->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Nama Model
                        </span>
                        <input name="name" value="{{ $models->nama }}"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                    </label>
                    <button type="submit"
                        class="confirmEditModel px-3 py-1 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Submit
                    </button>
                </form>
            </div>

        </div>

    </main>
@endsection
@section('script')
    <script>
        $('.confirmEditModel').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Konfirmasi Ubah Data?',
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

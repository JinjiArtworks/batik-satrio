@extends('layouts.stores')

@section('content')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Ubah results Pembuatan
            </h2>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form method="POST" action="{{ route('resources.update-results', ['id' => $results->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Nama results Pembuatan
                        </span>
                        <input name="tipe" value="{{ $results->tipe }}"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Deskripsi results Pembuatan
                        </span>
                        <textarea name="motif"
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">{{ $results->motif }}</textarea>
                    </label>
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">
                            Gambar
                        </span>
                        <img src="{{ asset('images/' . $results->results_images) }}" id="blah" width="150px"
                            height="150px" class="mt-1 mb-2">
                        <input class="mt-2" accept="image/*" id="image" type="file" name="image"required>
                    </label>    
                    <button type="submit"
                        class="confirmEdit px-3 py-1 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
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
    </script>
      <script>
        $('.confirmEdit').click(function(event) {
            event.preventDefault();
            var form = $(this).closest("form");
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

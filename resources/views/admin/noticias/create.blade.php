<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva Noticia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-gray-600 mb-6">Completá los datos para crear una nueva noticia.</p>

                    <form method="POST" action="{{ route('admin.noticias.store') }}" enctype="multipart/form-data">
                        @csrf

                        @include('admin.noticias.form')

                        <div class="flex justify-end space-x-3 pt-6">
                            <a href="{{ route('admin.noticias.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Cancelar</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Crear Noticia
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#contenido',
            height: 500,
            menubar: true,
            license_key: 'gpl',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image media link | code | help',
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 14px; line-height: 1.6; }',
            language: 'es',
            branding: false,
            promotion: false,
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            images_upload_handler: function (blobInfo, success, failure) {
                let formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                formData.append('_token', '{{ csrf_token() }}');

                fetch('{{ route("admin.noticias.upload-image") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(result => {
                    if (result.location) {
                        success(result.location);
                    } else {
                        failure('Error al subir la imagen');
                    }
                })
                .catch(() => {
                    failure('Error al subir la imagen');
                });
            }
        });
    </script>
    @endpush
</x-app-layout>

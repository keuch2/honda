@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Editar Noticia</h1>
                <p class="text-sm text-gray-500">Modificá los datos de la noticia.</p>
            </div>

            @if(session('status'))
                <div class="mb-6 rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L8.293 12l-2 2a1 1 0 101.414 1.414L9 13.414l2.293 2.293a1 1 0 001.414-1.414l-2-2 3-3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.noticias.update', $noticia) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')
                    @include('admin.noticias.form')

                    <div class="flex items-center justify-between pt-4 border-t">
                        <a href="{{ route('admin.noticias.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                            ← Volver al listado
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

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

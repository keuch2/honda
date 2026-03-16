<div class="space-y-6">
    <!-- Título -->
    <div>
        <label for="titulo" class="block text-sm font-medium text-gray-700">Título *</label>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $noticia->titulo) }}" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('titulo') border-red-500 @enderror">
        @error('titulo')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Slug -->
    <div>
        <label for="slug" class="block text-sm font-medium text-gray-700">Slug (URL amigable)</label>
        <input type="text" name="slug" id="slug" value="{{ old('slug', $noticia->slug) }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('slug') border-red-500 @enderror"
               placeholder="Se genera automáticamente del título">
        <p class="mt-1 text-xs text-gray-500">Dejá en blanco para generar automáticamente desde el título</p>
        @error('slug')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Descripción -->
    <div>
        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción corta *</label>
        <textarea name="descripcion" id="descripcion" rows="3" required
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('descripcion') border-red-500 @enderror">{{ old('descripcion', $noticia->descripcion) }}</textarea>
        <p class="mt-1 text-xs text-gray-500">Esta descripción aparece en el listado de noticias</p>
        @error('descripcion')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Contenido (Quill WYSIWYG) -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Contenido de la noticia *</label>
        <div id="quill-editor" class="bg-white" style="min-height: 300px;">{!! old('contenido', $noticia->contenido_html ?? '') !!}</div>
        <input type="hidden" name="contenido" id="contenido-hidden">
        @error('contenido')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Grid: Fecha y Tag -->
    <div class="grid grid-cols-2 gap-6">
        <!-- Fecha -->
        <div>
            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha de publicación *</label>
            <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $noticia->fecha?->format('Y-m-d') ?? now()->format('Y-m-d')) }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('fecha') border-red-500 @enderror">
            @error('fecha')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tag -->
        <div>
            <label for="tag" class="block text-sm font-medium text-gray-700">Etiqueta *</label>
            <input type="text" name="tag" id="tag" value="{{ old('tag', $noticia->tag ?? 'INNOVACIÓN') }}" required
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 @error('tag') border-red-500 @enderror"
                   placeholder="INNOVACIÓN">
            @error('tag')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Imagen destacada -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Imagen destacada {{ $noticia->exists ? '' : '*' }}</label>
        
        @if($noticia->imagen_destacada)
            <div class="mt-2 mb-3">
                <img src="{{ asset($noticia->imagen_destacada) }}" alt="Imagen actual" class="h-32 w-auto rounded border">
                <p class="mt-1 text-xs text-gray-500">Imagen actual. Subí una nueva para reemplazarla.</p>
            </div>
        @endif

        <input type="file" name="imagen_destacada" id="imagen_destacada" accept="image/*" {{ $noticia->exists ? '' : 'required' }}
               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100 @error('imagen_destacada') border-red-500 @enderror">
        <p class="mt-1 text-xs text-gray-500">Formato: JPG, PNG. Tamaño máximo: 2MB</p>
        @error('imagen_destacada')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Grid: Publicado y Orden -->
    <div class="grid grid-cols-2 gap-6">
        <!-- Publicado -->
        <div>
            <label class="flex items-center">
                <input type="checkbox" name="publicado" value="1" {{ old('publicado', $noticia->publicado) ? 'checked' : '' }}
                       class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-500 focus:ring-red-500">
                <span class="ml-2 text-sm text-gray-700">Publicar noticia</span>
            </label>
            <p class="mt-1 text-xs text-gray-500">Si está desmarcado, la noticia quedará como borrador</p>
        </div>

        <!-- Orden -->
        <div>
            <label for="orden" class="block text-sm font-medium text-gray-700">Orden de visualización</label>
            <input type="number" name="orden" id="orden" value="{{ old('orden', $noticia->orden ?? 0) }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
            <p class="mt-1 text-xs text-gray-500">Mayor número = aparece primero</p>
        </div>
    </div>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
<style>
    #quill-editor { border: 1px solid #d1d5db; border-radius: 0 0 0.375rem 0.375rem; }
    .ql-toolbar.ql-snow { border: 1px solid #d1d5db; border-radius: 0.375rem 0.375rem 0 0; background: #f9fafb; }
    .ql-editor { min-height: 300px; font-size: 14px; line-height: 1.6; }
    .ql-editor img { max-width: 100%; height: auto; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const quill = new Quill('#quill-editor', {
        theme: 'snow',
        modules: {
            toolbar: {
                container: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'align': [] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    ['blockquote'],
                    ['link', 'image'],
                    ['clean']
                ],
                handlers: {
                    image: function() {
                        const input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');
                        input.click();
                        input.onchange = async () => {
                            const file = input.files[0];
                            if (!file) return;
                            const formData = new FormData();
                            formData.append('file', file);
                            formData.append('_token', '{{ csrf_token() }}');
                            try {
                                const res = await fetch('{{ route("admin.noticias.upload-image") }}', { method: 'POST', body: formData });
                                const data = await res.json();
                                if (data.location) {
                                    const range = quill.getSelection(true);
                                    quill.insertEmbed(range.index, 'image', data.location);
                                }
                            } catch(e) { alert('Error al subir imagen'); }
                        };
                    }
                }
            }
        }
    });

    // Sync Quill content to hidden input on form submit
    const form = document.querySelector('form');
    const hiddenInput = document.getElementById('contenido-hidden');
    form.addEventListener('submit', function() {
        hiddenInput.value = quill.root.innerHTML;
    });
});
</script>
@endpush

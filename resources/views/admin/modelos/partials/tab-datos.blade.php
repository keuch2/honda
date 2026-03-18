<form action="{{ route('admin.modelos.update', $modelo) }}" method="POST" enctype="multipart/form-data"
      x-data="{ uploading: false, error: '' }"
      @submit="
        error = '';
        const maxImg = 5 * 1024 * 1024;
        const maxPdf = 15 * 1024 * 1024;
        const heroFile = $refs.hero_image.files[0];
        const cardFile = $refs.card_image.files[0];
        const pdfFile = $refs.ficha_pdf.files[0];
        if (heroFile && heroFile.size > maxImg) { error = 'La imagen Hero no debe superar 5 MB.'; $event.preventDefault(); return; }
        if (cardFile && cardFile.size > maxImg) { error = 'La imagen Card no debe superar 5 MB.'; $event.preventDefault(); return; }
        if (pdfFile && pdfFile.size > maxPdf) { error = 'La ficha técnica PDF no debe superar 15 MB.'; $event.preventDefault(); return; }
        uploading = true;
      ">
    @csrf
    @method('PUT')

    <div x-show="error" x-cloak class="mb-4 rounded-md bg-red-50 p-4">
        <p class="text-sm text-red-700" x-text="error"></p>
    </div>

    <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre *</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $modelo->nombre) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug (URL) *</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $modelo->slug) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="anio" class="block text-sm font-medium text-gray-700">Año</label>
                <input type="text" name="anio" id="anio" value="{{ old('anio', $modelo->anio) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="categoria" id="categoria" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="suv" {{ old('categoria', $modelo->categoria) == 'suv' ? 'selected' : '' }}>SUV</option>
                    <option value="sedan" {{ old('categoria', $modelo->categoria) == 'sedan' ? 'selected' : '' }}>Sedán</option>
                    <option value="hatchback" {{ old('categoria', $modelo->categoria) == 'hatchback' ? 'selected' : '' }}>Hatchback</option>
                    <option value="pickup" {{ old('categoria', $modelo->categoria) == 'pickup' ? 'selected' : '' }}>Pickup</option>
                </select>
            </div>
        </div>

        <div>
            <label for="subtitulo" class="block text-sm font-medium text-gray-700">Subtítulo</label>
            <input type="text" name="subtitulo" id="subtitulo" value="{{ old('subtitulo', $modelo->subtitulo) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="hero_css_class" class="block text-sm font-medium text-gray-700">Clase CSS del Hero</label>
            <input type="text" name="hero_css_class" id="hero_css_class" value="{{ old('hero_css_class', $modelo->hero_css_class) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="hero_image" class="block text-sm font-medium text-gray-700">Imagen Hero</label>
                @if($modelo->hero_image)
                    <p class="text-xs text-gray-500 mt-1">Actual: {{ basename($modelo->hero_image) }}</p>
                @endif
                <input type="file" name="hero_image" id="hero_image" x-ref="hero_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="text-xs text-gray-400 mt-1">Máx. 5 MB</p>
            </div>
            <div>
                <label for="card_image" class="block text-sm font-medium text-gray-700">Imagen Card (listado)</label>
                @if($modelo->card_image)
                    <p class="text-xs text-gray-500 mt-1">Actual: {{ basename($modelo->card_image) }}</p>
                @endif
                <input type="file" name="card_image" id="card_image" x-ref="card_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="text-xs text-gray-400 mt-1">Máx. 5 MB</p>
            </div>
            <div>
                <label for="ficha_tecnica_pdf" class="block text-sm font-medium text-gray-700">Ficha Técnica (PDF)</label>
                @if($modelo->ficha_tecnica_pdf)
                    <p class="text-xs text-gray-500 mt-1">Actual: <a href="{{ $modelo->fichaTecnicaUrl() }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($modelo->ficha_tecnica_pdf) }}</a></p>
                @endif
                <input type="file" name="ficha_tecnica_pdf" id="ficha_tecnica_pdf" x-ref="ficha_pdf" accept=".pdf" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="text-xs text-gray-400 mt-1">Máx. 15 MB</p>
            </div>
        </div>

        <hr class="border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">SEO</h3>
        <div class="space-y-4">
            <div>
                <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $modelo->meta_title) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('meta_description', $modelo->meta_description) }}</textarea>
            </div>
            <div>
                <label for="meta_keywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $modelo->meta_keywords) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
        </div>

        <hr class="border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="orden" class="block text-sm font-medium text-gray-700">Orden</label>
                <input type="number" name="orden" id="orden" value="{{ old('orden', $modelo->orden) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="flex items-center pt-6">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $modelo->is_active) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="is_active" class="ml-2 text-sm text-gray-700">Activo</label>
            </div>
            <div class="flex items-center pt-6">
                <input type="checkbox" name="show_in_menu" id="show_in_menu" value="1" {{ old('show_in_menu', $modelo->show_in_menu) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="show_in_menu" class="ml-2 text-sm text-gray-700">Mostrar en menú</label>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" :disabled="uploading" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 disabled:opacity-50 disabled:cursor-wait">
                <template x-if="uploading">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                </template>
                <span x-text="uploading ? 'Subiendo...' : 'Guardar Cambios'"></span>
            </button>
        </div>
    </div>
</form>

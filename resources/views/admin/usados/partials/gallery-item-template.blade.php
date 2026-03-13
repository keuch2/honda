<div class="border border-gray-200 rounded-lg p-4 space-y-4" data-gallery-item>
    <div class="flex justify-between items-center">
        <div>
            <h4 class="text-sm font-semibold text-gray-800">Imagen</h4>
            <p class="text-xs text-gray-500">Ingresá la URL pública de la imagen.</p>
        </div>
        <button type="button" class="text-sm text-gray-500 hover:text-red-600" data-remove>&times; Quitar</button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-medium text-gray-700 uppercase tracking-wide">URL</label>
            <input type="text" name="images[__INDEX__][path]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
        </div>
        <div>
            <label class="block text-xs font-medium text-gray-700 uppercase tracking-wide">Título</label>
            <input type="text" name="images[__INDEX__][titulo]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-medium text-gray-700 uppercase tracking-wide">Descripción</label>
            <input type="text" name="images[__INDEX__][descripcion]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
        </div>
        <div class="flex items-center space-x-4">
            <div>
                <label class="block text-xs font-medium text-gray-700 uppercase tracking-wide">Orden</label>
                <input type="number" name="images[__INDEX__][orden]" value="1" class="mt-1 block w-24 rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
            </div>
            <div class="flex items-center mt-6">
                <input type="hidden" name="images[__INDEX__][is_portada]" value="0">
                <input type="checkbox" name="images[__INDEX__][is_portada]" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500" data-is-portada>
                <span class="ml-2 text-sm text-gray-600">Portada</span>
            </div>
        </div>
    </div>
</div>

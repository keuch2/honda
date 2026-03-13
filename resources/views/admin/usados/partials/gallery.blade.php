<div x-data="galleryManager('{{ $usado->legacy_id }}', @js($usado->images()->orderBy('orden')->get()->map(fn($img) => [
    'id' => $img->id,
    'url' => $img->url(),
    'is_portada' => $img->is_portada,
    'orden' => $img->orden,
])))">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Galería de Imágenes</h3>
            <p class="text-sm text-gray-500">Arrastrá para reordenar. Click en la estrella para marcar como portada.</p>
        </div>
        <span class="text-sm text-gray-600" x-text="`${images.length} imagen(es)`"></span>
    </div>

    <!-- Upload de imágenes -->
    <div class="mb-6 border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-red-500 transition">
        <input type="file" id="gallery-upload" multiple accept="image/*" class="hidden" @change="uploadImages($event)">
        <label for="gallery-upload" class="cursor-pointer">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
            </svg>
            <p class="mt-2 text-sm text-gray-600">
                <span class="font-semibold text-red-600">Click para subir</span> o arrastrá imágenes aquí
            </p>
            <p class="text-xs text-gray-500 mt-1">PNG, JPG hasta 2MB</p>
        </label>
    </div>

    <!-- Loading -->
    <div x-show="uploading" class="mb-4 bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex items-center">
            <svg class="animate-spin h-5 w-5 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="text-sm text-blue-800">Subiendo imágenes...</span>
        </div>
    </div>

    <!-- Grid de imágenes con drag & drop -->
    <div x-show="images.length > 0" id="sortable-gallery" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
        <template x-for="(image, index) in images" :key="image.id">
            <div :data-id="image.id" class="sortable-item relative group border-2 rounded-lg overflow-hidden bg-gray-100 cursor-move" :class="image.is_portada ? 'border-red-500' : 'border-gray-200'">
                <img :src="image.url" :alt="'Imagen ' + (index + 1)" class="w-full h-40 object-cover">
                
                <!-- Overlay con acciones -->
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all flex items-center justify-center gap-2">
                    <!-- Botón Portada -->
                    <button @click="setPortada(image.id)" type="button" class="opacity-0 group-hover:opacity-100 transition-opacity p-2 bg-yellow-500 text-white rounded-full hover:bg-yellow-600" :class="image.is_portada ? 'bg-yellow-600' : ''">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </button>
                    
                    <!-- Botón Eliminar -->
                    <button @click="deleteImage(image.id)" type="button" class="opacity-0 group-hover:opacity-100 transition-opacity p-2 bg-red-600 text-white rounded-full hover:bg-red-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Badge de portada -->
                <div x-show="image.is_portada" class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded shadow flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    Portada
                </div>

                <!-- Número de orden -->
                <div class="absolute top-2 right-2 bg-gray-900 bg-opacity-75 text-white text-xs px-2 py-1 rounded">
                    #<span x-text="index + 1"></span>
                </div>
            </div>
        </template>
    </div>

    <!-- Estado vacío -->
    <div x-show="images.length === 0" class="text-center py-12 bg-gray-50 rounded-lg">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <p class="mt-2 text-sm text-gray-500">No hay imágenes cargadas</p>
        <p class="text-xs text-gray-400 mt-1">Subí imágenes usando el botón de arriba</p>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
function galleryManager(usadoId, initialImages) {
    return {
        images: initialImages,
        uploading: false,
        
        init() {
            const el = document.getElementById('sortable-gallery');
            if (el) {
                Sortable.create(el, {
                    animation: 150,
                    handle: '.sortable-item',
                    onEnd: (evt) => {
                        this.reorderImages(evt.oldIndex, evt.newIndex);
                    }
                });
            }
        },
        
        async uploadImages(event) {
            const files = event.target.files;
            if (!files.length) return;
            
            this.uploading = true;
            const formData = new FormData();
            
            for (let file of files) {
                formData.append('images[]', file);
            }
            
            try {
                const response = await fetch(`/admin/usados/${usadoId}/images`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });
                
                // Manejar error 419 (CSRF token expirado)
                if (response.status === 419) {
                    alert('Tu sesión ha expirado. Por favor, recarga la página e intenta nuevamente.');
                    this.uploading = false;
                    return;
                }
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                
                if (data.success) {
                    this.images = data.images;
                    event.target.value = '';
                    this.$nextTick(() => this.init());
                } else {
                    alert('Error al subir las imágenes: ' + (data.error || 'Error desconocido'));
                }
            } catch (error) {
                console.error('Error uploading images:', error);
                alert('Error al subir las imágenes: ' + error.message);
            } finally {
                this.uploading = false;
            }
        },
        
        async setPortada(imageId) {
            try {
                const response = await fetch(`/admin/usados/${usadoId}/images/${imageId}/portada`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    this.images = data.images;
                }
            } catch (error) {
                console.error('Error setting portada:', error);
            }
        },
        
        async deleteImage(imageId) {
            if (!confirm('¿Eliminar esta imagen?')) return;
            
            try {
                const response = await fetch(`/admin/usados/${usadoId}/images/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    this.images = data.images;
                }
            } catch (error) {
                console.error('Error deleting image:', error);
            }
        },
        
        async reorderImages(oldIndex, newIndex) {
            // Reordenar localmente
            const item = this.images.splice(oldIndex, 1)[0];
            this.images.splice(newIndex, 0, item);
            
            // Actualizar orden en servidor
            const order = this.images.map(img => img.id);
            
            try {
                await fetch(`/admin/usados/${usadoId}/images/reorder`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ order })
                });
            } catch (error) {
                console.error('Error reordering images:', error);
            }
        }
    }
}
</script>
@endpush

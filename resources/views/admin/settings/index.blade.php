@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Configuración del Sitio</h1>
                <p class="text-sm text-gray-500">SEO, códigos de seguimiento, emails, formularios y WhatsApp.</p>
            </div>

            @if(session('status'))
                <div class="mb-6 rounded-md bg-green-50 p-4">
                    <p class="text-sm text-green-700">{{ session('status') }}</p>
                </div>
            @endif

            @php
                $allSettings = \App\Models\SiteSetting::all()->keyBy('key');
                $s = fn($key, $default = '') => old($key, $allSettings[$key]->value ?? $default);
            @endphp

            <div x-data="{ tab: '{{ request('tab', 'tracking') }}' }" class="space-y-6">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        <button @click="tab = 'tracking'" :class="tab === 'tracking' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Códigos de Seguimiento</button>
                        <button @click="tab = 'seo'" :class="tab === 'seo' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">SEO</button>
                        <button @click="tab = 'emails'" :class="tab === 'emails' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Emails</button>
                        <button @click="tab = 'forms'" :class="tab === 'forms' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Formularios</button>
                        <button @click="tab = 'whatsapp'" :class="tab === 'whatsapp' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">WhatsApp</button>
                    </nav>
                </div>

                <!-- Tracking -->
                <div x-show="tab === 'tracking'">
                    <form action="{{ route('admin.settings.tracking') }}" method="POST">
                        @csrf
                        <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-6">
                            <h3 class="text-lg font-medium text-gray-900">Códigos de Seguimiento</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Google Ads ID</label>
                                    <input type="text" name="google_ads_id" value="{{ $s('google_ads_id') }}" placeholder="AW-XXXXXXXXXXX" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Google Analytics ID</label>
                                    <input type="text" name="google_analytics_id" value="{{ $s('google_analytics_id') }}" placeholder="G-XXXXXXXXXX" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Google Tag Manager ID</label>
                                    <input type="text" name="gtm_id" value="{{ $s('gtm_id') }}" placeholder="GTM-XXXXXXX" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Meta Pixel ID</label>
                                    <input type="text" name="meta_pixel_id" value="{{ $s('meta_pixel_id') }}" placeholder="XXXXXXXXXXXXXXX" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Twitter Pixel ID</label>
                                    <input type="text" name="twitter_pixel_id" value="{{ $s('twitter_pixel_id') }}" placeholder="xxxxx" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Scripts personalizados (HEAD)</label>
                                <textarea name="custom_head_scripts" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm font-mono text-xs" placeholder="<script>...</script>">{{ $s('custom_head_scripts') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Scripts personalizados (BODY)</label>
                                <textarea name="custom_body_scripts" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm font-mono text-xs" placeholder="<script>...</script>">{{ $s('custom_body_scripts') }}</textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700 font-semibold uppercase tracking-widest">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- SEO -->
                <div x-show="tab === 'seo'">
                    <form action="{{ route('admin.settings.seo') }}" method="POST">
                        @csrf
                        <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-6">
                            <h3 class="text-lg font-medium text-gray-900">Programación SEO</h3>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Título por defecto</label>
                                <input type="text" name="seo_default_title" value="{{ $s('seo_default_title', 'Honda Paraguay - The Power of Dreams') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Descripción por defecto</label>
                                <textarea name="seo_default_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">{{ $s('seo_default_description') }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Keywords por defecto</label>
                                <input type="text" name="seo_default_keywords" value="{{ $s('seo_default_keywords') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Imagen OG por defecto (URL)</label>
                                <input type="text" name="seo_og_image" value="{{ $s('seo_og_image') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Directiva robots</label>
                                <input type="text" name="seo_robots" value="{{ $s('seo_robots', 'index, follow') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="index, follow">
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700 font-semibold uppercase tracking-widest">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Emails -->
                <div x-show="tab === 'emails'">
                    <form action="{{ route('admin.settings.emails') }}" method="POST">
                        @csrf
                        <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-6">
                            <h3 class="text-lg font-medium text-gray-900">Emails de Destino</h3>
                            <p class="text-sm text-gray-500">Configurá los emails donde llegarán los formularios del sitio.</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email formulario Test Drive</label>
                                    <input type="email" name="email_testdrive" value="{{ $s('email_testdrive') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="ventas@honda.com.py">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email formulario Cotizar</label>
                                    <input type="email" name="email_cotizar" value="{{ $s('email_cotizar') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="ventas@honda.com.py">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email formulario Contacto</label>
                                    <input type="email" name="email_contacto" value="{{ $s('email_contacto') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="info@honda.com.py">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email formulario Landing Pages</label>
                                    <input type="email" name="email_landing" value="{{ $s('email_landing') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="marketing@honda.com.py">
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700 font-semibold uppercase tracking-widest">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>

                @php
                    $defaultTestdrive = '[{"name":"nombre","label":"Nombre Completo","type":"text","required":true},{"name":"telefono","label":"Teléfono","type":"tel","required":true},{"name":"email","label":"Email","type":"email","required":true},{"name":"ciudad","label":"Ciudad","type":"text","required":true},{"name":"modelo","label":"Modelo","type":"select","required":true},{"name":"comentarios","label":"Comentarios","type":"textarea","required":false}]';
                    $defaultCotizar = '[{"name":"nombre","label":"Nombre Completo","type":"text","required":true},{"name":"telefono","label":"Teléfono","type":"tel","required":true},{"name":"email","label":"Email","type":"email","required":true},{"name":"ciudad","label":"Ciudad","type":"text","required":true},{"name":"modelo","label":"Modelo","type":"select","required":true},{"name":"comentarios","label":"Comentarios","type":"textarea","required":false}]';
                    $defaultLanding = '[{"name":"nombre","label":"Nombre Completo","type":"text","required":true},{"name":"telefono","label":"Teléfono","type":"tel","required":true},{"name":"email","label":"Email","type":"email","required":true},{"name":"comentarios","label":"Comentarios","type":"textarea","required":false}]';

                    $formTestdrive = $s('form_testdrive_fields', $defaultTestdrive);
                    $formCotizar = $s('form_cotizar_fields', $defaultCotizar);
                    $formLanding = $s('form_landing_fields', $defaultLanding);
                @endphp

                <!-- Formularios -->
                <div x-show="tab === 'forms'" x-data="formFieldsManager()" x-init="initData(window.__formFieldsData)">
                    <form action="{{ route('admin.settings.forms') }}" method="POST" @submit="serializeAll()">
                        @csrf
                        <input type="hidden" name="form_testdrive_fields" :value="serialized.testdrive">
                        <input type="hidden" name="form_cotizar_fields" :value="serialized.cotizar">
                        <input type="hidden" name="form_landing_fields" :value="serialized.landing">

                        <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-8">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Configuración de Formularios</h3>
                                <p class="text-sm text-gray-500">Agregá, editá o eliminá los campos de cada formulario. Los campos de tipo <strong>Select (Modelos)</strong> se completan automáticamente con los modelos cargados en el sitio.</p>
                            </div>

                            <template x-for="section in sections" :key="section.key">
                                <div class="space-y-3">
                                    <h4 class="text-md font-semibold text-gray-800 border-b pb-2" x-text="section.title"></h4>

                                    <div class="overflow-x-auto">
                                        <table class="min-w-full text-sm">
                                            <thead>
                                                <tr class="text-left text-xs text-gray-500 uppercase tracking-wider">
                                                    <th class="px-2 py-1 w-6"></th>
                                                    <th class="px-2 py-1 w-8">#</th>
                                                    <th class="px-2 py-1">Nombre campo</th>
                                                    <th class="px-2 py-1">Etiqueta</th>
                                                    <th class="px-2 py-1">Tipo</th>
                                                    <th class="px-2 py-1 w-20 text-center">Requerido</th>
                                                    <th class="px-2 py-1 w-16"></th>
                                                </tr>
                                            </thead>
                                            <tbody :id="'sortable-' + section.key">
                                                <template x-for="(field, idx) in forms[section.key]" :key="idx">
                                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                                        <td class="px-2 py-2 text-gray-400 drag-handle cursor-grab active:cursor-grabbing" title="Arrastrar para reordenar">
                                                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M8 6a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm8-16a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                                        </td>
                                                        <td class="px-2 py-2 text-gray-400" x-text="idx + 1"></td>
                                                        <td class="px-2 py-2">
                                                            <input type="text" x-model="field.name" class="block w-full rounded border-gray-300 shadow-sm sm:text-sm" placeholder="nombre_campo">
                                                        </td>
                                                        <td class="px-2 py-2">
                                                            <input type="text" x-model="field.label" class="block w-full rounded border-gray-300 shadow-sm sm:text-sm" placeholder="Etiqueta visible">
                                                        </td>
                                                        <td class="px-2 py-2">
                                                            <select x-model="field.type" class="block w-full rounded border-gray-300 shadow-sm sm:text-sm">
                                                                <option value="text">Texto</option>
                                                                <option value="email">Email</option>
                                                                <option value="tel">Teléfono</option>
                                                                <option value="number">Número</option>
                                                                <option value="textarea">Área de texto</option>
                                                                <option value="select">Select (Modelos)</option>
                                                            </select>
                                                        </td>
                                                        <td class="px-2 py-2 text-center">
                                                            <input type="checkbox" x-model="field.required" class="h-4 w-4 rounded border-gray-300 text-indigo-600">
                                                        </td>
                                                        <td class="px-2 py-2 text-center">
                                                            <button type="button" @click="removeField(section.key, idx)" class="text-red-500 hover:text-red-700" title="Eliminar campo">
                                                                <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>

                                    <button type="button" @click="addField(section.key)" class="inline-flex items-center gap-1 text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                        Agregar campo
                                    </button>
                                </div>
                            </template>

                            <div class="flex justify-end pt-4 border-t">
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700 font-semibold uppercase tracking-widest">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- WhatsApp -->
                <div x-show="tab === 'whatsapp'">
                    <form action="{{ route('admin.settings.whatsapp') }}" method="POST">
                        @csrf
                        <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-6">
                            <h3 class="text-lg font-medium text-gray-900">Configuración de WhatsApp</h3>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Número de WhatsApp</label>
                                <input type="text" name="whatsapp_number" value="{{ $s('whatsapp_number', '595217285717') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="595217285717">
                                <p class="mt-1 text-xs text-gray-500">Formato internacional sin + ni espacios. Ej: 595217285717</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Mensaje predeterminado</label>
                                <input type="text" name="whatsapp_message" value="{{ $s('whatsapp_message') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="Hola, me gustaría obtener más información...">
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700 font-semibold uppercase tracking-widest">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
    window.__formFieldsData = {
        testdrive: {!! $formTestdrive !!},
        cotizar: {!! $formCotizar !!},
        landing: {!! $formLanding !!}
    };
</script>
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('formFieldsManager', () => ({
        forms: { testdrive: [], cotizar: [], landing: [] },
        serialized: { testdrive: '', cotizar: '', landing: '' },
        sections: [
            { key: 'testdrive', title: 'Formulario Test Drive' },
            { key: 'cotizar', title: 'Formulario Cotizar' },
            { key: 'landing', title: 'Formulario Landing Pages' },
        ],
        initData(data) {
            this.forms.testdrive = JSON.parse(JSON.stringify(data.testdrive || []));
            this.forms.cotizar = JSON.parse(JSON.stringify(data.cotizar || []));
            this.forms.landing = JSON.parse(JSON.stringify(data.landing || []));
            this.$nextTick(() => {
                this.sections.forEach(s => {
                    const el = document.getElementById('sortable-' + s.key);
                    if (el) this.initSortable(s.key, el);
                });
            });
        },
        initSortable(key, el) {
            Sortable.create(el, {
                handle: '.drag-handle',
                animation: 150,
                ghostClass: 'bg-indigo-50',
                onEnd: (evt) => {
                    const oldIdx = evt.oldIndex;
                    const newIdx = evt.newIndex;
                    // Revert the DOM move — let Alpine handle rendering
                    const item = evt.item;
                    if (oldIdx < newIdx) {
                        evt.from.insertBefore(item, evt.from.children[oldIdx]);
                    } else {
                        evt.from.insertBefore(item, evt.from.children[oldIdx + 1]);
                    }
                    if (oldIdx !== newIdx) {
                        this.moveField(key, oldIdx, newIdx);
                    }
                }
            });
        },
        moveField(key, from, to) {
            const arr = [...this.forms[key]];
            const [moved] = arr.splice(from, 1);
            arr.splice(to, 0, moved);
            this.forms[key] = arr;
        },
        addField(key) {
            this.forms[key].push({ name: '', label: '', type: 'text', required: false });
        },
        removeField(key, idx) {
            if (confirm('¿Eliminar este campo?')) {
                this.forms[key].splice(idx, 1);
            }
        },
        serializeAll() {
            this.serialized.testdrive = JSON.stringify(this.forms.testdrive);
            this.serialized.cotizar = JSON.stringify(this.forms.cotizar);
            this.serialized.landing = JSON.stringify(this.forms.landing);
        }
    }));
});
</script>
@endpush

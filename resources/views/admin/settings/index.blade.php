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

                <!-- Formularios -->
                <div x-show="tab === 'forms'">
                    <form action="{{ route('admin.settings.forms') }}" method="POST">
                        @csrf
                        <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-6">
                            <h3 class="text-lg font-medium text-gray-900">Configuración de Formularios</h3>
                            <p class="text-sm text-gray-500">Editá los campos de los formularios de Test Drive y Cotizar. Formato JSON con la estructura de campos.</p>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Campos formulario Test Drive</label>
                                <textarea name="form_testdrive_fields" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm font-mono text-xs">{{ $s('form_testdrive_fields', '[
    {"name": "nombre", "label": "Nombre Completo", "type": "text", "required": true},
    {"name": "telefono", "label": "Teléfono", "type": "tel", "required": true},
    {"name": "email", "label": "Email", "type": "email", "required": true},
    {"name": "ciudad", "label": "Ciudad", "type": "text", "required": true},
    {"name": "modelo", "label": "Modelo", "type": "select", "required": true},
    {"name": "comentarios", "label": "Comentarios", "type": "textarea", "required": false}
]') }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Campos formulario Cotizar</label>
                                <textarea name="form_cotizar_fields" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm font-mono text-xs">{{ $s('form_cotizar_fields', '[
    {"name": "nombre", "label": "Nombre Completo", "type": "text", "required": true},
    {"name": "telefono", "label": "Teléfono", "type": "tel", "required": true},
    {"name": "email", "label": "Email", "type": "email", "required": true},
    {"name": "ciudad", "label": "Ciudad", "type": "text", "required": true},
    {"name": "modelo", "label": "Modelo", "type": "select", "required": true},
    {"name": "comentarios", "label": "Comentarios", "type": "textarea", "required": false}
]') }}</textarea>
                            </div>

                            <div class="flex justify-end">
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

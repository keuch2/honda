@extends('layouts.public')

@section('title', 'Contacto - Honda Paraguay')

@section('content')
<style>
    /* Grid de contacto responsive */
    .contacto-grid {
        display: grid;
        grid-template-columns: 42% 58%;
        gap: 50px;
    }
    
    @media (max-width: 992px) {
        .contacto-grid {
            grid-template-columns: 1fr;
            gap: 40px;
        }
    }
</style>

<!-- Hero Contacto -->
<section class="page-hero" style="background: linear-gradient(135deg, #1a1a1a 0%, #333 100%); padding: 100px 0 60px; text-align: center; margin-top: 0px;">
    <div class="container">
        <h1 style="font-size: 56px; font-weight: 800; color: white; margin-bottom: 20px;">Contacto</h1>
        <p style="font-size: 20px; color: #ccc;">Estamos para ayudarte. Contactanos por cualquier consulta.</p>
    </div>
</section>

<!-- Contacto: 2 Columnas -->
<section class="contacto-principal" style="padding: 80px 0; background: white;">
    <div class="container">
        <div class="contacto-grid">
            <!-- Columna Izquierda: Información Casa Central -->
            <div>
                <h2 style="font-size: 32px; font-weight: 800; margin-bottom: 30px; color: #333;">Casa Central</h2>
                
                <div style="margin-bottom: 30px;">
                    <div style="display: flex; align-items: start; margin-bottom: 25px;">
                        <div style="width: 50px; height: 50px; background: var(--honda-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-map-marker-alt" style="font-size: 24px; color: white;"></i>
                        </div>
                        <div style="margin-left: 20px;">
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 8px;">Dirección</h3>
                            <p style="color: #666; line-height: 1.6; margin: 0;">Avda. Eusebio Ayala esq. Camilo Recalde<br>Asunción, Paraguay</p>
                        </div>
                    </div>
                    
                    <div style="display: flex; align-items: start; margin-bottom: 25px;">
                        <div style="width: 50px; height: 50px; background: var(--honda-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-phone" style="font-size: 24px; color: white;"></i>
                        </div>
                        <div style="margin-left: 20px;">
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 8px;">Teléfono</h3>
                            <p style="color: #666; margin: 0;">(+59521) 728 5717</p>
                            <a href="tel:+595217285717" style="color: var(--honda-red); text-decoration: none; font-weight: 600; font-size: 14px;">Llamar ahora →</a>
                        </div>
                    </div>
                    
                    <div style="display: flex; align-items: start; margin-bottom: 25px;">
                        <div style="width: 50px; height: 50px; background: var(--honda-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-envelope" style="font-size: 24px; color: white;"></i>
                        </div>
                        <div style="margin-left: 20px;">
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 8px;">Email</h3>
                            <p style="color: #666; margin: 0;">contacto@honda.com.py</p>
                            <a href="mailto:info@honda.com.py" style="color: var(--honda-red); text-decoration: none; font-weight: 600; font-size: 14px;">Enviar email →</a>
                        </div>
                    </div>
                    
                    <div style="display: flex; align-items: start;">
                        <div style="width: 50px; height: 50px; background: var(--honda-red); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fas fa-clock" style="font-size: 24px; color: white;"></i>
                        </div>
                        <div style="margin-left: 20px;">
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 8px;">Horario Ventas</h3>
                            <p style="color: #666; line-height: 1.8; margin: 0 0 20px 0;">
                                <strong>Lunes a Viernes:</strong> 8:00 - 18:00<br>
                                <strong>Sábados:</strong> 8:00 - 12:00<br>
                                <strong>Domingos:</strong> Cerrado
                            </p>
                            
                            <h3 style="font-size: 18px; font-weight: 700; margin-bottom: 8px;">Horario Servicios y Repuestos</h3>
                            <p style="color: #666; line-height: 1.8; margin: 0;">
                                <strong>Lunes a Viernes:</strong> 07:20 – 17:00<br>
                                <strong>Sábado:</strong> 07:20 – 12:00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Columna Derecha: Formulario -->
            <div>
                <div style="background: #f9f9f9; padding: 40px; border-radius: 8px;">
                    <h2 style="font-size: 28px; font-weight: 800; margin-bottom: 10px; color: #333;">Formulario de Contacto</h2>
                    <p style="color: #666; margin-bottom: 30px;">Completá el formulario y te responderemos a la brevedad</p>
                    
                    @if(session('success'))
                        <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px 20px; border-radius: 4px; margin-bottom: 20px;">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px 20px; border-radius: 4px; margin-bottom: 20px;">
                            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('contacto.submit') }}">
                        @csrf
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                            <div>
                                <label for="nombre" style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Nombre Completo *</label>
                                <input type="text" id="nombre" name="nombre" required style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 4px; font-size: 15px;" value="{{ old('nombre') }}">
                            </div>
                            
                            <div>
                                <label for="telefono" style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Teléfono *</label>
                                <input type="tel" id="telefono" name="telefono" required style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 4px; font-size: 15px;" value="{{ old('telefono') }}">
                            </div>
                        </div>
                        
                        <div style="margin-bottom: 20px;">
                            <label for="email" style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Email *</label>
                            <input type="email" id="email" name="email" required style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 4px; font-size: 15px;" value="{{ old('email') }}">
                        </div>
                        
                        <div style="margin-bottom: 20px;">
                            <label for="division" style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">División *</label>
                            <select id="division" name="division" required style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 4px; font-size: 15px;">
                                <option value="">Seleccione una división</option>
                                <option value="ventas" {{ old('division') == 'ventas' ? 'selected' : '' }}>Ventas</option>
                                <option value="postventa" {{ old('division') == 'postventa' ? 'selected' : '' }}>Servicios</option>
                                <option value="repuestos" {{ old('division') == 'repuestos' ? 'selected' : '' }}>Repuestos</option>
                                <option value="rrhh" {{ old('division') == 'rrhh' ? 'selected' : '' }}>Recursos Humanos</option>
                            </select>
                        </div>
                        
                        <div style="margin-bottom: 25px;">
                            <label for="mensaje" style="display: block; font-weight: 600; margin-bottom: 8px; color: #333;">Mensaje *</label>
                            <textarea id="mensaje" name="mensaje" rows="5" required style="width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 4px; font-size: 15px; resize: vertical;">{{ old('mensaje') }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-red" style="width: 100%; padding: 14px; font-size: 16px; font-weight: 700;">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

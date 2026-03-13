<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-column">
                <h4>SUV</h4>
                <ul>
                    @if(isset($activeModelos))
                        @foreach($activeModelos as $m)
                            <li><a href="{{ url('/' . $m->slug) }}">{{ $m->nombre }}</a></li>
                        @endforeach
                    @else
                        <li><a href="{{ url('/cr-v') }}">CR-V</a></li>
                        <li><a href="{{ url('/cr-v-ehev') }}">CR-V e:HEV</a></li>
                        <li><a href="{{ url('/hr-v') }}">HR-V</a></li>
                        <li><a href="{{ url('/pilot') }}">Pilot</a></li>
                    @endif
                </ul>
            </div>
            <div class="footer-column"></div>
            <div class="footer-column">
                <h4>ATENCIÓN AL CLIENTE</h4>
                <ul>
                    <li><a href="{{ url('/red-ventas') }}">RED DE VENTAS</a></li>
                    <li><a href="{{ url('/red-ventas#showrooms') }}">SHOWROOMS</a></li>
                </ul>
                <h4 class="footer-subtitle">POSTVENTA</h4>
                <ul>
                    <li><a href="{{ url('/posventa#talleres') }}">TALLERES</a></li>
                    <li><a href="{{ url('/posventa#repuestos') }}">REPUESTOS</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h4>NOSOTROS</h4>
                <ul>
                    <li><a href="https://global.honda/en/" target="_blank" rel="noopener">SOBRE HONDA</a></li>
                    <li><a href="{{ url('/vicar') }}">VICAR S.A.</a></li>
                    <li><a href="{{ url('/noticias') }}">NOTICIAS</a></li>
                </ul>
            </div>
            <div class="footer-column footer-contact-col">
                <div class="social-icons">
                    <a href="https://www.instagram.com/hondapy/" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@hondapy" target="_blank" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    <a href="https://www.facebook.com/hondapy" target="_blank" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="https://wa.me/{{ $whatsappNumber ?? '595217285717' }}" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
                <div class="footer-contact-info">
                    <p class="contact-title">Casa Central</p>
                    <p class="contact-address">Avda. Eusebio Ayala esq. Camilo Recalde,<br>Asunción, Paraguay</p>
                    <p class="contact-phone">(+595 21) 728 5717</p>
                </div>
                <div class="footer-contact-info" style="margin-top: 30px;">
                    <p class="contact-title">Centro de Repuestos</p>
                    <p class="contact-address">25 de Mayo y Choferes de Chaco, Asunción</p>
                    <p class="contact-address">07:20 – 17:00 hs. lunes – viernes<br>07:20 – 12:00 hs. sábado</p>
                    <p class="contact-phone">Tel. +595 21 728 5718</p>
                </div>
            </div>
        </div>
        <div class="footer-divider"></div>
        <div class="footer-bottom">
            <div class="footer-logo">
                <img src="{{ asset('assets/images/logohonda-footer.png') }}" alt="Honda Paraguay">
            </div>
            <p class="footer-copy">VICAR S.A. representante exclusivo de los automóviles Honda en Paraguay</p>
        </div>
    </div>
</footer>

<div class="floating-cta">
    <button class="cta-item cta-testdrive" id="btnTestDrive" aria-label="Test Drive">
        <img src="{{ asset('assets/images/Flotante-Honda.svg') }}" alt="Honda" class="cta-icon">
        <span class="cta-text">Test Drive</span>
    </button>
    <button class="cta-item cta-cotizar" id="btnCotizar" aria-label="Cotizar">
        <img src="{{ asset('assets/images/Flotante-Cotizar.svg') }}" alt="Cotizar" class="cta-icon">
        <span class="cta-text">Cotizar</span>
    </button>
</div>

@php $waUrl = 'https://wa.me/' . ($whatsappNumber ?? '595217285717') . (($whatsappMessage ?? '') ? '?text=' . urlencode($whatsappMessage) : ''); @endphp
<a href="{{ $waUrl }}" class="whatsapp-float" target="_blank" aria-label="WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

<div id="modalTestDrive" class="modal">
    <div class="modal-content">
        <span class="modal-close" data-modal="modalTestDrive">&times;</span>
        <h2 class="modal-title">Solicitar Test Drive</h2>
        <form id="formTestDrive" class="modal-form" method="POST" action="{{ route('testdrive.submit') }}">
            @csrf
            <div class="form-group">
                <label for="td-nombre">Nombre Completo *</label>
                <input type="text" id="td-nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="td-telefono">Teléfono *</label>
                <input type="tel" id="td-telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="td-email">Email *</label>
                <input type="email" id="td-email" name="email" required>
            </div>
            <div class="form-group">
                <label for="td-ciudad">Ciudad *</label>
                <input type="text" id="td-ciudad" name="ciudad" required>
            </div>
            <div class="form-group">
                <label for="td-modelo">Modelo *</label>
                <select id="td-modelo" name="modelo" required>
                    <option value="">Seleccione un modelo</option>
                    @if(isset($activeModelos))
                        @foreach($activeModelos as $m)
                            <option value="{{ $m->nombre }}">{{ $m->nombre }}</option>
                        @endforeach
                    @else
                        <option value="CR-V">CR-V</option>
                        <option value="CR-V e:HEV">CR-V e:HEV</option>
                        <option value="HR-V">HR-V</option>
                        <option value="Pilot">Pilot</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="td-comentarios">Comentarios</label>
                <textarea id="td-comentarios" name="comentarios" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-red btn-block">Enviar Solicitud</button>
        </form>
    </div>
</div>

<div id="modalCotizar" class="modal">
    <div class="modal-content">
        <span class="modal-close" data-modal="modalCotizar">&times;</span>
        <h2 class="modal-title">Solicitar Cotización</h2>
        <form id="formCotizar" class="modal-form" method="POST" action="{{ route('cotizar.submit') }}">
            @csrf
            <div class="form-group">
                <label for="cot-nombre">Nombre Completo *</label>
                <input type="text" id="cot-nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="cot-telefono">Teléfono *</label>
                <input type="tel" id="cot-telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="cot-email">Email *</label>
                <input type="email" id="cot-email" name="email" required>
            </div>
            <div class="form-group">
                <label for="cot-ciudad">Ciudad *</label>
                <input type="text" id="cot-ciudad" name="ciudad" required>
            </div>
            <div class="form-group">
                <label for="cot-modelo">Modelo *</label>
                <select id="cot-modelo" name="modelo" required>
                    <option value="">Seleccione un modelo</option>
                    @if(isset($activeModelos))
                        @foreach($activeModelos as $m)
                            <option value="{{ $m->nombre }}">{{ $m->nombre }}</option>
                        @endforeach
                    @else
                        <option value="CR-V">CR-V</option>
                        <option value="CR-V e:HEV">CR-V e:HEV</option>
                        <option value="HR-V">HR-V</option>
                        <option value="Pilot">Pilot</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="cot-comentarios">Comentarios</label>
                <textarea id="cot-comentarios" name="comentarios" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-red btn-block">Enviar Solicitud</button>
        </form>
    </div>
</div>

<header class="header">
    <div class="container">
        <div class="header-content">
            <div class="logo">
                <a href="{{ url('/') }}" class="logo-honda">
                    <img src="{{ asset('assets/images/logohonda.png') }}" alt="Honda Paraguay - The Power of Dreams" class="logo-image">
                </a>
            </div>

            <input type="checkbox" id="menu-toggle" class="menu-toggle">

            <label for="menu-toggle" class="menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </label>

            <nav class="nav-menu">
                <ul>
                    <li><a href="{{ url('/modelos') }}">MODELOS</a></li>
                    <li class="menu-item-has-dropdown">
                        <a href="{{ url('/posventa') }}">POSTVENTA</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="https://www.cloudactivereception.com/appointment/es/vicar" target="_blank" rel="noopener noreferrer">
                                    Agendar Turno
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/red-ventas') }}">RED DE VENTAS</a></li>
                    <li><a href="{{ url('/noticias') }}">NOTICIAS</a></li>
                    <li><a href="{{ route('usados.index') }}">USADOS</a></li>
                    <li><a href="{{ url('/vicar') }}">VICAR</a></li>
                    <li><a href="{{ url('/contacto') }}">CONTACTO</a></li>
                </ul>

                <button class="btn-cotizar btn-cotizar-mobile open-cotizar">Cotizar</button>
            </nav>

            <button class="btn-cotizar btn-cotizar-desktop open-cotizar">Cotizar</button>
        </div>
    </div>
</header>

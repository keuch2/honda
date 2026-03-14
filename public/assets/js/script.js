// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== CARRUSEL DE MODELOS =====
    const carouselContainer = document.querySelector('.carousel-container');
    const carouselTrack = document.querySelector('.carousel-track');
    const prevBtn = document.querySelector('.carousel-btn.prev');
    const nextBtn = document.querySelector('.carousel-btn.next');
    const modeloCards = document.querySelectorAll('.modelo-card');
    
    let currentIndex = 0;
    let cardsToShow = getCardsToShow();
    
    // Determinar cuántas tarjetas mostrar según el ancho de pantalla
    function getCardsToShow() {
        if (window.innerWidth <= 768) return 1;
        if (window.innerWidth <= 1024) return 2;
        return 3;
    }
    
    // Obtener tarjetas visibles (no ocultas por filtro)
    function getVisibleCards() {
        return Array.from(modeloCards).filter(card => {
            return window.getComputedStyle(card).display !== 'none';
        });
    }
    
    // Actualizar el carrusel
    function updateCarousel() {
        const visibleCards = getVisibleCards();
        if (visibleCards.length === 0) return;
        
        // Obtener el ancho del contenedor (viewport del carrusel)
        const containerWidth = carouselContainer ? carouselContainer.offsetWidth : 0;
        if (containerWidth === 0) return;
        
        const gap = 30;
        
        // Calcular ancho de cada tarjeta
        let cardWidth;
        if (cardsToShow === 3) {
            // Para 3 tarjetas: ancho total menos los 2 gaps entre ellas, dividido por 3
            cardWidth = Math.floor((containerWidth - (gap * 2)) / 3);
        } else if (cardsToShow === 2) {
            cardWidth = Math.floor((containerWidth - gap) / 2);
        } else {
            cardWidth = containerWidth;
        }
        
        // Establecer ancho a todas las tarjetas visibles
        visibleCards.forEach(card => {
            card.style.width = cardWidth + 'px';
        });
        
        // Calcular desplazamiento
        const offset = -(currentIndex * (cardWidth + gap));
        
        carouselTrack.style.transform = `translateX(${offset}px)`;
        
        // Actualizar estado de botones
        const maxIndex = Math.max(0, visibleCards.length - cardsToShow);
        
        if (prevBtn) {
            prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
            prevBtn.style.cursor = currentIndex === 0 ? 'not-allowed' : 'pointer';
            prevBtn.disabled = currentIndex === 0;
        }
        
        if (nextBtn) {
            nextBtn.style.opacity = currentIndex >= maxIndex ? '0.5' : '1';
            nextBtn.style.cursor = currentIndex >= maxIndex ? 'not-allowed' : 'pointer';
            nextBtn.disabled = currentIndex >= maxIndex;
        }
        
        console.log('Carrusel actualizado:', {
            currentIndex,
            maxIndex,
            visibleCards: visibleCards.length,
            cardsToShow,
            containerWidth,
            cardWidth,
            offset
        });
    }
    
    // Botón siguiente
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            const visibleCards = getVisibleCards();
            const maxIndex = Math.max(0, visibleCards.length - cardsToShow);
            if (currentIndex < maxIndex) {
                currentIndex++;
                console.log('Click siguiente - nuevo index:', currentIndex);
                updateCarousel();
            }
        });
    }
    
    // Botón anterior
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            if (currentIndex > 0) {
                currentIndex--;
                console.log('Click anterior - nuevo index:', currentIndex);
                updateCarousel();
            }
        });
    }
    
    // Actualizar en resize
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
            const newCardsToShow = getCardsToShow();
            if (newCardsToShow !== cardsToShow) {
                cardsToShow = newCardsToShow;
                currentIndex = 0;
                updateCarousel();
            }
        }, 250);
    });
    
    // Inicializar carrusel después de que las imágenes carguen
    setTimeout(function() {
        updateCarousel();
    }, 100);
    
    
    // ===== HEADER SCROLL EFFECT =====
    const header = document.querySelector('.header');
    let lastScroll = 0;
    
    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 100) {
            header.style.boxShadow = '0 4px 20px rgba(0,0,0,0.15)';
        } else {
            header.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
        }
        
        lastScroll = currentScroll;
    });
    
    
    // ===== SMOOTH SCROLL PARA NAVEGACIÓN =====
    const navLinks = document.querySelectorAll('.nav-menu a');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Solo aplicar smooth scroll si es un ancla interna
            if (href.startsWith('#')) {
                e.preventDefault();
                const targetId = href.substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    const headerHeight = header.offsetHeight;
                    const targetPosition = targetElement.offsetTop - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    
    // ===== VALIDACIÓN FORMULARIO RECALL =====
    const recallInput = document.querySelector('.recall-input');
    const recallBtn = document.querySelector('.recall-info .btn-red');
    
    if (recallInput && recallBtn) {
        // Solo permitir caracteres alfanuméricos
        recallInput.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^A-Za-z0-9]/g, '').toUpperCase();
        });
        
        // Validar al hacer clic en el botón
        recallBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const chasis = recallInput.value.trim();
            
            if (chasis.length !== 17) {
                alert('Por favor, ingresá los 17 dígitos del número de chasis');
                recallInput.focus();
                return;
            }
            
            // Aquí iría la lógica para consultar el recall
            console.log('Consultando recall para chasis:', chasis);
            alert('Consultando información del vehículo...');
        });
    }
    
    
    // ===== ANIMACIONES AL SCROLL =====
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Aplicar animación a secciones
    const sections = document.querySelectorAll('.modelos-carousel, .honda-es, .mapa-section, .ofertas-section, .recall-section');
    
    sections.forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(30px)';
        section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(section);
    });
    
    
    // ===== FILTROS DE MODELOS (PÁGINA MODELOS.PHP) =====
    const filterButtons = document.querySelectorAll('.filter-btn');
    const modeloCardsGrid = document.querySelectorAll('.modelo-card-full');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remover clase activa de todos los botones
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.background = '#999';
            });
            
            // Agregar clase activa al botón clickeado
            this.classList.add('active');
            this.style.background = 'var(--honda-red)';
            
            // Obtener filtro seleccionado
            const filter = this.getAttribute('data-filter');
            console.log('Filtro seleccionado:', filter);
            
            // Filtrar modelos en grid (página modelos.php)
            if (modeloCardsGrid.length > 0) {
                modeloCardsGrid.forEach(card => {
                    const category = card.getAttribute('data-category');
                    
                    if (category === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
            
            // Filtrar modelos en carrusel (homepage)
            if (modeloCards.length > 0) {
                modeloCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    
                    if (category === filter) {
                        card.classList.remove('hidden');
                        card.style.display = 'block';
                    } else {
                        card.classList.add('hidden');
                        card.style.display = 'none';
                    }
                });
                
                // Resetear posición del carrusel
                currentIndex = 0;
                updateCarousel();
            }
        });
    });
    
    
    // ===== BOTONES DE MAPA =====
    const mapaButtons = document.querySelectorAll('.mapa-buttons .btn');
    
    mapaButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Aquí iría la lógica para cambiar el mapa
            console.log('Mostrando:', this.textContent);
            
            // Efecto visual de botón activo
            mapaButtons.forEach(btn => btn.style.opacity = '0.7');
            this.style.opacity = '1';
            
            setTimeout(() => {
                mapaButtons.forEach(btn => btn.style.opacity = '1');
            }, 300);
        });
    });
    
    
    
    
    // ===== LAZY LOADING PARA IMÁGENES =====
    const images = document.querySelectorAll('img');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                observer.unobserve(img);
            }
        });
    });
    
    images.forEach(img => {
        if (img.dataset.src) {
            imageObserver.observe(img);
        }
    });
    
    
    // ===== ANIMACIÓN WHATSAPP BUTTON =====
    const whatsappBtn = document.querySelector('.whatsapp-float');
    
    if (whatsappBtn) {
        // Animación de pulso cada 3 segundos
        setInterval(() => {
            whatsappBtn.style.animation = 'pulse 0.5s ease';
            setTimeout(() => {
                whatsappBtn.style.animation = '';
            }, 500);
        }, 3000);
    }
    
    // ===== DROPDOWN MENU EN MÓVIL =====
    const dropdownItems = document.querySelectorAll('.menu-item-has-dropdown');
    const menuToggle = document.getElementById('menu-toggle');
    
    // Función para cerrar todos los dropdowns
    function closeAllDropdowns() {
        dropdownItems.forEach(item => {
            const dropdown = item.querySelector('.dropdown-menu');
            if (dropdown) {
                dropdown.style.maxHeight = '0';
                item.classList.remove('dropdown-active');
            }
        });
    }
    
    dropdownItems.forEach(item => {
        const link = item.querySelector('a');
        const dropdown = item.querySelector('.dropdown-menu');
        
        // En móvil, hacer que el click en el link principal toggle el dropdown
        link.addEventListener('click', function(e) {
            if (window.innerWidth <= 992) {
                e.preventDefault();
                
                const isActive = item.classList.contains('dropdown-active');
                
                // Cerrar otros dropdowns
                closeAllDropdowns();
                
                // Toggle este dropdown
                if (!isActive) {
                    dropdown.style.maxHeight = '200px';
                    item.classList.add('dropdown-active');
                } else {
                    dropdown.style.maxHeight = '0';
                    item.classList.remove('dropdown-active');
                }
            }
        });
    });
    
    // Cerrar dropdowns cuando se cierra el menú principal
    if (menuToggle) {
        menuToggle.addEventListener('change', function() {
            if (!this.checked) {
                // Menú cerrado, cerrar todos los dropdowns
                closeAllDropdowns();
            }
        });
    }
    
    // Actualizar comportamiento en resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) {
            // En desktop, remover max-height inline y clases
            dropdownItems.forEach(item => {
                const dropdown = item.querySelector('.dropdown-menu');
                if (dropdown) {
                    dropdown.style.maxHeight = '';
                    item.classList.remove('dropdown-active');
                }
            });
        }
    });
    
    // ===== MENÚ MÓVIL (HAMBURGUESA) =====
    // CÓDIGO COMENTADO - Ahora usamos menú hamburguesa con CSS puro (checkbox hack)
    /*
    // Crear botón hamburguesa si no existe
    if (window.innerWidth <= 768) {
        const headerContent = document.querySelector('.header-content');
        const navMenu = document.querySelector('.nav-menu');
        
        // Crear botón hamburguesa
        const hamburger = document.createElement('button');
        hamburger.className = 'hamburger-menu';
        hamburger.innerHTML = '<i class="fas fa-bars"></i>';
        hamburger.style.cssText = `
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-dark);
        `;
        
        // Insertar después del logo
        const logo = document.querySelector('.logo');
        logo.after(hamburger);
        
        // Toggle menú
        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            const icon = this.querySelector('i');
            
            if (navMenu.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
                navMenu.style.display = 'block';
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
                navMenu.style.display = 'none';
            }
        });
        
        // Mostrar hamburguesa en móvil
        function checkMobile() {
            if (window.innerWidth <= 768) {
                hamburger.style.display = 'block';
                navMenu.style.display = 'none';
            } else {
                hamburger.style.display = 'none';
                navMenu.style.display = 'block';
            }
        }
        
        checkMobile();
        window.addEventListener('resize', checkMobile);
    }
    */
    
    
    // ===== MODALES TEST DRIVE Y COTIZACIÓN =====
    const modalTestDrive = document.getElementById('modalTestDrive');
    const modalCotizar = document.getElementById('modalCotizar');
    const modalCloses = document.querySelectorAll('.modal-close');
    
    // Abrir modal Test Drive - todos los botones con clase open-testdrive
    const btnTestDriveAll = document.querySelectorAll('.open-testdrive, #btnTestDrive');
    btnTestDriveAll.forEach(btn => {
        btn.addEventListener('click', function() {
            // Si el botón tiene data-modelo, pre-seleccionar el modelo en el formulario
            const modelo = this.getAttribute('data-modelo');
            if (modelo) {
                const selectModelo = document.getElementById('td-modelo');
                if (selectModelo) {
                    selectModelo.value = modelo;
                }
            }
            modalTestDrive.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });
    
    // Abrir modal Cotizar - todos los botones con clase open-cotizar
    const btnCotizarAll = document.querySelectorAll('.open-cotizar, #btnCotizar');
    btnCotizarAll.forEach(btn => {
        btn.addEventListener('click', function() {
            // Si el botón tiene data-modelo, pre-seleccionar el modelo en el formulario
            const modelo = this.getAttribute('data-modelo');
            if (modelo) {
                const selectModelo = document.getElementById('cot-modelo');
                if (selectModelo) {
                    selectModelo.value = modelo;
                }
            }
            modalCotizar.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });
    
    // Cerrar modales
    modalCloses.forEach(closeBtn => {
        closeBtn.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        });
    });
    
    // Cerrar modal al hacer clic fuera
    window.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal')) {
            e.target.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    });
    
    // Form submissions are handled by the dynamic AJAX setup at the bottom of this file
    
    // ===== BOTONES DEL HERO =====
    const heroButtons = document.querySelectorAll('.btn-hero');
    
    heroButtons.forEach(button => {
        button.addEventListener('click', function() {
            const buttonText = this.textContent;
            console.log('Botón hero clickeado:', buttonText);
            
            if (buttonText.includes('Modelos')) {
                // Scroll a sección de modelos
                const modelosSection = document.querySelector('.modelos-carousel');
                if (modelosSection) {
                    modelosSection.scrollIntoView({ behavior: 'smooth' });
                }
            } else if (buttonText.includes('Test Drive')) {
                // Aquí iría la lógica para agendar test drive
                alert('Agendar Test Drive - Próximamente');
            }
        });
    });
    
    // ===== HERO CAROUSEL =====
    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroIndicators = document.querySelectorAll('.hero-carousel-indicators .indicator');
    const heroPrevBtn = document.querySelector('.hero-carousel-btn.prev');
    const heroNextBtn = document.querySelector('.hero-carousel-btn.next');
    
    let currentSlide = 0;
    let heroAutoplayInterval;
    
    // Función para cambiar slide
    function goToSlide(index) {
        // Remover clase active de todos los slides e indicadores
        heroSlides.forEach(slide => slide.classList.remove('active'));
        heroIndicators.forEach(indicator => indicator.classList.remove('active'));
        
        // Agregar clase active al slide e indicador actual
        heroSlides[index].classList.add('active');
        heroIndicators[index].classList.add('active');
        
        currentSlide = index;
    }
    
    // Función para ir al siguiente slide
    function nextSlide() {
        let next = currentSlide + 1;
        if (next >= heroSlides.length) {
            next = 0;
        }
        goToSlide(next);
    }
    
    // Función para ir al slide anterior
    function prevSlide() {
        let prev = currentSlide - 1;
        if (prev < 0) {
            prev = heroSlides.length - 1;
        }
        goToSlide(prev);
    }
    
    // Event listeners para botones de navegación
    if (heroNextBtn) {
        heroNextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoplay();
        });
    }
    
    if (heroPrevBtn) {
        heroPrevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoplay();
        });
    }
    
    // Event listeners para indicadores
    heroIndicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            goToSlide(index);
            resetAutoplay();
        });
    });
    
    // Autoplay
    function startAutoplay() {
        heroAutoplayInterval = setInterval(nextSlide, 5000); // Cambiar cada 5 segundos
    }
    
    function stopAutoplay() {
        clearInterval(heroAutoplayInterval);
    }
    
    function resetAutoplay() {
        stopAutoplay();
        startAutoplay();
    }
    
    // Iniciar autoplay si hay slides
    if (heroSlides.length > 0) {
        startAutoplay();
        
        // Pausar autoplay cuando el mouse está sobre el carrusel
        const heroCarousel = document.querySelector('.hero-carousel');
        if (heroCarousel) {
            heroCarousel.addEventListener('mouseenter', stopAutoplay);
            heroCarousel.addEventListener('mouseleave', startAutoplay);
        }
    }
    
    // Soporte para navegación con teclado
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            prevSlide();
            resetAutoplay();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
            resetAutoplay();
        }
    });
    
    // ===== CONSOLE LOG PARA DEBUGGING =====
    console.log('Honda Website - Script cargado correctamente');
    console.log('Modelos en carrusel:', modeloCards.length);
    console.log('Hero slides:', heroSlides.length);
});

// ===== ANIMACIÓN CSS PARA WHATSAPP =====
const style = document.createElement('style');
style.textContent = `
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
`;
document.head.appendChild(style);

// ===== CARRUSELES DE MODELOS (auto-discovery dinámico) =====
document.addEventListener('DOMContentLoaded', function() {

    // Función genérica para inicializar un carrusel dentro de un contenedor
    function initCarousel(container) {
        const slides = container.querySelectorAll('.carousel-slide-diseno');
        const images = container.querySelectorAll('.carousel-img-diseno');

        if (slides.length === 0) return;

        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach(s => { s.style.display = 'none'; s.classList.remove('active'); });
            images.forEach(img => { img.style.opacity = '0'; img.classList.remove('active'); });

            const allDots = container.querySelectorAll('.indicator-dot');
            allDots.forEach(dot => {
                dot.style.background = '#ddd';
                dot.classList.remove('active');
                if (parseInt(dot.getAttribute('data-slide')) === index) {
                    dot.style.background = 'var(--honda-red)';
                    dot.classList.add('active');
                }
            });

            if (slides[index]) { slides[index].style.display = 'block'; slides[index].classList.add('active'); }
            if (images[index]) { images[index].style.opacity = '1'; images[index].classList.add('active'); }
            currentSlide = index;
        }

        // Prev / Next buttons (found inside this container)
        container.querySelectorAll('[class*="carousel-prev"]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                showSlide((currentSlide - 1 + slides.length) % slides.length);
            });
        });
        container.querySelectorAll('[class*="carousel-next"]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                showSlide((currentSlide + 1) % slides.length);
            });
        });

        // Indicator dots
        container.querySelectorAll('.indicator-dot').forEach(dot => {
            dot.addEventListener('click', function(e) {
                e.preventDefault();
                showSlide(parseInt(this.getAttribute('data-slide')));
            });
        });

        showSlide(0);
    }

    // Auto-discover all carousel containers (any element whose id starts with "carousel")
    document.querySelectorAll('[id^="carousel"]').forEach(function(el) {
        if (el.querySelector('.carousel-slide-diseno')) {
            initCarousel(el);
        }
    });

    // ===== SISTEMA DE VERSIONES Y COLORES (dinámico) =====
    (function() {
        const versionTabs = document.querySelectorAll('.version-tab');
        const versionContents = document.querySelectorAll('.version-content');
        const versionImages = document.querySelectorAll('.version-image');
        const colorSelectors = document.querySelectorAll('.color-selector');
        const colorButtons = document.querySelectorAll('.color-option');

        if (versionTabs.length === 0) return;

        let currentVersion = versionTabs[0] ? versionTabs[0].dataset.version : null;
        let currentColor = {};

        // Init: track first color per version
        versionTabs.forEach(tab => {
            const ver = tab.dataset.version;
            const firstImg = document.querySelector('.version-image[data-version="' + ver + '"]');
            currentColor[ver] = firstImg ? firstImg.dataset.color : null;
        });

        function changeVersion(version) {
            currentVersion = version;

            versionTabs.forEach(t => t.classList.toggle('active', t.dataset.version === version));
            versionContents.forEach(c => c.classList.toggle('active', c.dataset.version === version));

            // Show/hide per-version color selectors
            colorSelectors.forEach(cs => {
                if (cs.dataset.version) {
                    cs.classList.toggle('active', cs.dataset.version === version);
                    if (cs.dataset.version === version) { cs.style.display = 'flex'; } else { cs.style.display = 'none'; }
                }
            });

            updateImage();
        }

        function changeColor(version, color) {
            currentColor[version] = color;

            // Update active states on color buttons
            colorButtons.forEach(btn => {
                if (!btn.dataset.version || btn.dataset.version === version) {
                    btn.classList.toggle('active', btn.dataset.color === color);
                }
            });

            updateImage();
        }

        function updateImage() {
            const targetColor = currentColor[currentVersion];
            versionImages.forEach(img => {
                img.classList.toggle('active',
                    img.dataset.version === currentVersion && img.dataset.color === targetColor
                );
            });
        }

        versionTabs.forEach(tab => {
            tab.addEventListener('click', () => changeVersion(tab.dataset.version));
        });

        colorButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const ver = btn.dataset.version || currentVersion;
                changeColor(ver, btn.dataset.color);
            });
        });

        // Init display
        if (currentVersion) changeVersion(currentVersion);
    })();

    // ===== SMOOTH SCROLL para sticky-menu =====
    document.querySelectorAll('.sticky-menu a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetEl = document.getElementById(targetId);
            if (targetEl) {
                const offset = 60;
                window.scrollTo({ top: targetEl.getBoundingClientRect().top + window.pageYOffset - offset, behavior: 'smooth' });
            }
        });
    });

    // ===== ACTIVE NAV HIGHLIGHT on scroll =====
    function updateActiveNav() {
        let current = '';
        document.querySelectorAll('.seccion-detalle[id], .versiones-section[id]').forEach(section => {
            const top = section.offsetTop - 100;
            if (window.pageYOffset >= top) {
                current = section.getAttribute('id');
            }
        });
        document.querySelectorAll('.sticky-menu a').forEach(link => {
            const href = link.getAttribute('href');
            if (href && href.startsWith('#')) {
                const isActive = href === '#' + current;
                link.style.fontWeight = isActive ? '800' : '700';
                link.style.color = (isActive && !link.classList.contains('active-ficha')) ? 'var(--honda-red)' : '#333';
            }
        });
    }
    window.addEventListener('scroll', updateActiveNav);

    // ===== FORM AJAX SUBMISSIONS (Test Drive & Cotizar modals) =====
    function setupAjaxForm(formId, modalId) {
        const form = document.getElementById(formId);
        const modal = document.getElementById(modalId);
        if (!form || !modal) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn ? submitBtn.textContent : '';
            if (submitBtn) { submitBtn.textContent = 'Enviando...'; submitBtn.disabled = true; }

            fetch(form.action, {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' },
                body: formData,
            })
            .then(r => r.json())
            .then(data => {
                alert(data.message || '¡Solicitud enviada! Te contactaremos pronto.');
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
                form.reset();
            })
            .catch(() => {
                alert('Error al enviar. Por favor intentá de nuevo.');
            })
            .finally(() => {
                if (submitBtn) { submitBtn.textContent = originalText; submitBtn.disabled = false; }
            });
        });
    }

    setupAjaxForm('formTestDrive', 'modalTestDrive');
    setupAjaxForm('formCotizar', 'modalCotizar');
});

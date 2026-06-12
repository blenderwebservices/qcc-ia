<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCC - Servicios de Certificación y Calidad</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#FCFCF5',
                            100: '#F5EEDC',
                            200: '#EADDBC',
                            300: '#DCC395',
                            400: '#CBA565',
                            500: '#C3A54D',
                            600: '#C3A54D', // Gold
                            700: '#987F3B', // Darker gold for hover
                            800: '#816C32',
                            900: '#624C1D', // Dark brown
                        },
                        secondary: '#362a10', // Very dark brown
                        gray: {
                            50: '#FCFCF5', // Cream
                            100: '#F5F5F0',
                            200: '#EBEBE6',
                            300: '#D6D6D0',
                            400: '#B8B8B2',
                            500: '#96816E', // Taupe
                            600: '#7A6858',
                            700: '#5C4E42',
                            800: '#624C1D', // Dark brown for text
                            900: '#362A10',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Patrón de fondo sutil para el Hero */
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        @keyframes pulse-opacity {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }
        .animate-pulse-opacity {
            animation: pulse-opacity 4s ease-in-out infinite;
            display: inline-block;
            background-image: linear-gradient(to right, #facc15, #ca8a04);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body x-data class="font-sans text-gray-800 bg-gray-50 antialiased selection:bg-primary-500 selection:text-white">

    <!-- Navegación -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-[120px]">
                <div class="flex-shrink-0 flex items-center cursor-pointer">
                    <img src="{{ asset('images/logo.webp') }}" alt="QCC Logo" style="height: 100px;">
                </div>
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="/" class="{{ request()->is('/') ? 'text-primary-600 font-bold border-b-2 border-primary-600 pb-1' : 'text-gray-600 hover:text-primary-600 font-medium transition-colors' }}">Home</a>
                    <a href="{{ route('nosotros') }}" class="{{ request()->routeIs('nosotros') || request()->is('nosotros') ? 'text-primary-600 font-bold border-b-2 border-primary-600 pb-1' : 'text-gray-600 hover:text-primary-600 font-medium transition-colors' }}">Nosotros</a>
                    <a href="/sectores" class="{{ request()->is('sectores') ? 'text-primary-600 font-bold border-b-2 border-primary-600 pb-1' : 'text-gray-600 hover:text-primary-600 font-medium transition-colors' }}">Sectores</a>
                    <a href="/servicios" class="{{ request()->is('servicios') ? 'text-primary-600 font-bold border-b-2 border-primary-600 pb-1' : 'text-gray-600 hover:text-primary-600 font-medium transition-colors' }}">Servicios</a>
                    <a href="{{ route('certificates.index') }}" class="{{ request()->routeIs('certificates.index') ? 'text-primary-600 font-bold border-b-2 border-primary-600 pb-1' : 'text-gray-600 hover:text-primary-600 font-medium transition-colors' }}">Verificación</a>
                    <a href="javascript:void(0)" @click="$dispatch('open-evaluation')" class="bg-primary-600 hover:bg-primary-700 text-white px-5 py-2.5 rounded-full font-medium transition-all shadow-md transform hover:-translate-y-0.5">Evaluación para tu Certificación</a>
                </div>
                <!-- Menú móvil -->
                <div class="md:hidden flex items-center">
                    <button class="text-gray-600 hover:text-primary-600 focus:outline-none p-2">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="relative text-white overflow-hidden pb-20">
        <!-- Background Slider -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/servicios/adeolu-eletu-E7RLgUjjazc-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-100 slide-image-servicios" alt="Servicios 1">
            <img src="{{ asset('images/servicios/lewis-keegan-XQaqV5qYcXg-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 2">
            <img src="{{ asset('images/servicios/marcel-petzold-A86XYnRUb20-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 3">
            <img src="{{ asset('images/servicios/markus-spiske-7PMGUqYQpYc-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 4">
            <img src="{{ asset('images/servicios/radission-us-_XeQ8XEWb4Q-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 5">
            <img src="{{ asset('images/servicios/signature-pro-wB9iWZKwljw-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 6">
            <img src="{{ asset('images/servicios/skytech-aviation-6hWK5wYj7nk-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 7">
            <img src="{{ asset('images/servicios/sortter-HgfSImH9ZYw-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 8">
            <img src="{{ asset('images/servicios/vitaly-gariev-5txln04Cx7I-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 9">
            <img src="{{ asset('images/servicios/vitaly-gariev-7mgkmRY4ZLM-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 10">
            <img src="{{ asset('images/servicios/vitaly-gariev-K0aM-ztA76Q-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 11">
            <img src="{{ asset('images/servicios/vitaly-gariev-l0E0Y1TdzxE-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 12">
            <img src="{{ asset('images/servicios/vitaly-gariev-piULICqeV5Y-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-servicios" alt="Servicios 13">
        </div>
        <!-- Overlays -->
        <div class="absolute inset-0 bg-secondary/70 mix-blend-multiply z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-secondary/90 to-transparent z-10"></div>
        <div class="absolute inset-0 bg-pattern opacity-30 z-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-24 lg:py-32 flex flex-col items-center text-center">
            <span class="bg-white/10 text-primary-100 border border-white/20 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-6 shadow-sm inline-flex items-center gap-2 backdrop-blur-sm">
                <i data-lucide="award" class="w-4 h-4"></i> Organismo Certificador en Sistemas de Gestión
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 leading-tight max-w-4xl">
                Certificación de Calidad para un <span class="animate-pulse-opacity">Futuro Competitivo</span>
            </h1>
            <p class="text-lg md:text-xl text-primary-100 max-w-2xl mb-10 leading-relaxed font-light">
                Elevamos los estándares de tu organización con auditorías de alto valor, capacitación experta y certificación oficial (ISO, NOM).
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#servicios" class="bg-white text-primary-900 hover:bg-gray-50 px-8 py-3.5 rounded-full font-bold transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2 group">
                    Nuestros Servicios
                    <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="#contacto" class="bg-transparent border border-white/40 text-white hover:bg-white/10 px-8 py-3.5 rounded-full font-bold transition-all flex items-center justify-center gap-2">
                    Solicitar Información
                </a>
            </div>
        </div>
        
        <!-- Curva inferior decorativa -->
        <div class="absolute bottom-0 inset-x-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full text-gray-50 h-auto">
                <path d="M0 120L1440 120L1440 0C1440 0 1146.36 100 720 100C293.643 100 0 0 0 0L0 120Z" fill="currentColor"/>
            </svg>
        </div>
    </section>

    <!-- Servicios Clave -->
    <section id="servicios" class="py-20 lg:py-28 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">Áreas de Especialidad</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Soluciones para cada etapa de su proyecto</h3>
                <p class="text-gray-600 text-lg">En QCC brindamos herramientas integrales que impulsan la mejora continua y optimizan los sistemas de gestión para alcanzar la excelencia organizacional.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Servicio 1 -->
                <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                    <div class="w-14 h-14 bg-primary-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-primary-600 transition-colors duration-300">
                        <i data-lucide="graduation-cap" class="w-7 h-7 text-primary-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-secondary mb-3">Capacitación</h4>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Proceso sistemático de transmisión de conocimientos y desarrollo de habilidades. Mejoramos el desempeño, aseguramos el cumplimiento regulatorio y elevamos sus estándares de calidad operativos.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start gap-2 text-sm text-gray-500">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-primary-500 shrink-0"></i> Desarrollo de competencias.
                        </li>
                        <li class="flex items-start gap-2 text-sm text-gray-500">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-primary-500 shrink-0"></i> Actualización normativa.
                        </li>
                    </ul>
                </div>

                <!-- Servicio 2 -->
                <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 group relative overflow-hidden">
                    <!-- Destacado -->
                    <div class="absolute top-0 right-0 bg-primary-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">Más Solicitado</div>
                    
                    <div class="w-14 h-14 bg-primary-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-primary-600 transition-colors duration-300">
                        <i data-lucide="clipboard-check" class="w-7 h-7 text-primary-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-secondary mb-3">Auditoría</h4>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Evaluación estructurada, independiente y documentada. Verificamos la conformidad de sus procesos con base en criterios internacionales para identificar oportunidades de mejora.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start gap-2 text-sm text-gray-500">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-primary-500 shrink-0"></i> Preparación para certificación.
                        </li>
                        <li class="flex items-start gap-2 text-sm text-gray-500">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-primary-500 shrink-0"></i> Detección de desviaciones.
                        </li>
                    </ul>
                </div>

                <!-- Servicio 3 -->
                <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                    <div class="w-14 h-14 bg-primary-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-primary-600 transition-colors duration-300">
                        <i data-lucide="shield-check" class="w-7 h-7 text-primary-600 group-hover:text-white transition-colors"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-secondary mb-3">Certificación</h4>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Confirmación oficial de que su sistema de gestión, producto o servicio cumple los requisitos de normas específicas (ISO, NOM). Aporta confianza al mercado y abre puertas comerciales.
                    </p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-start gap-2 text-sm text-gray-500">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-primary-500 shrink-0"></i> Reconocimiento formal.
                        </li>
                        <li class="flex items-start gap-2 text-sm text-gray-500">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-primary-500 shrink-0"></i> Mantenimiento y vigilancia.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Proceso Section -->
    <section id="proceso" class="py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">Transparencia y Eficiencia</h2>
                    <h3 class="text-3xl md:text-4xl font-bold text-secondary mb-6">Nuestro proceso de certificación, paso a paso.</h3>
                    <p class="text-gray-600 text-lg mb-8">
                        Hemos optimizado nuestra metodología para que su transición hacia la certificación sea clara, estructurada y sin contratiempos. Cada fase está diseñada para agregar valor real a su organización.
                    </p>
                    
                    <div class="bg-primary-50 rounded-2xl p-6 border border-primary-100">
                        <div class="flex items-start gap-4">
                            <div class="bg-primary-600 text-white rounded-full p-2 mt-1">
                                <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-secondary mb-1">Enfoque en Resultados</h4>
                                <p class="text-sm text-gray-600">Nuestras auditorías no solo buscan el cumplimiento normativo, sino que señalan oportunidades clave para fortalecer la eficiencia y competitividad de su negocio.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline simplificada -->
                <div class="relative">
                    <!-- Linea conectora -->
                    <div class="absolute left-6 top-6 bottom-6 w-0.5 bg-gray-200"></div>

                    <div class="space-y-8 relative">
                        <!-- Paso 1 -->
                        <div class="flex gap-6 items-start relative group">
                            <div class="w-12 h-12 bg-white border-2 border-primary-500 rounded-full flex items-center justify-center font-bold text-primary-600 z-10 shrink-0 group-hover:bg-primary-500 group-hover:text-white transition-colors">1</div>
                            <div class="pt-2">
                                <h4 class="text-xl font-bold text-secondary mb-1">Solicitud de Certificación</h4>
                                <p class="text-gray-600 text-sm">Evaluamos la documentación de su sistema de gestión para asegurar que cumpla con los requisitos base de la norma.</p>
                            </div>
                        </div>
                        <!-- Paso 2 -->
                        <div class="flex gap-6 items-start relative group">
                            <div class="w-12 h-12 bg-white border-2 border-primary-500 rounded-full flex items-center justify-center font-bold text-primary-600 z-10 shrink-0 group-hover:bg-primary-500 group-hover:text-white transition-colors">2</div>
                            <div class="pt-2">
                                <h4 class="text-xl font-bold text-secondary mb-1">Evaluación Documental / Preauditoría</h4>
                                <p class="text-gray-600 text-sm">Auditoría preliminar (opcional) que identifica posibles no conformidades antes de la revisión principal en sitio.</p>
                            </div>
                        </div>
                        <!-- Paso 3 -->
                        <div class="flex gap-6 items-start relative group">
                            <div class="w-12 h-12 bg-white border-2 border-primary-500 rounded-full flex items-center justify-center font-bold text-primary-600 z-10 shrink-0 group-hover:bg-primary-500 group-hover:text-white transition-colors">3</div>
                            <div class="pt-2">
                                <h4 class="text-xl font-bold text-secondary mb-1">Auditoría de Certificación</h4>
                                <p class="text-gray-600 text-sm">Verificamos el cumplimiento efectivo del sistema mediante entrevistas, observaciones y revisión de registros.</p>
                            </div>
                        </div>
                        <!-- Paso 4 -->
                        <div class="flex gap-6 items-start relative group">
                            <div class="w-12 h-12 bg-white border-2 border-primary-500 rounded-full flex items-center justify-center font-bold text-primary-600 z-10 shrink-0 group-hover:bg-primary-500 group-hover:text-white transition-colors">4</div>
                            <div class="pt-2">
                                <h4 class="text-xl font-bold text-secondary mb-1">Dictaminación y Emisión</h4>
                                <p class="text-gray-600 text-sm">Un comité analiza los resultados y, si se aprueba, se emite el certificado oficial validando el sistema de gestión.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Beneficios Section -->
    <section id="beneficios" class="py-20 bg-secondary text-white relative overflow-hidden">
        <!-- Decoración de fondo -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-primary-600/20 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-primary-400/10 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-primary-400 font-bold tracking-wide uppercase text-sm mb-2">Por qué elegirnos</h2>
                <h3 class="text-3xl md:text-4xl font-bold mb-4">El impacto de trabajar con QCC</h3>
                <p class="text-gray-400 text-lg">Más allá de un certificado, aportamos valor estratégico a los sectores de Educación, Salud, Servicios Sociales, Administración Pública y más.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Beneficio -->
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-sm hover:bg-white/10 transition-colors">
                    <div class="bg-primary-500/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <i data-lucide="globe-2" class="w-6 h-6 text-primary-300"></i>
                    </div>
                    <h4 class="text-lg font-bold mb-2">Prestigio Internacional</h4>
                    <p class="text-gray-400 text-sm leading-relaxed">Protege las exportaciones contra barreras técnicas y eleva el prestigio de sus productos nacionales en el extranjero.</p>
                </div>
                <!-- Beneficio -->
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-sm hover:bg-white/10 transition-colors">
                    <div class="bg-primary-500/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <i data-lucide="check-square" class="w-6 h-6 text-primary-300"></i>
                    </div>
                    <h4 class="text-lg font-bold mb-2">Transparencia</h4>
                    <p class="text-gray-400 text-sm leading-relaxed">Da transparencia al mercado, protege la calidad del consumo y ayuda a los intercambios comerciales por la confianza generada.</p>
                </div>
                <!-- Beneficio -->
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-sm hover:bg-white/10 transition-colors">
                    <div class="bg-primary-500/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <i data-lucide="users" class="w-6 h-6 text-primary-300"></i>
                    </div>
                    <h4 class="text-lg font-bold mb-2">Experiencia de Auditores</h4>
                    <p class="text-gray-400 text-sm leading-relaxed">Contamos con personal altamente capacitado y auditores con amplia experiencia sectorial enfocados en la mejora continua.</p>
                </div>
                <!-- Beneficio -->
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur-sm hover:bg-white/10 transition-colors">
                    <div class="bg-primary-500/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <i data-lucide="shield" class="w-6 h-6 text-primary-300"></i>
                    </div>
                    <h4 class="text-lg font-bold mb-2">Mitigación de Riesgos</h4>
                    <p class="text-gray-400 text-sm leading-relaxed">Asegura que los bienes y servicios cumplan requisitos obligatorios relacionados con salud, seguridad y medio ambiente.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto / CTA -->
    <section id="contacto" class="py-24 bg-primary-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col lg:flex-row">
                <!-- Info de contacto -->
                <div class="lg:w-2/5 bg-primary-700 text-white p-10 lg:p-12 flex flex-col justify-between">
                    <div>
                        <h3 class="text-3xl font-bold mb-4">Inicie su proyecto hoy</h3>
                        <p class="text-primary-100 mb-10">Estamos listos para ser su aliado estratégico en calidad y excelencia. Contáctenos para recibir asesoría personalizada.</p>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <i data-lucide="map-pin" class="w-6 h-6 text-primary-300 shrink-0 mt-1"></i>
                                <div>
                                    <h5 class="font-bold">Nuestra Oficina</h5>
                                    <p class="text-primary-100 text-sm mt-1">Holbein 159, Noche Buena,<br> 03720, CDMX.</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <i data-lucide="phone" class="w-6 h-6 text-primary-300 shrink-0"></i>
                                <div>
                                    <h5 class="font-bold">Llámenos</h5>
                                    <p class="text-primary-100 text-sm mt-1">+52 5581-06-2827</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <i data-lucide="mail" class="w-6 h-6 text-primary-300 shrink-0"></i>
                                <div>
                                    <h5 class="font-bold">Correo Electrónico</h5>
                                    <p class="text-primary-100 text-sm mt-1">quality@qcc.com.mx</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="lg:w-3/5 p-10 lg:p-12">
                    <h3 class="text-2xl font-bold text-secondary mb-6">Envíenos un mensaje</h3>
                    <form class="space-y-5" onsubmit="event.preventDefault(); alert('Formulario de demostración. En producción, esto enviará el correo a quality@qcc.com.mx');">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre *</label>
                                <input type="text" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Empresa</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico *</label>
                                <input type="email" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                                <input type="tel" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Asunto *</label>
                            <input type="text" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pregunta / Mensaje *</label>
                            <textarea required rows="4" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all resize-none"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-6 rounded-lg transition-colors shadow-md">
                            Enviar Solicitud
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-secondary text-gray-400 py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <img src="{{ asset('images/logo.webp') }}" alt="QCC Logo" style="height: 100px;">
                    </div>
                    <p class="text-sm max-w-sm mb-4">Acreditando la excelencia y competitividad organizacional mediante procesos de auditoría imparciales y confiables.</p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/" class="hover:text-primary-400 transition-colors">Home</a></li>
                        <li><a href="{{ route('nosotros') }}" class="hover:text-primary-400 transition-colors">Nosotros</a></li>
                        <li><a href="/sectores" class="hover:text-primary-400 transition-colors">Sectores Evaluados</a></li>
                        <li><a href="/admin" class="hover:text-primary-400 transition-colors">Dashboard (Admin)</a></li>
                        <li><a href="/servicios" class="hover:text-primary-400 transition-colors">Nuestros Servicios</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Contacto</h4>
                    <ul class="space-y-2 text-sm">
                        <li>Holbein 159, Noche Buena</li>
                        <li>03720, CDMX, México.</li>
                        <li class="pt-2"><a href="mailto:quality@qcc.com.mx" class="hover:text-primary-400 transition-colors">quality@qcc.com.mx</a></li>
                        <li><a href="tel:+525581062827" class="hover:text-primary-400 transition-colors">+52 5581-06-2827</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
                <p>© 2026 Quality & Competitive College, S.C. Todos los derechos reservados.</p>
                <div class="flex space-x-4">
                    <a href="javascript:void(0)" @click="$dispatch('open-principios')" class="hover:text-white transition-colors">Principios</a>
                    <a href="javascript:void(0)" @click="$dispatch('open-politica')" class="hover:text-white transition-colors">Política de Gestión</a>
                    <a href="javascript:void(0)" @click="$dispatch('open-privacy')" class="hover:text-white transition-colors">Aviso de Privacidad</a>
                    <a href="#" class="hover:text-white transition-colors">Términos de Servicio</a>
                </div>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    @if($settings?->facebook_url) <a href="{{ $settings->facebook_url }}" target="_blank" class="hover:text-gray-400 transition-colors"><i data-lucide="facebook" class="w-5 h-5"></i></a> @endif
                    @if($settings?->instagram_url) <a href="{{ $settings->instagram_url }}" target="_blank" class="hover:text-gray-400 transition-colors"><i data-lucide="instagram" class="w-5 h-5"></i></a> @endif
                    @if($settings?->linkedin_url) <a href="{{ $settings->linkedin_url }}" target="_blank" class="hover:text-gray-400 transition-colors"><i data-lucide="linkedin" class="w-5 h-5"></i></a> @endif
                </div>
            </div>
        </div>
    </footer>

    <livewire:chatbot />
    @livewireScripts
    <script>
        lucide.createIcons();

        document.addEventListener('DOMContentLoaded', () => {
            const heroSlides = document.querySelectorAll('.slide-image-servicios');
            let currentHeroSlide = 0;

            if (heroSlides.length > 0) {
                setInterval(() => {
                    heroSlides[currentHeroSlide].classList.remove('opacity-100');
                    heroSlides[currentHeroSlide].classList.add('opacity-0');
                    currentHeroSlide = (currentHeroSlide + 1) % heroSlides.length;
                    heroSlides[currentHeroSlide].classList.remove('opacity-0');
                    heroSlides[currentHeroSlide].classList.add('opacity-100');
                }, 4000);
            }
        });
    </script>
        @include('evaluation-modal')
        @include('politica-gestion-modal')
        @include('principios-modal')
        @include('aviso-privacidad-modal')
</body>
</html>
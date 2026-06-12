<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCC - Sectores y Cotización de Certificación</title>
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
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .card-hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
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
    <section class="relative text-white overflow-hidden pb-20">
        <!-- Background Slider -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/sectores/andy-fluet-2eAr5Wst2e0-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-100 slide-image-sectores" alt="Sectores 1">
            <img src="{{ asset('images/sectores/aubrey-odom-P6pe2Qr5TmU-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-sectores" alt="Sectores 2">
            <img src="{{ asset('images/sectores/chris-curry-CQmnJ2-ODIQ-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-sectores" alt="Sectores 3">
            <img src="{{ asset('images/sectores/compagnons-8uA8Fj74Zwo-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-sectores" alt="Sectores 4">
            <img src="{{ asset('images/sectores/donald-wu-3xuX6xJz8AM-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-sectores" alt="Sectores 5">
            <img src="{{ asset('images/sectores/fionn-grosse-M_4tdtTg8uI-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-sectores" alt="Sectores 6">
            <img src="{{ asset('images/sectores/miao-xiang-ZDSlOZrxT3w-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-sectores" alt="Sectores 7">
            <img src="{{ asset('images/sectores/yue-wu-fYVNG_eex6Q-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-sectores" alt="Sectores 8">
            <img src="{{ asset('images/sectores/zoshua-colah-4J7X9_tejnI-unsplash.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-sectores" alt="Sectores 9">
        </div>
        <!-- Overlays -->
        <div class="absolute inset-0 bg-secondary/70 mix-blend-multiply z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-secondary/90 to-transparent z-10"></div>
        <div class="absolute inset-0 bg-pattern opacity-30 z-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-20 lg:py-28 flex flex-col items-center text-center">
            <span class="bg-white/10 text-primary-100 border border-white/20 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-6 shadow-sm inline-flex items-center gap-2 backdrop-blur-sm">
                <i data-lucide="briefcase" class="w-4 h-4"></i> Auditoría Especializada
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 leading-tight max-w-4xl">
                Soluciones para su <span class="bg-primary-600 text-white px-4 py-1 rounded-lg shadow-xl inline-block mt-2">Sector Específico</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-3xl mb-10 leading-relaxed font-light">
                Entendemos que cada industria tiene retos únicos. Desarrollamos propuestas de valor y certificaciones ajustadas a las normativas de la administración pública, salud, educación y servicios sociales.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#sectores" class="bg-primary-600 hover:bg-primary-500 text-white px-8 py-3.5 rounded-full font-bold transition-all shadow-lg flex items-center justify-center gap-2">
                    Ver Códigos y Sectores
                    <i data-lucide="chevron-down" class="w-5 h-5"></i>
                </a>
                <a href="#cotizacion" class="bg-white text-secondary hover:bg-gray-50 px-8 py-3.5 rounded-full font-bold transition-all shadow-lg flex items-center justify-center gap-2">
                    ¿Cómo cotizamos?
                </a>
            </div>
        </div>
    </section>

    <!-- Barra de Experiencia -->
    <div class="bg-primary-600 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center divide-x divide-primary-500/50">
                <div>
                    <div class="text-2xl font-bold">2014</div>
                    <div class="text-primary-100 text-sm mt-1">Admin. Pública</div>
                </div>
                <div>
                    <div class="text-2xl font-bold">2016</div>
                    <div class="text-primary-100 text-sm mt-1">Sector Salud</div>
                </div>
                <div>
                    <div class="text-2xl font-bold">2019</div>
                    <div class="text-primary-100 text-sm mt-1">Educación</div>
                </div>
                <div>
                    <div class="text-2xl font-bold">2021</div>
                    <div class="text-primary-100 text-sm mt-1">Servicios Sociales</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sectores / Scopes Section -->
    <section id="sectores" class="py-20 lg:py-28 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">Alcance de Certificación</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-secondary mb-4">Experiencia que respalda su industria</h3>
                <p class="text-gray-600 text-lg">Conocemos a fondo los requisitos legales, técnicos y operativos de los sectores más críticos, asegurando auditorías de valor, no solo de cumplimiento.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Sector 1: Administración Pública -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 card-hover-effect transition-all duration-300 flex flex-col h-full relative overflow-hidden group">
                    <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('{{ $settings?->public_admin_image ? (Str::startsWith($settings->public_admin_image, ['http', 'https']) ? $settings->public_admin_image : asset($settings->public_admin_image)) : asset('images/sectorAdministracionPublica/javad-esmaeili-tEzlKEPCxlA-unsplash.jpg') }}');"></div>
                    <div class="absolute inset-0 bg-white/80 z-0 group-hover:bg-white/60 transition-colors duration-300"></div>
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary-50/50 rounded-bl-full z-0 group-hover:scale-110 transition-transform"></div>
                    <div class="flex justify-between items-start mb-6 relative z-10">
                        <div class="w-14 h-14 bg-primary-100 text-primary-700 rounded-xl flex items-center justify-center">
                            <i data-lucide="landmark" class="w-7 h-7"></i>
                        </div>
                        <div class="flex gap-2">
                            <span class="bg-white/80 backdrop-blur text-gray-800 text-xs font-bold px-2.5 py-1 rounded">IAF: 36</span>
                            <span class="bg-white/80 backdrop-blur text-gray-800 text-xs font-bold px-2.5 py-1 rounded">NACE: L/84</span>
                        </div>
                    </div>
                    <h4 class="text-2xl font-bold text-secondary mb-2 relative z-10">Administración Pública</h4>
                    <p class="text-primary-700 text-sm font-medium mb-6 relative z-10">Una maravillosa colaboración desde 2014</p>
                    
                    <div class="space-y-4 flex-grow text-gray-800 font-medium text-sm leading-relaxed relative z-10">
                        <div>
                            <strong class="text-secondary block mb-1 font-extrabold">¿Qué comprende?</strong>
                            Abarca la planificación, gestión y supervisión de las políticas públicas orientadas al desarrollo económico y social, así como a la seguridad nacional.
                        </div>
                        <div>
                            <strong class="text-secondary block mb-1 font-extrabold">¿Qué incluye?</strong>
                            Administración fiscal, diseño y programas de salud, educación, vivienda, medio ambiente y cultura; regulación de sectores estratégicos; coordinación de relaciones exteriores, justicia, defensa, orden público y protección civil.
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-5 border-t border-gray-300/50 relative z-10">
                        <strong class="text-primary-800 flex items-center gap-2 mb-2 font-extrabold">
                            <i data-lucide="target" class="w-4 h-4"></i> Finalidad
                        </strong>
                        <p class="text-sm text-gray-800 font-medium">Garantizar un entorno institucional eficiente, transparente y orientado al bienestar colectivo y la competitividad del país.</p>
                    </div>
                </div>

                <!-- Sector 2: Salud y Asistencia Social -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 card-hover-effect transition-all duration-300 flex flex-col h-full relative overflow-hidden group">
                    <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('{{ $settings?->health_image ? (Str::startsWith($settings->health_image, ['http', 'https']) ? $settings->health_image : asset($settings->health_image)) : asset('images/sectorSaludAsistenciaSocial/etactics-inc-KLgvBN32d_U-unsplash.jpg') }}');"></div>
                    <div class="absolute inset-0 bg-white/80 z-0 group-hover:bg-white/60 transition-colors duration-300"></div>
                    <div class="absolute top-0 right-0 w-32 h-32 bg-rose-50/50 rounded-bl-full z-0 group-hover:scale-110 transition-transform"></div>
                    <div class="flex justify-between items-start mb-6 relative z-10">
                        <div class="w-14 h-14 bg-rose-100 text-rose-600 rounded-xl flex items-center justify-center">
                            <i data-lucide="heart-pulse" class="w-7 h-7"></i>
                        </div>
                        <div class="flex gap-2 flex-wrap justify-end max-w-[50%]">
                            <span class="bg-white/80 backdrop-blur text-gray-800 text-xs font-bold px-2.5 py-1 rounded mb-1">IAF: 38</span>
                            <span class="bg-white/80 backdrop-blur text-gray-800 text-xs font-bold px-2.5 py-1 rounded mb-1">NACE: N/75, 86, 87, 88</span>
                        </div>
                    </div>
                    <h4 class="text-2xl font-bold text-secondary mb-2 relative z-10">Salud y Asistencia Social</h4>
                    <p class="text-rose-700 text-sm font-medium mb-6 relative z-10">Creciendo juntos desde 2016</p>
                    
                    <div class="space-y-4 flex-grow text-gray-800 font-medium text-sm leading-relaxed relative z-10">
                        <div>
                            <strong class="text-secondary block mb-1 font-extrabold">¿Qué comprende?</strong>
                            Abarca el sector de la salud y asistencia social, incluyendo actividades de médicos, hospitalarias, odontológicas y de cuidado especializado.
                        </div>
                        <div>
                            <strong class="text-secondary block mb-1 font-extrabold">¿Qué incluye?</strong>
                            Certificamos la calidad en hospitales, clínicas, centros de rehabilitación, residencias geriátricas, instituciones para personas con discapacidad, servicios paramédicos, ambulancias y actividades veterinarias.
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-5 border-t border-gray-300/50 relative z-10">
                        <strong class="text-rose-700 flex items-center gap-2 mb-2 font-extrabold">
                            <i data-lucide="target" class="w-4 h-4"></i> Finalidad
                        </strong>
                        <p class="text-sm text-gray-800 font-medium">Aseguramos que los procesos cumplan con estándares nacionales e internacionales, garantizando atención segura, ética y eficaz.</p>
                    </div>
                </div>

                <!-- Sector 3: Educación -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 card-hover-effect transition-all duration-300 flex flex-col h-full relative overflow-hidden group">
                    <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('{{ $settings?->education_image ? (Str::startsWith($settings->education_image, ['http', 'https']) ? $settings->education_image : asset($settings->education_image)) : asset('images/sectorEducativo/dmitrii-e-qT4pYH2uYx4-unsplash.jpg') }}');"></div>
                    <div class="absolute inset-0 bg-white/80 z-0 group-hover:bg-white/60 transition-colors duration-300"></div>
                    <div class="absolute top-0 right-0 w-32 h-32 bg-amber-50/50 rounded-bl-full z-0 group-hover:scale-110 transition-transform"></div>
                    <div class="flex justify-between items-start mb-6 relative z-10">
                        <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center">
                            <i data-lucide="graduation-cap" class="w-7 h-7"></i>
                        </div>
                        <div class="flex gap-2">
                            <span class="bg-white/80 backdrop-blur text-gray-800 text-xs font-bold px-2.5 py-1 rounded">IAF: 37</span>
                        </div>
                    </div>
                    <h4 class="text-2xl font-bold text-secondary mb-2 relative z-10">Sector Educativo</h4>
                    <p class="text-amber-700 text-sm font-medium mb-6 relative z-10">Una colaboración exitosa desde 2019</p>
                    
                    <div class="space-y-4 flex-grow text-gray-800 font-medium text-sm leading-relaxed relative z-10">
                        <div>
                            <strong class="text-secondary block mb-1 font-extrabold">¿Qué comprende?</strong>
                            La evaluación y certificación de instituciones educativas en diversos niveles formativos, enfocadas en la mejora continua de la enseñanza.
                        </div>
                        <div>
                            <strong class="text-secondary block mb-1 font-extrabold">¿Qué incluye?</strong>
                            Programas técnicos, formación continua, capacitación para el trabajo, actividades culturales, deportivas y todos los servicios auxiliares de apoyo educativo.
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-5 border-t border-gray-300/50 relative z-10">
                        <strong class="text-amber-700 flex items-center gap-2 mb-2 font-extrabold">
                            <i data-lucide="target" class="w-4 h-4"></i> Finalidad
                        </strong>
                        <p class="text-sm text-gray-800 font-medium">Nuestro enfoque en la certificación fortalece la confianza y la excelencia en los procesos formativos e instituciones académicas.</p>
                    </div>
                </div>

                <!-- Sector 4: Servicios Sociales y Sostenibilidad -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 card-hover-effect transition-all duration-300 flex flex-col h-full relative overflow-hidden group">
                    <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('{{ $settings?->social_services_image ? (Str::startsWith($settings->social_services_image, ['http', 'https']) ? $settings->social_services_image : asset($settings->social_services_image)) : asset('images/sectorServiciosSociales/daniele-colucci-A39jivOBEio-unsplash.jpg') }}');"></div>
                    <div class="absolute inset-0 bg-white/80 z-0 group-hover:bg-white/60 transition-colors duration-300"></div>
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50/50 rounded-bl-full z-0 group-hover:scale-110 transition-transform"></div>
                    <div class="flex justify-between items-start mb-6 relative z-10">
                        <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center">
                            <i data-lucide="leaf" class="w-7 h-7"></i>
                        </div>
                        <div class="flex gap-2">
                            <span class="bg-white/80 backdrop-blur text-gray-800 text-xs font-bold px-2.5 py-1 rounded">IAF: 39</span>
                        </div>
                    </div>
                    <h4 class="text-2xl font-bold text-secondary mb-2 relative z-10">Servicios Sociales y Sostenibilidad</h4>
                    <p class="text-emerald-700 text-sm font-medium mb-6 relative z-10">Socios exitosos desde 2021</p>
                    
                    <div class="space-y-4 flex-grow text-gray-800 font-medium text-sm leading-relaxed relative z-10">
                        <div>
                            <strong class="text-secondary block mb-1 font-extrabold">¿Qué comprende?</strong>
                            Abarca un amplio espectro de servicios esenciales para la sociedad y el cuidado del entorno ecológico e infraestructura municipal.
                        </div>
                        <div>
                            <strong class="text-secondary block mb-1 font-extrabold">¿Qué incluye?</strong>
                            Gestión de aguas residuales, recolección y tratamiento de residuos, descontaminación ambiental, actividades recreativas, informativas y de asistencia social pública.
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-5 border-t border-gray-300/50 relative z-10">
                        <strong class="text-emerald-700 flex items-center gap-2 mb-2 font-extrabold">
                            <i data-lucide="target" class="w-4 h-4"></i> Finalidad
                        </strong>
                        <p class="text-sm text-gray-800 font-medium">Certificamos procesos que garantizan la sostenibilidad, seguridad y calidad en el servicio, impactando directamente en el bienestar comunitario y medio ambiente.</p>
                    </div>
                </div>
                <!-- Sector 5: Otros Servicios -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 card-hover-effect transition-all duration-300 flex flex-col h-full relative overflow-hidden group">
                    <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('{{ $settings?->other_services_image ? (Str::startsWith($settings->other_services_image, ['http', 'https']) ? $settings->other_services_image : asset($settings->other_services_image)) : asset('images/sectorOtrosServicios/business-meeting.jpg') }}');"></div>
                    <div class="absolute inset-0 bg-white/80 z-0 group-hover:bg-white/60 transition-colors duration-300"></div>
                    <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-50/50 rounded-bl-full z-0 group-hover:scale-110 transition-transform"></div>
                    <div class="flex justify-between items-start mb-6 relative z-10">
                        <div class="w-14 h-14 bg-indigo-100 text-indigo-700 rounded-xl flex items-center justify-center">
                            <i data-lucide="briefcase" class="w-7 h-7"></i>
                        </div>
                        <div class="flex gap-2 flex-wrap justify-end max-w-[50%]">
                            <span class="bg-white/80 backdrop-blur text-gray-800 text-xs font-bold px-2.5 py-1 rounded mb-1">IAF: 35</span>
                            <span class="bg-white/80 backdrop-blur text-gray-800 text-xs font-bold px-2.5 py-1 rounded mb-1">NACE: M/70, 73, 74, 78, 80, 81, 82</span>
                        </div>
                    </div>
                    <h4 class="text-2xl font-bold text-secondary mb-2 relative z-10">Otros Servicios</h4>
                    <p class="text-indigo-700 text-sm font-medium mb-6 relative z-10">Una maravillosa colaboración desde 2014</p>
                    
                    <div class="space-y-4 flex-grow text-gray-800 font-medium text-sm leading-relaxed relative z-10">
                        <div>
                            <strong class="text-secondary block mb-1 font-extrabold">¿Qué comprende?</strong>
                            Abarca un conjunto estratégico de actividades profesionales y de soporte empresarial que contribuyen al funcionamiento eficiente, legal y operativo de las organizaciones.
                        </div>
                        <div>
                            <strong class="text-secondary block mb-1 font-extrabold">¿Qué incluye?</strong>
                            Servicios jurídicos, contables, consultoría en gestión, mercadeo, estudios de mercado, publicidad, traducción, recursos humanos, seguridad privada, mantenimiento y jardinería.
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-5 border-t border-gray-300/50 relative z-10">
                        <strong class="text-indigo-700 flex items-center gap-2 mb-2 font-extrabold">
                            <i data-lucide="target" class="w-4 h-4"></i> Finalidad
                        </strong>
                        <p class="text-sm text-gray-800 font-medium">Fortalecer su competitividad y sostenibilidad en las empresas de todos los sectores económicos a través de la calidad y conformidad normativa.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Cómo cotizamos (Pricing Explanation) -->
    <section id="cotizacion" class="py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5">
                    <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">Inversión a la Medida</h2>
                    <h3 class="text-3xl font-bold text-secondary mb-6">¿Cómo calculamos su propuesta económica?</h3>
                    <p class="text-gray-600 mb-6">
                        Como Organismo Certificador, no manejamos "paquetes estándar". Nuestras cotizaciones están estrictamente apegadas a las normativas del <strong>Foro Internacional de Acreditación (IAF)</strong> para garantizar la imparcialidad y el tiempo correcto de auditoría.
                    </p>
                    <p class="text-gray-600 mb-8">
                        El costo de certificación depende de variables específicas de su organización.
                    </p>
                </div>
                
                <div class="lg:col-span-7">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                            <i data-lucide="users" class="w-8 h-8 text-primary-500 mb-4"></i>
                            <h5 class="font-bold text-secondary mb-2">Tamaño de la empresa</h5>
                            <p class="text-sm text-gray-500">Cantidad de empleados involucrados en el alcance del Sistema de Gestión (tiempo efectivo de auditoría).</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                            <i data-lucide="map" class="w-8 h-8 text-primary-500 mb-4"></i>
                            <h5 class="font-bold text-secondary mb-2">Número de sitios</h5>
                            <p class="text-sm text-gray-500">Cantidad de sucursales, plantas u oficinas que serán incluidas en el certificado final.</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                            <i data-lucide="book-open-check" class="w-8 h-8 text-primary-500 mb-4"></i>
                            <h5 class="font-bold text-secondary mb-2">Norma a Certificar</h5>
                            <p class="text-sm text-gray-500">ISO 9001, NOMs, u otras integraciones que requieran especialistas distintos.</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                            <i data-lucide="settings" class="w-8 h-8 text-primary-500 mb-4"></i>
                            <h5 class="font-bold text-secondary mb-2">Complejidad del Sector</h5>
                            <p class="text-sm text-gray-500">El riesgo asociado a la industria (ej. sector salud vs. sector administrativo) define el perfil del auditor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cotizador / Formulario de Contacto Especializado -->
    <section id="cotizar" class="py-24 bg-primary-900 text-white relative">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-primary-600/30 blur-3xl"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Solicite su Presupuesto Oficial</h2>
                <p class="text-primary-200">Complete los datos de su organización para que nuestro equipo le envíe una propuesta comercial exacta, sin compromisos.</p>
            </div>

            <div class="bg-white text-gray-800 rounded-2xl shadow-2xl p-8 md:p-10">
                <form class="space-y-6" onsubmit="event.preventDefault(); alert('Solicitud de cotización enviada. Un asesor se comunicará pronto.');">
                    
                    <h3 class="font-bold text-lg border-b pb-2 mb-4 text-secondary">1. Datos de Contacto</h3>
                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo *</label>
                            <input type="text" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico Corporativo *</label>
                            <input type="email" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono Directo</label>
                            <input type="tel" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Empresa o Institución *</label>
                            <input type="text" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none">
                        </div>
                    </div>

                    <h3 class="font-bold text-lg border-b pb-2 mt-8 mb-4 text-secondary">2. Información para Cotización</h3>
                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sector Principal *</label>
                            <select required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none bg-white">
                                <option value="">Seleccione su sector...</option>
                                <option value="admin">Administración Pública</option>
                                <option value="salud">Salud y Asistencia Social</option>
                                <option value="educacion">Educación</option>
                                <option value="sociales">Servicios Sociales / Medio Ambiente</option>
                                <option value="otro">Otro (Especificar en comentarios)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Número de Empleados *</label>
                            <select required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none bg-white">
                                <option value="">Seleccione rango...</option>
                                <option value="1-15">1 a 15 empleados</option>
                                <option value="16-50">16 a 50 empleados</option>
                                <option value="51-100">51 a 100 empleados</option>
                                <option value="101+">Más de 100 empleados</option>
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Comentarios Adicionales (Norma requerida, número de sitios, etc.)</label>
                        <textarea rows="3" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 outline-none resize-none" placeholder="Ej. Necesitamos cotizar ISO 9001 para nuestra matriz y 2 sucursales..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-bold py-4 px-6 rounded-lg transition-colors shadow-lg text-lg flex justify-center items-center gap-2">
                        <i data-lucide="calculator" class="w-5 h-5"></i>
                        Solicitar Cotización Formal
                    </button>
                    <p class="text-xs text-center text-gray-500 mt-4">Al enviar este formulario, un experto de QCC evaluará sus datos para calcular los días-auditor requeridos según las reglas IAF.</p>
                </form>
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
                    @if($settings?->facebook_url) <a href="{{ $settings->facebook_url }}" target="_blank" class="hover:text-white transition-colors"><i data-lucide="facebook" class="w-5 h-5"></i></a> @endif
                    @if($settings?->instagram_url) <a href="{{ $settings->instagram_url }}" target="_blank" class="hover:text-white transition-colors"><i data-lucide="instagram" class="w-5 h-5"></i></a> @endif
                    @if($settings?->linkedin_url) <a href="{{ $settings->linkedin_url }}" target="_blank" class="hover:text-white transition-colors"><i data-lucide="linkedin" class="w-5 h-5"></i></a> @endif
                </div>
            </div>
        </div>
    </footer>

    <livewire:chatbot />
    @livewireScripts
    <script>
        lucide.createIcons();

        document.addEventListener('DOMContentLoaded', () => {
            const heroSlides = document.querySelectorAll('.slide-image-sectores');
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
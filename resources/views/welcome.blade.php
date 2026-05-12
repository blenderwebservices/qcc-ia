<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCC - Quality & Competitive College | Certificación ISO</title>
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
        .blob-shape {
            animation: blob 10s infinite alternate;
        }
        @keyframes blob {
            0% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
            50% { border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%; }
            100% { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
        }
    </style>
</head>
<body x-data class="font-sans text-gray-800 bg-white antialiased selection:bg-primary-500 selection:text-white">

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
    <section class="relative bg-secondary text-white overflow-hidden bg-pattern min-h-[90vh] flex items-center">
        <!-- Decoración abstracta derecha -->
        <div class="absolute right-0 top-1/2 -translate-y-1/2 w-1/2 h-[120%] bg-gradient-to-l from-primary-900/80 to-transparent hidden lg:block"></div>
        <div class="absolute right-[-10%] top-1/4 w-[600px] h-[600px] bg-primary-600/30 blur-3xl rounded-full blob-shape hidden lg:block"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-20 lg:py-0 w-full">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Contenido Texto -->
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-primary-200 text-sm font-semibold mb-6 backdrop-blur-sm">
                        <span class="w-2 h-2 rounded-full bg-primary-400 animate-pulse"></span>
                        Organismo de Certificación Acreditado
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 leading-tight">
                        Certificamos la <span class="bg-primary-600 text-white px-4 py-1 rounded-lg shadow-xl inline-block mt-2">Excelencia</span> de su Organización
                    </h1>
                    <p class="text-lg md:text-xl text-gray-300 mb-10 leading-relaxed font-light max-w-lg">
                        Validamos sus Sistemas de Gestión con reconocimiento nacional e internacional. Transformamos el cumplimiento normativo en una verdadera ventaja competitiva.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/sectores#cotizar" class="bg-primary-600 hover:bg-primary-500 text-white px-8 py-4 rounded-full font-bold transition-all shadow-lg flex items-center justify-center gap-2 group">
                            Solicitar Presupuesto
                            <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="/servicios" class="bg-transparent border border-white/40 text-white hover:bg-white/10 px-8 py-4 rounded-full font-bold transition-all flex items-center justify-center gap-2">
                            Ver Servicios
                        </a>
                    </div>
                </div>

                <!-- Imagen/Composición visual derecha -->
                <div class="flex justify-center relative mt-12 lg:mt-0">
                    <div class="relative w-full max-w-md">
                        <!-- Tarjeta flotante 1 -->
                        <div class="absolute -left-12 top-10 bg-white text-secondary p-5 rounded-2xl shadow-2xl z-20 animate-[bounce_5s_infinite]">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center">
                                    <i data-lucide="check-circle-2" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Auditoría Aprobada</p>
                                    <p class="font-bold">ISO 9001:2015</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tarjeta flotante 2 -->
                        <div class="absolute -right-8 bottom-20 bg-white text-secondary p-5 rounded-2xl shadow-2xl z-20 animate-[bounce_6s_infinite_reverse]">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center">
                                    <i data-lucide="award" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Acreditación</p>
                                    <p class="font-bold">Reconocimiento IAF</p>
                                </div>
                            </div>
                        </div>

                        <!-- Main Image Slider -->
                        <div class="w-full aspect-[4/5] bg-gray-800 rounded-3xl overflow-hidden border-8 border-white/10 shadow-2xl relative" id="hero-slider">
                            <div class="absolute inset-0 bg-secondary/40 mix-blend-multiply z-10 pointer-events-none"></div>
                            <img src="{{ asset('images/slider/1.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-100 slide-image" alt="Slider Image 1">
                            <img src="{{ asset('images/slider/2.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image" alt="Slider Image 2">
                            <img src="{{ asset('images/slider/3.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image" alt="Slider Image 3">
                            <img src="{{ asset('images/slider/4.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image" alt="Slider Image 4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust / Acreditaciones Banner -->
    <div class="bg-white border-b border-gray-100 py-8 relative z-20 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm font-bold text-gray-400 uppercase tracking-widest mb-6">Nuestros avales de confianza y legalidad</p>
            <div class="flex flex-wrap justify-center items-center gap-12 opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
                <!-- ema -->
                <div class="flex items-center gap-2 font-bold text-2xl text-secondary">
                    <div class="bg-gray-100 p-2 rounded-lg"><i data-lucide="shield-check" class="w-8 h-8 text-primary-600"></i></div>
                    ema
                </div>
                <!-- IAF -->
                <div class="flex items-center gap-2 font-bold text-2xl text-secondary">
                    <div class="bg-gray-100 p-2 rounded-lg"><i data-lucide="globe" class="w-8 h-8 text-primary-600"></i></div>
                    IAF
                </div>
                <!-- ISO -->
                <div class="flex items-center gap-2 font-bold text-2xl text-secondary">
                    <div class="bg-gray-100 p-2 rounded-lg"><i data-lucide="file-check" class="w-8 h-8 text-gray-800"></i></div>
                    Certificación ISO
                </div>
                <!-- NOM -->
                <div class="flex items-center gap-2 font-bold text-2xl text-secondary">
                    <div class="bg-gray-100 p-2 rounded-lg"><i data-lucide="book-open" class="w-8 h-8 text-primary-700"></i></div>
                    Normas Oficiales
                </div>
            </div>
        </div>
    </div>

    <!-- Introducción Nosotros -->
    <section class="py-20 lg:py-28 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 relative">
                    <div class="aspect-square bg-primary-100 rounded-[3rem] absolute inset-0 transform -rotate-6 scale-105 transition-transform hover:rotate-0"></div>
                    <div class="aspect-square bg-white border border-gray-100 rounded-[3rem] relative shadow-lg flex flex-col justify-center items-center text-center overflow-hidden group" id="anos-slider">
                        <!-- Carousel -->
                        <div class="absolute inset-0 z-0">
                            <img src="{{ asset('images/slider2/1.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-100 slide-image-2" alt="20 Años 1">
                            <img src="{{ asset('images/slider2/2.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-2" alt="20 Años 2">
                            <img src="{{ asset('images/slider2/3.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-2" alt="20 Años 3">
                            <img src="{{ asset('images/slider2/4.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-2" alt="20 Años 4">
                        </div>
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-secondary/80 mix-blend-multiply z-10 transition-opacity group-hover:opacity-90"></div>
                        
                        <!-- Content -->
                        <div class="relative z-20 p-10 text-white">
                            <div class="w-20 h-20 bg-primary-600 text-white rounded-full flex items-center justify-center mb-6 shadow-xl shadow-primary-500/30 mx-auto">
                                <i data-lucide="medal" class="w-10 h-10"></i>
                            </div>
                            <h3 class="text-4xl font-extrabold text-white mb-2">+20 Años</h3>
                            <p class="text-gray-300 font-medium">De trayectoria institucional</p>
                            <div class="w-16 h-1 bg-primary-500 my-6 mx-auto"></div>
                            <p class="text-gray-200 text-sm italic">"Impulsando y engrandeciendo la competitividad en México a través de la certificación desde 2003."</p>
                        </div>
                    </div>
                </div>
                
                <div class="order-1 lg:order-2">
                    <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">Quality & Competitive College</h2>
                    <h3 class="text-3xl md:text-4xl font-bold text-secondary mb-6">Expertos en Evaluación de la Conformidad</h3>
                    <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                        QCC es un organismo de certificación creado para satisfacer las necesidades de reconocimiento nacional e internacional de las organizaciones. Operamos bajo principios estrictos de <strong>imparcialidad, responsabilidad y ética.</strong>
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-3">
                            <div class="bg-primary-100 text-primary-600 p-1 rounded mt-1"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <span class="text-gray-700">Auditores con amplia experiencia sectorial.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-primary-100 text-primary-600 p-1 rounded mt-1"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <span class="text-gray-700">Acreditaciones oficiales (ema, IAF).</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="bg-primary-100 text-primary-600 p-1 rounded mt-1"><i data-lucide="check" class="w-4 h-4"></i></div>
                            <span class="text-gray-700">Enfoque en la mejora continua real, no solo en el documento.</span>
                        </li>
                    </ul>
                    <a href="{{ route('nosotros') }}" class="inline-flex items-center gap-2 text-primary-600 font-bold hover:text-primary-700 transition-colors group">
                        Conoce más sobre QCC
                        <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Services -->
    <section class="py-20 lg:py-28 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div class="max-w-2xl">
                    <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">Nuestras Soluciones</h2>
                    <h3 class="text-3xl md:text-4xl font-bold text-secondary">Herramientas para alcanzar la excelencia</h3>
                </div>
                <a href="/servicios" class="bg-gray-100 hover:bg-gray-200 text-secondary px-6 py-2.5 rounded-full font-medium transition-colors whitespace-nowrap">
                    Ver todos los servicios
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl group">
                    <div class="w-14 h-14 bg-white shadow-sm rounded-2xl flex items-center justify-center mb-6 text-primary-600 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                        <i data-lucide="graduation-cap" class="w-7 h-7"></i>
                    </div>
                    <h4 class="text-xl font-bold text-secondary mb-3">Capacitación</h4>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">Desarrollamos competencias y habilidades en su personal para asegurar el cumplimiento normativo y entendimiento de los sistemas de gestión.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl group relative">
                    <div class="absolute top-0 right-0 bg-primary-600 text-white text-xs font-bold px-3 py-1 rounded-bl-xl rounded-tr-3xl">Auditoría de Valor</div>
                    <div class="w-14 h-14 bg-white shadow-sm rounded-2xl flex items-center justify-center mb-6 text-primary-600 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                        <i data-lucide="clipboard-search" class="w-7 h-7"></i>
                    </div>
                    <h4 class="text-xl font-bold text-secondary mb-3">Auditoría</h4>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">Evaluación independiente para verificar la conformidad de sus procesos e identificar hallazgos y áreas clave de mejora.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl group">
                    <div class="w-14 h-14 bg-white shadow-sm rounded-2xl flex items-center justify-center mb-6 text-primary-600 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                        <i data-lucide="shield-check" class="w-7 h-7"></i>
                    </div>
                    <h4 class="text-xl font-bold text-secondary mb-3">Certificación</h4>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">Emisión del documento oficial que avala el cumplimiento de normas nacionales o internacionales, generando confianza en el mercado.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sectores Especializados (Banda oscura) -->
    <section class="py-20 bg-secondary text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-pattern"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-primary-400 font-bold tracking-wide uppercase text-sm mb-2">Sectores IAF</h2>
                <h3 class="text-3xl md:text-4xl font-bold mb-4">Experiencia en Industrias Críticas</h3>
                <p class="text-gray-400">Contamos con auditores especializados y aprobados para evaluar los siguientes sectores económicos:</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-12">
                <a href="/sectores" class="bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl p-6 text-center transition-colors group cursor-pointer backdrop-blur-sm">
                    <i data-lucide="landmark" class="w-8 h-8 text-primary-400 mx-auto mb-3 group-hover:scale-110 transition-transform"></i>
                    <h4 class="font-bold text-sm md:text-base">Administración Pública</h4>
                </a>
                <a href="/sectores" class="bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl p-6 text-center transition-colors group cursor-pointer backdrop-blur-sm">
                    <i data-lucide="heart-pulse" class="w-8 h-8 text-primary-400 mx-auto mb-3 group-hover:scale-110 transition-transform"></i>
                    <h4 class="font-bold text-sm md:text-base">Salud y Asistencia</h4>
                </a>
                <a href="/sectores" class="bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl p-6 text-center transition-colors group cursor-pointer backdrop-blur-sm">
                    <i data-lucide="graduation-cap" class="w-8 h-8 text-primary-400 mx-auto mb-3 group-hover:scale-110 transition-transform"></i>
                    <h4 class="font-bold text-sm md:text-base">Sector Educativo</h4>
                </a>
                <a href="/sectores" class="bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl p-6 text-center transition-colors group cursor-pointer backdrop-blur-sm">
                    <i data-lucide="leaf" class="w-8 h-8 text-primary-400 mx-auto mb-3 group-hover:scale-110 transition-transform"></i>
                    <h4 class="font-bold text-sm md:text-base">Servicios Sociales</h4>
                </a>
            </div>
            
            <div class="text-center">
                <a href="/sectores" class="inline-flex items-center justify-center gap-2 text-white font-medium border-b border-white/30 hover:border-white pb-1 transition-colors">
                    Ver detalles y esquemas de cotización <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Call to Action Final -->
    <section class="py-24 bg-primary-50 relative">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden relative">
                <!-- Decoración -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary-100 rounded-full blur-3xl -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary-50 rounded-full blur-3xl -ml-20 -mb-20"></div>
                
                <div class="relative z-10 p-10 md:p-16 text-center">
                    <h3 class="text-3xl md:text-4xl font-bold text-secondary mb-4">¿Listo para elevar el estándar de su empresa?</h3>
                    <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">Contacte a uno de nuestros ejecutivos. Evaluaremos sus necesidades, sector y tamaño para enviarle una propuesta formal y transparente.</p>
                    
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="/sectores#cotizar" class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-4 px-8 rounded-full transition-colors shadow-lg flex items-center justify-center gap-2">
                            <i data-lucide="calculator" class="w-5 h-5"></i> Solicitar Cotización
                        </a>
                        <a href="/servicios#contacto" class="bg-white border-2 border-gray-200 text-gray-700 hover:border-primary-600 hover:text-primary-600 font-bold py-4 px-8 rounded-full transition-colors flex items-center justify-center gap-2">
                            <i data-lucide="phone" class="w-5 h-5"></i> Contáctenos Directamente
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-secondary text-gray-400 py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8 border-b border-gray-800 pb-8 mb-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <img src="{{ asset('images/logo.webp') }}" alt="QCC Logo" style="height: 100px;">
                    </div>
                    <p class="text-sm">Organismo de Certificación de Sistemas de Gestión comprometido con la ética, imparcialidad y la mejora continua.</p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-primary-400 transition-colors">Inicio</a></li>
                        <li><a href="{{ route('nosotros') }}" class="hover:text-primary-400 transition-colors">Nosotros</a></li>
                        <li><a href="/servicios" class="hover:text-primary-400 transition-colors">Servicios</a></li>
                        <li><a href="/sectores" class="hover:text-primary-400 transition-colors">Sectores y Cotización</a></li>
                        <li><a href="/admin" class="hover:text-primary-400 transition-colors">Dashboard (Admin)</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Contacto</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4 shrink-0 mt-0.5"></i>
                            Holbein 159, Noche Buena, 03720, CDMX.
                        </li>
                        <li class="flex items-center gap-2">
                            <i data-lucide="phone" class="w-4 h-4 shrink-0"></i>
                            +52 5581-06-2827
                        </li>
                        <li class="flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4 shrink-0"></i>
                            quality@qcc.com.mx
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm">
                <p>© 2026 QCC. Todos los derechos reservados.</p>
                <div class="flex space-x-4">
                    <a href="javascript:void(0)" @click="$dispatch('open-principios')" class="hover:text-white transition-colors">Principios</a>
                    <a href="javascript:void(0)" @click="$dispatch('open-politica')" class="hover:text-white transition-colors">Política de Gestión</a>
                    <a href="javascript:void(0)" @click="$dispatch('open-privacy')" class="hover:text-white transition-colors">Aviso de Privacidad</a>
                    <a href="#" class="hover:text-white transition-colors">Términos y Condiciones</a>
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
        <script src="https://unpkg.com/lucide@latest"></script>
        <script>
            // Inicializar iconos de Lucide
            lucide.createIcons();

            // Escuchar evento para abrir chatbot desde el menú
            window.addEventListener('toggle-chatbot', () => {
                 const event = new CustomEvent('click');
                 document.getElementById('chatbot-trigger').dispatchEvent(event);
            });

            // Hero Slider Logic
            const slides = document.querySelectorAll('.slide-image');
            let currentSlide = 0;
            if (slides.length > 0) {
                setInterval(() => {
                    slides[currentSlide].classList.remove('opacity-100');
                    slides[currentSlide].classList.add('opacity-0');
                    currentSlide = (currentSlide + 1) % slides.length;
                    slides[currentSlide].classList.remove('opacity-0');
                    slides[currentSlide].classList.add('opacity-100');
                }, 4000);
            }

            // Carousel 2 Logic (+20 Años)
            const slides2 = document.querySelectorAll('.slide-image-2');
            let currentSlide2 = 0;
            if (slides2.length > 0) {
                setInterval(() => {
                    slides2[currentSlide2].classList.remove('opacity-100');
                    slides2[currentSlide2].classList.add('opacity-0');
                    currentSlide2 = (currentSlide2 + 1) % slides2.length;
                    slides2[currentSlide2].classList.remove('opacity-0');
                    slides2[currentSlide2].classList.add('opacity-100');
                }, 4000);
            }
        </script>
        @include('evaluation-modal')
        @include('politica-gestion-modal')
        @include('principios-modal')
        @include('aviso-privacidad-modal')
</body>
</html>
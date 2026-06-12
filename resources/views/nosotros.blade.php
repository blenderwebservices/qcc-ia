<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - Quality & Competitive College (QCC)</title>
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
        .clip-diagonal {
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
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
    <section class="relative text-white overflow-hidden clip-diagonal pb-32">
        <!-- Background Slider -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/nosotros_slider/1.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-100 slide-image-nosotros" alt="Nosotros 1">
            <img src="{{ asset('images/nosotros_slider/2.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-nosotros" alt="Nosotros 2">
            <img src="{{ asset('images/nosotros_slider/3.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-nosotros" alt="Nosotros 3">
            <img src="{{ asset('images/nosotros_slider/4.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-nosotros" alt="Nosotros 4">
            <img src="{{ asset('images/nosotros_slider/5.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-nosotros" alt="Nosotros 5">
            <img src="{{ asset('images/nosotros_slider/6.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-nosotros" alt="Nosotros 6">
            <img src="{{ asset('images/nosotros_slider/7.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-nosotros" alt="Nosotros 7">
            <img src="{{ asset('images/nosotros_slider/8.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-nosotros" alt="Nosotros 8">
            <img src="{{ asset('images/nosotros_slider/9.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-nosotros" alt="Nosotros 9">
        </div>
        <!-- Overlays -->
        <div class="absolute inset-0 bg-secondary/70 mix-blend-multiply z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-secondary/90 to-transparent z-10"></div>
        <div class="absolute inset-0 bg-pattern opacity-30 z-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 pt-20 pb-20 flex flex-col items-center text-center">
            <span class="bg-white/10 text-primary-100 border border-white/20 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide uppercase mb-6 shadow-sm inline-flex items-center gap-2 backdrop-blur-sm">
                <i data-lucide="building-2" class="w-4 h-4"></i> Conozca Nuestra Historia
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight mb-6 leading-tight max-w-4xl">
                Impulsando la <span class="bg-primary-600 text-white px-4 py-1 rounded-lg shadow-xl inline-block mt-2">Excelencia Organizacional</span> desde 2003
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-3xl leading-relaxed font-light">
                Somos Quality & Competitive College, S.C. (QCC). Un Organismo de Certificación líder, enfocado en generar confianza, optimizar procesos de gestión y abrir puertas al mercado global.
            </p>
        </div>
    </section>

    <!-- Stats / Trust Indicators (Superpuestos) -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 -mt-24 mb-20">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 grid grid-cols-1 md:grid-cols-3 gap-8 divide-y md:divide-y-0 md:divide-x divide-gray-100">
            <div class="text-center px-4">
                <div class="w-12 h-12 bg-primary-50 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="calendar-check" class="w-6 h-6"></i>
                </div>
                <h4 class="text-3xl font-bold text-secondary mb-1">2003</h4>
                <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Año de Fundación</p>
            </div>
            <div class="text-center px-4 pt-6 md:pt-0">
                <div class="w-12 h-12 bg-primary-50 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
                <h4 class="text-3xl font-bold text-secondary mb-1">ema & IAF</h4>
                <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Reconocimiento Global</p>
            </div>
            <div class="text-center px-4 pt-6 md:pt-0">
                <div class="w-12 h-12 bg-primary-50 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="award" class="w-6 h-6"></i>
                </div>
                <h4 class="text-3xl font-bold text-secondary mb-1">N° 39/09</h4>
                <p class="text-gray-500 text-sm font-medium uppercase tracking-wide">Registro Oficial</p>
            </div>
        </div>
    </div>

    <!-- Quiénes Somos -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">Nuestra Identidad</h2>
                    <h3 class="text-3xl md:text-4xl font-bold text-secondary mb-6">Expertos en Evaluación de la Conformidad</h3>
                    <div class="space-y-4 text-gray-600 text-lg leading-relaxed">
                        <p>
                            En <strong>QCC</strong> contamos con amplia experiencia evaluando y certificando Sistemas de Gestión de la Calidad en organizaciones de diversos sectores estratégicos. 
                        </p>
                        <p>
                            Nuestro propósito es provocar procesos de mejora continua reales. No nos limitamos a "entregar un certificado"; trabajamos como un aliado estratégico para optimizar sus sistemas de gestión, asegurando que su organización alcance la excelencia operativa y cumpla con las normativas más exigentes a nivel internacional.
                        </p>
                    </div>
                    
                    <div class="mt-8 flex items-center gap-6">
                        <div class="flex -space-x-4">
                            <div class="w-12 h-12 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center text-gray-500"><i data-lucide="user" class="w-5 h-5"></i></div>
                            <div class="w-12 h-12 rounded-full border-2 border-white bg-gray-300 flex items-center justify-center text-gray-600"><i data-lucide="user" class="w-5 h-5"></i></div>
                            <div class="w-12 h-12 rounded-full border-2 border-white bg-primary-100 flex items-center justify-center text-primary-600"><i data-lucide="users" class="w-5 h-5"></i></div>
                        </div>
                        <p class="text-sm font-medium text-secondary">Respaldo por un equipo de auditores <br><span class="text-primary-600">altamente calificados.</span></p>
                    </div>
                </div>

                <!-- Tarjeta de Acreditación Visual -->
                <div class="relative">
                    <div class="absolute inset-0 bg-primary-600 rounded-3xl transform rotate-3 scale-105 opacity-10"></div>
                    <div class="bg-white p-10 rounded-3xl shadow-lg border border-gray-100 relative">
                        <h4 class="text-xl font-bold text-secondary mb-6 flex items-center gap-3">
                            <i data-lucide="check-circle" class="w-6 h-6 text-primary-500"></i>
                            Acreditaciones Oficiales
                        </h4>
                        <p class="text-gray-600 mb-8 text-sm">
                            Nuestra competencia técnica, imparcialidad y rigor están avalados por los máximos órganos rectores de acreditación a nivel nacional e internacional.
                        </p>
                        
                        <div class="space-y-6">
                            <!-- ema -->
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-center shrink-0 font-bold text-gray-400">
                                    ema
                                </div>
                                <div>
                                    <h5 class="font-bold text-secondary">Entidad Mexicana de Acreditación</h5>
                                    <p class="text-sm text-gray-500 mt-1">Acreditación nacional que garantiza la legalidad y validez de nuestros procesos en México.</p>
                                </div>
                            </div>
                            <!-- IAF -->
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-center shrink-0 font-bold text-primary-700">
                                    IAF
                                </div>
                                <div>
                                    <h5 class="font-bold text-secondary">Foro Mundial de Acreditación</h5>
                                    <p class="text-sm text-gray-500 mt-1">Reconocimiento internacional (International Accreditation Forum) para certificados con validez global.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Misión y Visión -->
    <section class="py-20 lg:py-28 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                
                <!-- Misión -->
                <div class="bg-primary-50 rounded-3xl p-10 lg:p-14 border border-primary-100 relative overflow-hidden group hover:shadow-xl transition-all duration-300">
                    <div class="absolute top-0 right-0 -mr-10 -mt-10 text-primary-200 opacity-50 group-hover:scale-110 transition-transform duration-500">
                        <i data-lucide="target" class="w-48 h-48"></i>
                    </div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-primary-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-md">
                            <i data-lucide="flag" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-secondary mb-4">Nuestra Misión</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            "Satisfacer las necesidades de las organizaciones en materia de reconocimiento nacional e internacional a través de la certificación en sistemas de gestión bajo normas ISO, de una manera <strong>imparcial, responsable, transparente, confiable y ética.</strong>"
                        </p>
                    </div>
                </div>

                <!-- Visión -->
                <div class="bg-secondary rounded-3xl p-10 lg:p-14 relative overflow-hidden group hover:shadow-xl transition-all duration-300 text-white">
                    <div class="absolute top-0 right-0 -mr-10 -mt-10 text-gray-700 opacity-50 group-hover:scale-110 transition-transform duration-500">
                        <i data-lucide="eye" class="w-48 h-48"></i>
                    </div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-white/10 text-primary-400 rounded-2xl flex items-center justify-center mb-8 backdrop-blur-sm border border-white/10">
                            <i data-lucide="globe-2" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-4">Nuestra Visión</h3>
                        <p class="text-gray-300 text-lg leading-relaxed">
                            "Ser un organismo de certificación a nivel nacional e internacional que <strong>impulse y engrandezca a nuestro país</strong> en la globalización de sistemas de gestión."
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Valores -->
    <section class="py-20 relative border-t border-gray-100 overflow-hidden text-white">
        <!-- Background Slider -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/valores_slider/1.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-100 slide-image-valores" alt="Valores 1">
            <img src="{{ asset('images/valores_slider/2.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-valores" alt="Valores 2">
            <img src="{{ asset('images/valores_slider/3.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-valores" alt="Valores 3">
            <img src="{{ asset('images/valores_slider/4.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-valores" alt="Valores 4">
            <img src="{{ asset('images/valores_slider/5.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-valores" alt="Valores 5">
            <img src="{{ asset('images/valores_slider/6.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-valores" alt="Valores 6">
            <img src="{{ asset('images/valores_slider/7.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-valores" alt="Valores 7">
            <img src="{{ asset('images/valores_slider/8.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-valores" alt="Valores 8">
            <img src="{{ asset('images/valores_slider/9.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-valores" alt="Valores 9">
            <img src="{{ asset('images/valores_slider/10.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-valores" alt="Valores 10">
            <img src="{{ asset('images/valores_slider/11.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-valores" alt="Valores 11">
            <img src="{{ asset('images/valores_slider/12.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 opacity-0 slide-image-valores" alt="Valores 12">
        </div>
        <!-- Overlays -->
        <div class="absolute inset-0 bg-secondary/85 mix-blend-multiply z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-secondary/90 to-transparent z-10"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-primary-400 font-bold tracking-wide uppercase text-sm mb-2">ADN Corporativo</h2>
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">Valores que rigen nuestra conducta</h3>
                <p class="text-gray-300 text-lg">Como organismo auditor, la rectitud es nuestra principal herramienta de trabajo. Estos principios guían cada una de nuestras evaluaciones.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                
                <!-- Valor 1 -->
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 text-center hover:border-primary-400 hover:shadow-lg hover:shadow-primary-600/20 transition-all group">
                    <div class="w-12 h-12 bg-white/20 text-white rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary-500 group-hover:text-white transition-colors">
                        <i data-lucide="scale" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-bold text-white">Imparcialidad</h4>
                </div>

                <!-- Valor 2 -->
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 text-center hover:border-primary-400 hover:shadow-lg hover:shadow-primary-600/20 transition-all group">
                    <div class="w-12 h-12 bg-white/20 text-white rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary-500 group-hover:text-white transition-colors">
                        <i data-lucide="clipboard-check" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-bold text-white">Responsabilidad</h4>
                </div>

                <!-- Valor 3 -->
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 text-center hover:border-primary-400 hover:shadow-lg hover:shadow-primary-600/20 transition-all group">
                    <div class="w-12 h-12 bg-white/20 text-white rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary-500 group-hover:text-white transition-colors">
                        <i data-lucide="search" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-bold text-white">Transparencia</h4>
                </div>

                <!-- Valor 4 -->
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 text-center hover:border-primary-400 hover:shadow-lg hover:shadow-primary-600/20 transition-all group">
                    <div class="w-12 h-12 bg-white/20 text-white rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary-500 group-hover:text-white transition-colors">
                        <i data-lucide="shield-alert" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-bold text-white">Confiabilidad</h4>
                </div>

                <!-- Valor 5 -->
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20 text-center hover:border-primary-400 hover:shadow-lg hover:shadow-primary-600/20 transition-all group col-span-2 md:col-span-1 lg:col-span-1">
                    <div class="w-12 h-12 bg-white/20 text-white rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary-500 group-hover:text-white transition-colors">
                        <i data-lucide="heart-handshake" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-bold text-white">Ética</h4>
                </div>

            </div>
        </div>
    </section>

    <!-- Call To Action (Banner) -->
    <section class="py-20 bg-primary-600 relative overflow-hidden">
        <!-- Circles Decor -->
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 border-4 border-white/10 rounded-full"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-60 h-60 border-4 border-white/10 rounded-full"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Confíe su certificación a los expertos</h2>
            <p class="text-primary-100 text-lg mb-10">Únase a las cientos de empresas e instituciones que han elevado su estándar de calidad y competitividad con QCC desde el 2003.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/sectores" class="bg-white text-primary-700 hover:bg-gray-50 px-8 py-3.5 rounded-full font-bold transition-all shadow-lg">
                    Conocer Sectores Evaluados
                </a>
                <a href="/servicios#contacto" class="bg-transparent border border-white/40 text-white hover:bg-white/10 px-8 py-3.5 rounded-full font-bold transition-all">
                    Contactar a un Asesor
                </a>
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
                            +52 55 1518 0250
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

            // Nosotros Hero Slider Logic
            const slidesNosotros = document.querySelectorAll('.slide-image-nosotros');
            let currentSlideNosotros = 0;
            if (slidesNosotros.length > 0) {
                setInterval(() => {
                    slidesNosotros[currentSlideNosotros].classList.remove('opacity-100');
                    slidesNosotros[currentSlideNosotros].classList.add('opacity-0');
                    currentSlideNosotros = (currentSlideNosotros + 1) % slidesNosotros.length;
                    slidesNosotros[currentSlideNosotros].classList.remove('opacity-0');
                    slidesNosotros[currentSlideNosotros].classList.add('opacity-100');
                }, 4000);
            }

            // Valores Slider Logic
            const slidesValores = document.querySelectorAll('.slide-image-valores');
            let currentSlideValores = 0;
            if (slidesValores.length > 0) {
                setInterval(() => {
                    slidesValores[currentSlideValores].classList.remove('opacity-100');
                    slidesValores[currentSlideValores].classList.add('opacity-0');
                    currentSlideValores = (currentSlideValores + 1) % slidesValores.length;
                    slidesValores[currentSlideValores].classList.remove('opacity-0');
                    slidesValores[currentSlideValores].classList.add('opacity-100');
                }, 4000);
            }
        </script>
        @include('evaluation-modal')
        @include('politica-gestion-modal')
        @include('principios-modal')
        @include('aviso-privacidad-modal')
</body>
</html>
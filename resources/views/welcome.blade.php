<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf- উল্লেখিত-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quality & Competitive College - Auditing & Certification</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <style type="text/tailwindcss">
            @theme {
                --font-sans: 'Inter', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji';
                --font-serif: 'Playfair Display', ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;

                --color-corporate-navy: #0a1128;
                --color-corporate-dark: #121e3d;
                --color-corporate-gold: #c3a151;
                --color-corporate-emerald: #0b7a75;
                --color-corporate-gold-light: #d6b86f;
            }
        </style>
        
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="font-sans antialiased bg-slate-50 text-slate-800">

        <!-- Navigation -->
        <nav class="bg-corporate-navy text-white stick top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20 items-center">
                    <!-- Logo / Title -->
                    <div class="flex-shrink-0 flex items-center font-serif text-2xl font-bold tracking-wider text-corporate-gold">
                        Q&CC
                    </div>
                    <!-- Menu -->
                    <div class="hidden md:flex space-x-8 items-center text-sm font-medium">
                        <a href="#" class="hover:text-corporate-gold transition">Inicio</a>
                        <a href="#" class="hover:text-corporate-gold transition">Nosotros</a>
                        <a href="#" class="hover:text-corporate-gold transition">Sectores</a>
                        <a href="#" class="hover:text-corporate-gold transition">Servicios</a>
                        <a href="{{ route('certificates.index') }}" class="hover:text-corporate-gold transition">Verificación</a>
                        <a href="#" class="hover:text-corporate-gold transition">Contacto</a>
                    </div>
                    <!-- Auth -->
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/admin') }}" class="font-semibold text-corporate-gold hover:text-white transition">Admin Panel</a>
                            @else
                                <a href="{{ route('filament.admin.auth.login') }}" class="bg-corporate-gold text-corporate-navy hover:bg-corporate-gold-light transition px-5 py-2 font-semibold rounded shadow-md">Iniciar Sesión</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <header class="relative bg-corporate-navy overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-corporate-dark to-corporate-navy opacity-90 z-0"></div>
            <!-- Decorative circle -->
            <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-corporate-gold opacity-10 blur-3xl z-0"></div>

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32 lg:py-40 flex flex-col md:flex-row items-center">
                <div class="md:w-3/5 md:pr-12 text-center md:text-left">
                    <span class="inline-block py-1 px-3 rounded-full bg-corporate-emerald/20 text-corporate-emerald font-semibold text-sm mb-6 border border-corporate-emerald/30 shadow-sm backdrop-blur-sm">Auditorías de Alto Valor</span>
                    <h1 class="font-serif leading-tight mb-6 text-white text-4xl sm:text-5xl lg:text-6xl font-bold">
                        Elevamos los <span class="text-corporate-gold italic">estándares</span> de tu organización
                    </h1>
                    <p class="mt-4 text-xl text-slate-300 font-light mb-10 max-w-2xl mx-auto md:mx-0">
                        Sistemas de gestión, certificación exitosa y mejora continua de la mano de expertos en normas ISO y evaluación de la conformidad.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="#" class="inline-flex justify-center items-center px-8 py-3 border border-transparent text-base font-medium rounded text-corporate-navy bg-corporate-gold hover:bg-corporate-gold-light transition shadow-lg w-full sm:w-auto">
                            Solicitar Información
                        </a>
                        <a href="#" class="inline-flex justify-center items-center px-8 py-3 border border-slate-300 text-base font-medium rounded text-white hover:text-corporate-navy hover:bg-slate-50 transition w-full sm:w-auto mt-4 sm:mt-0">
                            Explorar Servicios &rarr;
                        </a>
                    </div>
                </div>
                <div class="md:w-2/5 mt-16 md:mt-0 hidden md:block">
                    <!-- Premium image conceptualization -->
                    <div class="rounded-lg shadow-2xl overflow-hidden border border-slate-700 aspect-[4/5] bg-slate-800 flex items-center justify-center relative group">
                        <img src="{{ asset('images/hero.jpg') }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="Auditing professionals" />
                        <div class="absolute inset-0 bg-gradient-to-tr from-corporate-navy/80 via-black/40 to-transparent"></div>
                        <div class="text-slate-200 text-center px-6 relative z-10 transition transform group-hover:-translate-y-2 duration-500">
                            <svg class="mx-auto h-16 w-16 text-corporate-gold mb-4 drop-shadow-md" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            <p class="font-serif text-3xl font-bold text-white mb-2 drop-shadow-lg">ISO 9001:2015</p>
                            <p class="text-sm font-medium tracking-wide">Certificación de Excelencia</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Features / Bento Grid -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="font-serif text-3xl font-bold text-corporate-dark sm:text-4xl">¿Qué te ofrecemos?</h2>
                    <p class="mt-4 text-lg text-slate-500 max-w-2xl mx-auto">
                        Acompañamiento especializado para asegurar el éxito de tu organización mediante metodologías probadas.
                    </p>
                </div>

                <!-- Bento UI Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[250px]">
                    <!-- Bento Box 1 -->
                    <div class="md:col-span-2 row-span-1 bg-slate-900 rounded-2xl shadow-sm border border-slate-100 p-8 flex flex-col justify-center relative overflow-hidden group hover:shadow-lg transition">
                        <img src="{{ asset('images/bento1.jpg') }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="Auditores" />
                        <div class="absolute inset-0 bg-slate-900/70 group-hover:bg-slate-900/60 transition duration-700"></div>
                        <div class="absolute -right-10 -bottom-10 opacity-10 group-hover:opacity-20 transition text-white">
                            <svg class="h-64 w-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2zm0 3.83L19.5 19H4.5L12 5.83zM11 16h2v2h-2v-2zm0-7h2v5h-2V9z"/></svg>
                        </div>
                        <h3 class="font-serif text-2xl font-semibold text-white mb-3 relative z-10 drop-shadow">Auditores con Experiencia</h3>
                        <p class="text-slate-300 max-w-md relative z-10">Nuestro equipo está conformado por personal altamente capacitado con años de trayectoria evaluando diversos sectores industriales.</p>
                    </div>

                    <!-- Bento Box 2 -->
                    <div class="bg-corporate-navy text-white rounded-2xl shadow-sm p-8 flex flex-col justify-center relative overflow-hidden group">
                        <img src="{{ asset('images/bento2.jpg') }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="Mejora continua" />
                        <div class="absolute inset-0 bg-corporate-navy/80 group-hover:bg-corporate-navy/60 transition duration-700"></div>
                        <div class="relative z-10 block w-full h-full">
                            <svg class="h-10 w-10 text-corporate-gold mb-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <h3 class="font-serif text-xl font-semibold mb-2 relative z-10 drop-shadow">Mejora Continua</h3>
                            <p class="text-slate-200 text-sm relative z-10">Optimizamos tus sistemas de gestión para alcanzar la excelencia y mayor satisfacción del cliente.</p>
                        </div>
                    </div>

                    <!-- Bento Box 3 -->
                    <div class="bg-corporate-gold text-corporate-navy rounded-2xl shadow-sm p-8 flex flex-col justify-center relative overflow-hidden group">
                        <img src="{{ asset('images/bento3.jpg') }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="Mercados globales" />
                        <div class="absolute inset-0 bg-corporate-gold/80 group-hover:bg-corporate-gold/60 transition duration-700"></div>
                        <h3 class="font-serif text-xl font-semibold mb-2 relative z-10 drop-shadow-sm">Acceso a nuevos mercados</h3>
                        <p class="text-corporate-dark text-sm mb-4 relative z-10 font-medium">La certificación abre puertas a nivel global.</p>
                        <a href="#" class="font-bold inline-flex items-center hover:opacity-80 relative z-10">Conoce más <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></a>
                    </div>

                    <!-- Bento Box 4 -->
                    <div class="md:col-span-2 bg-slate-900 rounded-2xl shadow-sm border border-slate-100 p-8 flex lg:flex-row flex-col justify-center items-center lg:justify-between gap-6 hover:shadow-md transition relative overflow-hidden group">
                        <img src="{{ asset('images/bento4.jpg') }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="Confianza" />
                        <div class="absolute inset-0 bg-slate-900/80 group-hover:bg-slate-900/70 transition duration-700"></div>
                        <div class="relative z-10">
                            <h3 class="font-serif text-2xl font-semibold text-white mb-3 drop-shadow">Confianza y Credibilidad</h3>
                            <p class="text-slate-300 max-w-lg drop-shadow-sm">Quality & Competitive College es un Organismo Certificador fundado en el año 2003. Más de 20 años respaldan nuestro compromiso con la calidad.</p>
                        </div>
                        <div class="h-16 w-16 bg-white rounded-full flex items-center justify-center shadow-lg relative z-10 ring-4 ring-corporate-gold/20">
                            <span class="font-serif text-2xl text-corporate-emerald font-bold">20+</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="bg-corporate-dark py-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="font-serif text-3xl font-bold text-white mb-6">¿Listo para dar el siguiente paso en calidad?</h2>
                <p class="text-slate-300 mb-8 text-lg">Consulta nuestros programas de formación y certificación garantizada.</p>
                <a href="#" class="inline-flex justify-center items-center px-8 py-3 border border-corporate-gold text-base font-semibold rounded text-corporate-gold hover:bg-corporate-gold hover:text-corporate-navy transition shadow-lg">
                    Contáctanos hoy mismo
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-corporate-navy border-t border-slate-800 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center md:text-left grid md:grid-cols-3 gap-8 text-slate-400 text-sm">
                <div>
                    <span class="font-serif text-xl font-bold text-corporate-gold tracking-wider mb-4 inline-block">Q&CC</span>
                    <p>Elevamos los estándares de tu organización con auditorías de alto valor y personal experto.</p>
                </div>
                <!-- Contact info -->
                <div>
                    <h4 class="font-serif font-semibold text-white mb-4">Contacto</h4>
                    <p>Holbein 159, Noche Buena,</p>
                    <p>03720, CDMX</p>
                    <p class="mt-2 text-corporate-gold">+52 5581-06-2827</p>
                    <p><a href="mailto:quality@qcc.com.mx" class="hover:text-white transition">quality@qcc.com.mx</a></p>
                </div>
                <!-- Links -->
                <div>
                    <h4 class="font-serif font-semibold text-white mb-4">Legal</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">Términos de servicio</a></li>
                        <li><a href="#" class="hover:text-white transition">Política de privacidad</a></li>
                    </ul>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-8 border-t border-slate-800 text-center text-slate-500 text-xs">
                 &copy; {{ date('Y') }} Quality & Competitive College, S.C. Todos los derechos reservados.
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
        </script>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Certificados | QCC</title>
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
        [x-cloak] { display: none !important; }
    </style>
</head>
<body x-data="{ showForgot: false }" class="font-sans text-gray-800 bg-gray-50 antialiased selection:bg-primary-500 selection:text-white">

    <!-- Navegación -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-[120px]">
                <div class="flex-shrink-0 flex items-center cursor-pointer" onclick="window.location='/'">
                    <img src="{{ asset('images/logo.webp') }}" alt="QCC Logo" style="height: 100px;">
                </div>
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="/" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Home</a>
                    <a href="{{ route('nosotros') }}" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Nosotros</a>
                    <a href="/sectores" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Sectores</a>
                    <a href="/servicios" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Servicios</a>
                    <a href="{{ route('certificates.index') }}" class="text-primary-600 font-bold border-b-2 border-primary-600 pb-1">Verificación</a>
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

    <!-- Content Section -->
    <main class="min-h-[70vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-secondary bg-pattern">
        <!-- Abstract Decorations -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-primary-600/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary-400/10 rounded-full blur-3xl -ml-20 -mb-20"></div>

        <div class="max-w-5xl w-full grid lg:grid-cols-2 gap-12 items-center relative z-10">
            <!-- Left Info -->
            <div class="text-white">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-primary-200 text-xs font-semibold mb-6 backdrop-blur-sm">
                    <i data-lucide="shield-check" class="w-4 h-4 text-primary-400"></i>
                    Portal de Verificación Oficial
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-6 leading-tight">
                    Verifique la <span class="text-primary-400">Autenticidad</span> de su Certificado
                </h1>
                <p class="text-lg text-gray-300 mb-8 leading-relaxed font-light">
                    QCC pone a su disposición esta herramienta para validar la vigencia y estatus de los certificados emitidos. Ingrese su identificador ROC y contraseña asignada para acceder al registro completo.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-primary-400">
                            <i data-lucide="check" class="w-5 h-5"></i>
                        </div>
                        <span class="text-gray-200">Resultados en tiempo real directamente de nuestra base de datos.</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-primary-400">
                            <i data-lucide="check" class="w-5 h-5"></i>
                        </div>
                        <span class="text-gray-200">Acceso seguro y confidencial mediante encriptación.</span>
                    </div>
                </div>
            </div>

            <!-- Right Form -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden p-8 md:p-10 border border-gray-100">
                
                @if($errors->has('error'))
                    <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 text-red-700 text-sm flex items-start">
                        <i data-lucide="alert-circle" class="w-5 h-5 mr-3 shrink-0"></i>
                        <span>{{ $errors->first('error') }}</span>
                    </div>
                @endif

                @if(session('status'))
                    <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-100 text-green-700 text-sm flex items-start">
                        <i data-lucide="check-circle" class="w-5 h-5 mr-3 shrink-0"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <!-- Login Form -->
                <div x-show="!showForgot" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-secondary">Acceso al Sistema</h2>
                        <p class="text-gray-500 text-sm">Ingrese sus credenciales para consultar el certificado</p>
                    </div>

                    <form action="{{ route('certificates.search') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label for="roc" class="block text-sm font-bold text-secondary mb-1">Identificador ROC</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i data-lucide="file-text" class="w-5 h-5"></i>
                                </span>
                                <input type="text" id="roc" name="roc" value="{{ old('roc') }}" required 
                                    class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all placeholder-gray-400"
                                    placeholder="Ej. ROC-003-13">
                            </div>
                        </div>

                        <div>
                            <label for="access_password" class="block text-sm font-bold text-secondary mb-1">Contraseña de Acceso</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i data-lucide="lock" class="w-5 h-5"></i>
                                </span>
                                <input type="password" id="access_password" name="access_password" required 
                                    class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all placeholder-gray-400"
                                    placeholder="••••••••">
                            </div>
                        </div>

                        <button type="submit" 
                            class="w-full py-4 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl shadow-lg transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                            <i data-lucide="search" class="w-5 h-5"></i>
                            Consultar Registro
                        </button>

                        <div class="text-center pt-4">
                            <button type="button" @click="showForgot = true" class="text-sm font-semibold text-primary-600 hover:text-primary-700 transition-colors">
                                ¿Olvidó su contraseña?
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Forgot Password Form -->
                <div x-show="showForgot" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="key" class="w-8 h-8"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-secondary">Recordar Contraseña</h2>
                        <p class="text-gray-500 text-sm">Enviaremos un recordatorio al correo registrado en su certificado</p>
                    </div>

                    <form action="{{ route('certificates.forgot-password') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label for="forgot_roc" class="block text-sm font-bold text-secondary mb-1">Identificador ROC</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i data-lucide="file-text" class="w-5 h-5"></i>
                                </span>
                                <input type="text" id="forgot_roc" name="forgot_roc" required 
                                    class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent outline-none transition-all placeholder-gray-400"
                                    placeholder="Ej. ROC-003-13">
                            </div>
                        </div>

                        <div class="space-y-3">
                            <button type="submit" 
                                class="w-full py-4 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl shadow-lg transition-all transform hover:-translate-y-0.5">
                                Enviar Recordatorio
                            </button>
                            <button type="button" @click="showForgot = false" 
                                class="w-full py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition-all">
                                Volver al Inicio
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

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
                        <li><a href="/" class="hover:text-primary-400 transition-colors">Inicio</a></li>
                        <li><a href="{{ route('nosotros') }}" class="hover:text-primary-400 transition-colors">Nosotros</a></li>
                        <li><a href="/servicios" class="hover:text-primary-400 transition-colors">Servicios</a></li>
                        <li><a href="/sectores" class="hover:text-primary-400 transition-colors">Sectores y Cotización</a></li>
                        <li><a href="{{ route('certificates.index') }}" class="hover:text-primary-400 transition-colors">Verificación</a></li>
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
                    <a href="#" class="hover:text-white transition-colors">Aviso de Privacidad</a>
                    <a href="#" class="hover:text-white transition-colors">Términos y Condiciones</a>
                </div>
            </div>
        </div>
    </footer>

    <livewire:chatbot />
    @livewireScripts
    <script>
        lucide.createIcons();
        window.addEventListener('toggle-chatbot', () => {
             const event = new CustomEvent('click');
             document.getElementById('chatbot-trigger').dispatchEvent(event);
        });
    </script>
    @include('evaluation-modal')
</body>
</html>

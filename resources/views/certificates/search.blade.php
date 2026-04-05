<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCC - Verificación de Certificados</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-900 via-purple-900 to-slate-900 min-h-screen flex flex-col">
    <!-- Navbar placeholder (indicative of the main menu integration) -->
    <header class="w-full bg-black/20 backdrop-blur-md border-b border-white/10 py-4 px-6 md:px-12 flex justify-between items-center">
        <div class="text-2xl font-bold text-white tracking-widest">QCC</div>
        <nav class="hidden md:flex space-x-6 text-sm font-medium text-indigo-200">
            <a href="/" class="hover:text-white transition">Inicio</a>
            <a href="{{ route('certificates.index') }}" class="text-white border-b-2 border-indigo-400 pb-1">Verificación</a>
        </nav>
    </header>

    <main class="flex-grow flex flex-col md:flex-row items-center justify-center p-6 md:p-12 gap-12 max-w-7xl mx-auto w-full" x-data="{ showForgot: false }">
        
        <!-- Left Column: Informative Section -->
        <div class="w-full md:w-1/2 text-center md:text-left">
            <div class="inline-block px-4 py-1.5 rounded-full bg-indigo-500/20 border border-indigo-500/30 text-indigo-300 text-sm font-bold tracking-wide mb-6 shadow-sm">
                MÓDULO SEGURO
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-6">
                Verificación Oficial de <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">Certificados</span>
            </h1>
            <p class="text-lg text-indigo-200/80 mb-8 max-w-lg mx-auto md:mx-0 leading-relaxed">
                Este portal garantiza la autenticidad y resguardo de la información de los certificados emitidos por QCC. 
                Ingresa tu identificador ROC y la contraseña única asignada para acceder a los detalles en tiempo real.
            </p>
            <div class="flex items-center justify-center md:justify-start space-x-4 text-sm text-indigo-300">
                <span class="flex items-center"><svg class="w-5 h-5 mr-2 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg> Datos encriptados</span>
                <span class="flex items-center"><svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg> Tiempo real</span>
            </div>
        </div>

        <!-- Right Column: Secure Form Section -->
        <div class="w-full md:w-1/2 max-w-md relative">
            <div class="backdrop-blur-xl bg-white/10 dark:bg-black/20 rounded-3xl p-8 border border-white/20 shadow-[0_8px_30px_rgb(0,0,0,0.12)] relative z-10 overflow-hidden transform transition-all">
                
                @if($errors->has('error'))
                    <div class="mb-6 p-4 rounded-xl bg-red-500/20 border border-red-500/30 text-red-100 text-sm flex items-start shadow-sm">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ $errors->first('error') }}</span>
                    </div>
                @endif

                @if(session('status'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-100 text-sm flex items-start shadow-sm">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <!-- Main Login Form -->
                <form action="{{ route('certificates.search') }}" method="POST" class="space-y-6" x-show="!showForgot" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                    @csrf
                    <div>
                        <label for="roc" class="block text-sm font-medium text-indigo-200 mb-2">Identificador ROC</label>
                        <input type="text" id="roc" name="roc" value="{{ old('roc') }}" required 
                            class="w-full px-4 py-3 rounded-xl bg-white/5 border border-indigo-300/20 text-white placeholder-indigo-300/50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-inner"
                            placeholder="Ej. ROC-003-13">
                    </div>

                    <div>
                        <label for="access_password" class="block text-sm font-medium text-indigo-200 mb-2">Contraseña Asignada</label>
                        <input type="password" id="access_password" name="access_password" required 
                            class="w-full px-4 py-3 rounded-xl bg-white/5 border border-indigo-300/20 text-white placeholder-indigo-300/50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all shadow-inner"
                            placeholder="Tu contraseña de acceso">
                    </div>

                    <button type="submit" 
                        class="w-full py-3.5 px-4 bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-400 hover:to-purple-400 text-white font-bold rounded-xl shadow-lg hover:shadow-indigo-500/30 focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-900 focus:ring-indigo-500 transition-all duration-300">
                        Consultar Registro
                    </button>

                    <div class="text-center mt-6">
                        <button type="button" @click="showForgot = true" class="text-sm font-medium text-indigo-300 hover:text-white transition-colors">
                            ¿Olvidó su contraseña?
                        </button>
                    </div>
                </form>

                <!-- Forgot Password Form -->
                <form action="{{ route('certificates.forgot-password') }}" method="POST" class="space-y-6" x-show="showForgot" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                    @csrf
                    <div class="text-center mb-2">
                        <h3 class="text-xl font-bold text-white mb-2">Restablecer Acceso</h3>
                        <p class="text-sm text-indigo-200/80">Enviaremos un recordatorio al correo electrónico asociado al certificado.</p>
                    </div>

                    <div>
                        <label for="forgot_roc" class="block text-sm font-medium text-indigo-200 mb-2">Identificador ROC</label>
                        <input type="text" id="forgot_roc" name="forgot_roc" required 
                            class="w-full px-4 py-3 rounded-xl bg-white/5 border border-indigo-300/20 text-white placeholder-indigo-300/50 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-inner"
                            placeholder="Ej. ROC-003-13">
                    </div>

                    <div class="flex flex-col space-y-3">
                        <button type="submit" 
                            class="w-full py-3.5 px-4 bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-white font-bold rounded-xl shadow-lg hover:shadow-emerald-500/30 focus:ring-2 focus:ring-offset-2 focus:ring-offset-slate-900 focus:ring-emerald-500 transition-all duration-300">
                            Enviar Recordatorio
                        </button>
                        
                        <button type="button" @click="showForgot = false" class="w-full py-3 px-4 bg-white/5 hover:bg-white/10 text-indigo-200 font-medium rounded-xl border border-white/10 transition-all duration-300">
                            Volver al login
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Background Glow behind the form card -->
            <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-[2rem] blur-2xl opacity-20 -z-10"></div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full py-6 text-center text-indigo-200/50 text-sm border-t border-white/5">
        &copy; {{ date('Y') }} QCC México. Todos los derechos reservados.
    </footer>
</body>
</html>

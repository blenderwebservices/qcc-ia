<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Límite de Intentos | QCC</title>
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
                            700: '#987F3B',
                            800: '#816C32',
                            900: '#624C1D',
                        },
                        secondary: '#362a10',
                    }
                }
            }
        }
    </script>
    <style>
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="font-sans text-slate-800 bg-gray-50 flex flex-col min-h-screen">

    <div class="flex-grow flex items-center justify-center p-4">
        <div class="max-w-md w-full bg-white rounded-[2.5rem] shadow-2xl shadow-primary-900/10 border border-gray-100 overflow-hidden relative">
            <!-- Decoración Superior -->
            <div class="h-2 bg-gradient-to-r from-primary-400 via-primary-600 to-primary-900"></div>
            
            <div class="p-8 md:p-12 text-center">
                <!-- Icono de Seguridad -->
                <div class="w-20 h-20 bg-primary-50 text-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-8 shadow-inner transform rotate-3">
                    <i data-lucide="shield-alert" class="w-10 h-10"></i>
                </div>

                <h1 class="text-4xl font-extrabold text-secondary mb-4 tracking-tight">429</h1>
                <h2 class="text-2xl font-bold text-gray-900 mb-4 italic">Demasiados intentos</h2>
                
                <div class="w-16 h-1 bg-primary-500 mx-auto mb-8 rounded-full"></div>

                <p class="text-gray-600 leading-relaxed mb-10">
                    Por motivos de seguridad y para proteger la integridad de nuestra plataforma, hemos pausado temporalmente el acceso desde su conexión.
                </p>

                <div class="bg-primary-50 border border-primary-100 rounded-2xl p-4 mb-10 text-sm text-primary-900/70 flex items-start gap-3 text-left">
                    <i data-lucide="clock" class="w-5 h-5 shrink-0 mt-0.5 text-primary-600"></i>
                    <p>Por favor, espere <strong>un minuto</strong> antes de intentar realizar una nueva consulta o recuperación.</p>
                </div>

                <div class="space-y-4">
                    <a href="/" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-bold py-4 px-8 rounded-2xl transition-all shadow-lg shadow-primary-600/20 flex items-center justify-center gap-2 group">
                        <i data-lucide="home" class="w-5 h-5"></i>
                        Regresar al Inicio
                    </a>
                    
                    <button onclick="window.location.reload()" class="w-full bg-white border-2 border-gray-100 text-gray-600 hover:border-primary-600 hover:text-primary-600 font-bold py-4 px-8 rounded-2xl transition-all flex items-center justify-center gap-2">
                        <i data-lucide="refresh-cw" class="w-5 h-5"></i>
                        Intentar de nuevo
                    </button>
                </div>
            </div>

            <!-- Footer decorativo -->
            <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 flex justify-center items-center gap-6">
                 <img src="/images/logo.webp" alt="QCC Logo" class="h-8 opacity-50 grayscale hover:grayscale-0 transition-all">
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>

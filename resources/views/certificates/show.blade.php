<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado Válido | {{ $certificate->roc }}</title>
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
</head>
<body class="font-sans text-gray-800 bg-gray-50 antialiased selection:bg-primary-500 selection:text-white">

    <!-- Navegación Simplificada -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-[120px]">
                <div class="flex-shrink-0 flex items-center cursor-pointer" onclick="window.location='/'">
                    <img src="{{ asset('images/logo.webp') }}" alt="QCC Logo" style="height: 100px;">
                </div>
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="/" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Home</a>
                    <a href="{{ route('certificates.index') }}" class="text-primary-600 font-bold border-b-2 border-primary-600 pb-1">Verificación</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="min-h-[70vh] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <a href="{{ route('certificates.index') }}" class="inline-flex items-center gap-2 text-primary-600 font-bold hover:text-primary-700 transition-colors mb-8 group">
                <i data-lucide="arrow-left" class="w-5 h-5 group-hover:-translate-x-1 transition-transform"></i>
                Nueva Consulta
            </a>

            <!-- Certificate Result Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 relative">
                <!-- Status Banner -->
                @if(strtolower($certificate->status) === 'vigente')
                    <div class="bg-green-500 text-white px-6 py-3 flex items-center justify-between">
                        <div class="flex items-center gap-2 font-bold">
                            <i data-lucide="check-circle" class="w-5 h-5"></i>
                            CERTIFICADO VIGENTE
                        </div>
                        <div class="text-xs opacity-80 uppercase tracking-widest font-bold">Verificado por QCC</div>
                    </div>
                @else
                    <div class="bg-red-500 text-white px-6 py-3 flex items-center justify-between">
                        <div class="flex items-center gap-2 font-bold">
                            <i data-lucide="alert-triangle" class="w-5 h-5"></i>
                            ESTATUS: {{ strtoupper($certificate->status) }}
                        </div>
                        <div class="text-xs opacity-80 uppercase tracking-widest font-bold">Verificado por QCC</div>
                    </div>
                @endif

                <div class="p-8 md:p-12">
                    <div class="flex flex-col md:flex-row justify-between items-start mb-10 pb-10 border-b border-gray-100 gap-6">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Identificador ROC</p>
                            <h2 class="text-3xl md:text-4xl font-extrabold text-secondary">{{ $certificate->roc }}</h2>
                        </div>
                        <div class="text-right hidden md:block">
                            <img src="{{ asset('images/logo.webp') }}" alt="QCC" class="h-16 opacity-20 grayscale">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-x-12 gap-y-10">
                        <div class="space-y-6">
                            <div>
                                <p class="text-xs font-bold text-primary-600 uppercase tracking-widest mb-2">Organización</p>
                                <p class="text-xl font-bold text-secondary leading-tight">{{ $certificate->organization }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-primary-600 uppercase tracking-widest mb-2">Norma de Referencia</p>
                                <p class="inline-block px-4 py-1.5 bg-primary-50 text-primary-700 rounded-lg font-bold border border-primary-100">
                                    {{ $certificate->reference_standard }}
                                </p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <p class="text-xs font-bold text-primary-600 uppercase tracking-widest mb-2">Sectores</p>
                                <p class="text-lg text-gray-700 font-medium">{{ $certificate->sectors }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-primary-600 uppercase tracking-widest mb-2">Fecha de Validación</p>
                                <div class="flex items-center gap-2 text-lg text-gray-700 font-medium">
                                    <i data-lucide="calendar" class="w-5 h-5 text-gray-400"></i>
                                    {{ now()->format('d / m / Y') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footnote -->
                    <div class="mt-12 pt-8 border-t border-gray-100">
                        <div class="bg-gray-50 rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-4">
                            <p class="text-sm text-gray-500 max-w-md italic">
                                La información mostrada corresponde a los registros oficiales de Quality & Competitive College. Para cualquier duda, contáctenos en quality@qcc.com.mx
                            </p>
                            <div class="flex items-center gap-2 font-black text-gray-200 text-3xl tracking-tighter select-none">
                                QCC <span class="text-primary-500/20 text-4xl">VALID</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Simple -->
    <footer class="bg-secondary text-gray-400 py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm mb-4">© 2026 QCC México. Todos los derechos reservados.</p>
            <div class="flex justify-center space-x-4 text-xs mb-4">
                <a href="javascript:void(0)" @click="$dispatch('open-principios')" class="hover:text-white transition-colors">Principios</a>
                <a href="javascript:void(0)" @click="$dispatch('open-politica')" class="hover:text-white transition-colors">Política de Gestión</a>
                <a href="javascript:void(0)" @click="$dispatch('open-privacy')" class="hover:text-white transition-colors">Aviso de Privacidad</a>
            </div>
            <div class="flex justify-center space-x-4 text-gray-500">
                @if($settings?->facebook_url) <a href="{{ $settings->facebook_url }}" target="_blank" class="hover:text-white transition-colors"><i data-lucide="facebook" class="w-4 h-4"></i></a> @endif
                @if($settings?->instagram_url) <a href="{{ $settings->instagram_url }}" target="_blank" class="hover:text-white transition-colors"><i data-lucide="instagram" class="w-4 h-4"></i></a> @endif
                @if($settings?->linkedin_url) <a href="{{ $settings->linkedin_url }}" target="_blank" class="hover:text-white transition-colors"><i data-lucide="linkedin" class="w-4 h-4"></i></a> @endif
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
    @include('evaluation-modal')
    @include('politica-gestion-modal')
    @include('principios-modal')
    @include('aviso-privacidad-modal')
</body>
</html>

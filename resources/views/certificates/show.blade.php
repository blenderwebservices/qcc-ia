<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado Válido - {{ $certificate->roc }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen text-slate-800 p-6 md:p-12">
    
    <div class="max-w-4xl mx-auto">
        <a href="{{ route('certificates.index') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 mb-6 transition-colors">
            &larr; Volver a consultar
        </a>

        <!-- Certificate Card -->
        <div class="bg-white rounded-3xl shadow-[0_20px_50px_rgb(0,0,0,0.05)] border border-slate-100 overflow-hidden relative">
            
            <!-- Header Decorative Gradient -->
            <div class="h-4 w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-emerald-400"></div>

            <div class="p-8 md:p-12">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-b border-slate-100 pb-8 mb-8">
                    <div>
                        <h2 class="text-sm font-bold tracking-widest text-slate-400 uppercase mb-1">Certificado Oficial QCC</h2>
                        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ $certificate->roc }}</h1>
                    </div>
                    <div class="mt-4 md:mt-0">
                        @if(strtolower($certificate->status) === 'vigente')
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-emerald-50 text-emerald-600 border border-emerald-200 shadow-sm">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2 animate-pulse"></span>
                                Vigente
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-50 text-red-600 border border-red-200 shadow-sm">
                                <span class="w-2 h-2 rounded-full bg-red-500 mr-2"></span>
                                {{ $certificate->status }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 pl-2">
                    <div class="space-y-8">
                        <div>
                            <p class="text-sm font-medium text-slate-500 mb-1">Organización</p>
                            <p class="text-xl font-bold text-slate-800">{{ $certificate->organization }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm font-medium text-slate-500 mb-1">Norma de Referencia</p>
                            <p class="text-lg font-medium text-indigo-700 bg-indigo-50 px-3 py-1.5 rounded-lg inline-block border border-indigo-100">
                                {{ $certificate->reference_standard }}
                            </p>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div>
                            <p class="text-sm font-medium text-slate-500 mb-1">Sectores</p>
                            <p class="text-lg text-slate-700 font-medium">{{ $certificate->sectors }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-medium text-slate-500 mb-1">Fecha de Consulta</p>
                            <p class="text-lg text-slate-700 font-medium">{{ now()->format('d / m / Y') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-12 bg-slate-50 rounded-2xl p-6 border border-slate-100 flex items-center justify-between">
                    <div class="text-sm text-slate-500">
                        Este documento electrónico valida la situación actual del certificado en nuestra base de datos.
                    </div>
                    <div class="flex-shrink-0 opacity-50 font-bold text-slate-300 text-2xl tracking-tighter">
                        QCC VERIFIED
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

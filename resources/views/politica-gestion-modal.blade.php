<div x-data="{ isOpen: false }" 
     x-show="isOpen" 
     x-cloak
     class="fixed inset-0 z-[100] overflow-y-auto"
     @open-politica.window="isOpen = true"
     @keydown.escape.window="isOpen = false">
    
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-secondary/80 backdrop-blur-sm transition-opacity"
         x-show="isOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"></div>

    <!-- Modal Content -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl overflow-hidden transform transition-all"
             x-show="isOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             @click.away="isOpen = false">
            
            <!-- Close Button -->
            <button @click="isOpen = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 z-10">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>

            <div class="p-8 md:p-12 text-center">
                <div class="w-20 h-20 bg-primary-50 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i data-lucide="shield-check" class="w-10 h-10"></i>
                </div>
                
                <h2 class="text-3xl font-extrabold text-secondary mb-6 tracking-tight uppercase">Política de Gestión</h2>
                
                <div class="w-16 h-1 bg-primary-500 mx-auto mb-8"></div>
                
                <p class="text-gray-600 text-lg md:text-xl leading-relaxed font-medium">
                    Nos comprometemos a proporcionar servicios con <span class="text-secondary font-bold">imparcialidad, competencia, responsabilidad, transparencia, confidencialidad, receptividad</span> y respuesta oportuna a las quejas y enfoque basado en riesgo cumpliendo con los requisitos de la <span class="text-primary-600 font-bold">Norma ISO 17021-1:2015</span>.
                </p>
                
                <div class="mt-12">
                    <button @click="isOpen = false" 
                            class="bg-secondary text-white px-8 py-3 rounded-full font-bold hover:bg-secondary/90 transition-colors">
                        Entendido
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

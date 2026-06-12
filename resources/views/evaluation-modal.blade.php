<div x-data="evaluationApp()" 
     x-show="isOpen" 
     x-cloak
     class="fixed inset-0 z-[100] overflow-y-auto"
     @open-evaluation.window="isOpen = true; restart()"
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

            <!-- Intro View -->
            <div x-show="!started" class="animate-fadeIn">
                <div class="bg-primary-600 p-8 text-center text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl -mr-16 -mt-16"></div>
                    <i data-lucide="award" class="w-16 h-16 mx-auto mb-4"></i>
                    <h2 class="text-3xl font-bold mb-2">Evaluación de Preparación SGC</h2>
                    <p class="text-primary-100">Cuestionario inicial para determinar si su organización es candidata para certificar si sistema de gestión de la calidad.</p>
                </div>
                <div class="p-8 text-center">
                    <p class="text-gray-600 mb-8 text-lg">
                        Este diagnóstico rápido evalúa la madurez de su Sistema de Gestión de la Calidad mediante 12 puntos clave. Al finalizar, recibirá un dictamen y recomendaciones estratégicas.
                    </p>
                    <button @click="start()"
                            class="bg-primary-600 hover:bg-primary-700 text-white font-semibold py-4 px-8 rounded-full shadow-lg transition-transform hover:scale-105 flex items-center mx-auto gap-2">
                        Comenzar Evaluación <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <!-- Questionnaire View -->
            <div x-show="started && !showResults" class="flex flex-col min-h-[500px]">
                <!-- Progress Bar -->
                <div class="w-full bg-gray-100 h-2">
                    <div class="bg-primary-600 h-2 transition-all duration-500 ease-out" 
                         :style="`width: ${progress}%` shadow-sm"></div>
                </div>

                <div class="p-8 flex-grow flex flex-col">
                    <div class="mb-8 text-sm font-semibold text-primary-600 uppercase tracking-wider">
                        Pregunta <span x-text="currentStep + 1"></span> de 12
                    </div>

                    <!-- Step 1-11: Questions -->
                    <div x-show="currentStep < 11" class="flex-grow flex flex-col justify-center animate-fadeIn">
                        <div class="flex items-center justify-center mb-6">
                            <div class="p-6 bg-primary-50 rounded-full text-primary-600">
                                <template x-if="currentQuestion">
                                    <i :data-lucide="currentQuestion.icon" class="w-12 h-12"></i>
                                </template>
                            </div>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-secondary text-center mb-10 leading-tight" 
                            x-text="currentQuestion ? currentQuestion.text : ''">
                        </h3>
                        
                        <div class="grid grid-cols-2 gap-4 mt-auto">
                            <button @click="handleAnswer(true)"
                                    class="group flex flex-col items-center justify-center p-6 border-2 border-gray-100 rounded-2xl hover:border-green-500 hover:bg-green-50 transition-all focus:outline-none">
                                <i data-lucide="check-circle-2" class="w-10 h-10 text-gray-300 group-hover:text-green-500 mb-2 transition-colors"></i>
                                <span class="text-xl font-bold text-gray-600 group-hover:text-green-700">Sí</span>
                            </button>
                            <button @click="handleAnswer(false)"
                                    class="group flex flex-col items-center justify-center p-6 border-2 border-gray-100 rounded-2xl hover:border-red-500 hover:bg-red-50 transition-all focus:outline-none">
                                <i data-lucide="x-circle" class="w-10 h-10 text-gray-300 group-hover:text-red-500 mb-2 transition-colors"></i>
                                <span class="text-xl font-bold text-gray-600 group-hover:text-red-700">No</span>
                            </button>
                        </div>
                    </div>

                    <!-- Step 12: Trainings -->
                    <div x-show="currentStep === 11" class="flex-grow flex flex-col animate-fadeIn">
                        <div class="flex items-center justify-center mb-4">
                            <i data-lucide="book-check" class="w-12 h-12 text-primary-400"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-secondary text-center mb-2">Capacitaciones recientes</h3>
                        <p class="text-center text-gray-500 mb-6">¿Ha realizado capacitaciones en los últimos 12 meses en alguno de los siguientes temas?</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-8 overflow-y-auto max-h-[300px] p-2">
                            <template x-for="option in trainingOptions" :key="option">
                                <label class="flex items-center p-4 border-2 rounded-xl cursor-pointer transition-all"
                                       :class="trainings.includes(option) ? 'border-primary-500 bg-primary-50' : 'border-gray-100 hover:border-primary-200'">
                                    <input type="checkbox" class="hidden" :value="option" 
                                           @change="toggleTraining(option)" :checked="trainings.includes(option)">
                                    <div class="w-6 h-6 mr-3 flex items-center justify-center border-2 rounded transition-colors"
                                         :class="trainings.includes(option) ? 'bg-primary-600 border-primary-600' : 'border-gray-300'">
                                        <i data-lucide="check" class="w-4 h-4 text-white" x-show="trainings.includes(option)"></i>
                                    </div>
                                    <span class="font-medium text-gray-700" x-text="option"></span>
                                </label>
                            </template>
                        </div>

                        <button @click="finish()"
                                class="mt-auto w-full bg-primary-600 hover:bg-primary-700 text-white font-bold py-4 px-6 rounded-2xl shadow-lg transition-all text-lg">
                            Ver Resultados
                        </button>
                    </div>
                </div>
            </div>

            <!-- Results View -->
            <div x-show="showResults" class="animate-fadeIn">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-secondary mb-2">Resultados del Diagnóstico</h2>
                        <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-50 mb-4 shadow-inner mt-4 border-4 border-white">
                            <span class="text-4xl font-black text-secondary" x-text="finalScore"></span>
                            <span class="text-xl text-gray-400 font-bold">/12</span>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div class="p-6 rounded-2xl border transition-colors duration-500" :class="evaluation.color">
                            <h4 class="font-bold text-lg mb-2 flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full animate-pulse" :class="evaluation.badge"></span>
                                Madurez
                            </h4>
                            <p class="font-bold text-xl mb-1" x-text="evaluation.level"></p>
                            <p class="opacity-80 text-sm" x-text="evaluation.desc"></p>
                        </div>

                        <div class="p-6 rounded-2xl border flex flex-col justify-center items-center text-center transition-colors duration-500" 
                             :class="evaluation.certifiable ? 'bg-green-50 border-green-200 text-green-800' : 'bg-red-50 border-red-200 text-red-800'">
                            <h4 class="font-bold text-xs uppercase tracking-widest mb-2 opacity-60">Dictamen QCC</h4>
                            <template x-if="evaluation.certifiable">
                                <div class="flex flex-col items-center">
                                    <i data-lucide="check-circle-2" class="w-12 h-12 mb-2 text-green-600"></i>
                                    <span class="text-2xl font-black">CERTIFICABLE</span>
                                </div>
                            </template>
                            <template x-if="!evaluation.certifiable">
                                <div class="flex flex-col items-center">
                                    <i data-lucide="x-circle" class="w-12 h-12 mb-2 text-red-500"></i>
                                    <span class="text-2xl font-black text-red-600">NO CERTIFICABLE</span>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="bg-secondary text-white p-6 rounded-2xl mb-8 relative overflow-hidden shadow-xl">
                        <div class="absolute top-0 right-0 p-4 opacity-10">
                            <i data-lucide="wrench" class="w-20 h-20"></i>
                        </div>
                        <h4 class="font-bold text-primary-400 text-lg mb-3 flex items-center gap-2 relative z-10">
                            <i data-lucide="lightbulb" class="w-5 h-5"></i> Recomendación
                        </h4>
                        <p class="text-gray-100 leading-relaxed font-medium relative z-10" x-text="evaluation.recommendation"></p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button @click="restart()" 
                                class="flex-1 text-primary-600 hover:text-primary-700 font-bold flex items-center justify-center gap-2 py-4 px-6 hover:bg-primary-50 rounded-xl transition-all">
                            <i data-lucide="rotate-ccw" class="w-5 h-5"></i> Reintentar
                        </button>
                        <a href="/sectores#cotizar" @click="isOpen = false"
                           class="flex-[2] bg-primary-600 hover:bg-primary-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg transition-all text-center">
                            Solicitar Información
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('evaluationApp', () => ({
        isOpen: false,
        started: false,
        showResults: false,
        currentStep: 0,
        answers: {},
        trainings: [],
        trainingOptions: ["ISO 9000:2015", "ISO 9001:2015", "LIDERAZGO", "ISO 19011:2018", "ISO 31000:2018", "ISO 31010:2019", "MAPEO DE PROCESO"],
        questions: [
            { id: 1, text: "¿Tiene definido el alcance de su Sistema de Gestión de la Calidad?", icon: 'target' },
            { id: 2, text: "¿Posée objetivos claros y medibles para su SGC y procesos?", icon: 'line-chart' },
            { id: 3, text: "¿Tiene un proceso definido para la Gestión de los Riesgos en su SGC?", icon: 'shield-alert' },
            { id: 4, text: "¿Realiza la documentación y actualización de la información y procesos de su SGC?", icon: 'file-text' },
            { id: 5, text: "¿Tiene definido y documentado los roles y responsabilidades de los colaboradores de su organización?", icon: 'users' },
            { id: 6, text: "¿Realiza la capacitación a su personal en temas relacionados a sus responsabilidades?", icon: 'book-open' },
            { id: 7, text: "¿Realiza la evaluación de Proveedores?", icon: 'truck' },
            { id: 8, text: "¿Realiza la evaluación de Satisfacción del cliente?", icon: 'smile' },
            { id: 9, text: "¿Realiza Revisiones por la Dirección?", icon: 'search' },
            { id: 10, text: "¿Efectúa Auditorías Internas a intervalos planificados?", icon: 'file-text' },
            { id: 11, text: "¿Tiene un proceso definido para la identificación, análisis y solución de No Conformidades?", icon: 'wrench' }
        ],
        
        get currentQuestion() {
            return this.questions[this.currentStep];
        },
        
        get progress() {
            return ((this.currentStep) / 11) * 100;
        },
        
        get finalScore() {
            let score = Object.values(this.answers).filter(v => v === true).length;
            if (this.trainings.length > 0) score += 1;
            return score;
        },
        
        get evaluation() {
            const score = this.finalScore;
            if (score <= 5) {
                return {
                    color: "bg-red-50 border-red-500 text-red-900",
                    badge: "bg-red-500",
                    level: "Sistema de Gestión inmaduro",
                    desc: "Bajas mejoras y cambios sin planificación.",
                    certifiable: false,
                    recommendation: "DESTINAR ASESORÍA/CONSULTORIA Y RECURSOS A GRAN ESCALA."
                };
            } else if (score <= 8) {
                return {
                    color: "bg-orange-50 border-orange-500 text-orange-900",
                    badge: "bg-orange-500",
                    level: "Inmaduro (Transición)",
                    desc: "Moderados cambios y mejoras, pero planificación básica.",
                    certifiable: false,
                    recommendation: "DESTINAR ASESORÍA Y RECURSOS PARA EL REFORZAMIENTO DE HERRAMIENTAS."
                };
            } else if (score <= 10) {
                return {
                    color: "bg-yellow-50 border-yellow-500 text-yellow-900",
                    badge: "bg-yellow-500",
                    level: "Madurez transitoria",
                    desc: "Decisiones para mejoras necesarias y constantes.",
                    certifiable: false,
                    recommendation: "REALIZAR AUDITORIA DIAGNÓSTICA PARA DETERMINAR NECESIDADES DE CERTIFICACIÓN."
                };
            } else {
                return {
                    color: "bg-green-50 border-green-500 text-green-900",
                    badge: "bg-green-500",
                    level: "Sistema de Gestión Maduro",
                    desc: "Mejoras estructuradas y planificadas.",
                    certifiable: true,
                    recommendation: "REALIZAR AUDITORIA DIAGNÓSTICA ANTES DE LA AUDITORÍA DE CERTIFICACIÓN."
                };
            }
        },

        start() {
            this.started = true;
            this.$nextTick(() => lucide.createIcons());
        },

        handleAnswer(val) {
            this.answers[this.currentStep] = val;
            this.currentStep++;
            this.$nextTick(() => lucide.createIcons());
        },

        toggleTraining(opt) {
            if (this.trainings.includes(opt)) {
                this.trainings = this.trainings.filter(t => t !== opt);
            } else {
                this.trainings.push(opt);
            }
        },

        finish() {
            this.showResults = true;
            this.$nextTick(() => lucide.createIcons());
        },

        restart() {
            this.started = false;
            this.showResults = false;
            this.currentStep = 0;
            this.answers = {};
            this.trainings = [];
            this.$nextTick(() => lucide.createIcons());
        }
    }));
});
</script>

<style>
    .animate-fadeIn {
        animation: fadeIn 0.4s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    [x-cloak] { display: none !important; }
</style>

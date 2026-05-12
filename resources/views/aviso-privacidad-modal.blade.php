<div x-data="{ isOpen: false }" 
     x-show="isOpen" 
     x-cloak
     class="fixed inset-0 z-[100] overflow-y-auto"
     @open-privacy.window="isOpen = true"
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
        <div class="relative w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden transform transition-all"
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

            <div class="p-8 md:p-12">
                <h2 class="text-3xl font-extrabold text-secondary mb-6 tracking-tight uppercase border-b pb-4">Aviso de Privacidad</h2>
                
                <div class="max-h-[60vh] overflow-y-auto pr-4 text-gray-600 leading-relaxed space-y-6 text-sm md:text-base scrollbar-thin scrollbar-thumb-primary-500 scrollbar-track-gray-100">
                    <p>De conformidad con lo dispuesto por la Ley Federal de Protección de Datos Personales en Posesión de Particulares, se emite la presente Política de Privacidad para buscar que el tratamiento de los datos personales obtenidos sean legítimos, controlados e informados, a efecto de garantizar la privacidad y el derecho a la autodeterminación informativa de sus datos.</p>
                    
                    <h3 class="text-xl font-bold text-secondary">1. RESPONSABLE DE LOS DATOS PERSONALES.</h3>
                    <p>Para efectos de la siguiente política de privacidad de <strong>Quality & Competitive College S.C.</strong> como responsable al Director General, con domicilio en Calle Holbein 159 Col. Noche Buena. Alcaldía Benito Juárez D.F., C.P. 03720, CDMX con correo electrónico: <a href="mailto:quality@qcc.com.mx" class="text-primary-600 hover:underline">quality@qcc.com.mx</a></p>
                    
                    <h3 class="text-xl font-bold text-secondary">2. INFORMACIÓN A RECABAR.</h3>
                    <p>Le informamos que el Organismo Quality & Competitive College S. C. podrá recopilar su información a través de diferentes medios:</p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li><strong>Personalmente:</strong> Cuando usted solicita información sobre nuestros diversos modelos de certificación y capacitación.</li>
                        <li><strong>Directamente:</strong> Cuando nos proporcione sus datos personales para solicitar trabajo o servicios.</li>
                        <li><strong>Indirectamente:</strong> De cualquier otra fuente de información, comercialmente disponible y que sea permitida por la ley por cualquier otro medio automatizado (correo físico, electrónico, SMS, Fax, Internet o Teléfono).</li>
                    </ul>
                    <p>Para ello, usted acepta y autoriza de forma expresa la utilización de cualquiera de estos medios anteriores con dicho fin.</p>
                    
                    <h3 class="text-xl font-bold text-secondary">3. FINALIDAD DE RECABAR Y MANEJAR DATOS PERSONALES.</h3>
                    <p>El manejo de datos personales y sensibles del titular que lleguemos a recabar tiene como objetivo el desarrollo de nuevos proyectos, servicios, asesoría, difusión, contratación, solicitudes de trabajo y en especial control de auditorías registradas.</p>
                    
                    <h3 class="text-xl font-bold text-secondary">4. MEDIOS PARA EL ACCESO DE DERECHOS DEL TITULAR (ARCO).</h3>
                    <p>El titular de datos personales podrá ejercer sus derechos (acceso, rectificación, cancelación y oposición), limitación de uso o revocación dirigido al Comité de Dictaminación y preservación de la imparcialidad mediante la solicitud por medio magnético o electrónico <strong>qcc@prodigy.net.mx</strong> que la contenga la siguiente información:</p>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Nombre completo del titular de los datos personales.</li>
                        <li>Documentos que acrediten la identidad y en su caso la representación legal.</li>
                        <li>La descripción clara y precisa de datos personales donde el titular deberá indicar las modificaciones.</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-secondary">5. DECLARACIÓN DE PRINCIPIOS</h3>
                    <p>Q&CC proporciona servicios de capacitación abierta, auditorías de segunda y tercera parte con total apego a los principios de Imparcialidad, Objetividad, Competencia, Responsabilidad, Transparencia, Confidencialidad y Respuesta oportuna, así como al cumplimiento de las leyes y reglamentos nacionales e internacionales.</p>
                    
                    <p>Los servicios son llevados a cabo por personal competente y calificado que se apega al Código de Ética para evitar conflictos de interés, actos de discriminación o cualquier acción que afecte el prestigio de Q&CC o los intereses de sus clientes.</p>

                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <p class="text-xs text-gray-500 italic">Cualquier cambio que se realice a la Política de Privacidad le será informado a través de correo electrónico o cualquier medio de comunicación público o privado previsto en los contratos que amparan las operaciones celebradas con Quality & Competitive College.</p>
                    </div>
                </div>
                
                <div class="mt-8 text-center">
                    <button @click="isOpen = false" 
                            class="bg-secondary text-white px-10 py-3 rounded-full font-bold hover:bg-secondary/90 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Cerrar y Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

import re

# Read welcome.blade.php to extract the chatbot snippet
with open('resources/views/welcome.blade.php', 'r') as f:
    blade_content = f.read()

# Extract the chatbot code snippet
chatbot_snippet = """        <livewire:chatbot />
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
"""

# Read front.html
with open('assets/front.html', 'r') as f:
    front_content = f.read()

# Modify html tag
front_content = front_content.replace('<html lang="es" class="scroll-smooth">', '<html lang="{{ str_replace(\'_\', \'-\', app()->getLocale()) }}" class="scroll-smooth">')

# Modify Vite insertion
vite_snippet = """    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
"""
front_content = front_content.replace('<script src="https://cdn.tailwindcss.com"></script>', vite_snippet + '    <script src="https://cdn.tailwindcss.com"></script>')

# Replace the menu
old_menu = """                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#" class="text-primary-600 font-bold border-b-2 border-primary-600 pb-1">Inicio</a>
                    <a href="qcc_nosotros.html" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Nosotros</a>
                    <a href="qcc_servicios.html" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Servicios</a>
                    <a href="qcc_sectores.html" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Sectores</a>
                    <a href="qcc_sectores.html#cotizar" class="bg-primary-600 hover:bg-primary-700 text-white px-5 py-2.5 rounded-full font-medium transition-all shadow-md transform hover:-translate-y-0.5">Cotizar Ahora</a>
                </div>"""

new_menu = """                <div class="hidden md:flex space-x-8 items-center">
                    <a href="/" class="text-primary-600 font-bold border-b-2 border-primary-600 pb-1">Home</a>
                    <a href="{{ route('nosotros') }}" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Nosotros</a>
                    <a href="/sectores" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Sectores</a>
                    <a href="/servicios" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Servicios</a>
                    <a href="#evaluacion" class="bg-primary-600 hover:bg-primary-700 text-white px-5 py-2.5 rounded-full font-medium transition-all shadow-md transform hover:-translate-y-0.5">Evaluación para tu Certificación</a>
                </div>"""

front_content = front_content.replace(old_menu, new_menu)

# Inject chatbot at the end just before </body>
# find </body> and replace it
if "    <script>\n        lucide.createIcons();\n    </script>\n</body>" in front_content:
    front_content = front_content.replace(
        "    <script>\n        lucide.createIcons();\n    </script>\n</body>",
        chatbot_snippet + "</body>"
    )
else:
    front_content = front_content.replace('</body>', chatbot_snippet + '</body>')

with open('resources/views/welcome.blade.php', 'w') as f:
    f.write(front_content)

print("Replacement done!")

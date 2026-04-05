# Quality & Competitive College (Q&CC)

## 📌 Descripción del Proyecto
Sitio web integral y plataforma de gestión administrativa para **Quality & Competitive College**, una destacada organización orientada a la evaluación, consultoría, certificación y auditoría de estándares de calidad (como las normas ISO). 
La aplicación dota a la organización con un escaparate virtual de alto nivel estético ("Corporate Sleek") para sus futuros prospectos de clientes, y al mismo tiempo oculta un panel de control interno altamente avanzado y con control de accesos para la gestión interna de sus consultores y usuarios registrados.

---

## 🏗 Arquitectura de Software
La aplicación fue construida sobre una pila tecnológica moderna y estandarizada que garantiza seguridad, escalabilidad a futuro y alta interactividad:

- **Framework Base:** Laravel 13 proporcionando la infraestructura backend (sistema de ruteo, autenticación y ORM).
- **Lenguaje:** PHP 8+
- **Panel Administrativo (Backend Visual):** FilamentPHP, el cual implementa profundamente la arquitectura TALL (Tailwind CSS, Alpine.js, Laravel, Livewire) para otorgar un CMS/Admin escalable donde residen los CRUDs de los usuarios certificados.
- **Frontend Público:** Plantillas nativas de Laravel Blade y estilizadas enteramente con TailwindCSS v4 sin frameworks de JS dependientes, minimizando el tiempo de carga e impulsando el SEO.
- **Bases de Datos:** SQLite automatizado para desarrollo y testing ultrarrápido; estructurado con migraciones preparadas para producción con MySQL/MariaDB o PostgreSQL.

---

## 🤖 Integración de Inteligencia Artificial (Chatbot)
El proyecto cuenta con un módulo de inteligencia artificial basado en grandes modelos de lenguaje, orquestado mediante el SDK **`openai-php/laravel`**.
Esta infraestructura AI sentará las bases para programar un avanzado **Chatbot de Soporte y Ventas**. El chatbot será capaz de asistir 24/7 a las organizaciones interesadas en certificaciones y auditorías, analizando sus dudas pre-venta y guiándolos con respuestas precisas, aprovechando toda la potencia de la IA generativa nativa desde Laravel.

---

## 🚀 Arquitectura del Servidor (Hardware & Producción)
El sitio en su etapa de producción estará albergado dentro de una arquitectura Cloud diseñada para estabilidad constante, bajo la potente y balanceada infraestructura de **IONOS**.

### Despliegue en VPS IONOS + Plesk
- **Hardware:** Servidor Privado Virtual (VPS) SSD escalable alojado en la red global de centros de datos de IONOS.
- **Panel de Orquestación:** **Plesk Obsidian**, que permite agilizar la gestión general de la nube, automatizaciones de git, despliegues sin interrupción (zero-downtime) y protección Anti-DDoS.
- **Web Server:** Despliegue optimizado en NGINX como motor principal o proxy (junto con Apache) optimizando el rendimiento mediante PHP-FPM para compilar las peticiones de Laravel a gran velocidad.
- **Bases de software:** Gestor de bases de datos centralizado a través de Plesk, aprovisionamientos automatizados de la capa de conexión segura SSL/TLS de Let's Encrypt y manejo de tareas en segundo plano (para la comunicación asíncrona robusta con la API de OpenAI del Chatbot) usando cronjobs nativos de Plesk emulando al Laravel Scheduler y Queue Workers.

### 🗄️ Recomendación de Base de Datos para Producción
Considerando que la plataforma tratará con **información crítica y sensible referente a certificaciones institucionales**, la integridad de los datos es la máxima prioridad. Por este motivo, nuestra principal recomendación de uso es:
1. **PostgreSQL (Elección Principal):** Destaca en el mercado global por sus estrictas garantías de integridad de datos, cumplimiento ACID, escalabilidad segura y soporte robusto para estructuras dinámicas (mediante `JSONB`, extremadamente útil cuando las normativas de un certificado cambian con los años y exigen más campos de auditoría). 
2. **MariaDB / MySQL (Opción Alternativa Sólida):** Estas opciones son extremadamente confiables, rápidas y suelen ser la baza que viene totalmente preconfigurada y optimizada sin fricciones adicionales dentro de paneles PLESK.
*(Evitaremos SQLite estrictamente en el entorno IONOS / Producción para proyectos empresariales grandes).*

### 🛡️ Plan de Respaldo y Recuperación (Backup Strategy)
La pérdida de registros de auditorías pre-certificación de un cliente sería severa. Proponemos una estrategia estructurada en capas aprovechando las instalaciones de IONOS y el Framework de Laravel:

- **Nivel 1: Plesk Backup Manager (Diario, Automático, Fuera del Servidor):** Configurar respaldos diarios automáticos agendados durante las ventanas de poco tráfico (ej. 3:00 AM) almacenado no en el VPS local físico, sino utilizando el conector integrado de Plesk hacia almacenamiento externo *(ej. Amazon S3, un DropBox Cloud, o servidor remoto FTP)*. Esto aísla a la plataforma contra fallos del disco del VPS de IONOS.
- **Nivel 2: Respaldos Programados del Paquete de Laravel (Granulares, cada par de horas):** Adicionar e integrar el framework `spatie/laravel-backup`. Configurarlo explícitamente para extraer un dump puro *únicamente de la base de datos* de manera muy rápida (ej. cada 4 horas) y enviarlo asíncronamente a un almacenamiento externo (AWS S3) garantizando nunca perder, en el peor de los fallos, más de unas horas de interacciones con el cliente.
- **Nivel 3: Snapshots Generales en IONOS (Semanalmente):** Uso de la tecnología de Cloud Server Snapshot que otorga el panel base del servicio de IONOS. Esto realiza una copia idéntica 1:1 de toda la imagen del sistema operativo. Garantizaría restaurar toda la infraestructura (nginx, reglas plesk, correos, etc.) en menos de 5 minutos si ocurriera un compromiso muy severo a la red.

---

### Iniciar Desarrollo Local
Para inicializar este servicio en modo local si acabas de clonarlo:
```bash
composer install
npm install && npm run build
php artisan migrate
php artisan serve
```

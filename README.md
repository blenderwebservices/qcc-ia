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

---

### Iniciar Desarrollo Local
Para inicializar este servicio en modo local si acabas de clonarlo:
```bash
composer install
npm install && npm run build
php artisan migrate
php artisan serve
```

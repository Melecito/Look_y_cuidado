💇‍♂️ Look & Cuidado - Sistema de Gestión de Inventario y Ventas
Look & Cuidado es una solución integral para la administración de negocios de belleza. Este software permite un control riguroso de inventarios, gestión de usuarios por roles y un módulo de ventas dinámico, todo bajo una arquitectura MVC limpia y escalable.

🚀 Características Principales
🔐 Control de Acceso: Manejo de perfiles (Admin, Especialista, Vendedor) con sesiones seguras.

📦 Gestión de Inventario: CRUD completo de productos con carga de imágenes optimizada.

💰 Módulo de Ventas: Registro de transacciones con actualización automática de stock y cálculo de ventas.

🖼️ Procesamiento de Imágenes: Implementación de la librería PHP GD para el redimensionamiento automático de fotos.

🐳 Docker Ready: Entorno de desarrollo estandarizado para evitar errores de "en mi máquina sí funciona".
Capa,Tecnología
Backend,PHP 8.1 (PDO para persistencia)
Base de Datos,MySQL 8.0 (Strict Mode Compatible)
Frontend,"Plantilla AdminLTE, jQuery, DataTables, SweetAlert2"
Infraestructura,Docker & Docker Compose
Librerías,"PHP GD (Imágenes), TCPDF (Facturación)"

📦 Instalación y Despliegue
Requisitos Previos
Docker Desktop instalado y corriendo.

Git para clonar el repositorio.

Pasos para levantar el proyecto
Clonar el repositorio:


git clone https://github.com/Melecito/look_y_cuidado.git
cd look_y_cuidado
Levantar contenedores con Docker Compose:


docker-compose up -d --build
Configurar permisos de escritura (CRÍTICO):
Para que el sistema pueda guardar fotos de usuarios y productos en el contenedor, ejecuta:


docker exec -it look_y_cuidado-app-1 chmod -R 777 /var/www/html/vistas/img
Acceso:

App: http://localhost:8080

Base de Datos (phpMyAdmin): http://localhost:8081

⚙️ Notas Técnicas (Backend)
Como parte de la optimización para entornos modernos, se realizaron los siguientes ajustes:

MySQL 8 Compatibility: Se configuraron los modelos para manejar el Strict Mode, asegurando valores por defecto para campos como Ventas, Estado y Ultimo_Login.

PHP Ext: El Dockerfile incluye la compilación manual de la extensión gd con soporte para freetype y jpeg.

👨‍💻 Autor
Ahimelec Chia

Backend Developer | Java & Python

LinkedIn: https://www.linkedin.com/in/ahimelec-chia-pineda-programador/

GitHub: @Melecito
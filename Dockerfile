FROM php:8.1-apache

# Instalamos dependencias del sistema para GD y otras utilidades
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql

# Habilitar el módulo rewrite para el .htaccess
RUN a2enmod rewrite

# Ajustar permisos para que PHP pueda escribir imágenes
RUN chown -R www-data:www-data /var/www/html
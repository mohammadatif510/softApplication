# Dockerfile
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    nano \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# Don't run composer install here if you are using volumes
# RUN composer install

RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Start Laravel dev server by default
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]

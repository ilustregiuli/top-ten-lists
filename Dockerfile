# ---------------------------------------------------------
# Etapa 1 – Build dos assets com Node (Vite)
# ---------------------------------------------------------
FROM node:18 AS build-assets

WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# ---------------------------------------------------------
# Etapa 2 – Aplicação Laravel (PHP + FPM)
# ---------------------------------------------------------
FROM php:8.2-fpm

# Extensões necessárias para Laravel e PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    nginx \
    postgresql-client \
    && docker-php-ext-install pdo pdo_pgsql zip

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia o projeto Laravel
COPY . .

# Copia os assets compilados
COPY --from=build-assets /app/public/build ./public/build

# Instala dependências PHP
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Permissões do Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Copia a configuração do Nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Copia o entrypoint
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80

# Usa o entrypoint
ENTRYPOINT ["/entrypoint.sh"]

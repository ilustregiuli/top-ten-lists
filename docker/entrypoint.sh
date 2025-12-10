#!/bin/bash

# Espera o Postgres ficar disponível
echo "Aguardando o banco de dados..."
until pg_isready -h "$DB_HOST" -p "$DB_PORT" -U "$DB_USERNAME"; do
  sleep 2
done

echo "Banco de dados disponível!"

# Rodar migrations
echo "Rodando migrations..."
php artisan migrate --force

# Iniciar Nginx e PHP-FPM
echo "Iniciando serviços..."
service nginx start
php-fpm

#!/bin/bash
set -e

echo "==> Installation des dépendances..."
composer install --no-dev --optimize-autoloader

echo "==> Copie du fichier .env..."
cp .env.example .env

echo "==> Génération de la clé app..."
php artisan key:generate --force

echo "==> Création dossier images..."
mkdir -p public/images

echo "==> Cache config/routes/vues..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Build terminé ✓"

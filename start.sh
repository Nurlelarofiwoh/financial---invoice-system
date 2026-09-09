#!/bin/sh
set -e

echo "🚀 Starting MotoShop Web..."

# Create storage directory structure if not present
mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Check APP_KEY
if [ -z "$APP_KEY" ]; then
    echo "⚠️ APP_KEY is not set! Generating a temporary key..."
    php artisan key:generate --force
fi

# Run optimization and cache
echo "📦 Caching configuration & routes..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Run database migrations
echo "🗄️ Running database migrations..."
php artisan migrate --force || echo "⚠️ Database migration failed or skipped (check DB connection)"

echo "✅ App initialization complete!"

# Start PHP-FPM in background
echo "🔧 Starting PHP-FPM..."
php-fpm -D

# Start Nginx in foreground
echo "🌐 Starting Nginx on port 10000..."
nginx -g "daemon off;"

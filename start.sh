#!/bin/sh
set -e

echo "🚀 Starting MotoShop Web..."

# Create storage directory structure and database file if not present
mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs database
touch storage/logs/laravel.log
touch database/database.sqlite
chmod -R 777 storage bootstrap/cache database
chown -R www-data:www-data storage bootstrap/cache database

# Check Database Configuration
# If DB_CONNECTION is not set or set to mysql but DB_HOST is empty, 127.0.0.1, or localhost,
# Render cannot connect to a local MySQL because no MySQL is running in the container.
# In this case, fallback to SQLite so the site boots up and functions properly.
USE_SQLITE=0
if [ -z "$DB_CONNECTION" ] || [ "$DB_CONNECTION" = "sqlite" ]; then
    USE_SQLITE=1
elif [ "$DB_CONNECTION" = "mysql" ]; then
    if [ -z "$DB_HOST" ] || [ "$DB_HOST" = "127.0.0.1" ] || [ "$DB_HOST" = "localhost" ]; then
        echo "⚠️ WARNING: DB_HOST is '$DB_HOST' (localhost)."
        echo "⚠️ There is no MySQL server running inside this container."
        echo "🔄 Automatically switching to SQLite so the application works immediately!"
        USE_SQLITE=1
    fi
fi

if [ "$USE_SQLITE" = "1" ]; then
    export DB_CONNECTION=sqlite
    export DB_DATABASE=/var/www/html/database/database.sqlite
    touch database/database.sqlite
    chmod 777 database/database.sqlite
fi

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

# Seed initial product data if needed
echo "🌱 Seeding initial data..."
php artisan db:seed --force || true

# Re-apply full permissions after artisan commands run as root
echo "🔒 Fixing permissions for www-data..."
touch storage/logs/laravel.log
touch database/database.sqlite
chown -R www-data:www-data storage bootstrap/cache database
chmod -R 777 storage bootstrap/cache database

echo "✅ App initialization complete!"

# Start PHP-FPM in background
echo "🔧 Starting PHP-FPM..."
php-fpm -D

# Start Nginx in foreground
echo "🌐 Starting Nginx on port 10000..."
nginx -g "daemon off;"

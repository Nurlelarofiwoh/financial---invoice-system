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
USE_SQLITE=0

if [ -n "$DATABASE_URL" ] || [ -n "$DB_URL" ]; then
    URL="${DATABASE_URL:-$DB_URL}"
    echo "🔗 External database URL detected!"
    case "$URL" in
        postgres://*|postgresql://*)
            echo "🐘 Using PostgreSQL via DATABASE_URL..."
            export DB_CONNECTION=pgsql
            export DB_URL="$URL"
            USE_SQLITE=0
            ;;
        mysql://*)
            echo "🐬 Using MySQL via DATABASE_URL..."
            export DB_CONNECTION=mysql
            export DB_URL="$URL"
            USE_SQLITE=0
            ;;
        *)
            echo "ℹ️ Using provided database URL..."
            USE_SQLITE=0
            ;;
    esac
elif [ -z "$DB_CONNECTION" ] || [ "$DB_CONNECTION" = "sqlite" ]; then
    USE_SQLITE=1
elif [ "$DB_CONNECTION" = "mysql" ]; then
    if [ -z "$DB_HOST" ] || [ "$DB_HOST" = "127.0.0.1" ] || [ "$DB_HOST" = "localhost" ]; then
        echo "⚠️ WARNING: DB_HOST is '$DB_HOST' (localhost)."
        echo "⚠️ There is no MySQL server running inside this container."
        echo "🔄 Automatically switching to SQLite fallback!"
        USE_SQLITE=1
    fi
elif [ "$DB_CONNECTION" = "pgsql" ] || [ "$DB_CONNECTION" = "postgresql" ]; then
    if [ -z "$DB_HOST" ] || [ "$DB_HOST" = "127.0.0.1" ] || [ "$DB_HOST" = "localhost" ]; then
        echo "⚠️ WARNING: DB_HOST is not set for PostgreSQL."
        USE_SQLITE=1
    fi
fi

if [ "$USE_SQLITE" = "1" ]; then
    export DB_CONNECTION=sqlite
    # Detect persistent disk if mounted (e.g. /var/data or /data)
    if [ -d "/var/data" ]; then
        SQLITE_PATH="/var/data/database.sqlite"
    elif [ -d "/data" ]; then
        SQLITE_PATH="/data/database.sqlite"
    else
        SQLITE_PATH="/var/www/html/database/database.sqlite"
    fi
    export DB_DATABASE="$SQLITE_PATH"
    touch "$SQLITE_PATH"
    chmod 777 "$SQLITE_PATH"
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

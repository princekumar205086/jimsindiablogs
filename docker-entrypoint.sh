#!/bin/bash
set -e

# Ensure permissions
chown -R www-data:www-data /app || true
mkdir -p /app/storage /app/bootstrap/cache || true
chmod -R 775 /app/storage /app/bootstrap/cache || true

# If .env is missing, copy .env.example
if [ ! -f /app/.env ] && [ -f /app/.env.example ]; then
  cp /app/.env.example /app/.env
fi

# Helper to check APP_KEY in .env
app_key_in_env_file() {
  if [ -f /app/.env ]; then
    grep -E '^APP_KEY=' /app/.env | grep -qv '^APP_KEY=$' && return 0 || return 1
  fi
  return 1
}

# Run artisan commands if available
if [ -f /app/artisan ]; then
  # Generate APP_KEY if not provided via env and not present in .env
  if [ -z "${APP_KEY}" ] && ! app_key_in_env_file; then
    php /app/artisan key:generate --force --no-interaction || true
  fi

  php /app/artisan package:discover --ansi || true
  php /app/artisan storage:link || true

  # Clear previous caches, then regenerate
  php /app/artisan config:clear || true
  php /app/artisan config:cache || true

  php /app/artisan route:clear || true
  php /app/artisan route:cache || true

  php /app/artisan view:clear || true
  php /app/artisan view:cache || true
fi

# Execute CMD
exec "$@"

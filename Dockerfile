# ---------- Composer / PHP build (vendor) ----------
FROM composer:2.6 AS composer_builder
WORKDIR /app

# copy composer files first for caching
COPY composer.json composer.lock /app/

# copy directories needed for autoload classmap
COPY database /app/database
COPY app /app/app

RUN composer install --no-dev --no-scripts --prefer-dist --no-interaction --no-progress --optimize-autoloader

# copy rest of application (so vendor and app are in same workspace)
COPY . /app

# optimize autoloader
RUN composer dump-autoload --optimize

# ---------- Node build (assets) ----------
FROM node:18 AS node_builder
WORKDIR /app

# copy package files first for caching (optional optimization)
COPY package*.json /app/
# if you use npm-shrinkwrap or package-lock.json, it will be used
RUN if [ -f package-lock.json ]; then npm ci --no-audit --prefer-offline; else npm install --no-audit --prefer-offline; fi

# copy app sources and run the frontend build
COPY . /app
# run your build command (adjust if you use yarn or Vite/Mix different command)
RUN npm run build

# ---------- Final runtime image ----------
FROM php:8.2-apache
ENV APACHE_DOCUMENT_ROOT=/app/public
WORKDIR /app

# enable apache modules
RUN a2enmod rewrite headers

# install php extensions and system deps
RUN apt-get update \
  && apt-get install -y --no-install-recommends \
     libzip-dev zip unzip git \
  && docker-php-ext-install pdo pdo_mysql zip \
  && rm -rf /var/lib/apt/lists/*

# copy app + vendor from composer stage
COPY --from=composer_builder /app /app

# overlay built frontend assets from node stage (this will overwrite public assets if any)
COPY --from=node_builder /app /app

# Ensure permissions for Laravel storage & cache
RUN mkdir -p /app/storage /app/bootstrap/cache \
  && chown -R www-data:www-data /app/storage /app/bootstrap/cache \
  && chmod -R 775 /app/storage /app/bootstrap/cache

# handle .env / .env.example logic:
# - if .env exists, create .env.example from it (cp .env .env.example)
# - else, if .env.example exists, create .env from .env.example (cp .env.example .env)
RUN if [ -f /app/.env ]; then cp /app/.env /app/.env.example; \
    elif [ -f /app/.env.example ]; then cp /app/.env.example /app/.env; \
    fi

# expose port expected by Cloud Run (and make apache listen on it)
ENV PORT 8080
EXPOSE 8080
RUN sed -ri "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf \
 && sed -ri "s/:80>/:${PORT}>/" /etc/apache2/sites-enabled/000-default.conf

# final command
CMD ["apache2-foreground"]

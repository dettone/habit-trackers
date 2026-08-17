# Laravel 13 / PHP 8.4 development image (php-fpm; nginx sits in front).
FROM php:8.4-fpm

# Match the host user so bind-mounted files (storage/, bootstrap/cache/) stay writable.
ARG UID=1000
ARG GID=1000

RUN apt-get update && apt-get install -y --no-install-recommends \
        git \
        unzip \
        libzip-dev \
        libicu-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
        bcmath \
        exif \
        gd \
        intl \
        opcache \
        pcntl \
        pdo_mysql \
        zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# php-fpm runs as www-data; remap it onto the host UID/GID instead of the default 33.
RUN usermod  -u ${UID} www-data \
    && groupmod -g ${GID} www-data \
    && mkdir -p /var/www/html \
    && chown -R www-data:www-data /var/www/html

COPY docker/php/php.ini /usr/local/etc/php/conf.d/99-app.ini

WORKDIR /var/www/html

# Source is bind-mounted by compose, so nothing is COPYed here.
USER www-data

EXPOSE 9000

CMD ["php-fpm"]

# FrankenPHP
# See: https://github.com/php/frankenphp/blob/v1.12.4/docs/docker.md
FROM dunglas/frankenphp:1.12.4-php8.5-trixie

# Install Composer.
COPY --from=composer:2.2.28 /usr/bin/composer /usr/bin/composer

# Install install-php-extensions.
# See: https://github.com/mlocati/docker-php-extension-installer
COPY --from=mlocati/php-extension-installer:2.11.12 /usr/bin/install-php-extensions /usr/local/bin/install-php-extensions


RUN --mount=type=cache,target=/var/cache/apt,sharing=locked \
    --mount=type=cache,target=/var/lib/apt,sharing=locked \
    DEBIAN_FRONTEND=noninteractive \
        apt-get update \
    && DEBIAN_FRONTEND=noninteractive \
        apt-get install -y --no-install-recommends \
            # Using git for development.
            git \
            zip unzip libzip-dev \
            # For connect PostgreSQL server from Laravel.
            postgresql-client

RUN install-php-extensions \
        xdebug-3.5.3 \
        zip \
        opcache

################################################################################
# For production
#
# See: https://github.com/laravel/docs/blob/13.x/octane.md
################################################################################
#
# COPY . /app
#
# RUN composer install
#
# ENTRYPOINT ["php", "artisan", "octane:frankenphp", "--port=80", "--host=0.0.0.0", "--max-requests=1000"]

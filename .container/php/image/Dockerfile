# FrankenPHP
# See: https://github.com/php/frankenphp/blob/v1.12.4/docs/docker.md
FROM dunglas/frankenphp:1.12.4-php8.5-trixie

# Install Composer.
COPY --from=composer:2.2.28 /usr/bin/composer /usr/bin/composer

# Install install-php-extensions.
# See: https://github.com/mlocati/docker-php-extension-installer
COPY --from=mlocati/php-extension-installer:2.11.12 /usr/bin/install-php-extensions /usr/local/bin/install-php-extensions

# Install Node.js.
COPY --from=node:26.4.0-trixie /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node:26.4.0-trixie /usr/local/bin/node /usr/local/bin/node
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm
RUN ln -s /usr/local/lib/node_modules/npm/bin/npx-cli.js /usr/local/bin/npx

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
        pcntl \
        pdo \
        pdo_pgsql \
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

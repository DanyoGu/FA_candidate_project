FROM php:7.4-fpm

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git libzip-dev && \
    docker-php-ext-install zip pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Composer
FROM composer:latest as vendor

COPY database/ database/
COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Application
FROM php:8.1.7-apache-buster
WORKDIR /var/www/html/

COPY --from=vendor /app/vendor/ /var/www/html/vendor/
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . .
RUN mv .env.example .env
RUN cp docker/000-default.conf /etc/apache2/sites-enabled/000-default.conf

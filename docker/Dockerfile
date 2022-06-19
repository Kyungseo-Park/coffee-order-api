# Composer
FROM composer:latest as composer

RUN mkdir -p /app
WORKDIR /app

COPY composer.json composer.lock /app/

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Application
FROM php:8.1.7-apache-buster
WORKDIR /var/www/html/

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY --from=composer /app/vendor ./var/www/html/vendor
COPY . .

RUN mv .env.example .env
RUN cp docker/000-default.conf /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod headers

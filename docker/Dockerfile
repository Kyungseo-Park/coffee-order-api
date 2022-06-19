# Composer
FROM composer:latest as composer

RUN mkdir -p /otp/composer
WORKDIR /otp/composer

COPY composer.json composer.lock /otp/composer/

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

COPY --from=composer /app/build/composer ./var/www/html/composer
COPY . .

RUN mv .env.example .env
RUN cp docker/000-default.conf /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod headers

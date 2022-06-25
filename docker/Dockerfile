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

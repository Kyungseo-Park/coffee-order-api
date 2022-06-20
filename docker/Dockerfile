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

COPY --from=composer /app/vendor /var/www/html/vendor
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . .

RUN cp docker/000-default.conf /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod headers

RUN chown -R www-data:www-data /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 777 /var/www/html/storage/logs
RUN chmod -R 777 /var/www/html/storage/framework

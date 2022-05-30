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
FROM php:8.1.3-apache-buster
COPY . /var/www/html
RUN cp /var/www/html/docker/000-default.conf /etc/apache2/sites-enabled/000-default.conf
RUN cp /var/www/html/.env.production /var/www/html/.env
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN chown -R www-data:www-data /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 777 /var/www/html/storage/logs
RUN chmod -R 777 /var/www/html/storage/framework

COPY --from=vendor /app/vendor/ /var/www/html/vendor/

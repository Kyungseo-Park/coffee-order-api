FROM docker.kkyungvelyy.com/coffee-order/api:package as frontend
FROM docker.kkyungvelyy.com/coffee-order/api:composer as vendor

# Application
FROM docker.kkyungvelyy.com/php:8.1
WORKDIR /var/www/html

COPY --from=vendor /app/vendor/ /var/www/html/vendor/
COPY --from=frontend /app/public/js/ /var/www/html/public/js/
COPY --from=frontend /app/public/css/ /var/www/html/public/css/
COPY --from=frontend /app/mix-manifest.json /var/www/html/mix-manifest.json

COPY . .

# 라라벨 디렉토리 권한
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 777 /var/www/html/storage/logs
RUN chmod -R 777 /var/www/html/storage/framework

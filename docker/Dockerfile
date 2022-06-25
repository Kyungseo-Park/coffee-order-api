FROM docker.kkyungvelyy.com/coffee-order/api:package as package
FROM docker.kkyungvelyy.com/coffee-order/api:composer as composer

# Application
FROM ubuntu/apache2

WORKDIR /var/www/html
RUN apt update -y
RUN apt install php8.1 git y
RUN apt install php8.1-bcmath php8.1-bz2 php8.1-cli php8.1-common php8.1-curl php8.1-dev php8.1-gd php8.1-igbinary php8.1-imagick php8.1-imap php8.1-mbstring php8.1-memcached php8.1-msgpack php8.1-mysql php8.1-opcache php8.1-pgsql php8.1-readline php8.1-redis php8.1-ssh2 php8.1-tidy php8.1-xml php8.1-xmlrpc php8.1-zip -y

# GIT Config 설정
RUN git config --global --add safe.directory /var/www/html
RUN git config --global user.name "Kyungseo-Park[bot]"
RUN git config --global user.email "troublesome.dev@gmail.com"

# https://docs.docker.com/develop/develop-images/dockerfile_best-practices/#minimize-the-number-of-layers
# 다 설치했으면 리포지토리 삭제
RUN rm -rf /var/lib/apt/lists/*

COPY . .
COPY --from=vendor /app/vendor/ /var/www/html/vendor/
COPY --from=frontend /app/public/js/ /var/www/html/public/js/
COPY --from=frontend /app/public/css/ /var/www/html/public/css/
COPY --from=frontend /app/mix-manifest.json /var/www/html/mix-manifest.json

RUN cp docker/000-default.conf /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod headers

# 라라벨 디렉토리 권한
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 777 /var/www/html/storage/logs
RUN chmod -R 777 /var/www/html/storage/framework

# GIT 설정 후 crontab
COPY ./docker/cron/ /etc/cron.d/
RUN chmod 644 /etc/cron.d/root
RUN chown root:root /etc/cron.d/root

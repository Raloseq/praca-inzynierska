FROM php:8.1

RUN apt-get update -y && apt-get install -y \
    nodejs \
    npm \
    curl \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html
COPY . .

RUN npm install -g n && n 14.15.0
RUN npm install && npm run prod

RUN composer install --no-interaction --no-progress

RUN cd public && ln -sf ../storage/app/public/ storage

COPY --from=composer:2.4.2 /usr/bin/composer /usr/bin/composer

ENV PORT=8000
ENTRYPOINT [ "docker/entrypoint.sh" ]

FROM php:8.1

RUN apt-get update -y && apt-get install -y \
    nodejs \
    npm \
    curl \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY . /var/www
WORKDIR /var/www

COPY --from=composer:2.4.2 /usr/bin/composer /usr/bin/composer

RUN useradd www -u 1000 -ms /bin/bash
RUN usermod -aG sudo www
RUN chown -R www:www /var/www

RUN npm init -y
RUN npm install -g n && n 16.17.0
RUN npm install

USER www
#RUN curl -sS https://getcomposer.org/installer | php
#RUN php composer.phar install
#
#RUN composer install --no-interaction --no-progress

RUN cd public && ln -sf ../storage/app/public/ storage

ENV PORT=8000
ENTRYPOINT [ "docker/entrypoint.sh" ]

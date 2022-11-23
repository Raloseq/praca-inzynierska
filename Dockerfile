FROM php:8.1 as php

RUN apt-get upadte -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath

WORKDIR /var/www
COPY . .

COPY --from=composer:2.4.2 /usr/bin/composer /usr/bin/composer

ENV PORT=8000
ENTRYPOINT [ "docker/entrypoint.sh" ]

FROM node:19-alpine as node

WORKDIR /var/www
COPY . .

RUN npm install --global cross-env
RUN npm install

VOLUME /var/www/node_modules
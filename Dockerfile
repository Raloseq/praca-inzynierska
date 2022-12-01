FROM php:8.1-fpm-buster

ENV WORKDIR=${WORKDIR:-/var/www/html}
ARG NODE_VERSION=18

RUN apt-get update \
    # apt complains this is missing
    && apt-get install -y apt-utils \
    && apt-get upgrade -y \
    && apt-get install -y --no-install-recommends \
        ghostscript \
        git \
        gpg \
        imagemagick \
        libc-client-dev \
        libfreetype6-dev \
        libjpeg-dev \
        libkrb5-dev \
        libltdl* \
        libmagickwand-dev \
        libpng-dev \
        libpq-dev \
        libx11-dev \
        libxml2-dev \
        libzip-dev \
        openssh-client \
        postgresql-client \
        rsync \
        supervisor \
        unzip \
        xfonts-base \
        xfonts-75dpi \
        zip \
    ;

# Configure PHP extensions
RUN docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl

# Install PHP extentions
RUN docker-php-ext-install \
    bcmath \
    gd \
    imap \
    opcache \
    pcntl \
    pdo_pgsql \
    zip \
    mysqli \
    pdo \
    pdo_mysql

# Install the PECL PHP extensions
RUN pecl install imagick pcov \
    && pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable imagick pcov redis

# Add composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install NodeJS
RUN curl -sLS https://deb.nodesource.com/setup_${NODE_VERSION}.x | bash - \
    && apt-get update \
    && apt-get install -y nodejs \
    && npm install -g npm

# Install gosu
RUN set -eux; \
	apt-get update; \
	apt-get install -y gosu; \
    # verify that the binary works
	gosu nobody true

RUN apt-get -y clean \
    && apt-get -y autoclean \
    && apt-get -y purge man \
    && apt-get -y autoremove \
    && rm -rf /var/lib/apt/{apt,dpkg,cache,log,lists}/* /tmp/* /var/tmp/* /usr/share/doc/*

COPY ./entrypoint.sh /
RUN chmod +x /entrypoint.sh

WORKDIR ${WORKDIR}

ENTRYPOINT ["/entrypoint.sh"]

CMD ["php-fpm"]

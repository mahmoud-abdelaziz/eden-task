FROM php:8.1-apache

USER root

WORKDIR /var/www/html

COPY . /var/www/html

RUN apt-get update
RUN apt-get clean
RUN apt-get -y install git libicu-dev libonig-dev libzip-dev \
        unzip locales libpng-dev libonig-dev libxml2-dev

RUN rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install intl pdo_mysql zip bcmath mbstring \
        exif pcntl bcmath gd sockets

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN chmod -R 0777 /var/www/html/storage
RUN chmod -R 0777 /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

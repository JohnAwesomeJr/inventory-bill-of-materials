FROM php:8.2-apache
RUN apt update && apt install -y zlib1g-dev libpng-dev
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite
RUN docker-php-ext-install gd
RUN docker-php-ext-install exif
RUN apt-get install -y zlib1g-dev libzip-dev libicu-dev
RUN pecl install zip && docker-php-ext-enable zip
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# imagemagick not working in php 8.3 yet. if you need 8.3 comment this out
RUN apt-get update \
    && apt-get install -y libmagickwand-dev \
    && pecl install imagick \
    && docker-php-ext-enable imagick

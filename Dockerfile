FROM php:8.1-apache

RUN apt-get update \
  && apt-get install -y \
  libpq-dev \
  libzip-dev \
  libjpeg-dev \
  libpng-dev \
  libonig-dev \
  libxml2-dev \
  libicu-dev \
  libexif-dev \
  libcurl4-openssl-dev \
  libssl-dev \
  && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-jpeg \
  && docker-php-ext-install -j$(nproc) \
  pdo_mysql \
  opcache \
  bcmath \
  zip \
  gd \
  intl \
  exif \
  pcntl \
  mysqli

COPY . /var/www/html

RUN chmod -R 777 /var/www/html

EXPOSE 80
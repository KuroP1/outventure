FROM php:8.2.4-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && pecl install redis \
    && docker-php-ext-enable redis

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

WORKDIR /var/www/html

COPY ./ /var/www/html/

EXPOSE 80

# Start server
CMD ["apache2-foreground"]

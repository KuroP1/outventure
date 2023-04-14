FROM php:8.2.4-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && pecl install redis \
    && docker-php-ext-enable redis

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

WORKDIR /var/www/html


COPY . /var/www/html/public

# Set up Apache virtual host
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

EXPOSE 80

# Start server
CMD ["apache2-foreground"]

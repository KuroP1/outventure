# Set the base image to PHP 8.1.16 with Apache
FROM php:8.2.4-apache

# Install necessary PHP extensions and libraries
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && pecl install redis \
    && docker-php-ext-enable redis

# Install git, zip, and unzip
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the application code to the container
COPY . /var/www/html/public/

# Set up Apache virtual host
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

# Expose port 80 for the web server
EXPOSE 80

# Start Apache web server
CMD ["apache2-foreground"]

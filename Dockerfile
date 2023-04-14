FROM php:7.4-apache

# Enable required Apache modules
RUN a2enmod rewrite

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set the working directory to /var/www/html
WORKDIR /var/www/html/public

# Copy the application code to the container
COPY . .

# Expose port 80
EXPOSE 80
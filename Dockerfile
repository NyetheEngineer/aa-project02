# Use an official PHP image as a base
FROM php:8.2-apache-buster

# Copy your application code to the document root
COPY . /var/www/html

# Install additional PHP extensions if needed
RUN docker-php-ext-install pdo_mysql

# Expose port 80 for web traffic
EXPOSE 80

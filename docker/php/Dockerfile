# Use official PHP image with Apache
FROM php:8.3-apache

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libjpeg62-turbo-dev libfreetype6-dev zip unzip libonig-dev libxml2-dev libzip-dev libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring pdo pdo_mysql zip intl opcache \
    && a2enmod rewrite

# Install Composer globally
RUN apt-get update && apt-get install -y curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer    

# Copy project files
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Set permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copy custom Apache config (optional)
# COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
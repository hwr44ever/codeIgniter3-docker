FROM php:8.2-apache

WORKDIR /var/www/html

COPY . .
RUN apt-get update && apt-get install -y \
    libicu-dev \
    zip unzip git \
    && docker-php-ext-install mysqli intl

# Enable Apache mod_rewrite
RUN a2enmod rewrite

#writeable paths
RUN echo "session.save_path = \"/var/lib/php/session\"" >> /usr/local/etc/php/conf.d/session.ini
RUN mkdir -p /var/lib/php/session && chmod -R 777 /var/lib/php/session



# Copy Apache config
#COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Set permissions for app
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

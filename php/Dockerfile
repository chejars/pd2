
FROM php:8-fpm

# Install PHP modules
RUN apt-get update \
    && apt-get install -y \
        libzip-dev \
        zip \
&& docker-php-ext-install bcmath pdo_mysql zip

# Install Composer from Composer official Docker image
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN sed -i -e 's/upload_max_filesize = 2M/upload_max_filesize = 8M/' "$PHP_INI_DIR/php.ini"
RUN sed -i -e 's/;date.timezone =/date.timezone = "Europe\/Riga"/' "$PHP_INI_DIR/php.ini"
RUN sed -i -e 's/;date.default_latitude = 31.7667/date.default_latitude = 56.9514/' "$PHP_INI_DIR/php.ini"
RUN sed -i -e 's/;date.default_longitude = 35.2333/date.default_longitude = 24.1131/' "$PHP_INI_DIR/php.ini"

# Expose port
EXPOSE 9000

# Set working directory
WORKDIR /var/www/project

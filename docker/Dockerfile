FROM php:7.3-fpm

WORKDIR /var/www/localhost/htdocs

# Variables
ENV DOCUMENT_ROOT /var/www/localhost/htdocs

# Install unzip utility and libs needed by zip PHP extension 
RUN apt-get update && apt-get install -y \
    wget gcc make openssl libffi-dev libgdbm-dev libsqlite3-dev \
    libssl-dev zlib1g-dev zlib1g-dev libzip-dev unzip nginx python3 python3-pip

RUN docker-php-ext-install zip pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Workdir
WORKDIR $DOCUMENT_ROOT

# Remove NGINX old
RUN rm -f /etc/nginx/conf.d/*

# Copy app and configs
COPY . $DOCUMENT_ROOT
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/app.ini
COPY ./docker/php/php-fpm-www.conf /usr/local/etc/php-fpm.d/www.conf

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instal npm for front-end assets
RUN apt update && apt install -y nodejs npm
RUN npm install -g gulp-cli

#EXPOSE 9000
#CMD ["php-fpm"]

# Expose port
EXPOSE 80

# Start APP
CMD ["nginx", "-g", "daemon off;"]
RUN chmod +x ./docker/scripts/entrypoint.sh
ENTRYPOINT ["./docker/scripts/entrypoint.sh"]
FROM ubuntu:disco

# Set terminal to be noninteractive
ENV DEBIAN_FRONTEND noninteractive

RUN sed -i 's/deb-src/# deb-src/' /etc/apt/sources.list

RUN apt-get update && \
    apt-get upgrade -y -f && \
    apt-get install -y \
        curl \
        zip \
        unzip \
        git \
        supervisor \
        ca-certificates \
        nginx \
        phpunit \
        php7.2-cli \
        php7.2-fpm \
        php7.2-curl \
        php7.2-json \
        php7.2-mbstring \
        php7.2-mysql \
        && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Not sure why this doesn't get created by the distro package above
RUN mkdir /run/php

# Set up nginx to serve the site
COPY docker/nginx.conf /etc/nginx/sites-available/i18n.conf
RUN rm -f /etc/nginx/sites-enabled/*default*
RUN ln -sf /etc/nginx/sites-available/i18n.conf /etc/nginx/sites-enabled

# Show nginx logs in Docker console output
RUN rm -f /var/log/nginx/* && \
    ln -sf /dev/stdout /var/log/nginx/access.log && \
    ln -sf /dev/stderr /var/log/nginx/error.log

# We need composer
RUN curl -so /usr/bin/composer https://getcomposer.org/composer.phar && \
    chmod 755 /usr/bin/composer #&&
    #ln -sf /usr/bin/php7 /usr/bin/php

# Create our document root and deploy our app to it
COPY . /var/www/html
WORKDIR /var/www/html
RUN composer install

# Supervisor will manage the nginx and php processes
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Ensure PARAM* envvars are passed through PHP FPM, and it's listening on port 9000
COPY docker/www.conf /etc/php/7.2/fpm/pool.d/www.conf

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

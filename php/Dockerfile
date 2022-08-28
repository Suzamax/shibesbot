FROM alpine:edge 

WORKDIR /app

RUN apk update && apk add --no-cache \
    -X http://dl-cdn.alpinelinux.org/alpine/edge/testing \
    curl \
    php81 \
    php81-curl \
    php81-dom \
    php81-fileinfo \
    php81-fpm \
    php81-gd \
    php81-gettext \
    php81-json \
    php81-mbstring \
    php81-openssl \
    php81-pdo \
    php81-phalcon \
    php81-phar \
    php81-pecl-psr \
    php81-opcache \
    php81-session \
    php81-simplexml \
    php81-tokenizer \
    php81-xml \
    php81-zlib \
    pcre \
    tzdata \
    gettext \
    unixodbc-dev\
    supervisor

#RUN pecl channel-update pecl.php.net
#RUN pecl install sqlsrv-5.10.1
#RUN pecl install pdo_sqlsrv-5.10.1 
#RUN docker-php-ext-enable sqlsrv pdo_sqlsrv

RUN set -x; \
    addgroup -g 82 -S www-data; \
    adduser -u 82 -D -S -G www-data www-data && exit 0; exit 1

COPY php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY php/supervisord.conf /etc/supervisord.conf
COPY php/php-fpm.conf /etc/php81/php-fpm.conf
COPY php/phalcon.ini /etc/php81/conf.d/phalcon.ini

EXPOSE 9000

CMD [ "supervisord", "-c", "/etc/supervisord.conf" ]
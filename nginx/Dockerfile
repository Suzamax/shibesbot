FROM nginx:alpine

WORKDIR /app

RUN apk update && apk add --no-cache supervisor

RUN set -x; \
    addgroup -g 82 -S www-data; \
    adduser -u 82 -D -S -G www-data www-data && exit 0; exit 1

COPY nginx/default.conf /etc/nginx/conf.d/default.conf
COPY nginx/supervisord.conf /etc/supervisord.conf

CMD [ "supervisord", "-c", "/etc/supervisord.conf" ]
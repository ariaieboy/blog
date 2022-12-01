FROM composer:2 AS back
COPY . /var/www/html
WORKDIR /var/www/html
RUN composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-reqs
RUN apk add nodejs npm
RUN npm install && npm run prod

###step 3 webserver
FROM nginx:1
COPY --from=back /var/www/html/build_production /usr/share/nginx/html

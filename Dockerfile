### step 1 backend
FROM composer:2 AS back
COPY . /var/www/html
WORKDIR /var/www/html
RUN composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-reqs

###step 2 frontend
FROM node:18 AS front
COPY . /var/www/html
COPY --from=back /var/www/html/vendor /var/www/html/vendor
WORKDIR /var/www/html
RUN npm install && npm run prod

###step 3 webserver
FROM nginx:1
COPY --from=front /var/www/html/build_production /usr/share/nginx/html

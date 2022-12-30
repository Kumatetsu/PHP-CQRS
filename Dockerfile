FROM composer:2.3.2 as vendor

WORKDIR /tmp

COPY composer.json composer.json

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

FROM php:8.2.0 as core
LABEL org.opencontainers.image.authors="Jean Billaud <billaudjean@gmail.com>"

WORKDIR /src/App

COPY . /src/App
COPY --from=vendor /tmp/vendor/ /src/App/vendor/


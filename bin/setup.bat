docker build ./docker/php/ -t php-stations:latest
docker run --rm -t -i --volume %cd%:/app composer install
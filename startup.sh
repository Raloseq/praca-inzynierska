#!/bin/sh

docker exec -it -u www praca-inzynierska-php-1 composer install
docker exec -it -u www praca-inzynierska-php-1 npm install
docker exec -it -u www praca-inzynierska-php-1 npm run dev

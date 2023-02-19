#!/bin/sh

docker exec -it -u www praca-inzynierska-php-1 composer install
docker exec -it -u www praca-inzynierska-php-1 npm install
docker exec -it -u www praca-inzynierska-php-1 npm run dev
docker exec -it -u www praca-inzynierska-php-1 php artisan key:generate
docker exec -it -u www praca-inzynierska-php-1 php artisan migrate:fresh --seed
docker exec -it -u www praca-inzynierska-php-1 php artisan cache:clear
docker exec -it -u www praca-inzynierska-php-1 php artisan config:clear
docker exec -it -u www praca-inzynierska-php-1 php artisan route:clear

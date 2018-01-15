#!/usr/bin/env bash
#php artisan migrate:fresh --seed -v --env=dusk.local
php artisan serve --port=8090 --env=dusk.local &
php artisan dusk
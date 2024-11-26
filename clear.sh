#!/bin/bash

echo "clear cache"

chmod -R gu+w storage

chmod -R guo+w storage

php artisan cache:clear

php artisan config:cache

chmod -R 777 storage/

php artisan optimize:clear

composer dump-autoload

chmod -R 777 storage/* bootstrap/cache/*

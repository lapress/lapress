#!/usr/bin/env bash

cat << "EOF"
  _       ____
 | | __ _|  _ \ _ __ ___  ___ ___
 | |/ _` | |_) | '__/ _ \/ __/ __|
 | | (_| |  __/| | |  __/\__ \__ \
 |_|\__,_|_|   |_|  \___||___/___/

EOF

# Shutdown the laravel app
php artisan down

# Update repository files
git pull origin master

# Install new composer packages
php composer.phar install --no-interaction --prefer-dist --optimize-autoloader

# Sync database changes
#php artisan migrate --force

# Cache boost configuration and routes
php artisan cache:clear
php artisan responsecache:clear
php artisan config:clear
php artisan route:clear

php artisan config:cache
php artisan route:cache

#php public/opcache_reset.php

#php artisan queue:restart

# Rise from the ashes
php artisan up

echo 'Deploy finished.'

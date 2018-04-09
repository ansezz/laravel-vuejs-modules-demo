#!/usr/bin/env bash

echo '*** Clear Laravel Application ***'

echo '** Remove the compiled class file **'
php artisan clear-compiled

echo '** Flush expired password reset tokens **'
php artisan auth:clear-resets

echo '** Flush the application cache **'
php artisan  cache:clear

echo '** Remove the configuration cache file **'
php artisan  config:clear

echo '** Remove the route cache file **'
php artisan  route:clear

echo '** Clear all compiled view files **'
php artisan view:clear

echo '** composer dump autoload **'
composer dump-autoload

echo '* Done *'
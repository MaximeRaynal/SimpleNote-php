#!/bin/bash
service php5-fpm start
service nginx start
chown -R www-data:www-data /var/www
cd /var/www
bash
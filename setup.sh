#!/bin/bash
# Ce fichier est lancé à l'éxécution de la machine
# Il lance les services requis et donne un accès
service php5-fpm start
service nginx start
chmod -R 777 /var/www/app/logs
chmod -R 777 /var/www/app/cache
cd /var/www
bash
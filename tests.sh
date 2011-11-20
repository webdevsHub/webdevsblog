#!/bin/bash
echo -e "\n\e[5;34;47mupdate database schema\e[0m\n"
php app/console --env=test doctrine:schema:update --force
echo -e "\n\e[5;34;47mload fixtures\e[0m\n"
php app/console --env=test doctrine:fixtures:load
echo -e "\n\e[5;34;47mrun tests\e[0m\n"
phpunit -c app/


php composer.phar install
php app/console doctrine:schema:update --force
php app/console doctrine:fixtures:load --append

echo "Build termin�"
pause
Steps to install & test app

1. create db -> create database create_certificates;
2. run CMD -> composer install
3. run migration -> php artisan migrate
4. feed db with fake data -> php artisan db:seed
5. replace mail constant with your credential in .env
6. hit -> send certificate btn

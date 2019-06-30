

create database  as kind_hub
go to the api folder path in command line ad execute these commands 
php artisan migrate
php artisan db:seed --class=TeachersTableSeeder
php artisan db:seed --class=ClassesTableSeeder
php artisan serve


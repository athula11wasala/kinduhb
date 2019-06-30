*.Application files are either located in htdocs folder in Xampp or /var/www/html in a Linux environment.
* Create a database kind_hub
* To change the database credentials (username and password) go to .env file in api/.env
* To execute from the command line,go to the api folder and run these commands 
 php artisan migrate
 php artisan db:seed --class=TeachersTableSeeder
 php artisan db:seed --class=ClassesTableSeeder
 php artisan serve

*following URL For Restful Api, http://127.0.0.1:8000
*There is folder name frontend. it is containg fronted Part. it is developed by jqerey.


*.This application was built using Laravel 5.5.
Doctrine ORM has been used to implement the model and used servies layer pattern.

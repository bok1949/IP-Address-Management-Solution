# installing laravel framework v10
composer create-project laravel/laravel:^10.0 [your working directory]

# generate new application key
- run the following command
php artisan key:generate

# install livewire
- run the following command
composer require livewire/livewire "^2.*"

# setup your database 
- change the following lines in the .env file
- copy and paste the .env.example and change the name to .env

DB_DATABASE=your_db <br>
DB_USERNAME=root <br>
DB_PASSWORD=


# follow the steps below
- run the "composer install"
- run the migration files including seeding <br>
php artisan migrate --seed

# run the application
- run the following comman <br>
php artisan serve
- then copy the link address of the server running on and paste it in the URL



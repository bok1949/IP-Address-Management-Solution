# installing laravel framework v10
composer create-project laravel/laravel:^10.0 <working-directory>

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
- run the migration files including seeding
php artisan migrate --seed



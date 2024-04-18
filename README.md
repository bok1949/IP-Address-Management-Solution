# installing laravel framework v10
composer create-project laravel/laravel:^10.0 <working directory>

# setup your database 
- change the following lines in the .env file
- copy and paste the .env.example and change the name to .env

DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=

# generate new application key
- run the following command
php artisan key:generate

- after this run the composer install
- then you can now migrate the tables by simply running
php artisan migrate

# install livewire
- run the following command
composer require livewire/livewire "^2.*"

## About
Application for customer product proposal with matching suppliers.

## Requirments
- PHP >= 7.2
- Laravel >= 7.x
- MySql >= 5.6

## Installation 
Laravel utilizes composer to manage its dependencies. So, before using Laravel, make sure you have composer installed on your machine. To download all required packages run these commands or you can download [Composer](https://getcomposer.org/doc/00-intro.md).
- composer install

## Database Setup
You need to create a .env file from. env.example, if .env not exists.
-  cp .env.example .env

Then, run this command to create key in .env file if not exists.
- php artisan key:generate

Now, set your database credential against these in .env file.

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=laravel
- DB_USERNAME=root
- DB_PASSWORD=

Use this command for database migration and seeder.
- php artisan migrate:refresh --seed

## Run prject
Use below command in command line to start the project.
- php artisan serve
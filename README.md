# Laravel Order App

[![GitHub issues](https://img.shields.io/github/issues/HayriCan/sanctum-order)](https://github.com/HayriCan/sanctum-order/issues) [![GitHub license](https://img.shields.io/github/license/HayriCan/sanctum-order)](https://github.com/HayriCan/sanctum-order/blob/master/LICENSE)

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

Clone the repository

    git clone git@github.com:HayriCan/sanctum-order.git

Switch to the repo folder

    cd sanctum-order


Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Install all the dependencies using composer

    composer install

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:HayriCan/sanctum-order.git
    cd sanctum-order
    composer install
    cp .env.example .env
    php artisan key:generate

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Docker Installation

Clone the repository

    git clone git@github.com:HayriCan/sanctum-order.git

Switch to the repo folder

    cd sanctum-order


Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run docker compose for building container

    docker-compose up -d --build

Install all the dependencies using composer

    docker-compose run composer install

Generate a new application key

    docker-compose run artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    docker-compose run artisan migrate

Run the database seeder and you're done

    docker-compose run artisan db:seed

You can now access the server at http://localhost:8901

**TL;DR command list**

    git clone git@github.com:HayriCan/sanctum-order.git
    cd sanctum-order
    cp .env.example .env
    docker-compose run composer install
    docker-compose run artisan key:generate
    docker-compose run artisan migrate
    docker-compose run artisan db:seed

# Code overview

## Folders

- `app/Exceptions` - Contains all the exception classes
- `app/Discount` - Contains all classes related to Discount
- `app/Discount/Controllers` - Contains Controller classes of Discount
- `app/Discount/Handlers` - Contains Logic and Database functions of Discount
- `app/Discount/Request` - Contains Form Request of Discount
- `app/Models` - Contains global Eloquent models
- `app/Order` - Contains all classes related to Order
- `app/Order/Controllers` - Contains Controller classes of Order
- `app/Order/Handlers` - Contains Logic and Database functions of Order
- `app/Order/Model` - Contains Model of Order
- `app/Order/Request` - Contains Form Request of Order
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file

## Environment variables

- `.env` - Environment variables can be set in this file

***Note 1*** : If you are using Docker installation you don't have to set anything! Please ignore ***Note 2*.**

***Note 2*** : You can quickly set the database information other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Accept     	| application/json 	|
| Yes      	| X-Requested-With 	| XMLHttpRequest   	|

# Postman Collection

You can find example postman collection for Dockerise Container - see the [Postman Collection](_postman) for details

## Author

[Hayri Can BARÇIN]  
Email: [Contact Me]

## License

This project is licensed under the MIT License - see the [License File](LICENSE) for details

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)
[Hayri Can BARÇIN]: <https://www.linkedin.com/in/hayricanbarcin/>
[Contact Me]: <mailto:hayricanbarcin@gmail.com>



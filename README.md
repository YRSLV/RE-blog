<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

----------

# Getting started


## Installation

Clone the repository

    git clone git@github.com:YRSLV/RE-blog.git

Switch to the repo folder

    cd RE-blog

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Execute the `storage:link` Artisan command. This command will create a symbolic link in the application's public directory that will allow your user's images and post images to be served by the application. For information regarding this command, please consult the [Laravel filesystem documentation:](https://laravel.com/docs/8.x/filesystem#the-public-disk)

    php artisan storage:link

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:YRSLV/RE-blog.git
    cd RE-blog
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan storage:link
    php artisan serve

----------

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.


----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api/user/{id}

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Accept     	| application/json 	|
| Yes 	| Authorization    	| Bearer {token}       	|

You can create API token by clicking your profile image and navigating to corresponding page from 'Manage Account' dropdown menu in the application navbar.

----------

    
## RE-blog Release notes

Version 0.1.0 comprises simple blog starter kit with the implementation for application's login, registration, email verification, two-factor authentication, session management and API via Laravel Sanctum.

Release 0.2.0 delivers posts implementation.

Release 0.3.0 brings API implemenation for users and their posts data retrieval by providing user id.

Release 0.4.0 adds improved welcome and dashboard views.


# Maid Reservation System 

## Requirements

* PHP >= 5.6.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Composer

## Install guide

After pulling this repo
* copy and rename .env.example to .env and fill out mysql db username and password

* Pull all composer dependancies by running following command in application root folder
```
composer install
```

* generate laravel Application Key by running following command in application root folder
```
php artisan key:generate
```

* then if you have entered mysql info correctly run

```
php artisan migrate:refresh --seed
```

* application index page is located in /public folder so you should direct your host there


If you run into issues refer to Laravel installation guide

https://laravel.com/docs/5.3/installation

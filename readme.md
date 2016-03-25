# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## What's Added
- [Dingo](https://github.com/dingo/api).
- [JWT Auth](https://github.com/tymondesigns/jwt-auth).
- Cookie encryption

## Quick Start

- Clone this repo
- Run `composer install`
- Configure your `.env` file for database usage
- Run `php artisan migrate --seed`

> Note: If you want to encrypt your session, make sure you have set `APP_KEY` environment value. In Laravel it's done by run `php artisan key:generate` command. Meanwhile, Lumen doesn't support this command. To solve this issue, you may read [this discussion](http://stackoverflow.com/questions/30344141/lumen-micro-framework-php-artisan-keygenerate/30352795).

## Read These Files for More Information

```sh
app/helpers.php
bootstrap/app.php
config/app.php
config/auth.php
config/jwt.php
config/session.php
public/.htaccess
app/Api/v1/routes.php
app/Api/v1/AuthController.php
```

## Route Added

    [GET] {api_prefix}/
    [POST] {api_prefix}/auth/login
    [GET] {api_prefix}/user (guarded by authentication for PoC)

> Note: Default email login is `johndoe@example.com` with password `johndoe`.

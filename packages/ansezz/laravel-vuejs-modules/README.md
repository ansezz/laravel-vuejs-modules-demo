# Laravel-Modules

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ansezz/laravel-vuejs-modules.svg?style=flat-square)](https://packagist.org/packages/ansezz/laravel-vuejs-modules)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/ansezz/laravel-vuejs-modules/master.svg?style=flat-square)](https://travis-ci.org/ansezz/laravel-vuejs-modules)
[![Scrutinizer Coverage](https://img.shields.io/scrutinizer/coverage/g/ansezz/laravel-vuejs-modules.svg?maxAge=86400&style=flat-square)](https://scrutinizer-ci.com/g/ansezz/laravel-vuejs-modules/?branch=master)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/25320a08-8af4-475e-a23e-3321f55bf8d2.svg?style=flat-square)](https://insight.sensiolabs.com/projects/25320a08-8af4-475e-a23e-3321f55bf8d2)
[![Quality Score](https://img.shields.io/scrutinizer/g/ansezz/laravel-vuejs-modules.svg?style=flat-square)](https://scrutinizer-ci.com/g/ansezz/laravel-vuejs-modules)
[![Total Downloads](https://img.shields.io/packagist/dt/ansezz/laravel-vuejs-modules.svg?style=flat-square)](https://packagist.org/packages/ansezz/laravel-vuejs-modules)

| **Laravel**  |  **laravel-modules** |
|---|---|
| 5.4  | ^1.0  |
| 5.5  | ^2.0  |
| 5.6  | ^3.0  |

`ansezz/laravel-vuejs-modules` is a Laravel package which created to manage your large Laravel app using modules. Module is like a Laravel package, it has some views, controllers or models. This package is supported and tested in Laravel 5.

This package is a re-published, re-organised and maintained version of [pingpong/modules](https://github.com/pingpong-labs/modules), which isn't maintained anymore. This package is used in [AsgardCMS](https://asgardcms.com/).

With one big added bonus that the original package didn't have: **tests**.

Find out why you should use this package in the article: [Writing modular applications with laravel-modules](https://laravel-vuejs.com/blog/writing-modular-applications-with-laravel-modules).

## Install

To install through Composer, by run the following command:

``` bash
composer require ansezz/laravel-vuejs-modules
```

The package will automatically register a service provider and alias.

Optionally, publish the package's configuration file by running:

``` bash
php artisan vendor:publish --provider="Ansezz\Modules\LaravelVuejsModulesServiceProvider"
```

### Autoloading

By default the module classes are not loaded automatically. You can autoload your modules using `psr-4`. For example:

``` json
{
  "autoload": {
    "psr-4": {
      "App\\": "app/",
      "Modules\\": "Modules/"
    }
  }
}
```

**Tip: don't forget to run `composer dump-autoload` afterwards.**

## Documentation

You'll find installation instructions and full documentation on [https://nwidart.com/laravel-modules/](https://nwidart.com/laravel-modules/).

## Credits

- [Anass Ez-zouaine](https://github.com/ansezz)

## About Anass Ez-zouaine

Anass Ez-zouaine is a freelance web developer specialising on the Laravel framework. View all my packages [on my website](https://laravel-vuejs.com/projects).


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

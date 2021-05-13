# laravel-make-extender

## Generate and autoload custom helpers, It can generate multilevel helpers in the context of the directory.

## Generate Service class for process chunk of codes

## Generate Trait for process chunk of codes

## Generate Global Scope class for Model

[![Latest Version on Packagist](https://img.shields.io/packagist/v/limewell/laravel-make-extender.svg?style=flat-square)](https://packagist.org/packages/limewell/laravel-make-extender)
[![Total Downloads](https://img.shields.io/packagist/dt/limewell/laravel-make-extender.svg?style=flat-square)](https://packagist.org/packages/limewell/laravel-make-extender)

This package helps to generate and autoload custom helpers, It can generate multilevel helpers in the context of the
directory.

## Installation

You can install the package via composer:

```bash
composer require limewell/laravel-make-extender
```

## Generate Helper file

```php
php artisan make:helper UserHelper
This will generate UserHelper.php under App/Helpers directory

php artisan make:helper Module/UserHelper
This will generate Module/UserHelper.php under App/Helpers/Module directory
```

## Generate Service

```php
php artisan make:service UserService
This will generate UserService.php under App/Services directory

Usage
(new UserService())->handle();
```

## Generate Trait

```php
php artisan make:trait UserTrait
This will generate UserTrait.php under App/Traits directory
```

## Generate Scope

```php
php artisan make:scope UserScope
This will generate UserScope.php under App/Scopes directory
```
see document [here](https://laravel.com/docs/8.x/eloquent#global-scopes) for how to use global scopes

## Customize Stubs

```php
php artisan vendor:publish --provider="Limewell\LaravelMakeExtender\LaravelMakeExtenderServiceProvider" --tag="stubs"
This will export stubs into /stubs/vendor/laravel-make-extender for customization
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Dipesh Sukhia](https://github.com/dipeshsukhia)
- [Bhavin Gajjar](https://github.com/bhavingajjar)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

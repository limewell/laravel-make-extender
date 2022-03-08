# laravel-make-extender
## Generate below stub
1. Generate and autoload custom helpers, It can generate multilevel helpers in the context of the directory.
2. Generate Service class for process chunk of codes
3. Generate Trait for process chunk of codes
4. Generate Global Scope class for Model
5. Generate Custom Casts
6. Generate Collections Macros
7. Generate View Composers

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

Generate UserHelper.php under App/Helpers directory
```php
php artisan make:helper UserHelper
```
Generate Module/UserHelper.php under App/Helpers/Module directory
```php
php artisan make:helper Module/UserHelper
```



## Generate Service
Generate UserService.php under App/Services directory
```php
php artisan make:service UserService
```
```php
(new UserService())->handle();
```

Generate invokable UserService.php under App/Services directory
```php
php artisan make:service UserService --invokable
```
```php
(new UserService())();
```

## Generate Trait
Generate UserTrait.php under App/Traits directory
```php
php artisan make:trait UserTrait
```

Generate bootable UserTrait.php under App/Traits directory
```php
php artisan make:trait UserTrait --bootable
```

## Generate Scope
Generate UserScope.php under App/Scopes directory
```php
php artisan make:scope UserScope
```
see document [here](https://laravel.com/docs/8.x/eloquent#global-scopes) for how to use global scopes


## Generate Custom Casts
Generate JsonCast.php under App/Casts directory
```php
php artisan make:cast JsonCast
```
see document [here](https://laravel.com/docs/8.x/eloquent-mutators#custom-casts) for how to use Custom Casts

## Generate Collections Macro
Generate toUpper.php under App/Macros directory
```php
php artisan make:macro toUpper
```
see document [here](https://laravel.com/docs/8.x/collections#extending-collections) for how to use Macro


## Generate View composers
Generate config file for register view composers
```php
php artisan vendor:publish --provider="Limewell\LaravelMakeExtender\LaravelMakeExtenderServiceProvider" --tag="config"
```

Generate view composers class
```php
php artisan make:composer MovieComposer
```
Register view composers Edit config (config/viewcomposers.php)

```php
use App\ViewComposers\MovieComposer;

return [
    MovieComposer::class => [
      'view1','view2'
    ],
];
```

see document [here](https://laravel.com/docs/8.x/views#view-composers) for how to use View Composers

## Customize Stubs
```php
php artisan vendor:publish --provider="Limewell\LaravelMakeExtender\LaravelMakeExtenderServiceProvider" --tag="stubs"
```
This will export stubs into /stubs/vendor/laravel-make-extender for customization


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

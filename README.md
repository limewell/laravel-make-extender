# laravel-generate-helpers

# Generate and autoload custom helpers, It can generate multilevel helpers in the context of the directory.

# Generate Service class for process chunk of codes

# Generate Trait for process chunk of codes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dipeshsukhia/laravel-generate-helpers.svg?style=flat-square)](https://packagist.org/packages/dipeshsukhia/laravel-generate-helpers)
[![Total Downloads](https://img.shields.io/packagist/dt/dipeshsukhia/laravel-generate-helpers.svg?style=flat-square)](https://packagist.org/packages/dipeshsukhia/laravel-generate-helpers)

This package helps to generate and autoload custom helpers, It can generate multilevel helpers in the context of the
directory.

## Installation

You can install the package via composer:

```bash
composer require dipeshsukhia/laravel-generate-helpers
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

## Customize Stubs

```php
php artisan vendor:publish --provider="DipeshSukhia\LaravelGenerateHelpers\LaravelGenerateHelpersServiceProvider" --tag="stubs"
This will export stubs into /stubs/vendor/laravel-generate-helpers for customization
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email dipesh.sukhia@gmail.com instead of using the issue tracker.

## Credits

- [Dipesh Sukhia](https://github.com/dipeshsukhia)
- [Bhavin Gajjar](https://github.com/bhavingajjar)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

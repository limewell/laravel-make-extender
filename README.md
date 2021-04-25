# laravel-generate-helpers
# Generate and autoload custome heplers, It can generate multilevel helpers in context of directory

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dipeshsukhia/laravel-generate-helpers.svg?style=flat-square)](https://packagist.org/packages/dipeshsukhia/laravel-generate-helpers)
[![Total Downloads](https://img.shields.io/packagist/dt/dipeshsukhia/laravel-generate-helpers.svg?style=flat-square)](https://packagist.org/packages/dipeshsukhia/laravel-generate-helpers)
![GitHub Actions](https://github.com/dipeshsukhia/laravel-generate-helpers/actions/workflows/main.yml/badge.svg)

This package helps to generate and autoload custome heplers, It can generate multilevel helpers in context of directory.

## Installation

You can install the package via composer:

```bash
composer require dipeshsukhia/laravel-generate-helpers
```

## Usage

```php
php artisan helper:generate common
This will generate CommonHelper.php under App/Helper directory

php artisan helper:generate module/stub
This will generate Module/StubHelper.php under App/Helper/Module directory
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email dipesh.sukhia@gmail.com instead of using the issue tracker.

## Credits

-   [Dipesh Sukhia](https://github.com/dipeshsukhia)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

# This is my package laravel-pwa

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codebar-ag/laravel-pwa.svg?style=flat-square)](https://packagist.org/packages/codebar-ag/laravel-pwa)
[![Total Downloads](https://img.shields.io/packagist/dt/codebar-ag/laravel-pwa.svg?style=flat-square)](https://packagist.org/packages/codebar-ag/laravel-pwa)
[![GitHub-Tests](https://github.com/codebar-ag/laravel-pwa/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/codebar-ag/laravel-pwa/actions/workflows/run-tests.yml)
[![GitHub Code Style](https://github.com/codebar-ag/laravel-pwa/actions/workflows/fix-php-code-style-issues.yml/badge.svg?branch=main)](https://github.com/codebar-ag/laravel-pwa/actions/workflows/fix-php-code-style-issues.yml)
[![PHPStan](https://github.com/codebar-ag/laravel-pwa/actions/workflows/phpstan.yml/badge.svg)](https://github.com/codebar-ag/laravel-pwa/actions/workflows/phpstan.yml)
[![Dependency Review](https://github.com/codebar-ag/laravel-pwa/actions/workflows/dependency-review.yml/badge.svg)](https://github.com/codebar-ag/laravel-pwa/actions/workflows/dependency-review.yml)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## 🛠 Requirements Table

| Package |     PHP     | Laravel | 
|:-------:|:-----------:|:-------:|
| v12.0.0 | ^8.2 - ^8.4 |  12.x   |

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-pwa.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-pwa)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require codebar-ag/laravel-pwa
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-pwa-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-pwa-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-pwa-views"
```

## Usage

```php
$laravelPWA = new CodebarAg\LaravelPWA();
echo $laravelPWA->echoPhrase('Hello, CodebarAg!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Rhys Lees](https://github.com/43909932+RhysLees)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

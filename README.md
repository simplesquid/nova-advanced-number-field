# An advanced number field for Laravel Nova

[![Latest Version on Packagist](https://img.shields.io/packagist/v/simplesquid/nova-advanced-number-field.svg?style=flat-square)](https://packagist.org/packages/simplesquid/nova-advanced-number-field)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/simplesquid/nova-advanced-number-field/Run%20tests?label=tests)](https://github.com/simplesquid/nova-advanced-number-field/actions?query=workflow%3A"Run+tests"+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/simplesquid/nova-advanced-number-field/Check%20&%20fix%20styling?label=code%20style)](https://github.com/simplesquid/nova-advanced-number-field/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![MIT License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/simplesquid/nova-advanced-number-field.svg?style=flat-square)](https://packagist.org/packages/simplesquid/nova-advanced-number-field)

A Laravel Nova field which adds additional functionality to the default Number field by using PHP's `number_format()` function.

![Screenshot of the advanced number field](https://github.com/simplesquid/nova-advanced-number-field/raw/main/docs/screenshot.png)

## Installation

You can install this package in a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require simplesquid/nova-advanced-number-field
```

## Usage

The `AdvancedNumber` field provides an additional 5 methods to the default `Number` field, namely:

- `->prefix('$')`: Sets the prefix to be used when displaying the number.
- `->thousandsSeparator(' ')`: Set the thousands separator symbol to be used when displaying the number.
- `->decimalPoint('.')`: Sets the decimal point symbol to be used when displaying the number.
- `->decimals(3)`: Sets the number of decimal points to be used as well as the step value.
- `->suffix('%')`: Sets the suffix to be used when displaying the number.

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Matthew Poulter](https://github.com/mdpoulter)
- [All Contributors](../../contributors)

Package skeleton based on [spatie/skeleton-php](https://github.com/spatie/skeleton-php).

## About us

SimpleSquid is a small web development and design company based in Valkenburg, Netherlands.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

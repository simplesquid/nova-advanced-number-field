# An advanced number field for Laravel Nova applications

[![Latest Version on Packagist](https://img.shields.io/packagist/v/simplesquid/nova-advanced-number-field.svg?style=flat-square)](https://packagist.org/packages/simplesquid/nova-advanced-number-field)
[![Build Status](https://img.shields.io/travis/simplesquid/nova-advanced-number-field/master.svg?style=flat-square)](https://travis-ci.org/simplesquid/nova-advanced-number-field)
[![MIT License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/simplesquid/nova-advanced-number-field.svg?style=flat-square)](https://packagist.org/packages/simplesquid/nova-advanced-number-field)

A Laravel Nova field which adds additional functionality to the default Number field by using PHP's `number_format()` function.

![Screenshot of the advanced number field](https://github.com/simplesquid/nova-advanced-number-field/raw/master/docs/screenshot.png)

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

You can use the field in your Nova resource like so:

```php
namespace App\Nova;

use SimpleSquid\Nova\Fields\AdvancedNumber\AdvancedNumber;

class User extends Resource
{
    // ...

    public function fields(Request $request)
    {
        return [
            // ...

            AdvancedNumber::make('Price')
                ->prefix('$')
                ->thousandsSeparator(','),

            // AdvancedNumber extends Number, so you can use Number methods too:
            AdvancedNumber::make('Markup')
                ->decimals(0)
                ->suffix('%')
                ->min(0)->max(100),

            // ...
        ];
    }
}
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email security@simplesquid.co.za instead of using the issue tracker.

## Credits

- [:author_name](https://github.com/mdpoulter)
- [All Contributors](../../contributors)

Package skeleton based on [spatie/skeleton-php](https://github.com/spatie/skeleton-php).

## About us

SimpleSquid is a small web development and design company based in Cape Town, South Africa.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

<?php

namespace SimpleSquid\Nova\Fields\AdvancedNumber;

use Laravel\Nova\Fields\Number;

class AdvancedNumber extends Number
{
    /**
     * The prefix to be used when displaying the number.
     */
    private string $prefix = '';

    /**
     * The number of decimals to be displayed.
     */
    private int $decimals = 2;

    /**
     * The decimal point to be used when displaying the number.
     */
    private string $dec_point = '.';

    /**
     * The thousands separator to be used when displaying the number.
     */
    private string $thousands_sep = ' ';

    /**
     * The suffix to be used when displaying the number.
     */
    private string $suffix = '';

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|\Closure|callable|object|null  $attribute
     * @param  (callable(mixed, mixed, ?string):(mixed))|null  $resolveCallback
     *
     * @return void
     */
    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->decimals($this->decimals)
             ->textAlign('right')
             ->displayUsing(function ($value) {
                 return ! is_null($value) ? $this->prefix . number_format($value, $this->decimals, $this->dec_point, $this->thousands_sep) . $this->suffix : null;
             });
    }

    /**
     * Sets the decimal point symbol to be used when displaying the number.
     */
    public function decimalPoint(string $dec_point): static
    {
        $this->dec_point = $dec_point;

        return $this;
    }

    /**
     * Sets the number of decimal points to be used as well as the step value.
     */
    public function decimals(int $decimals): static
    {
        $this->decimals = $decimals;

        $this->step((string) (0.1 ** $this->decimals));

        return $this;
    }

    /**
     * Sets the prefix to be used when displaying the number.
     */
    public function prefix(string $prefix): static
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Sets the suffix to be used when displaying the number.
     */
    public function suffix(string $suffix): static
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Set the thousands separator symbol to be used when displaying the number.
     */
    public function thousandsSeparator(string $thousands_sep): static
    {
        $this->thousands_sep = $thousands_sep;

        return $this;
    }
}

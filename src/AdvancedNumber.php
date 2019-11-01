<?php
/**
 * Copyright (c) 2019 Matthew Poulter. All rights reserved.
 */

namespace SimpleSquid\Nova\Fields\AdvancedNumber;

use Laravel\Nova\Fields\Number;

class AdvancedNumber extends Number
{
    /**
     * The prefix to be used when displaying the number.
     *
     * @var string
     */
    private $prefix = '';

    /**
     * The number of decimals to be displayed.
     *
     * @var int
     */
    private $decimals = 2;

    /**
     * The decimal point to be used when displaying the number.
     *
     * @var string
     */
    private $dec_point = '.';

    /**
     * The thousands separator to be used when displaying the number.
     *
     * @var string
     */
    private $thousands_sep = ' ';

    /**
     * The suffix to be used when displaying the number.
     *
     * @var string
     */
    private $suffix = '';

    /**
     * Create a new field.
     *
     * @param  string       $name
     * @param  string|null  $attribute
     * @param  mixed|null   $resolveCallback
     *
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
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
     *
     * @param  string  $dec_point
     *
     * @return $this
     */
    public function decimalPoint($dec_point)
    {
        $this->dec_point = $dec_point;

        return $this;
    }

    /**
     * Sets the number of decimal points to be used as well as the step value.
     *
     * @param  int  $decimals
     *
     * @return $this
     */
    public function decimals($decimals)
    {
        $this->decimals = $decimals;

        $this->step((string) (0.1 ** $this->decimals));

        return $this;
    }

    /**
     * Sets the prefix to be used when displaying the number.
     *
     * @param  string  $prefix
     *
     * @return $this
     */
    public function prefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Sets the suffix to be used when displaying the number.
     *
     * @param  string  $suffix
     *
     * @return $this
     */
    public function suffix($suffix)
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Set the thousands separator symbol to be used when displaying the number.
     *
     * @param  string  $thousands_sep
     *
     * @return $this
     */
    public function thousandsSeparator($thousands_sep)
    {
        $this->thousands_sep = $thousands_sep;

        return $this;
    }
}

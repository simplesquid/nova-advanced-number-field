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
     * A true false indicator that determines if the output should be rounded to bytes major units.
     *
     * @var string
     */
    private $bytes = false;

    /**
     * A list of suffixes used when using bytes output
     */
    private $byteUnits = ['B', 'KiB', 'MiB', 'GiB', 'TiB'];

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
                return
                    !is_null($value)
                    ? $this->prefix
                    . number_format($this->bytes == false
                        ? $value
                        : $this->formatBytes($value), $this->decimals, $this->dec_point, $this->thousands_sep) . $this->suffix
                    : null;
            });
    }

    /**
     * Sets the number of decimal points to be used as well as the step value.
     *
     * @param  int  $decimals
     *
     * @return $this
     */
    public function asBytes()
    {
        $this->decimals = $decimals;

        $this->step((string) (0.1 ** $this->decimals));

        return $this;
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

    /**
     * A method when called sets bytes output to true.
     * 
     * @return $this
     */
    public function bytes()
    {
        $this->bytes = true;

        return $this;
    }

    /**
     * Convert a byte to a byte major unit.
     * 
     * @return $this
     */
    protected function formatBytes($bytes)
    {
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($this->byteUnits) - 1);

        $bytes /= (1 << (10 * $pow));

        $this->suffix = ' ' . $this->byteUnits[$pow];

        return $bytes;
    }
}

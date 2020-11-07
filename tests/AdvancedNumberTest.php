<?php

namespace SimpleSquid\Skeleton\Tests;

use PHPUnit\Framework\TestCase;
use SimpleSquid\Nova\Fields\AdvancedNumber\AdvancedNumber;

class AdvancedNumberTest extends TestCase
{
    /** @var \SimpleSquid\Nova\Fields\AdvancedNumber\AdvancedNumber */
    private $field;

    public function setUp(): void
    {
        parent::setUp();

        $this->field = AdvancedNumber::make('Number Field');
    }

    /** @test */
    public function field_defaults_to_right_alignment()
    {
        $this->assertEquals('right', $this->field->textAlign);
    }

    /** @test */
    public function field_defaults_to_step_of_two_decimal_places()
    {
        $this->assertArrayHasKey('step', $this->field->meta);

        $this->assertEquals('0.01', $this->field->meta['step']);
    }

    /** @test */
    public function field_displays_number_correctly_using_defaults()
    {
        $this->field->resolveForDisplay(['number_field' => 12345.678]);

        $this->assertEquals('12 345.68', $this->field->value);
    }

    /** @test */
    public function prefix_can_be_set_and_is_displayed()
    {
        $this->field->prefix('$');

        $this->field->resolveForDisplay(['number_field' => 12345.678]);

        $this->assertEquals('$12 345.68', $this->field->value);
    }

    /** @test */
    public function suffix_can_be_set_and_is_displayed()
    {
        $this->field->suffix('%');

        $this->field->resolveForDisplay(['number_field' => 12345.678]);

        $this->assertEquals('12 345.68%', $this->field->value);
    }

    /** @test */
    public function number_of_decimal_places_can_be_set_and_is_displayed()
    {
        $this->field->decimals(3);

        $this->field->resolveForDisplay(['number_field' => 12345.678]);

        $this->assertEquals('12 345.678', $this->field->value);
    }

    /** @test */
    public function decimal_point_can_be_set_and_is_displayed()
    {
        $this->field->decimalPoint(',');

        $this->field->resolveForDisplay(['number_field' => 12345.678]);

        $this->assertEquals('12 345,68', $this->field->value);
    }

    /** @test */
    public function thousands_separator_can_be_set_and_is_displayed()
    {
        $this->field->thousandsSeparator(',');

        $this->field->resolveForDisplay(['number_field' => 12345.678]);

        $this->assertEquals('12,345.68', $this->field->value);
    }

    /** @test */
    public function field_resolves_to_actual_value_for_edit_view()
    {
        $this->field->resolve(['number_field' => 12345.678]);

        $this->assertEquals(12345.678, $this->field->value);
    }

    /** @test */
    public function modifiers_can_be_used_together()
    {
        $this->field->prefix('$');
        $this->field->suffix('c');
        $this->field->decimals(2);
        $this->field->decimalPoint(' and ');
        $this->field->thousandsSeparator(',');

        $this->field->resolveForDisplay(['number_field' => 12345.678]);

        $this->assertEquals('$12,345 and 68c', $this->field->value);

        $this->field->resolve(['number_field' => 12345.678]);

        $this->assertEquals(12345.678, $this->field->value);
    }

    /** @test */
    public function gib_field_resolves_to_gib_bytes_when_appending_bytes_method()
    {    
        $this->field->bytes();

        $this->field->resolveForDisplay(['number_field' => 9626480640.00]);

        $this->assertEquals('8.97 GiB', $this->field->value);

    }

    /** @test */
    public function mib_field_resolves_to_mib_bytes_when_appending_bytes_method()
    {    
        $this->field->bytes();

        $this->field->resolveForDisplay(['number_field' => 380416000.00]);

        $this->assertEquals('362.79 MiB', $this->field->value);
    }

     /** @test */
     public function kib_field_resolves_to_kib_bytes_when_appending_bytes_method()
     {    
         $this->field->bytes();
 
         $this->field->resolveForDisplay(['number_field' => 8192.00]);
 
         $this->assertEquals('8.00 KiB', $this->field->value);
     }

    /** @test */
    public function mib_field_resolves_to_mib_bytes_and_one_decimal_when_appending_bytes_and_decimal_methods()
    {    
        $this->field->bytes()->decimals(1);

        $this->field->resolveForDisplay(['number_field' => 380416000.00]);

        $this->assertEquals('362.8 MiB', $this->field->value);
    }

}

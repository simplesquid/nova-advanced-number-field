<?php

namespace SimpleSquid\Nova\Fields\AdvancedNumber\Tests;

use Illuminate\Database\Schema\Blueprint;
use Laravel\Nova\NovaServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            NovaServiceProvider::class,
        ];
    }
}

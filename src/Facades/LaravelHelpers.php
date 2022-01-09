<?php

namespace ZeroToProd\LaravelHelpers\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ZeroToProd\LaravelHelpers\LaravelHelpers
 */
class LaravelHelpers extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-helpers';
    }
}

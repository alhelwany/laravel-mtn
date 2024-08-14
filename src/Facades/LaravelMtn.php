<?php

namespace Alhelwany\LaravelMtn\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Alhelwany\LaravelMtn\LaravelMtn
 */
class LaravelMtn extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Alhelwany\LaravelMtn\LaravelMtn::class;
    }
}

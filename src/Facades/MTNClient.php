<?php

namespace Alhelwany\LaravelMtn\Facades;

use Alhelwany\LaravelMtn\Enums\Lang;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Alhelwany\LaravelMtn\LaravelMtn
 *
 * @method static boolean send(string $text, Lang $lang, ...$phone)
 */
class MTNClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Alhelwany\LaravelMtn\MTNClient::class;
    }
}

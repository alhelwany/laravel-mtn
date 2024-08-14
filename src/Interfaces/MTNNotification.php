<?php

namespace Alhelwany\LaravelMtn\Interfaces;

use Alhelwany\LaravelMtn\Enums\Lang;

interface MTNNotification
{
    public function toText(): string;

    public function getLang(): Lang;
}

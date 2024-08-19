<?php

namespace Alhelwany\LaravelMtn\Utilities;

use Alhelwany\LaravelMtn\Enums\Lang;

class MessageEncoder
{
    public function __construct() {}

    public function encode(string $msg, Lang $lang)
    {
        if ($lang == Lang::AR) {
            return strtoupper(bin2hex(mb_convert_encoding($msg, 'UTF-16', 'UTF-8')));
        }

        return $msg;
    }
}

<?php

use Alhelwany\LaravelMtn\Enums\Lang;
use Alhelwany\LaravelMtn\Utilities\MessageEncoder;

$messageEncoder = new MessageEncoder;

it('can encode arabic', function () use ($messageEncoder) {
    $msg = 'مرحبا';
    expect($messageEncoder->encode($msg, Lang::AR))->toBe('06450631062D06280627');
});

it('does not encode english', function () use ($messageEncoder) {
    $msg = 'hello';
    expect($messageEncoder->encode($msg, Lang::EN))->toBe('hello');
});

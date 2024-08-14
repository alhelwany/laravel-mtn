<?php

use Alhelwany\LaravelMtn\Exceptions\InvalidPhoneNumberLengthException;
use Alhelwany\LaravelMtn\Utilities\PhoneFormatter;

$phoneFormatter = new PhoneFormatter;

it('can format phone', function () use ($phoneFormatter) {
    $formattedPhone = $phoneFormatter->formatMany(['0912312312']);
    expect($formattedPhone)->toBe('963912312312');
});

it('can format multiple', function () use ($phoneFormatter) {
    $formattedPhone = $phoneFormatter->formatMany(['0912312312', '0912312313']);
    expect($formattedPhone)->toBe('963912312312;963912312313');
});

it('throws exception when phone is too short', function () use ($phoneFormatter) {
    $phoneFormatter->formatMany(['091231231']);
})->throws(InvalidPhoneNumberLengthException::class);

it('throws exception when phone is too long', function () use ($phoneFormatter) {
    $phoneFormatter->formatMany(['09123123123']);
})->throws(InvalidPhoneNumberLengthException::class);

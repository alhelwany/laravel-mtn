<?php

namespace Alhelwany\LaravelMtn;

use Alhelwany\LaravelMtn\Enums\Lang;
use Alhelwany\LaravelMtn\Exceptions\InvalidConfigurationException;
use Alhelwany\LaravelMtn\Utilities\HttpClient;
use Alhelwany\LaravelMtn\Utilities\PhoneFormatter;
use Illuminate\Support\Facades\Log;

class MTNClient
{
    private PhoneFormatter $phoneFormatter;

    private HttpClient $httpClient;

    public function __construct(string $url, string $username, string $password, string $from)
    {
        $this->phoneFormatter = new PhoneFormatter;
        $this->httpClient = new HttpClient($url, $username, $password, $from);
    }

    /**
     * Checks if string is empty
     */
    private static function isEmpty(?string $value): bool
    {
        return is_null($value) || $value == '';
    }

    /**
     * Returns instance of self using the configs
     */
    public static function getInstance(): self
    {
        if (
            self::isEmpty(config('mtn.url')) ||
            self::isEmpty(config('mtn.username')) ||
            self::isEmpty(config('mtn.password')) ||
            self::isEmpty(config('mtn.from'))
        ) {
            throw new InvalidConfigurationException;
        }

        return new self(
            config('mtn.url'),
            config('mtn.username'),
            config('mtn.password'),
            config('mtn.from')
        );
    }

    /**
     * Sends SMS through MTN
     *
     * @return void
     */
    public function send(string $text, Lang $lang, string ...$phone)
    {
        $response = $this->httpClient->sendRequest(
            $this->phoneFormatter->formatMany($phone),
            $text,
            $lang->value
        );

        if (! $response->ok()) {
            Log::error('MTN Request', [
                'numbers' => $phone,
                'msg' => $text,
                'lang' => $lang->name,
                'response' => $response->body(),
            ]);
        }
    }
}

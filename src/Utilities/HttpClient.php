<?php

namespace Alhelwany\LaravelMtn\Utilities;

use Illuminate\Support\Facades\Http;

class HttpClient
{
    const AGENT = 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Mobile Safari/537.36';

    public function __construct(private string $baseUrl, private string $username, private string $password, private string $from) {}

    /**
     * Sends the SMS request to MTN
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function sendRequest(string $gsm, string $msg, int $lang)
    {
        return Http::withUserAgent(self::AGENT)
            ->get($this->baseUrl, [
                'User' => $this->username,
                'Pass' => $this->password,
                'From' => $this->from,
                'Gsm' => $gsm,
                'Msg' => $msg,
                'Lang' => $lang,
            ]);
    }
}

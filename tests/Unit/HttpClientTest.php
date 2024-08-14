<?php

use Alhelwany\LaravelMtn\Utilities\HttpClient;
use Illuminate\Support\Facades\Http;

it('can send request to the correct url', function () {
    $httpClient = new HttpClient('https://www.example.com', 'testuser', 'testpassword', 'testfrom');
    Http::fake(function (Illuminate\Http\Client\Request $request) {
        $url = $request->url();

        return Http::response($url, 200, []);
    });
    $response = $httpClient->sendRequest('963912312312', 'test', 0);
    expect($response->body())->toBe('https://www.example.com?User=testuser&Pass=testpassword&From=testfrom&Gsm=963912312312&Msg=test&Lang=0');
});

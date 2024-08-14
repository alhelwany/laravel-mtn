<?php

return [
    'url' => env('MTN_GATEWAY_URL', 'https://services.mtnsyr.com:7443/General/MTNSERVICES/ConcatenatedSender.aspx'),
    'username' => env('MTN_USERNAME', null),
    'password' => env('MTN_PASSWORD', null),
    'from' => env('MTN_FROM', null),
];

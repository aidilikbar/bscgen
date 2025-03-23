<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Trusted Proxy IP Addresses
    |--------------------------------------------------------------------------
    |
    | Use '*' to trust all proxies or an array of proxy IP addresses.
    |
    */

    'proxies' => '*',

    /*
    |--------------------------------------------------------------------------
    | Headers to Trust
    |--------------------------------------------------------------------------
    |
    | These headers are used to detect proxies and forwarded requests.
    |
    */

    'headers' => Illuminate\Http\Request::HEADER_X_FORWARDED_ALL,
];
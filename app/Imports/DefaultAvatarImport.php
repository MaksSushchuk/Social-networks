<?php

namespace App\Imports;

use GuzzleHttp\Client;

class DefaultAvatarImport {

    public $client;

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.dicebear.com/7.x/fun-emoji/svg',
            // You can set any number of default request options.
            'timeout' => 2.0,
            'verify' => false,
        ]);
    }
    
}
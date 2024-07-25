<?php

namespace App\Services;

use GuzzleHttp\Client;

class MockApiService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function makeAPIRequest($method)
    {
        $response = $this->client->get('https://jsonplaceholder.typicode.com/'. $method);

        return $response->getBody()->getContents();
    }
}
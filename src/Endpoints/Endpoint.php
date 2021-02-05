<?php

namespace TopDown\Endpoints;

use TopDown\Client;

abstract class Endpoint
{
    /**
     * @var string
     */
    const POST = 'POST';
    /**
     * @var string
     */
    const GET = 'GET';
    /**
     * @var string
     */
    const PUT = 'PUT';
    /**
     * @var string
     */
    const DELETE = 'DELETE';
    /**
     * @var string
     */
    const API_VERSION = "v0";
    /**
     * @var [type]
     */
    protected $client;
    
    /**
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
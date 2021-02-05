<?php

namespace TopDown;

use GuzzleHttp\Client as HttpClient;
use TopDown\Endpoints\TopDown;
use TopDown\RequestHandler;

class Client {
    /**
     * @var string
     */
    const BASE_URI = 'https://idealodonto.topsaude.com.br';

    /**
     * @var \TopDown\Endpoints\Location
     */
    private $topDown;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
    /**
     * @var \GuzzleHttp\Client
     */
    private $http;

    /**
     * @param string $username
     * @param string $password
     * @param array|null $extras
     */
    public function __construct($username, $password, array $extras = null)
    {
        $this->username = $username;
        $this->password = $password;

        $options = ['base_uri' => self::BASE_URI];

        if(!is_null($extras)) {
            $options = array_merge($options, $extras);
        }

        $this->http = new HttpClient($options);
        $this->topDown = new TopDown($this);
    }

    /**
    * @param string $method
    * @param string $uri
    * @param array $options
    *
    * @return \ArrayObject
    */
    public function request($method, $uri, $options = [])
    {
        try {
            $response = $this->http->request(
                $method,
                $uri,
                RequestHandler::bindBasicAuthData(
                    $options,
                    $this->username,
                    $this->password
                )
            );
            return $response->getBody();
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @return \TopDown\Endpoints\TopDown
     */
    public function topDown() {
        return $this->topDown;
    }
}
<?php
namespace TopDown;

class RequestHandler
{
    /**
     * @param array $options
     * @param string $apiKey
     *
     * @return array
     */
    public static function bindApiKeyToQueryString(array $options, $apiKey)
    {
        $options['query']['api_key'] = $apiKey;
        return $options;
    }

    /**
     * @param array $options
     * @param string $username
     * @param string $password
     *
     * @return array
     */
    public static function bindBasicAuthData(array $options, $username, $password) 
    {
        $options['auth'] = [$username, $password];
        return $options;
    }
}
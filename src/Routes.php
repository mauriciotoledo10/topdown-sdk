<?php
namespace TopDown;

use TopDown\FunctionGenerator;
use TopDown\Endpoints\Endpoint;

class Routes extends Endpoint
{
    /**
     * @return \TopDown\FunctionGenerator
     */
    public static function modulateRoute()
    {
        $function = new FunctionGenerator();
        $function->routeData = static function ($route) {
            return "api/APIRedeCredenciadaDental/api/" . self::API_VERSION . "/" . $route;
        };
        return $function;
    }
}
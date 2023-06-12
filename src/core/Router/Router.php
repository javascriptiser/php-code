<?php

namespace Amasty\core\Router;

use Amasty\core\View\View;

class Router implements IRouter
{
    public static function start(string $uri): View
    {
        switch ($uri) {
            case '':
            case '/' :
                return new View('', 'main', []);
            case '/add_form' :
                return new View('', 'add_form', []);
            default:
                http_response_code(404);
                return new View('', '404_not_found', []);
        }
    }

}
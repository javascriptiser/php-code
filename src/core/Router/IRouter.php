<?php

namespace Amasty\core\Router;

use mysqli;

interface IRouter
{
    public static function start(string $uri, mysqli $conn);
}
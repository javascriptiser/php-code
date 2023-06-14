<?php
declare(strict_types=1);

namespace Amasty\core\Router;

use mysqli;

interface IRouter
{
    public static function start(string $uri, mysqli $conn);
}
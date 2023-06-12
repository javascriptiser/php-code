<?php

namespace Amasty\core\Router;

use Amasty\core\View\View;

interface IRouter
{
    public static function start(string $uri): View;
}
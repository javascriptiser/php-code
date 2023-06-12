<?php

namespace Amasty;

use Amasty\core\Database\Abstract_DB;
use Amasty\core\Router\Router;
use mysql_xdevapi\Exception;

class App
{
    private Abstract_DB $database;

    public function __construct(Abstract_DB $database)
    {
        $this->database = $database;
    }

    public function bootstrap()
    {
        try {
            $this->database->connect();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }

        $uri = $_SERVER['REQUEST_URI'];
        $view = Router::start($uri);

        echo $view->render();
    }
}
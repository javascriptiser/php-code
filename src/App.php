<?php
declare(strict_types=1);

namespace Amasty;

use Amasty\core\MysqlConnect;
use Amasty\core\Router\Router;
use mysql_xdevapi\Exception;

class App
{
    private MysqlConnect $database;

    public function __construct(MysqlConnect $database)
    {
        $this->database = $database;
    }

    public function bootstrap()
    {
        try {
            $conn = $this->database->connect();
            $uri = $_SERVER['REQUEST_URI'];

            $response = Router::start($uri, $conn);

            echo $response;

        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
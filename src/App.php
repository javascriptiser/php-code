<?php

namespace Amasty;

use Amasty\core\Database\Abstract_DB;
use Amasty\core\View\View;
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

        $view = new View('default', 'test_view', ['example'=>'example_text']);
        echo $view->render();
    }
}
<?php

namespace Amasty\core;

use Amasty\core\Database\Abstract_DB;

class MysqlConnect extends Abstract_DB
{
    public function __construct(string $host, string $user_name, string $password, string $database_name)
    {
        parent::__construct($host, $user_name, $password, $database_name);
    }

    public function connect()
    {
        if (!empty($this->host) and
            !empty($this->user_name) and
            !empty($this->password) and
            !empty($this->database_name)
        ) {
            return mysqli_connect($this->host, $this->user_name, $this->password, $this->database_name);
        } else throw new \Error("Ошибка подключения к базе данных");
    }
}
<?php

namespace Amasty\core;

use Amasty\core\Database\IDBConnection;
use Error;

class MysqlConnect implements IDBConnection
{
    private string $host;
    private string $user_name;
    private string $password;
    private string $database_name;

    public function __construct(string $host, string $user_name, string $password, string $database_name)
    {
        $this->host=$host;
        $this->user_name=$user_name;
        $this->password=$password;
        $this->database_name=$database_name;
    }

    public function connect()
    {
        if (!empty($this->host) and
            !empty($this->user_name) and
            !empty($this->password) and
            !empty($this->database_name)
        ) {
            return mysqli_connect($this->host, $this->user_name, $this->password, $this->database_name);
        } else throw new Error("Ошибка подключения к базе данных");
    }
}
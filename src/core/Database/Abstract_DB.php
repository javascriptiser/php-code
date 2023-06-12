<?php

namespace Amasty\core\Database;

abstract class Abstract_DB
{
    protected string $host;
    protected string $user_name;
    protected string $password;
    protected string $database_name;

    public function __construct(string $host, string $user_name, string $password, string $database_name)
    {
        $this->host = $host;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->database_name = $database_name;
    }

    abstract public function connect();
}
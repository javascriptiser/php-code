<?php

use Amasty\App;
use Amasty\core\MysqlConnect;
use Amasty\helpers\ENV;

require_once __DIR__ . '/vendor/autoload.php';

$env_variables = ENV::getEnv();

$database_instance = new MysqlConnect(
    $env_variables['DB_HOST'],
    $env_variables['DB_USERNAME'],
    $env_variables['DB_PASSWORD'],
    $env_variables['DB_DATABASE_NAME'],
);


$app = new App($database_instance);
$app->bootstrap();


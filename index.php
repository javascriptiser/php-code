<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$root_path = "{$_SERVER['DOCUMENT_ROOT']}/practice_core";
$router = require_once "$root_path/router.php";
$page = $router['page'];

$layout = file_get_contents("{$root_path}/layout.php");

if (!isset($page)) {
    $page = include "$root_path/view/page/404_not_found_page.php";
}

$layout = str_replace("{{ content }}", $page['content'], $layout);

//todo 404 when localhost
echo $layout;

if (session_status() !== 2) {
    session_start();
}
$render_flash = require_once "{$_SERVER['DOCUMENT_ROOT']}/practice_core/utils/render_flash.php";

array_map($render_flash, $_SESSION['flash'] ?? []);
unset($_SESSION['flash']);


<?php
$router_start = function () {
    $root = "{$_SERVER['DOCUMENT_ROOT']}/practice_core";
    $url = $_SERVER['REQUEST_URI'];

    //registration
    if (preg_match('#^/?registration/?$#', $url, $params)) {
        $file_path = "$root/view/page/registration_page.php";
        if (file_exists($file_path)) {
            $page = include $file_path;
            return [
                'page' => $page
            ];
        }
    }

    //login
    if (preg_match('#^/?login/?$#', $url, $params)) {
        $file_path = "$root/view/page/login_page.php";
        if (file_exists($file_path)) {
            $page = include $file_path;
            return [
                'page' => $page
            ];
        }
    }

    return [
        'page' => null
    ];

};

return $router_start();
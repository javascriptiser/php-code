<?php
session_start();
$mysqli_link = require_once "{$_SERVER['DOCUMENT_ROOT']}/db.php";

if (!empty($_POST)) {
    $login = htmlspecialchars($_POST['login']) ?? "";
    $password = htmlspecialchars($_POST['password']) ?? "";
    $confirm_password = htmlspecialchars($_POST['confirm_password']) ?? "";
    $name = htmlspecialchars($_POST['name']) ?? "";
    $last_name = htmlspecialchars($_POST['last_name']) ?? "";

    if (!empty($login)
        and !empty($password)
        and !empty($confirm_password)
        and !empty($name)
        and !empty($last_name)
    ) {


    } else {
        $_SESSION['flash'][] = 'Заполните все поля';
    }

    var_dump($login, $password, $confirm_password);

} else {
    echo "empty";
}
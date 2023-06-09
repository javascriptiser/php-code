<form action="" method="POST">
    <input name="login">
    <input name="password" type="password">
    <input type="submit">
</form>

<?php
session_start();
$link = require_once "{$_SERVER['DOCUMENT_ROOT']}/db.php";

if (!empty($_POST['login']) or !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM test_auth WHERE login='$login' and password='$password'";
    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res);


    if (!empty($user)) {
        $_SESSION['auth']['isAuth'] = true;
        $_SESSION['auth']['login'] = $login;
        header("Location: /index.php");
    } else {
        $_SESSION['flash'] = 'UnAuthorized';
    }

}



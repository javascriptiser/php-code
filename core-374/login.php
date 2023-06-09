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

    $query = "SELECT * FROM test_auth WHERE login='$login'";
    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res);


    if (!empty($user)) {
        $hash = $user['password'];
        if (password_verify($password, $hash)) {
            $_SESSION['auth']['isAuth'] = true;
            $_SESSION['auth']['login'] = $login;
            $_SESSION['flash'][] = 'Authorized';
            header("Location: /index.php");
        } else {
            $_SESSION['flash'][] = 'Неверный логин или пароль';
        }
    } else {
        $_SESSION['flash'][] = 'Пользователя не существует';
    }

}
$session_flash = $_SESSION['flash'];

if (!empty($session_flash)): ?>
    <?php foreach ($session_flash as $key => $flash): ?>
        <p><?= "FLASH: $flash" ?></p>
        <?php unset($_SESSION['flash'][$key]) ?>
    <?php endforeach; ?>
<?php endif; ?>



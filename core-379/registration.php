<form action="" method="POST">
    <input name="login">
    <input name="password" type="password">
    <input name="confirm_password" type="password">
    <input type="submit">
</form>

<?php
session_start();
$login = $_POST['login'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (!empty($login) and !empty($password) and !empty($confirm_password)) {
    if ($password === $confirm_password) {
        $mysqli_link = require_once "{$_SERVER['DOCUMENT_ROOT']}/db.php";

        $query = "SELECT * FROM test_auth WHERE login = '$login'";
        $user = mysqli_fetch_assoc(mysqli_query($mysqli_link, $query));

        if (empty($user)) {
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $query = "INSERT INTO test_auth(login,password) VALUES ('$login','$hash')";
            $mysqli_result = mysqli_query($mysqli_link, $query);

            $_SESSION['auth']['isAuth'] = true;
            $_SESSION['auth']['login'] = $login;
            $_SESSION['flash'][] = "You are authorized";

            header("Location: /index.php");
        } else {
            $_SESSION['flash'][] = "Login is already taken";
        }

    } else {
        $_SESSION['auth']['isAuth'] = false;
        $_SESSION['flash'][] = "You are not authorized";

        header("Location: /index.php");
    }

}
$session_flash = $_SESSION['flash'];

if (!empty($session_flash)): ?>
    <?php foreach ($session_flash as $key => $flash): ?>
        <p><?= "FLASH: $flash" ?></p>
        <?php unset($_SESSION['flash'][$key]) ?>
    <?php endforeach; ?>
<?php endif; ?>


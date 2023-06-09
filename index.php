<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABmJLR0T///////8JWPfcAAAACXBIWXM
    AAABIAAAASABGyWs+AAAAF0lEQVRIx2NgGAWjYBSMglEwCkbBSAcACBAAAeaR9cIAAAAASUVORK5CYII="
          rel="icon" type="image/x-icon">
    <title>Добро пожаловать!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
<div class="container">
    <?php

    session_start();
    $session_auth = $_SESSION['auth'];
    $session_flash = $_SESSION['flash'] ?? [];
    ?>
    <?php if (!empty($session_auth)): ?>
        <p><?= "Your login is {$session_auth['login']}" ?></p>
        <a href="/core-374/logout.php">Logout</a>
    <?php endif; ?>

    <?php if (empty($session_auth)): ?>
        <p>You are not authorized, please login or registration</p>
        <a href="/core-374/login.php">Login</a>
        <a href="/core-379/registration.php">registration</a>
    <?php endif; ?>

    <?php if (!empty($session_flash)): ?>
        <?php foreach ($session_flash as $key => $flash): ?>
            <p><?= "FLASH: $flash" ?></p>
            <?php unset($_SESSION['flash'][$key]) ?>
        <?php endforeach; ?>
    <?php endif; ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>
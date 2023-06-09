<?php
$host = 'localhost'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'users';      // имя базы данных

return $link = mysqli_connect($host, $user, $pass, $name);
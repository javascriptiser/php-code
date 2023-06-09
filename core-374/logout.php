<?php
session_start();
$_SESSION['auth'] = NULL;
header("Location: /index.php");
die();
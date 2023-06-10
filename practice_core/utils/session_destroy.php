<?php
session_start();
session_destroy();
header("Location: /practice_core/index.php");
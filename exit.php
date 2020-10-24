<?php
session_start();
    unset($_SESSION['login']);
    unset($_SESSION['idLogin']);
    unset($_SESSION['idPosition']);
header("location: {$_SERVER['HTTP_REFERER']}");

?>
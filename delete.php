<?php

session_start();

if (isset($_GET['id'])){
    $id = $_GET['id'];



    $_SESSION['totalQuantity'] -= $_SESSION['cart'][$id]['quantity'];
    $_SESSION['totalPrice'] -= $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['quantity'];

    unset($_SESSION['cart'][$id]);
}

header("Location: {$_SERVER['HTTP_REFERER']}");
?>
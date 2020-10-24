<?php

session_start();


if (isset($_GET['id'])){
    $id = $_GET['id'];



    $_SESSION['totalQuantity'] -= 1;
    $_SESSION['totalPrice'] -= $_SESSION['cart'][$id]['price'];
    $_SESSION['cart'][$id]['quantity'] -= 1;
    

    if($_SESSION['totalPrice'] <= 0){
        $_SESSION['totalQuantity'] = 0;
        $_SESSION['totalPrice'] = 0;
        unset($_SESSION['cart'][$id]);
    }
    
}

header("location: {$_SERVER['HTTP_REFERER']}");

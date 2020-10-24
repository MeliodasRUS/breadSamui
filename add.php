<?php

session_start();

require_once 'config.php';

if (isset($_GET['id'])){

    //unset($_SESSION['totalQuantity']);
    //unset($_SESSION['cart']);
    //unset($_SESSION['totalPrice']);

    $id=$_GET['id'];
    $product = $pdo->query("select * from product where id='$id'");
    $product = $product->fetch(PDO::FETCH_ASSOC);

    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity'] +=1;
    }
    else{
        $_SESSION['cart'][$id] = [
            'id' => $product['id'],
            'title' =>$product['name'],
            'price' =>$product['summa'],
            'rus_name' =>$product['name'],
            'img' =>$product['img'],
            'quantity' =>1,
        ];
    }

    $_SESSION['totalQuantity'] = $_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] +=1:1;
    $_SESSION['totalPrice'] = $_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $product['summa']:$product['summa'];
}

if (isset($_POST['id'])){

    //unset($_SESSION['totalQuantity']);
    //unset($_SESSION['cart']);
    //unset($_SESSION['totalPrice']);

    $id=$_POST['id'];
    $product = $pdo->query("select * from product where id='$id'");
    $product = $product->fetch(PDO::FETCH_ASSOC);

    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity'] +=0.5;
    }
    else{
        $_SESSION['cart'][$id] = [
            'id' => $product['id'],
            'title' =>$product['name'],
            'price' =>$product['summa']/2,
            'rus_name' =>$product['name'],
            'img' =>$product['img'],
            'quantity' =>0.5,
        ];
    }

    $_SESSION['totalQuantity'] = $_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] +=0.5:0.5;
    $_SESSION['totalPrice'] = $_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $product['summa']/2:$product['summa']/2;
}




header("location: {$_SERVER['HTTP_REFERER']}");

<?php
session_start();
require_once 'config.php';
error_reporting(E_ALL);
/*if(isset($_POST['id'])){
    echo $_POST['id'];
    
     $price = $_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['quantity'].' ฿';
    
        echo json_encode(array(
        'price' => $price,
        'totalPrice' => $_SESSION['totalPrice'].' ฿',
        'cart' => 'Cart'.$_SESSION['totalPrice'].'฿&nbsp',
        'cartQuantity' => $_SESSION['totalQuantity'],
        'selectFree' => ((($_SESSION['totalQuantity']/0.5)*30)+$_SESSION['totalPrice']).' ฿'
        
    ));
}*/


if(isset($_POST['id'])){
    //echo $_POST['id'];
    $id = $_POST['id'];
   //echo $id.'<br>';
    //var_dump($_SESSION['cart']);
    //$price = $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['quantity'].' ฿';
    
        echo json_encode(array(
        'totalPrice' => $_SESSION['totalPrice'].' ฿',
        'cart' => 'Cart'.$_SESSION['totalPrice'].'฿&nbsp',
        'cartQuantity' => $_SESSION['totalQuantity'],
        'selectFree' => ((($_SESSION['totalQuantity']/0.5)*30)+$_SESSION['totalPrice'].' ฿')
        
    ));
}

if(isset($_POST['mesto'])){
    //echo $_POST['id'];
    $id = $_POST['mesto'];
    //echo $id.'<br>';
    //var_dump($_SESSION['cart']);
    //$price = $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['quantity'].' ฿';
    
        echo json_encode(array(
        'price' => $price,
        'totalPrice' => $_SESSION['totalPrice'].' ฿',
        'cart' => 'Cart'.$_SESSION['totalPrice'].'฿&nbsp',
        'cartQuantity' => $_SESSION['totalQuantity'],
        'selectFree' => ((($_SESSION['totalQuantity']/0.5)*30)+$_SESSION['totalPrice'].' ฿')
        
    ));
}
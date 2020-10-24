<?php

session_start();


if (isset($_GET['id'])){
    $id = $_GET['id'];



    $_SESSION['totalQuantity'] -= 0.5;
    $_SESSION['totalPrice'] -= $_SESSION['cart'][$id]['price']/2;
    $_SESSION['cart'][$id]['quantity'] -= 0.5;
    

    if($_SESSION['totalPrice'] <= 0){
        $_SESSION['totalQuantity'] = 0;
        $_SESSION['totalPrice'] = 0;
        unset($_SESSION['cart'][$id]);
    }
    
}

if (isset($_POST['id'])){

    //unset($_SESSION['totalQuantity']);
    //unset($_SESSION['cart']);
    //unset($_SESSION['totalPrice']);

     $id = $_POST['id'];



    
    

    if($_SESSION['totalPrice'] <= 0){
        $_SESSION['totalQuantity'] = 0;
        $_SESSION['totalPrice'] = 0;
        unset($_SESSION['cart']);
    }
    
    if($_SESSION['cart'][$id]['quantity'] <= 0){
        unset($_SESSION['cart'][$id]);
    }
    else{
        $_SESSION['totalQuantity'] -= 0.5;
        $_SESSION['totalPrice'] -= $_SESSION['cart'][$id]['price']/2;
        $_SESSION['cart'][$id]['quantity'] -= 0.5;
    }

   
    //echo var_dump($_SESSION['cart']);
    $price = $_SESSION['cart'][$id]['price']*$_SESSION['cart'][$id]['quantity'].' ฿';
    
    echo json_encode(array(
        'price' => $price,
        'totalPrice' => $_SESSION['totalPrice'].' ฿',
        'cart' => 'Cart '.$_SESSION['totalPrice'].'฿&nbsp',
        'cartQuantity' => $_SESSION['totalQuantity'],
        'selectFree' => ((($_SESSION['totalQuantity']/0.5)*30)+$_SESSION['totalPrice'].' ฿')
        
    ));
    
    //echo $_SESSION['totalPrice'];
}

//header("location: {$_SERVER['HTTP_REFERER']}");

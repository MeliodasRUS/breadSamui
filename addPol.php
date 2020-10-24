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
        $_SESSION['cart'][$id]['quantity'] +=0.5;
    }
    else{
        $_SESSION['cart'][$id] = [
            'id' => $product['id'],
            'category' => $product['category'],
            'title' =>$product['name'],
            'price' =>$product['summa'],
            'rus_name' =>$product['name'],
            'img' =>$product['img'],
            'quantity' =>0.5,
        ];
    }

    $_SESSION['totalQuantity'] = $_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] +=0.5:0.5;
    $_SESSION['totalPrice'] = $_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $product['summa']/2:$product['summa']/2;
}


if (isset($_POST['id'])){

    //unset($_SESSION['totalQuantity']);
    //unset($_SESSION['cart']);
    //unset($_SESSION['totalPrice']);

    $id=$_POST['id'];
    $pr = $pdo->prepare("select * from product where id= :id");
        $pr->bindValue(':id',$id,PDO::PARAM_INT);
        $pr->execute();
    $product = $pr->fetch(PDO::FETCH_ASSOC);

    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity'] +=0.5;
    }
    else{
        $_SESSION['cart'][$id] = [
            'id' => $product['id'],
            'category' => $product['category'],
            'title' =>$product['name'],
            'price' =>$product['summa'],
            'rus_name' =>$product['name'],
            'img' =>$product['img'],
            'quantity' =>0.5,
        ];
    }

    $_SESSION['totalQuantity'] = $_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] +=0.5:0.5;
    $_SESSION['totalPrice'] = $_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $product['summa']/2:$product['summa']/2;

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

<?php
session_start();
require_once('config.php');
require_once('model/Model_Base.php');

if(isset($_GET['id'])):
    $delete = new Model_Base($pdo);
    foreach ($_SESSION['cart'] as $key=>$product):
        $delete->deleteSession($key);
    endforeach;
    
    $id = $_GET['id'];
    $repeats = $pdo->prepare("select * from reboot where idReboot = :id");
        $repeats->bindValue(':id',$id,PDO::PARAM_INT);
        $repeats->execute();
    $repeat = $repeats->fetchAll();
    foreach($repeat as $rep){
        $idTovar = $rep['idTovar'];
        
        $products = $pdo->prepare("select * from product where id = :id");
            $products->bindValue(':id',$idTovar,PDO::PARAM_INT);
            $products->execute();
        $product = $products->fetch(PDO::FETCH_ASSOC);
            $_SESSION['cart'][$idTovar] = [
                    'id' => $product['id'],
                    'category' => $product['category'],
                    'title' =>$product['name'],
                    'price' =>$product['summa'],
                    'rus_name' =>$product['name'],
                    'img' =>$product['img'],
                    'quantity' =>$rep['quantity']
            ];
        $_SESSION['totalQuantity'] = $_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] +=$rep['quantity']:$rep['quantity'];
        $_SESSION['totalPrice'] = $_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $rep['quantity']*$product['summa']:$product['summa']*$rep['quantity'];
    }
endif;

header('location: cart.php');
?>
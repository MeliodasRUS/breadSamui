<?php
session_start();
//error_reporting(0);
    require_once('config.php');
    require('model/Model_Base.php');
//error_reporting(0);
    //echo $_POST['phone'];
        if(isset($_POST['vxod'])){
            $login = $_POST['phone'];
            $password = $_POST['password'];
            //echo $login.$password;
            $auth = new Model_Base($pdo);
            $auth->auth($login,$password);
        }
       
        //var_dump($_SESSION['login']);
        
        if(isset($_POST['registr'])){
            $login = $_POST['phone1'];
            $password = $_POST['password1'];
            $mail = $_POST['email'];
            $registr = new Model_Base($pdo);
            $registr->registration($login,$mail,$password);
        }
        if(isset($_POST['orders'])){
            $name = '';
            $summ = $_SESSION['totalPrice'];
            $kolvo = '';
            
            
            
            
            $name1 =  null;
            $kolvo1 =  null;
            $quantity1 =  null;
            $date1 =  null;
            $dates1 = null;
            $category1 = null;
            $suma1 =  null;
            $name2 =  null;
            $kolvo2 =  null;
            $quantity2 =  null;
            $date2 =  null;
            $dates2 = null;
            $category2 = null;
            $suma2 =  null;
            $name3 =  null;
            $kolvo3 =  null;
            $quantity3 =  null;
            $date3 =  null;
            $dates3 = null;
            $category3 = null;
            $suma3 = null;
            
            
            
            
            
            
            $mesto = $_POST['mesto'];
            //$date = $_POST['dates'].'<br>'.$_POST['dates1'];
            $idus = $_SESSION['idLogin'];
            $idusers = "$idus";
            $status = '3';
            foreach ($_SESSION['cart'] as $key=>$product):
                if($product['category'] == 1){
                    $name1 .= $product['title'].'<br/>';
                    $kolvo1 .= $product['quantity'].'<br/>';
                    $quantity1 += $product['quantity'];
                    $date1 = $_POST['dates'];
                    $dates1 = str_replace('.', '', $date1);
                    $category1 = $product['category'];
                    $suma1 += $product['quantity']*$product['price'];
                }
                if($product['category'] == 2 or $product['category'] == 5){
                    $name2 .= $product['title'].'<br/>';
                    $kolvo2 .= $product['quantity'].'<br/>';
                    $quantity2 += $product['quantity'];
                    $date2 = $_POST['dates2'];
                    $dates2 = str_replace('.', '', $date2);
                    $category2 = $product['category'];
                    $suma2 += $product['quantity']*$product['price'];
                }
                if($product['category'] == 3 or $product['category'] == 4){
                    $name3 .= $product['title'].'<br/>';
                    $kolvo3 .= $product['quantity'].'<br/>';
                    $quantity3 += $product['quantity'];
                    $date3 = $_POST['dates1'];
                    $dates3 = str_replace('.', '', $date3);
                    $category3 = $product['category'];
                    $suma3 += $product['quantity']*$product['price'];
                }
                //$name .= $product['title'].'<br/>';

                //$kolvo .= $product['quantity'].'<br/>';
            endforeach;

            $idUsersss = $_SESSION['idLogin'];
            
            
            
            
            //$sms = $pdo->query("select * from users where id = '$idUsersss'");
            $ter = $pdo->prepare("select * from users where id = :id");
                $ter->bindValue(':id',$idUsersss);
                $ter->execute();
            $sms = $ter->fetchAll();
            foreach($sms as $sm){
                $to = $sm['email'];
                $subject = 'You made an order on the site natstudion.ru';
                $message = 'Thank you for your order.';
                $headers = "From: natstudion.ru <natstudion@mail.ru>\r\nContent-type: text/plain; charset=utf-8 \r\n";
                
                mail ($to, $subject, $message, $headers);
            }
            
            //$idReboooots = $pdo->query("select * from orders ORDER BY id DESC limit 1");
            $rebbb = $pdo->prepare("select * from orders ORDER BY id DESC limit 1");
                $rebbb->execute();
            $idReboooots = $rebbb->fetchAll();
            $idReboot = 0;
            foreach($idReboooots as $id){
                $idReboot = $id['id'];
            }
            $idReboot +=1;
            
            
            $delete = new Model_Base($pdo);
            
            $order = new Model_Base($pdo);
            
            if(isset($name1)){
                $order->addOrder($name1,$date1,$dates1,$kolvo1,$suma1,$mesto,$status,$idusers,$_SESSION['cart'],$category1,$quantity1,$idReboot);
            }
            if(isset($name2)){
                $order->addOrder($name2,$date2,$dates2,$kolvo2,$suma2,$mesto,$status,$idusers,$_SESSION['cart'],$category2,$quantity2,$idReboot);
            }
            if(isset($name3)){
                $order->addOrder($name3,$date3,$dates3,$kolvo3,$suma3,$mesto,$status,$idusers,$_SESSION['cart'],$category3,$quantity3,$idReboot);
            }
            //$order->addOrder($name,$date,$kolvo,$summ,$mesto,$status,$idusers,$_SESSION['cart']);
            foreach ($_SESSION['cart'] as $key=>$product):
                $delete->deleteSession($key);
            endforeach;
        }
        if(isset($_POST['SMS'])){
            //var_dump($_POST['idUsers']);
            $stack = array();
            foreach($_POST['checkId'] as $checkid){
                $smska = $pdo->prepare("select * from orders where id = :checkid");
                    $smska->bindValue(':checkid',$checkid,PDO::PARAM_INT);
                    $smska->execute();
                $sec = $smska->fetchAll();
                foreach($sec as $se){
                    array_push($stack, $se['idusers']);
                }
            }
            
            $input = $stack;
            $result = array_unique($input);
            
            foreach($result as $check){
                //echo $check.'<br>';
                $email = $pdo->query("select * from users where id = '$check'");
                foreach($email as $em){
                    $to = $em['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['text'];
                    $headers = "From: natstudion.ru <natstudion@mail.ru>\r\nContent-type: text/plain; charset=utf-8 \r\n";
                    mail ($to, $subject, $message, $headers);
                    //echo $em['email'];
                }
                //echo $check;
            }
        }
        
        if(isset($_POST['checkOrder'])){
            if(isset($_POST['checkId']) && $_POST['checkId'] > 0){
                $stat = $_POST['stat'];
            //echo $_POST['stat'];
            //var_dump($_POST['checkId']);
            foreach($_POST['checkId'] as $check){
                $update= $pdo->prepare("update orders set status = :stat where id = :check");
                    $update->bindValue(':check',$check,PDO::PARAM_INT);
                    $update->bindValue(':stat',$stat,PDO::PARAM_INT);
                $update->execute();
                //$update = $pdo->query("update orders set status = '$stat' where id = '$check'");
                }
            }
            
        }
        
        if(isset($_POST['formSMSM'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $phone = $_POST['phone'];
            
            $message = 'Name:'.$name.' Email:'.$email.' Phone:'.$phone.' Message:'.$_POST['message'];
            
            $to = 'yuukkii@yandex.ru';
            $headers = "From: natstudion.ru <natstudion@mail.ru>\r\nContent-type: text/plain; charset=utf-8 \r\n";
            mail ($to, $subject, $message, $headers);
        }

//echo $_SERVER['HTTP_REFERER'];

//echo $has;
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Bakery products </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.png">






    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    --><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/style.css">


    <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
</head>

<body>

    <!-- PRELOADER 
    <div id="preloader">
        <div class="preloader-area">
            <div class="preloader-box">
                <div class="preloader"></div>
            </div>
        </div>
    </div>-->


    <section class="header-top-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="header-top-content">
                        <ul class="nav nav-pills navbar-left">
                            <li><a href="tel:+66 84 509 7376"><i class="pe-7s-call"></i><span>+66 84 509 7376</span></a></li>
                            <li><a href="mailto:alissuana@gmail.com"><i class="pe-7s-mail"></i><span> alissuana@gmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-top-menu">
                        <ul class="nav nav-pills navbar-right">
                            <?php if(isset($_SESSION['idPosition'])):  if($_SESSION['idPosition'] == 1):?><li><a href="admin.php">Admin panel</a></li> <?endif; endif;?>
                            <li><a href="profile.php">My account</a></li>
                            <li><a href="cart.php">Cart</a></li>
                            <li><?php if(isset($_SESSION['login'])):?><a href="exit.php"><i class="pe-7s-lock"></i><?php   echo $_SESSION['login']; echo '</a>'; else:?><a href="#basicModal" data-toggle="modal"><i class="pe-7s-lock"></i>Entrance/Registration<?endif;?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <header class="header-section">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    <a class="navbar-brand" href="index.php#"><b>S</b>ourdough Bread Samui</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                        <li class="active"><a href="index.php#">Home</a></li><!--
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">page</a></li>
                        <li><a href="#">shop</a></li>-->
                        <li><a href="index.php#news">News</a></li>
                        <li><a href="index.php#contact">Contact Us</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                    </ul>
<?php 
if(isset($_SESSION['cart']) > 0): ?>

    
                        <ul class="nav navbar-nav navbar-right cart-menu">
                        <!--<li><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></li>-->
                        <li><a href="cart.php"><span id="caart"> Cart <?php echo $_SESSION['totalPrice']?>฿&nbsp;</span> <span class="shoping-cart" id="cartQuantity"> <?php echo $_SESSION['totalQuantity']?></span></a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        
    </header>
<?

else:
?>
           <ul class="nav navbar-nav navbar-right cart-menu">
                        <!--<li><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></li>-->
                        <li><a href="cart.php"><span id="caart"> Cart 0 ฿&nbsp;</span> <span class="shoping-cart" id="cartQuantity">0</span></a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </header>
<? endif;?>
    <section class="search-section">
        <div class="container">
            <div class="row subscribe-from">
                <div class="col-md-12">
                    <form class="form-inline col-md-12 wow fadeInDown animated">
                        <div class="form-group">
                            <input type="email" class="form-control subscribe" id="email" placeholder="Search...">
                            <button class="suscribe-btn"><i class="pe-7s-search"></i></button>
                        </div>
                    </form>
                    <!-- end /. form -->
                </div>
            </div>
            <!-- end of/. row -->
        </div>
        <!-- end of /.container -->
    </section>
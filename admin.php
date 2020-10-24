<?php
    session_start();
    require_once('config.php');
    require_once('model/Model_Base.php');
    
    if(!isset($_SESSION['idPosition'])){
        header('location: profile.php');
    }
    if($_SESSION['idPosition'] != 1){
        header('location: profile.php');
    }
    
    if(isset($_POST['addProduct1'])){
        $name = $_POST['name1'];
        $opisanie = $_POST['opisanie'];
        $dnei = $_POST['dni'];
        $category = $_POST['category'];
        $summa = $_POST['summa'];
        $img = $_FILES['img']['name'];
        $add = new Model_Base($pdo);
        $path = 'images/product/';
        
        $filePath  = $_FILES['img']['tmp_name'];
        if (!@copy($_FILES['img']['tmp_name'], $path . $_FILES['img']['name'])){}
        //$uploaddir = 'images/';
        //$uploadfile = $uploaddir .$_POST['img'];
        //move_uploaded_file($_POST['img'], $uploadfile);
        $add->addProduct($name,$opisanie,$summa,$img,$dnei,$category);
    }
    
    if(isset($_POST['uppProduct'])){
        $id = $_POST['idUpdate'];
    }
    
    if(isset($_POST['deleteProduct'])){
        $id = $_POST['idDelete'];
        $del = new Model_Base($pdo);
        $del->deleteProduct($id);
    }
    
    if(isset($_POST['addNews'])){
        $name = $_POST['name1'];
        $opisanie = $_POST['opisanie'];
        $img = $_FILES['img']['name'];
        $path = 'images/product/';
        
        $filePath  = $_FILES['img']['tmp_name'];
        if (!@copy($_FILES['img']['tmp_name'], $path . $_FILES['img']['name'])){}
        //$uploaddir = 'images/';
        //$uploadfile = $uploaddir .$_POST['img'];
        //move_uploaded_file($_POST['img'], $uploadfile);
        $add = new Model_Base($pdo);
        $add->addNews($name,$opisanie,$img);
    }
    
    if(isset($_POST['deleteNews'])){
        $id = $_POST['idDelete'];
        $del = new Model_Base($pdo);
        $del->deleteNews($id);
    }

?>


<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.11.5, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="icon" href="images/favicon.png">

  
  <title>Bakery products Admin panel</title>
  
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <!--
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/style.css">-->

  
  
</head>
<body>
  <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-k">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                
                
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right navbar-nav-top-padding" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-black display-4" href="index.php" aria-expanded="false">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>Home</a></li>
                </ul>
            
        </div>
    </nav>
</section>

<?php


/*
include ("config.php");
    if(!isset($_SESSION['login'])):
        header('location: '.$_SERVER['HTTP_REFERER']'.');
    else:
    $login = $_SESSION['login'];
    $connect = $pdo->query("select * from sotrudniki where login = '$login'");*/
?>


<section class="header1 cid-rHB5MBY8RZ" id="header16-v">

    

<?php
    //if(isset($_SESSION['login']))
?>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10 align-center"><br><br>
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">Admin panel
</h1>
                
                
                
            </div>
        </div>
    </div>

</section>

<section class="mbr-section info1 cid-rHB6f6Bc0g" id="info1-y">

    


<center>
<?php
/*
                 if(isset($_POST['addResept'])){
       
       
       
       
        $name = $_POST['name'];
        $opisanie = $_POST['opisanie'];
        $time = $_POST['time'];
        $img = $_POST['img'];
        $ingredient = $_POST['ingredient'];
        $resept = $_POST['resept'];
        $category = $_POST['category'];
        $complexity = $_POST['complexity'];
        $productgroup = $_POST['productgroup'];
        
        $add = new Model_Base($pdo);
        $add->addResept($name,$opisanie,$ingredient,$resept,$time,$img,$category,$productgroup,$complexity);
        
    }*/
            ?>
</center>
    <br><br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Adding a product</h2>
                    <div class="col-md-12 input-group-btn align-center"><a href="#addProduct" data-toggle="modal"><button type="button" data-toggle="modal" class="btn btn-primary btn-form display-4" name="addProduct">Add</button></a></div>
            </div>
        </div>
    </div>
    

    
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Editing a product</h2>
                <form action="update.php" method="post">
                    <input type="hidden" name="productupd" value="1">
                    <select class="form-control" name="idUpdate">
                        <?php 
                            $connect = $pdo->query("select * from product");
                            foreach($connect as $conn):
                        ?><option value="<?=$conn['id'];?>"><?=$conn['name'];?></option><?endforeach;?>
                    </select>
                <div class="col-md-12 input-group-btn align-center"><button type="submit" class="btn btn-primary btn-form display-4" name="uppProduct">Edit</button></div>
                </form>
            </div>
        </div>

    </div>
        <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                <!---Formbuilder Form-->
              
            </div>
        </div>
    </div>

    
    
    
<!--
 <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Добавление категории</h2>
                
            </div>
        </div>
    </div>   
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                
                <form action="" method="POST" class="mbr-form form-with-styler" >
                    <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Спасибо за заполнение анкеты!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                        </div>
                    </div>
                    
                            <div class="col-md-12 input-group-btn align-center">
                            <input type="text" name="name"  class="form-control display-7" required="required">
                        
                        <div class="col-md-12 input-group-btn align-center"><button type="submit" name="addCategory" class="btn btn-primary btn-form display-4">Добавить</button></div>
                    </div>
                </form>
                
               
            </div>
        </div>
    </div>-->
    

    
 <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">The removal of the product</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                <!---Formbuilder Form-->
                <form method="POST" class="mbr-form form-with-styler" data-form-title="Mobirise Form">
                    <div class="dragArea row">
                         <select class="form-control" name="idDelete">
                        <?php 
                            $connect = $pdo->query("select * from product");
                            foreach($connect as $conn):
                        ?><option value="<?=$conn['id'];?>"><?=$conn['name'];?></option><?endforeach;?>
                    </select>
                        <div class="col-md-12 input-group-btn align-center"><button type="submit" class="btn btn-secondary btn-form display-4" name="deleteProduct">Remove</button></div>
                        
                    </div>
                </form><!---Formbuilder Form-->
            </div>
        </div>
    </div>   






<br><br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Adding news</h2>
                    <div class="col-md-12 input-group-btn align-center"><a href="#addNews" data-toggle="modal"><button type="button" data-toggle="modal" class="btn btn-primary btn-form display-4" name="addNews">Add</button></a></div>
            </div>
        </div>
    </div>
    

    
    
    
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Editing a news</h2>
                <form action="update.php" method="post">
                    <input type="hidden" name="productupd" value="1">
                    <select class="form-control" name="idUpdate">
                        <?php 
                            $connect = $pdo->query("select * from news");
                            foreach($connect as $conn):
                        ?><option value="<?=$conn['id'];?>"><?=$conn['name'];?></option><?endforeach;?>
                    </select>
                <div class="col-md-12 input-group-btn align-center"><button type="submit" class="btn btn-primary btn-form display-4" name="uppNews">Edit</button></div>
                </form>
            </div>
        </div>

    </div>
        <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                <!---Formbuilder Form-->
              
            </div>
        </div>
    </div>





 <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">Deleting news</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                <!---Formbuilder Form-->
                <form method="POST" class="mbr-form form-with-styler" data-form-title="Mobirise Form">
                    <div class="dragArea row">
                         <select class="form-control" name="idDelete">
                        <?php 
                            $connect = $pdo->query("select * from news");
                            foreach($connect as $conn):
                        ?><option value="<?=$conn['id'];?>"><?=$conn['name'];?></option><?endforeach;?>
                    </select>
                        <div class="col-md-12 input-group-btn align-center"><button type="submit" class="btn btn-secondary btn-form display-4" name="deleteNews">Remove</button></div>
                    </div>
                </form><!---Formbuilder Form-->
            </div>
        </div>
    </div>   




    
    
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-12 input-group-btn align-center"><a href="exit.php"><button type="submit" name="exit" class="btn btn-primary btn-form display-4">Exit</button></a></div>
        </div>
    </div>
</section>

<style>
    .modal-content{
        height:auto;
        width:auto;
    }
</style>

<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Adding a product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
           <label for="name">Product name</label>
           <input type="text" name="name1" id="name" class="form-control"   placeholder="Enter the product name" required>
        </div>
        <div class="form-group">
           <label for="text">Description</label>
           <input type="text" name="opisanie" class="form-control"  placeholder="Enter a description" required>
        </div>
        <div class="form-group">
           <label for="text">The days of baking</label>
           <select class="form-control" name="dni">
               <?php
                    $cot = $pdo->query("select * from dni");
                    foreach($cot as $cots):
                ?>
                    <option value="<?=$cots['id']?>"><?=$cots['name']?></option>
                <?php
                    endforeach;
               ?>
           </select>
        </div>
        <div class="form-group">
           <label for="text">Product category</label>
           <select class="form-control" name="category">
               <?php
                    $cot = $pdo->query("select * from category");
                    foreach($cot as $cots):
                ?>
                    <option value="<?=$cots['id']?>"><?=$cots['name']?></option>
                <?php
                    endforeach;
               ?>
           </select>
        </div>
        <div class="form-group">
           <label for="text">The cost of the product per piece ฿</label>
           <input type="number" name="summa" class="form-control"  placeholder="Enter the cost ฿" required>
        </div>
        <div class="form-group">
           <label for="text">Product photos</label>
           <input type="file" name="img" class="form-control"  placeholder="Select a photo" required>
        </div>
      </div>
      <div class="modal-footer">
            <a href="" data-dismiss="modal" aria-label="Close"><button type="button" name="close" class="btn btn-info">Cancel</button></a>
            <button type="submit" name="addProduct1" class="btn btn-info">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>














<div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="addNews" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Adding a news</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" enctype="multipart/form-data" method="post">
        <div class="form-group">
           <label for="name">The name of the news</label>
           <input type="text" name="name1" id="name" class="form-control"   placeholder="Enter the name of the news item" required>
        </div>
        <div class="form-group">
           <label for="text">Description</label>
           <input type="text" name="opisanie" class="form-control"  placeholder="Enter a description" required>
        </div>
        <div class="form-group">
           <label for="text">Product photos</label>
           <input type="file" name="img" class="form-control"  placeholder="Select a photo" required>
        </div>
      </div>
      <div class="modal-footer">
            <a href="" data-dismiss="modal" aria-label="Close"><button type="button" name="close" class="btn btn-info">Cancel</button></a>
            <button type="submit" name="addNews" class="btn btn-info">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>















  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  

  
  
</body>
</html>
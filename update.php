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
        
        $id = $_POST['idPr'];
        

        //$uploaddir = 'images/';
        //$uploadfile = $uploaddir .$_POST['img'];
        //move_uploaded_file($_POST['img'], $uploadfile);
        $add = new Model_Base($pdo);
        $add->updateProduct($id,$name,$opisanie,$summa,$dnei,$category);
        header('location: admin.php');
    }
    
    if(isset($_POST['addNews'])){
        $name = $_POST['name1'];
        $opisanie = $_POST['opisanie'];
        $id = $_POST['idPr'];
        
        $add = new Model_Base($pdo);
        $add ->updateNews($id,$name,$opisanie);
    }
    
    

?>


<!DOCTYPE html>
<html  lang="en">
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
<section class="mbr-section info1 cid-rHB6f6Bc0g" id="info1-y">
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



    


<center>
<?php
    if(isset($_POST['uppNews'])):
        $id = $_POST['idUpdate'];
        $upds = $pdo->prepare("select * from news where id = :id");
            $upds->bindValue(':id',$id,PDO::PARAM_INT);
        $upds->execute();
        $upda = $upds->fetchAll();
        foreach($upda as $upd):
?>


 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Editing a news</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" enctype="multipart/form-data" method="post">
        <input type="hidden" value="<?=$id?>" name="idPr">
        <div class="form-group">
           <label for="name">News name</label>
           <input type="text" name="name1" id="name" class="form-control"   value="<?=$upd['name']?>"required>
        </div>
        <div class="form-group">
           <label for="text">Description</label>
           <input type="text" name="opisanie" class="form-control"  value="<?=$upd['opisanie']?>" required>
        </div>
      </div>
      <div class="modal-footer">
            <a href="admin.php" data-dismiss="modal" aria-label="Close"><button type="button" name="close" class="btn btn-info">Cancel</button></a>
            <button type="submit" name="addNews" class="btn btn-info">Save</button>
        </form>
      </div>
    </div>
  </div>


<?endforeach;?>
<?endif;?>
<?php
    if(isset($_POST['productupd'])):
        $id = $_POST['idUpdate'];
        
        $upds = $pdo->prepare("select * from product where id = :id");
            $upds->bindValue(':id',$id,PDO::PARAM_INT);
            $upds->execute();
        $updas = $upds->fetchAll();
        foreach($updas as $upd):
?>
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Editing a product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" enctype="multipart/form-data" method="post">
        <input type="hidden" value="<?=$id?>" name="idPr">
        <div class="form-group">
           <label for="name">Product name</label>
           <input type="text" name="name1" id="name" class="form-control"   value="<?=$upd['name']?>"required>
        </div>
        <div class="form-group">
           <label for="text">Description</label>
           <input type="text" name="opisanie" class="form-control"  value="<?=$upd['opisanie']?>" required>
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
           <input type="number" name="summa" class="form-control"  value="<?=$upd['summa']?>" required>
        </div>
        
      </div>
      <div class="modal-footer">
            <a href="admin.php" data-dismiss="modal" aria-label="Close"><button type="button" name="close" class="btn btn-info">Cancel</button></a>
            <button type="submit" name="addProduct1" class="btn btn-info">Save</button>
        </form>
      </div>
    </div>
  </div>
<?endforeach;?>
<?endif;?>
<br><br><br>
</section>
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
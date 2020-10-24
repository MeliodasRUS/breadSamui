<?php
//session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//error_reporting(0);
//header('Content-type:text/html; charset=utf-8');

class Model_Base{
    
    private $db;
    public $pdo;
    public $login,$password,$i,$k,$mail,$position;
    public function __construct($pdo){
        global $pdo;
        $this->pdo = $pdo;
    }   
    
    public function auth($login,$password){
        
        $connect = $this->pdo->query("select * from users where login = '$login'");
        foreach($connect as $conn){
            echo $conn['password'];
            if($password == $conn['password']){
                $_SESSION['login'] = $login;
                $_SESSION['idLogin'] = $conn['id'];
                $_SESSION['idPosition'] = $conn['position'];
            }
            else{
                echo 'Логин или пароль введены неверно';
            }
        }
        //echo 'asdasdas';
        //echo $_SESSION['login'];
        if(isset($_SESSION['login'])):
            header("location: {$_SERVER['HTTP_REFERER']}");
        else:
            header("location: profile.php?auth");
        endif;
    }
    
    public function registration($login,$mail,$password){
        $connect = $this->pdo->prepare("select * from users where login = :login and email = :email");
            $connect->bindValue(':login', $login, PDO::PARAM_STR);
            $connect->bindValue(':email', $mail, PDO::PARAM_STR);
            $connect->execute();
        $data = $connect->fetchAll();
        $i = 0;
        $k = 0;
        foreach($data as $conn):
            if($login == $conn['login']):
                $i = +1;
            endif;
            if($mail == $conn['email']):
                $k = +1;
            endif;
        endforeach;
        if(($i == 0) and ($k == 0)):
            if(!isset($_SESSION['login'])):
                $position = 2;
                    $sth = $this->pdo->prepare("insert into users(login,password,position,email) values(:login,:password,:position,:mail)");
                        $sth->bindValue(':login', $login, PDO::PARAM_STR);
                        $sth->bindValue(':password', $password, PDO::PARAM_STR);
                        $sth->bindValue(':position',$position, PDO::PARAM_INT);
                        $sth->bindValue(':mail',$mail,PDO::PARAM_STR);
                    $sth->execute();
                $reg = $this->pdo->prepare("select * from users where login = :login");
                    $reg->bindValue(':login', $login, PDO::PARAM_STR);
                    $reg->execute();
                $rg = $reg->fetchAll();
                foreach($rg as $cot):
                    $_SESSION['login'] = $login;
                    $_SESSION['idLogin'] = $cot['id'];
                    $_SESSION['idPosition'] = $cot['position'];
                endforeach;
            endif;
        endif;
        if(($k >= 1) and ($i >= 1)){
            if(!isset($_SESSION['login'])):
                $cos = $this->pdo->prepare("select * from users where login = :login and email = :mail");
                    $cos->bindValue(':login',$login,PDO::PARAM_STR);
                    $cos->bindValue(':mail',$mail,PDO::PARAM_STR);
                    $cos->execute();
                $connect = $cos->fetchAll();
                foreach($connect as $conn){
                    if($password == $conn['password']){
                        $_SESSION['login'] = $login;
                        $_SESSION['idLogin'] = $conn['id'];
                        $_SESSION['idPosition'] = $conn['position'];
                    }
                }
            endif;
            if(isset($_SESSION['login'])):
                header("location: {$_SERVER['HTTP_REFERER']}");
            else:
                header("location: profile.php?auth");
            endif;
        }
    } 
    
    public function resetPassword () {
        
      
    } 
    
    
    public function allProduct(){
        $data = $this->pdo->prepare("select *,pr.id as 'id1',pr.name as 'name1',ms.name as 'name2' from product pr inner join dni ms on pr.dni = ms.id");
            $data->execute();
        $connect = $data->fetchAll();
        foreach($connect as $conn){
            $string = $conn['opisanie'];
            $string = strip_tags($string);
            $string = substr($string, 0, 200);
            echo '<div class="col-md-4 category'.$conn['category'].'" id="category'.$conn['category'].'"><div class="thumb" id="category'.$conn['category'].'"><a href="product.php?id='.$conn['id1'].'" >
                        <div class="item-box-blog ">
                          <div class="item-box-blog-image">
                            <!--Date-->
                            <div class="item-box-blog-date bg-blue-ui white"> <span class="mon">'.$conn['summa'].' ฿</span> </div>
                            <!--Image-->
                            <figure> <img alt="" src="images/product/'.$conn['img'].'" style="width:318px;height:210px"> </figure>
                          </div>
                          <div class="item-box-blog-body">
                            <!--Heading-->
                            <div class="item-box-blog-heading">
                              <a href="product.php?id='.$conn['id1'].'" tabindex="0">
                                <h5>'.$conn['name1'].'</h5>
                              </a>
                            </div>
                            <!--Data-->
                            <div class="item-box-blog-data" style="padding: px 15px;">
                              <p><i class="fa fa-user-o"></i>Days of preparation:  '.$conn['name2'].'</p>
                            </div>
                            <!--Text-->
                            <div class="item-box-blog-text">
                              <p>'.$string.'...</p>
                            </div>
                            <div class="mt"> <text tabindex="0" class="btn bg-blue-ui white read" name="" id="add'.$conn['id1'].' value="" onclick="getdetails('.$conn['id1'].')" ">Add to cart</a> </div>
                            <!--Read More Button-->
                          </div>
                        </div>
                      </div></div></a>';
        }
    }
    public function oneProduct($id){
        $data = $this->pdo->prepare("select *,pr.id as 'id1',pr.name as 'name1',ms.name as 'name2' from product pr inner join dni ms on pr.dni = ms.id where pr.id = :id");
            $data->bindValue(':id',$id,PDO::PARAM_INT);
            $data->execute();
        $connect = $data->fetchAll();
        foreach($connect as $conn){
            echo '<div class="resume">
                    <header class="page-header">
                    <h1 class="page-title">'.$conn['name1'].'</h1>
                  </header>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                    <div class="panel panel-default">
                      <div class="panel-heading resume-heading">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="col-xs-12 col-sm-4">
                              <figure>
                                <img class="img-circle img-responsive" alt="" src="images/product/'.$conn['img'].'">
                              </figure>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                              <ul class="list-group">
                                <li class="list-group-item">Days of preparation : '.$conn['name2'].'</li>
                                <li class="list-group-item">Cost: '.$conn['summa'].'</li>
                                <li class="list-group-item"><button type="button" class="btn bg-blue-ui white read" name="addCart" onclick="getdetails('.$conn['id1'].')">Add to cart</button></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="bs-callout bs-callout-danger">
                        <h4>Description</h4>
                        <p>
                         '.$conn['opisanie'].'
                        <p>
                        </p>
                      </div>
                     </div>
                  </div>
                </div>
                </div>';
        }
    }   
    public function addProduct($name,$opisanie,$summa,$img,$dnei,$category){
        $add = $this->pdo->prepare("insert into product(name,summa,img,opisanie,category,dni) values(:name,:summa,:img,:opisanie,:category,:dnei)");
            $add->bindValue(':name',$name,PDO::PARAM_STR);
            $add->bindValue(':summa',$summa,PDO::PARAM_INT);
            $add->bindValue(':img',$img,PDO::PARAM_STR);
            $add->bindValue(':opisanie',$opisanie,PDO::PARAM_STR);
            $add->bindValue(':category',$category,PDO::PARAM_INT);
            $add->bindValue(':dnei',$dnei,PDO::PARAM_INT);
        $add->execute();    
        //$add = $this->pdo->query("insert into product(name,summa,img,opisanie,category,dni) values('$name','$summa','$img','$opisanie','$category','$dnei')");
        header("location: {$_SERVER['HTTP_REFERER']}");
    }
        
    public function updateProduct($id,$name,$opisanie,$summa,$dnei,$category){
        $update = $this->pdo->prepare("update product set name = :name,summa = :summa,category = :category,opisanie = :opisanie, dni = :dnei where id = :id");
            $update->bindValue(':id',$id,PDO::PARAM_INT);
            $update->bindValue(':name',$name,PDO::PARAM_STR);
            $update->bindValue(':summa',$summa,PDO::PARAM_INT);
            $update->bindValue(':opisanie',$opisanie,PDO::PARAM_STR);
            $update->bindValue(':category',$category,PDO::PARAM_INT);
            $update->bindValue(':dnei',$dnei,PDO::PARAM_INT);
        $update->execute();  
        //$update = $this->pdo->query("update product set name = '$name',summa = '$summa',category = '$category',opisanie = '$opisanie', dni = '$dnei' where id = '$id'");
        header("location: admin.php");
    }
    
    public function deleteProduct($id){
        $delete = $this->pdo->prepare("delete from product where id = :id");
            $delete->bindValue(':id',$id,PDO::PARAM_INT);
        $delete->execute();
        //$delete = $this->pdo->query("delete from product where id = '$id'");
        header("location: {$_SERVER['HTTP_REFERER']}");
    }
    
    public function deleteNews($id){
        $delete = $this->pdo->prepare("delete from news where id = :id");
            $delete->bindValue(':id',$id,PDO::PARAM_INT);
        $delete->execute();
        //$this->pdo->query("delete from news where id = '$id'");
        header("location: {$_SERVER['HTTP_REFERER']}");
    }
    
    public function addNews($name,$opisanie,$img){
        $add = $this->pdo->prepare("insert into news(name,opisanie,img) values(:name,:opisanie,:img)");
            $add->bindValue(':name',$name,PDO::PARAM_STR);
            $add->bindValue(':opisanie',$opisanie,PDO::PARAM_STR);
            $add->bindValue(':img',$img,PDO::PARAM_STR);
        $add->execute();
        //$this->pdo->query("insert into news(name,opisanie,img) values('$name','$opisanie','$img')");
        header("location: {$_SERVER['HTTP_REFERER']}");
    }
    
    public function updateNews($id,$name,$opisanie){
        $update = $this->pdo->prepare("update news set name = :name, opisanie = :opisanie where id = :id");
            $update->bindValue(':id',$id,PDO::PARAM_INT);
            $update->bindValue(':name',$name,PDO::PARAM_STR);
            $update->bindValue(':opisanie',$opisanie,PDO::PARAM_STR);
        $update->execute();
        //$this->pdo->query("update news set name = '$name', opisanie = '$opisanie' where id = '$id' ");
        header("location: admin.php");
    }
    
    public function allNews(){
        $connect = $this->pdo->prepare("SELECT * FROM news ORDER BY `id` DESC limit 3");
            $connect->execute();
        $conns = $connect->fetchAll();
        foreach($conns as $conn):
            echo '
                <div class="col-sm-4 wow fadeInDown animated" data-wow-delay="0.2s">
                        <div class="blog-item">
                            <img src="images/product/'.$conn['img'].'" width="350" height="262" alt=""></a>
                            <h3>'.$conn['name'].'</h3>
                            <p>'.$conn['opisanie'].'</p>
                            
                        </div>
                    </div>
            ';
        endforeach;
    }
    
    public function addOrder($name,$date,$dates,$kolvo,$sum,$mesto,$status,$idusers,$session,$category,$quantity,$idReboot){

        if($mesto == 3){
            //$summ =(($_SESSION['totalQuantity']/0.5)*30)+$_SESSION['totalPrice'];
        }
        if($category == 1){
            if($mesto == 3){
                $summ = (($quantity/0.5)*30)+$sum;
            }
            else{
                $summ = $sum;
            }
            $stm = $this->pdo->prepare("insert into orders(name,date,dates,kolvo,summ,mesto,status,idusers,idReboot) values(:name,:date,:dates,:kolvo,:summ,:mesto,:status,:idusers,:idreboot)");
                $stm->bindValue(':name', $name, PDO::PARAM_STR);
                $stm->bindValue(':date', $date, PDO::PARAM_STR);
                $stm->bindValue(':dates', $dates, PDO::PARAM_INT);
                $stm->bindValue(':kolvo', $kolvo, PDO::PARAM_STR);
                $stm->bindValue(':summ', $summ, PDO::PARAM_INT);
                $stm->bindValue(':mesto', $mesto, PDO::PARAM_STR);
                $stm->bindValue(':status', $status, PDO::PARAM_INT);
                $stm->bindValue(':idusers', $idusers, PDO::PARAM_INT);
                $stm->bindValue(':idreboot', $idReboot, PDO::PARAM_INT);
            $stm->execute();
 
            //$add = $this->pdo->query("insert into orders(name,date,dates,kolvo,summ,mesto,status,idusers,idReboot) values('$name','$date','$dates','$kolvo','$summ','$mesto','$status','$idusers','$idReboot')");//прямой
            //$sel = $this->pdo->query("SELECT * FROM orders ORDER BY id DESC limit 1");
            
            $data = $this->pdo->prepare("select * from orders ORDER BY id DESC limit 1");
                $data->execute();
            $sel = $data->fetchAll();
            foreach($sel as $se){
                $idOrder = $se['id'];
            }
            foreach($session as $key=>$ses){
                if($ses['category'] == 1){
                    $id = $ses['id'];
                    if($mesto == 3){
                         $price = (($ses['quantity']/0.5)*30)+($ses['price']*$ses['quantity']);
                    }
                    else{
                        $price = $ses['quantity']*$ses['price'];
                    }
                    
                    $quantity = $ses['quantity'];
                    //echo $id.'<br>'.$price.'<br>'.$quantity.'<br>';
                    $reboot = $this->pdo->prepare("insert into reboot(idOrder,idTovar,quantity,summ,idReboot) values(:idOrder,:id,:quantity,:price,:idReboot)");
                        $reboot->bindValue(':idOrder',$idOrder,PDO::PARAM_INT);
                        $reboot->bindValue(':id',$id,PDO::PARAM_INT);
                        $reboot->bindValue(':quantity',$quantity,PDO::PARAM_STR);
                        $reboot->bindValue(':price',$price,PDO::PARAM_INT);
                        $reboot->bindValue(':idReboot',$idReboot,PDO::PARAM_INT);
                    $reboot->execute();
                    //$reboot = $this->pdo->query("insert into reboot(idOrder,idTovar,quantity,summ,idReboot) values('$idOrder','$id','$quantity','$price','$idReboot')");
                
                }
            }
        }
        if($category == 2 or $category == 5){
            if($mesto == 3){
                $summ = (($quantity/0.5)*30)+$sum;
            }
            else{
                $summ = $sum;
            }
            //$add = $this->pdo->query("insert into orders(name,date,dates,kolvo,summ,mesto,status,idusers,idReboot) values('$name','$date','$dates','$kolvo','$summ','$mesto','$status','$idusers','$idReboot')");
            
            $stm = $this->pdo->prepare("insert into orders(name,date,dates,kolvo,summ,mesto,status,idusers,idReboot) values(:name,:date,:dates,:kolvo,:summ,:mesto,:status,:idusers,:idreboot)");
                $stm->bindValue(':name', $name, PDO::PARAM_STR);
                $stm->bindValue(':date', $date, PDO::PARAM_STR);
                $stm->bindValue(':dates', $dates, PDO::PARAM_INT);
                $stm->bindValue(':kolvo', $kolvo, PDO::PARAM_STR);
                $stm->bindValue(':summ', $summ, PDO::PARAM_INT);
                $stm->bindValue(':mesto', $mesto, PDO::PARAM_STR);
                $stm->bindValue(':status', $status, PDO::PARAM_INT);
                $stm->bindValue(':idusers', $idusers, PDO::PARAM_INT);
                $stm->bindValue(':idreboot', $idReboot, PDO::PARAM_INT);
            $stm->execute();
            
            
            $data = $this->pdo->prepare("select * from orders ORDER BY id DESC limit 1");
                $data->execute();
            $sel = $data->fetchAll();
            foreach($sel as $se){
                $idOrder = $se['id'];
            }
            foreach($session as $key=>$ses){
                if($ses['category'] == 2 or $ses['category'] == 5){
                    $id = $ses['id'];
                    if($mesto == 3){
                         //$price = (($ses['quantity']/0.5)*30)+$ses['price'];
                         $price = (($ses['quantity']/0.5)*30)+($ses['price']*$ses['quantity']);
                    }
                    else{
                        $price = $ses['quantity']*$ses['price'];
                    }
                    $quantity = $ses['quantity'];
                    //echo $id.'<br>'.$price.'<br>'.$quantity.'<br>';
                    //echo $ses['price'].' ';
                    //echo $id.' '.$price.' '.$quantity;
                    $reboot = $this->pdo->prepare("insert into reboot(idOrder,idTovar,quantity,summ,idReboot) values(:idOrder,:id,:quantity,:price,:idReboot)");
                        $reboot->bindValue(':idOrder',$idOrder,PDO::PARAM_INT);
                        $reboot->bindValue(':id',$id,PDO::PARAM_INT);
                        $reboot->bindValue(':quantity',$quantity,PDO::PARAM_STR);
                        $reboot->bindValue(':price',$price,PDO::PARAM_INT);
                        $reboot->bindValue(':idReboot',$idReboot,PDO::PARAM_INT);
                    $reboot->execute();
                
                } 
            }
            
        }
        if($category == 3 or $category == 4){
            if($mesto == 3){
                $summ = (($quantity/0.5)*30)+$sum;
            }
            else{
                $summ = $sum;
            }
            //$add = $this->pdo->query("insert into orders(name,date,dates,kolvo,summ,mesto,status,idusers,idReboot) values('$name','$date','$dates','$kolvo','$summ','$mesto','$status','$idusers','$idReboot')");
            $stm = $this->pdo->prepare("insert into orders(name,date,dates,kolvo,summ,mesto,status,idusers,idReboot) values(:name,:date,:dates,:kolvo,:summ,:mesto,:status,:idusers,:idreboot)");
                $stm->bindValue(':name', $name, PDO::PARAM_STR);
                $stm->bindValue(':date', $date, PDO::PARAM_STR);
                $stm->bindValue(':dates', $dates, PDO::PARAM_INT);
                $stm->bindValue(':kolvo', $kolvo, PDO::PARAM_STR);
                $stm->bindValue(':summ', $summ, PDO::PARAM_INT);
                $stm->bindValue(':mesto', $mesto, PDO::PARAM_STR);
                $stm->bindValue(':status', $status, PDO::PARAM_INT);
                $stm->bindValue(':idusers', $idusers, PDO::PARAM_INT);
                $stm->bindValue(':idreboot', $idReboot, PDO::PARAM_INT);
            $stm->execute();
            
            //$sel = $this->pdo->query("SELECT * FROM orders ORDER BY id DESC limit 1");
            $data = $this->pdo->prepare("select * from orders ORDER BY id DESC limit 1");
                $data->execute();
            $sel = $data->fetchAll();
            foreach($sel as $se){
                $idOrder = $se['id'];
            }
            foreach($session as $key=>$ses){
                if($ses['category'] == 3 or $ses['category'] == 4){
                    $id = $ses['id'];
                    if($mesto == 3){
                         //$price = (($ses['quantity']/0.5)*30)+$ses['price'];
                         $price = (($ses['quantity']/0.5)*30)+($ses['price']*$ses['quantity']);
                    }
                    else{
                        $price = $ses['quantity']*$ses['price'];
                    }
                    $quantity = $ses['quantity'];
                    //echo $id.'<br>'.$price.'<br>'.$quantity.'<br>';
                    //echo $ses['price'].' ';
                    //echo $id.' '.$price.' '.$quantity;
                    //$reboot = $this->pdo->query("insert into reboot(idOrder,idTovar,quantity,summ,idReboot) values('$idOrder','$id','$quantity','$price','$idReboot')");
                    $reboot = $this->pdo->prepare("insert into reboot(idOrder,idTovar,quantity,summ,idReboot) values(:idOrder,:id,:quantity,:price,:idReboot)");
                        $reboot->bindValue(':idOrder',$idOrder,PDO::PARAM_INT);
                        $reboot->bindValue(':id',$id,PDO::PARAM_INT);
                        $reboot->bindValue(':quantity',$quantity,PDO::PARAM_STR);
                        $reboot->bindValue(':price',$price,PDO::PARAM_INT);
                        $reboot->bindValue(':idReboot',$idReboot,PDO::PARAM_INT);
                    $reboot->execute();
                } 
                /*$id = $ses['id'];
                if($mesto == 3){
                    $price = (($ses['quantity']/0.5)*30)+($ses['price']*$ses['quantity']);
                }
                else{
                    $price = $ses['quantity']*$ses['price'];
                }
                $quantity = $ses['quantity'];
                //echo $id.'<br>'.$price.'<br>'.$quantity.'<br>';
                $reboot = $this->pdo->query("insert into reboot(idOrder,idTovar,quantity,summ) values('$idOrder','$id','$quantity','$price')");*/
            }
        }
        //$add = $this->pdo->query("insert into orders(name,date,kolvo,summ,mesto,status,idusers) values('$name','$date','$kolvo','$summ','$mesto','$status','$idusers')");
          //unset($_SESSION['cart']);
          //session_destroy();
        //header("location: delete.php?id=");
        
        
        /*$sel = $this->pdo->query("SELECT * FROM orders ORDER BY id DESC limit 1");
        foreach($sel as $se){
            $idOrder = $se['id'];
        }
        foreach($session as $key=>$ses){
            $id = $ses['id'];
            $price = $ses['quantity']*$ses['price'];
            $quantity = $ses['quantity'];
            //echo $id.'<br>'.$price.'<br>'.$quantity.'<br>';
            $reboot = $this->pdo->query("insert into reboot(idOrder,idTovar,quantity,summ) values('$idOrder','$id','$quantity','$price')");
        }*/
        header("location: profile.php");
    }
    
    public function deleteSession($id){
        
            $_SESSION['totalQuantity'] -= $_SESSION['cart'][$id]['quantity'];
            $_SESSION['totalPrice'] -= $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['quantity'];
            unset($_SESSION['cart'][$id]);
        
    }
    

}
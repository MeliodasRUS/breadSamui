<?php
    require_once('header.php');
    error_reporting(E_ALL);
?>
<script type="text/javascript">
    function eventCheckBox() {
  let checkboxs = document.getElementsByTagName("input");
  for(let i = 1; i < checkboxs.length ; i++) {
    checkboxs[i].checked = !checkboxs[i].checked;
  }
}
</script>
<style>
    .asd{
        width:60px;
        height:auto;
    }
</style>
<div class="container">
<?php
    if(isset($_SESSION['login'])):
        $id = $_SESSION['idLogin'];
        $con = $pdo->prepare("select *,ord.id as 'id1',ord.name as 'name1', st.name as 'name2' from orders ord inner join status st on st.id = status where idusers = :id");
            $con->bindValue(':id',$id,PDO::PARAM_INT);
            $con->execute();
        $connect = $con->fetchAll();
        //$connect = $pdo->query("select *,ord.id as 'id1',ord.name as 'name1', st.name as 'name2' from orders ord inner join status st on st.id = status where idusers ='$id'");
        
?>

  <div class="table-responsive">
      
   <table class="table table-bordered table-hover" id="filter-table">
   
        <?php
            if($_SESSION['idPosition'] == 1):
                /*
                $date = str_replace('.', '', date("Y.m.d"));
                //echo $newphrase;
                //$date = $datee;
                $summ = 0; $summ2 = 0; $summ3 = 0;
                $dattebae = $pdo->query("select DISTINCT dates from orders where dates >= $date");
                foreach($dattebae as $dates){
                    //echo $dates['dates'].' sss<br>';
                    $aggg = $dates['dates'];
                    echo $dates['dates'][2].'<br>';
                    //$datees = str_replace('.','', $dates['dates']);
                    if($aggg == $dates['dates']){
                        $table = $pdo->query("select *,ord.id as 'id1',cat.name as 'name2',ord.name as 'name1' from orders ord inner join category cat on cat.id = 1 
                        inner join reboot reb on reb.idOrder = ord.id inner join product pr on pr.id = reb.idTovar where ord.dates >= '$aggg' and pr.category = 1");
                            foreach($table as $tabl){
                                //var_dump($tabl);
                                $summ += $tabl['summ'];
                                //echo $summ.'<br>';
                                //echo $summ.'<br>';
                            }
                    }
                }
                
                $dateeeee = $pdo->query("select DISTINCT dates from orders where dates != '$aggg'");
                foreach($dateeeee as $da){
                    //echo $da['dates'].'<br>';
                }
               
                //echo '<br>'.$datess.'<br>';
                $table = $pdo->query("select *,ord.id as 'id1',cat.name as 'name2',ord.name as 'name1' from orders ord inner join category cat on cat.id = 1 
                inner join reboot reb on reb.idOrder = ord.id inner join product pr on pr.id = reb.idTovar where ord.dates >= '$aggg' and pr.category = 1");
                    foreach($table as $tabl){
                        //var_dump($tabl);
                        $summ += $tabl['summ'];
                        echo $summ.'<br>';
                        //echo $summ.'<br>';
                    }
                    //echo $summ.'<br>';
                $table2 = $pdo->query("select *,ord.id as 'id1',cat.name as 'name2',ord.name as 'name1' from orders ord inner join category cat on cat.id = 2 
                inner join reboot reb on reb.idOrder = ord.id inner join product pr on pr.id = reb.idTovar where ord.dates >= '$aggg' and pr.category = 2");
                    foreach($table2 as $tabl1){
                        $summ2 += $tabl1['summ'];
                    }
                    echo $summ2.'<br>';*/
                //$table = $pdo->query('select *,ord.id as 'id1',cat.name as 'name2',ord.name as 'name1' from orders ord inner join category cat inner join reboot reb on reb.idOrder = ord.id inner join product pr  where ord.date = ord.date and pr.category = 1');
        ?>  
        <a href="#modalStatick" data-toggle="modal"><button type="submit" name="statick" class="btn btn-primary">Get statistics</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <tr class='table-filters'>
            <th><input type="checkbox" name="g1" class="chk-all" onclick="eventCheckBox()"></th>
            <th>Date of issue </th>
            <th >Login</th>
            <th>Product </th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Place of receipt</th>
            <th>Status</th>
        </tr>
        <tr class='table-filters'>
        <td></td>
        <td>
            <input type="text" class="asd"/>
        </td>
        <td>
            <input type="text" class="asd"/>
        </td>
        <td>
            <input type="text" class="asd"/>
        </td>
        <td>
            <input type="text" class="asd"/>
        </td>
        <td>
            <input type="text" class="asd"/>
        </td>
        <td>
            <input type="text" class="asd"/>
        </td>
        <td>
            <input type="text" class="asd"/>
        </td>
    </tr>
        <form method="post">
            
        <?php
        /*foreach($_POST['checkId'] as $check):
            echo $check.'<br>';
        endforeach;*/
            //$admin = $pdo->query("select *,ord.id as 'id1',usr.id as 'id2',ms.id as 'id3',st.name as 'name2',ord.name as 'name1',ms.name as 'name3' from orders ord inner join users usr on usr.id = ord.idusers inner join status st on st.id = ord.status inner join mesto ms on ms.id = ord.mesto where ord.status != 4 ORDER BY ord.id DESC");
            $ads = $pdo->prepare("select *,ord.id as 'id1',usr.id as 'id2',ms.id as 'id3',st.name as 'name2',ord.name as 'name1',ms.name as 'name3' from orders ord inner join users usr on usr.id = ord.idusers inner join status st on st.id = ord.status inner join mesto ms on ms.id = ord.mesto where ord.status != 4 ORDER BY ord.id DESC");
                $ads->execute();
            $admin = $ads->fetchAll();
            foreach($admin as $adm):
        ?>
                    <?php
      if($adm['status'] == 3):
        echo '<tr class="danger table-data">';
    elseif($adm['status'] == 2):
        echo '<tr class="warning table-data">';
    elseif($adm['status'] == 1):
        echo '<tr class="success table-data">';
    endif;
        ?>
            <td><input type="checkbox" name="checkId[]" value="<?=$adm['id1']?>"></td>
            <td><?=$adm['date']?></td>
            <td><?=$adm['login']?></td>
            <td><?=$adm['name1']?></td>
            <td><?=$adm['kolvo']?></td>
            <td><?=$adm['summ']?></td>
            <td><?=$adm['name3']?></td>
            <td><?=$adm['name2']?></td>
        </tr>
        
            <?php
            endforeach;
        ?>
            
            <a href="#modalSMS" data-toggle="modal"><button type="submit" name="orderCheck" class="btn btn-primary">Send message</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="profileStatus.php" ><button type="button" name="SMS" class="btn btn-primary" >Change status</button></a>
            <br><br>

<div class="modal fade" id="modalSMS"  role="dialog" aria-labelledby="modalSMS" data-toggle="modal">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Sending an email</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
<div class="form-group">
   <label for="name">Message subject:</label>
   <input type="text" name="subject" id="" class="form-control"   placeholder="Enter a subject" required>
</div>
<div class="form-group">
   <label for="email">Message text:</label>
   <textarea  name="text" class="form-control"  placeholder="Input text" required></textarea>
</div>


      </div>
      <div class="modal-footer">
            <button type="submit" name="SMS" class="btn btn-info">Send</button>
        </form>
      </div>
    </div>
  </div>   
</div>




        </form>
        
        

        <?php
            
            else:
        ?>
      
      <tr >
        <th>Date of issue</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Status</th>
        <th>To repeat the order</th>
        
        
        <!--<th>Order cancellation</th>-->
      </tr>
   
        <?php
            foreach($connect as $conn):
        ?>
      <?php
      if($conn['status'] == 3):
        echo '<tr class="danger">';
    elseif($conn['status'] == 2):
        echo '<tr class="warning">';
        elseif($conn['status'] == 1):
        echo '<tr class="succes">';
    endif;
        ?>
        <td>
        <?php 
            echo $conn['date'];
            
            $result = strtotime($conn['date']) - time();
            /*echo $result;
            
            
            if($result > 259200):
                
            else:
                
            endif;*/

        ?>
        </td>
        <td><?=$conn['name1']?></td>
        <td><?=$conn['kolvo']?></td>
        <td><?=$conn['summ']?></td>
        <td><?=$conn['name2']?></td>

        <td><a href="repeatOrder.php?id=<?=$conn['idReboot']?>">Repeat</a></td>

        <?php
        /*
            if( ($conn['status'] == 3) && ($result > 259200)):
        ?><td><a href="deleteOrder.php?id=<?=$conn['id1']?>">Отменить заказ</a></td>
        <?php
        else:
        ?>
        <td>Отменить заказ невозможно</td>
        <?php
        endif;*/
        ?>
        
      </tr>

      <?php
        endforeach;
        endif;
      ?>
    
  </table>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
$('.table-filters input').on('input', function () {
    filterTable($(this).parents('table'));
});

function filterTable($table) {
    var $filters = $table.find('.table-filters td');
    var $rows = $table.find('.table-data');
    $rows.each(function (rowIndex) {
        var valid = true;
        $(this).find('td').each(function (colIndex) {
            if ($filters.eq(colIndex).find('input').val()) {
                if ($(this).html().toLowerCase().indexOf(
                $filters.eq(colIndex).find('input').val().toLowerCase()) == -1) {
                    valid = valid && false;
                }
            }
        });
        if (valid === true) {
            $(this).css('display', '');
        } else {
            $(this).css('display', 'none');
        }
    });
}
</script>


            <?php
                else:
                    if(isset($_GET['auth'])):
                     
            ?>
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Login and registration</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
<div class="form-group">
   <label for="name">Login</label>
   <input type="text" name="phone1" class="form-control"   placeholder="Enter your username" required>
</div>
<div class="form-group">
   <label for="email">E-mail</label>
   <input type="email" name="email" class="form-control"  placeholder="Enter your email address" required>
</div>
<div class="form-group">
   <label for="password">Password</label>
   <input type="password" name="password1" class="form-control"  placeholder="Enter the password" required>
   <p class="text-danger">Username or password entered incorrectly</p>
   <!--<a href="#recover" data-toggle="modal">Recover the password</a>-->
</div>

      </div>
      <div class="modal-footer">
            <button type="submit" name="registr" class="btn btn-info">Log In/Register</button>
        </form>
      </div>
    </div>
  </div>
  
            <?php
                    else:
            ?>
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Login and registration</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
<div class="form-group">
   <label for="name">Login</label>
   <input type="text" name="phone1" class="form-control"   placeholder="Enter your username" required>
</div>
<div class="form-group">
   <label for="email">E-mail</label>
   <input type="email" name="email" class="form-control"  placeholder="Enter your email address" required>
</div>
<div class="form-group">
   <label for="password">Password</label>
   <input type="password" name="password1" class="form-control"  placeholder="Enter the password" required>
</div>

      </div>
      <div class="modal-footer">
            <button type="submit" name="registr" class="btn btn-info">Log In/Register</button>
        </form>
      </div>
    </div>
  </div>
            
            <?php
                    endif;
            ?><!--
            <div class="" id="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Вход и регистрация</h4>
        
          
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
<div class="form-group">
   <label for="name">Логин</label>
   <input type="text" name="phone" id="phone" class="form-control"  placeholder="Введите логин" required>
</div>
<div class="form-group">
   <label for="password">Пароль</label>
   <input type="password" name="password" class="form-control"  placeholder="Введите пароль" required>
</div>

      </div>
      <div class="modal-footer">
            <button type="submit" name="vxod" class="btn btn-info">Войти</button>
            <a href="#modalRegistration" data-toggle="modal" data-dismiss="modal"><button type="button" name="registr" class="btn btn-info">Зарегистрироваться</button></a>
        </form>
      </div>
    </div>
  </div>
</div>
-->
<? endif;?>
</div>

<div class="modal fade" id="modalSMS"  role="dialog" aria-labelledby="modalSMS" data-toggle="modal">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Sending an email</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
<div class="form-group">
   <label for="name">Message subject:</label>
   <input type="text" name="phone1" id="" class="form-control"   placeholder="Enter a subject" required>
</div>
<div class="form-group">
   <label for="email">Message text:</label>
   <textarea  name="text" class="form-control"  placeholder="Input text" required></textarea>
</div>


      </div>
      <div class="modal-footer">
            <button type="submit" name="SMS" class="btn btn-info">Send</button>
        </form>
      </div>
    </div>
  </div>   
</div>


<!-- Статистика -->
<div class="modal fade" id="modalStatick"  role="dialog" aria-labelledby="modalStatick" data-toggle="modal">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Statistics</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="statistika.php" method="post">
<div class="form-group">
   <label for="name">Selected date</label>
   <select name="stat" class="form-control">
   <?php
            $date = str_replace('.', '', date("Y.m.d"));
                //echo $newphrase;
                //$date = $datee;
                $summ = 0; $summ2 = 0; $summ3 = 0;
                //$dattebae = $pdo->query("select DISTINCT dates from orders where dates >= $date");
        $stt = $pdo->prepare("select DISTINCT dates,date from orders where dates >= :date");
            $stt->bindValue(':date',$date,PDO::PARAM_INT);
            $stt->execute();
        //$status = $pdo->query("select DISTINCT dates,date from orders where dates >= $date");
        $status = $stt->fetchAll();
        foreach($status as $stat):
   ?>
            <option class="form-control" value="<?=$stat['dates']?>"><?=$stat['date']?></option>
   <?php
        endforeach;
   ?>
   </select>
</div>
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-info">Receive</button>
        </form>
      </div>
    </div>
  </div>   
</div>

<div class="modal fade" id="checkOrder"  role="dialog" aria-labelledby="modalSMS" data-toggle="modal">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Changing the status of orders</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
<div class="form-group">
   <label for="name">Select a status</label>
   <select name="stat" class="form-control">
   <?php
        //$status = $pdo->query("select * from status");
        $st = $pdo->prepare("select * from status");
            $st->execute();
        $status = $st->fetchAll();
        foreach($status as $stat):
   ?>
            <option class="form-control" value="<?=$stat['id']?>"><?=$stat['name']?></option>
   <?php
        endforeach;
   ?>
   </select>
</div>



      </div>
      <div class="modal-footer">
            <button type="submit" name="checkOrder" class="btn btn-info">To change</button>
        </form>
      </div>
    </div>
  </div>   
</div>    
    
    
    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script>
function getdetailsMinus(id){
        $.ajax({
        type: "POST",
        url: "delPolovina.php",
        data: {id:id},
        dataType: "json"
    }).done(function(data)
        {
            $("#msg"+id).html(data.price);
            $("#daas").html(data.totalPrice);
            $("#caart").html(data.cart);
            $("#cartQuantity").html(data.cartQuantity);
        });
}
</script>
    

    
    
    

    
    
<?php
    require_once 'footer.php';
?> 
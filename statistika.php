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
        
        
        
        
        
        
        
        
        /*
        
        
                $date = str_replace('.', '', date("Y.m.d"));
                //echo $newphrase;
                //$date = $datee;
                $summ = 0; $summ2 = 0; $summ3 = 0;
                $dattebae = $pdo->query("select DISTINCT dates from orders where dates >= $date");
                foreach($dattebae as $dates){
                    //echo $dates['dates'].' sss<br>';
                    $aggg = $dates['dates'];
                    echo $dates['dates'].'<br>';
                    //$datees = str_replace('.','', $dates['dates']);
                    if($aggg == $dates['dates']){
                        $table = $pdo->query("select *,ord.id as 'id1',cat.name as 'name2',ord.name as 'name1' from orders ord inner join category cat on cat.id = 1 
                        inner join reboot reb on reb.idOrder = ord.id inner join product pr on pr.id = reb.idTovar where ord.dates >= '$aggg' and pr.category = 1");
                            foreach($table as $tabl){
                                //var_dump($tabl);
                                $summ += $tabl['summ'];
                                //echo $summ.'<br>';
                                echo $summ.'<br>';
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
                       // echo $summ.'<br>';
                        //echo $summ.'<br>';
                    }
                    //echo $summ.'<br>';
                $table2 = $pdo->query("select *,ord.id as 'id1',cat.name as 'name2',ord.name as 'name1' from orders ord inner join category cat on cat.id = 2 
                inner join reboot reb on reb.idOrder = ord.id inner join product pr on pr.id = reb.idTovar where ord.dates >= '$aggg' and pr.category = 2");
                    foreach($table2 as $tabl1){
                        $summ2 += $tabl1['summ'];
                    }
                    //echo $summ2.'<br>';*/
?>

  <div class="table-responsive">
      
   <table class="table table-bordered table-hover" id="filter-table">
               <tr class='table-filters'>
            <th>Date</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price </th>
            
        </tr>

        <?php
            if($_SESSION['idPosition'] == 1):
                if(isset($_POST['stat'])):
                    $dat = $_POST['stat'];
                    $summ = 0; $quantity = 0;
                    $clacks = $pdo->prepare("select DISTINCT pr.category from orders ord inner join reboot reb on reb.idOrder = ord.id 
                    inner join product pr on pr.id = reb.idTovar where ord.dates = :dat");
                        $clacks->bindValue(':dat',$dat,PDO::PARAM_INT);
                        $clacks->execute();
                    $stack = $clacks->fetchAll(PDO::FETCH_COLUMN);
                    //$clack = $pdo->query("select DISTINCT pr.category from orders ord inner join reboot reb on reb.idOrder = ord.id inner join product pr on pr.id = reb.idTovar where ord.dates = '$dat'");
                    //$stack = $clack->fetchAll(PDO::FETCH_COLUMN);
                        $cat = $stack[0];
                        if( isset($stack[1])&& $stack[1]> 0){
                            $st = $stack[1];
                        }
                        
                    //echo $category;
                    $staticks = $pdo->prepare("select *,ord.id as 'id1',cat.name as 'name2',ord.name as 'name1' from orders ord inner join category cat on cat.id = :cat 
                        inner join reboot reb on reb.idOrder = ord.id inner join product pr on pr.id = reb.idTovar where ord.dates = :dat and pr.category = :cats");
                        $staticks->bindValue(':cat',$cat,PDO::PARAM_INT);
                        $staticks->bindValue(':dat',$dat,PDO::PARAM_INT);
                        $staticks->bindValue(':cats',$cat,PDO::PARAM_INT);
                        $staticks->execute();
                    $statick = $staticks->fetchAll();
                    //$statick = $pdo->query("select *,ord.id as 'id1',cat.name as 'name2',ord.name as 'name1' from orders ord inner join category cat on cat.id = '$cat' inner join reboot reb on reb.idOrder = ord.id inner join product pr on pr.id = reb.idTovar where ord.dates = '$dat' and pr.category = '$cat'");
                        
                        foreach($statick as $stat):
                            $summ += $stat['summ'];
                            $quantity += $stat['quantity'];
                            $name = $stat['name2'];
                            $dattte = $stat['date'];
                            endforeach;
                        ?>
                        

    <tr class="table-data">
        <td><?=$dattte?></td>
        <td><?=$name?></td>
        <td><? echo $quantity;?></td>
        <td><? echo $summ;?></td>
    </tr>
                        
                        
                        <?php
                        if(isset($st) && $st > 0):
                            $staticks = $pdo->prepare("select *,ord.id as 'id1',cat.name as 'name2',ord.name as 'name1' from orders ord inner join category cat on cat.id = :st 
                                inner join reboot reb on reb.idOrder = ord.id inner join product pr on pr.id = reb.idTovar where ord.dates = :dat and pr.category = :sts");
                                $staticks->bindValue(':st',$st,PDO::PARAM_INT);
                                $staticks->bindValue(':dat',$dat,PDO::PARAM_INT);
                                $staticks->bindValue(':sts',$st,PDO::PARAM_INT);
                                $staticks->execute();
                            $statick = $staticks->fetchAll();
                        //$statick = $pdo->query("select *,ord.id as 'id1',cat.name as 'name2',ord.name as 'name1' from orders ord inner join category cat on cat.id = '$st' 
                        // inner join reboot reb on reb.idOrder = ord.id inner join product pr on pr.id = reb.idTovar where ord.dates = '$dat' and pr.category = '$st'");
                         $summ = 0; $quantity = 0;
                        foreach($statick as $stat):
                            $summ += $stat['summ'];
                            $quantity += $stat['quantity'];
                            $name = $stat['name2'];
                            $dattte = $stat['date'];
                            endforeach;
                        ?>
                        
    <tr class="table-data">
        <td><?=$dattte?></td>
        <td><?=$name?></td>
        <td><? echo $quantity;?></td>
        <td><? echo $summ;?></td>
    </tr>                
                        
                        <?php
                        endif;
                            
                        
                        
                        
                        
                        
                   // $statick2 = $pdo->query("select *,ord.id as 'id1',cat.name as 'name2',ord.name as 'name1' from orders ord inner join category cat on cat.id = 2 
                     //   inner join reboot reb on reb.idOrder = ord.id inner join product pr on pr.id = reb.idTovar where ord.dates >= '$dat' and pr.category = 2");
                    endif;
                endif;
                //$date = str_replace('.', '', date("Y.m.d"));
                //echo $newphrase;
                //$date = $datee;
                /*$summ = 0; $summ2 = 0; $summ3 = 0;
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


            <!--
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
        //        $dattebae = $pdo->query("select DISTINCT dates from orders where dates >= $date");
        //$status = $pdo->query("select DISTINCT dates,date from orders where dates >= $date");
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
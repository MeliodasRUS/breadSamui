<?php
    require_once('header.php');
    $pizza = 0;
$bread = 0;
$pie = 0;
?>

 <style>

.table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}

@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
		width:10%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}
	
	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}
	
	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .3rem; min-width:320px;}
	table#cart tbody tr td:first-child { background: ; color: #fff; }
	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}
	
	
	
	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}
	
}
  
  
  
  
  
  
  
  
  
  











.stepper{
  display: inline-block;
  max-width: 120px;
  width: 100%;
  position: relative;
}

.stepper__input{
  width: 100%;
  height: 50px;
  padding: .375rem .75rem;
  border: 1px solid #c4c4c4;
  -moz-appearance: textfield;
}

.stepper__input:focus{
  color: #333;
  background-color: #fff;
  border-color: #c4c4c4;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
}

.stepper__input::-webkit-inner-spin-button,
.stepper__input::-webkit-outer-spin-button {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  margin: 0;
}

.stepper__controls{

}

.stepper__controls [spinner-button="up"],
.stepper__controls [spinner-button="down"]{
  display: flex;
  align-content: center;
  justify-content: center;
  padding: 0;
  outline: none;
  border: 1px solid #c4c4c4;
  background-color: #fff;
  height: 50%;
  font-size: 1.375em;
  line-height: 0;
  transition: all ease 0.25s;
}

.stepper__controls [spinner-button="up"]:hover,
.stepper__controls [spinner-button="down"]:hover {
  background-color: #333;
  border-color: #333;
  color: #fff;
}

/* style 1 */
.stepper--style-1 .stepper__input{
  padding-right: 3.25rem;
}
.stepper--style-1 .stepper__controls{
  position: absolute;
  right: 0;
  top: 0;
  bottom: -1px;
  display: flex;
  flex-direction: column;
  width: 2.5rem;
  z-index: 1;
}
.stepper--style-1 [spinner-button="up"] {
  margin-bottom: -1px;
}

/* style 2 */
.stepper--style-2{
  max-width: 140px;
}
.stepper--style-2 .stepper__input{
  padding-left: 3.25rem;
  padding-right: 3.25rem;
  text-align: center;
}
.stepper--style-2 [spinner-button="up"],
.stepper--style-2 [spinner-button="down"] {
  position: absolute;
  height: 100%;
  top: 0;
  bottom: -1px;
  width: 2.5rem;
  z-index: 1;
}
.stepper--style-2 [spinner-button="up"] {
  right: 0;
  margin-left: -1px;
}
.stepper--style-2 [spinner-button="down"] {
  left: 0;
  margin-right: -1px;
}

/* style 3*/
.stepper--style-3{
  max-width: 140px;
  padding-left: 2.5rem;
  padding-right: 2.5rem;
}
.stepper--style-3 .stepper__input{
  position: relative;
  z-index: 1;
  text-align: center;
}
.stepper--style-3 [spinner-button="up"],
.stepper--style-3 [spinner-button="down"] {
  border: 0;
  position: absolute;
  height: 100%;
  top: 0;
  bottom: -1px;
  width: 2.5rem;
}
.stepper--style-3 [spinner-button="up"] {
  right: 0;
  margin-left: -1px;
}
.stepper--style-3 [spinner-button="down"] {
  left: 0;
  margin-right: -1px;
}


  
 </style>
 

<section>
    <!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<!------ Include the above in your HEAD tag ---------->
 <!--<link rel="stylesheet" href="datepicker/css/bootstrap.min.css" />-->
    <link rel="stylesheet" href="datepicker/css/bootstrap-datetimepicker.min.css" />
    
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Total price</th>
							<th style="width:10%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
<?php


//var_dump($_SESSION['idLogin']);

if(!isset($_SESSION['cart']) or count($_SESSION['cart']) == 0): ?>

    <h2 class="cart-title">Your shopping cart is empty</h2>

<?php
else:
    $name = '';
    $summ = '';
    $quantity = '';
    $date = date( "d.m.y H:i" );
    $allOptions = $pdo->prepare("select * from mesto");
        $allOptions->execute();
    $allOption = $allOptions->fetchAll();
//$allOption = $pdo->query("select * from mesto");

foreach ($_SESSION['cart'] as $key=>$product):



$name .= $product['title'].'<br/>';
$summ .= $product['price'].'<br/>';
$quantity .= $product['quantity'].'<br/>';

?>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>


						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 "><img src="images/product/<?=$product['img']?>" alt="" class="img-responsive" /></div>
									<div class="col-sm-10">
										<h4 class="nomargin"><?=$product['title']?></h4>
										<p></p>
									</div>
								</div>
							</td>
							<td data-th="Price"><center><?=$product['price'];?>฿</center></td>
							<form method="post" >
							<td data-th="Quantity">
								<!--<input type="number" class="form-control text-center" value="1">
								<center><a href="delPolovina.php?id=<?=$product['id']?>"><button id="minus05" name="minus05" class="btn btn-danger" type="button">-</button></a></center>
								
								 <center><a href="addPol.php?id=<?=$product['id']?>"><button id="plus05" name="plus05" class="btn btn-success" type="button">+</button></a></center>-->                     								 
								 <div class="stepper stepper--style-1 js-spinner">
                                    <input autofocus type="number" min="0" max="100" step="0.5" value="<?=$product['quantity']?>" class="stepper__input">
                                    <div class="stepper__controls">
                                        <button type="button" spinner-button="up" onClick = "getdetails(<?=$product['id']?>)" value="<?=$product['id']?>" id="idss">+</button>
                                        <button type="button" spinner-button="down" onClick = "getdetailsMinus(<?=$product['id']?>)">−</button>
                                    </div>
                                </div>
							</form>	 
							</td>
							<td data-th="Subtotal" id="msg<?=$product['id']?>" class="text-center"><?=$product['quantity']*$product['price'];?> ฿</td>
							<td class="actions" data-th="">
								
								<a href="delete.php?id=<?=$key?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>								
							</td>
						</tr>
						<? endforeach; ?> 
					</tbody>
					<tfoot>
					    <tr ><form action="" method="post">
					        <td><h4 class="nomargin">Select a place to pick up the product</h4></td>
					        <td colspan="2" class="hidden-xs"></td><td><select name="mesto" class="form-control form-control-lg mesto" >
					        <?php 
					            foreach($allOption as $option):
					        ?>
					        <option value="<?=$option['id']?>" onClick = "getdetailsMesto(<?=$option['id']?>)"><?=$option['name']?></option><? endforeach; ?></select></td>
					        
					        <td></td>
					        
					    </tr>
					    <?php
					        foreach ($_SESSION['cart'] as $key=>$product):
					            if($product['category'] == 3 or $product['category'] == 4):
					                $pizza +=1;
					           endif;
					            if($product['category'] == 1):
					                $bread +=1;
					            endif;
					            if($product['category'] == 2 or $product['category'] == 5):
					                $pie +=1;
					            endif;
					        
					        
					        endforeach;
					            
					           if($bread >=1):
					    ?>
					    <tr>
					        <td><h4 class="nomargin">Select the baking date bread</h4></td>
					        <td colspan="2" class="hidden-xs"></td>
					        <td>
					            <!--<input class="datepicker form-control" name="dates" type="text"/>-->
					            <div class="input-group date add">
                                   <input type="text" class="form-control" name="dates" min="<?php echo date( "Y.m.d H:i", time() + 86400 );?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                                  
					        </td>
					        <td></td>
					    </tr>
					    <?php
					            
					            endif;
					            
					            if($pizza >=1):
					    ?>
					    <tr>
					        <td><h4 class="nomargin">Select the baking date lasagna/pizza</h4></td>
					        <td colspan="2" class="hidden-xs"></td>
					        <td>
					            <!--<input class="datepicker form-control" name="dates" type="text"/>-->
					            <div class="input-group date adddd">
                                   <input type="text" class="form-control" name="dates1" min="<?php echo date( "Y.m.d H:i", time() + 86400 );?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                                  
					        </td>
					        <td></td>
					    </tr>
					    <?php
					           endif;
					        
					    ?>
					  
					    <?php
					            
					            if($pie >=1):
					    ?>
					    <tr>
					        <td><h4 class="nomargin">Select the baking date strudels/pies</h4></td>
					        <td colspan="2" class="hidden-xs"></td>
					        <td>
					            <!--<input class="datepicker form-control" name="dates" type="text"/>-->
					            <div class="input-group date addddss">
                                   <input type="text" class="form-control" name="dates2" min="<?php echo date( "Y.m.d H:i", time() + 86400 );?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                                  
					        </td>
					        <td></td>
					    </tr>
					    <?php
					           endif;
					        
					    ?>
					    
					    
					    
						<tr class="visible-xs">
							<td class="text-center">Total <strong id="daaaas" class="daaaas"><?php echo $_SESSION['totalPrice'];?> ฿ </strong><strong id="daaaaaaaas" class="daaaaaaaas" hidden><?php echo ( ( ($_SESSION['totalQuantity']/0.5)*30)+$_SESSION['totalPrice'])?> ฿</strong></td>
						</tr>
						<tr>
							<td><a href="../" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong id="daas" class="daaaas"><?php echo $_SESSION['totalPrice'];?> ฿ </strong><strong id="daaaaas" class="daaaaaaaas" hidden><?php echo ( ( ($_SESSION['totalQuantity']/0.5)*30)+$_SESSION['totalPrice'])?> ฿</strong></td>
							
						
							<?php
							    if(isset($_SESSION['idLogin'])):
							?>
							<td><button name="orders"  class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></button></td>
							<?php
							else:
							?>
							<td><a href="#basicModal" data-toggle="modal"><button name="dontOrders"  class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></button></a></td>
							<?php  //
							// 
							endif;
							?>
							</form>
						</tr>
					</tfoot>
					<?php endif;?>
				</table>
</div>
</section>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>


<script>
  //$('#daaaaas').hide();
function getdetails(id){
    $.ajax({
        type: "POST",
        url: "addPol.php",
        data: {id:id},
        dataType: "json"
    }).done(function(data)
        {
            $("#msg"+id).html(data.price);
            $(".daaaas").html(data.totalPrice);
            $("#caart").html(data.cart);
            $("#cartQuantity").html(data.cartQuantity);
            $(".daaaaaaaas").html(data.selectFree);
        });
}

function getdetailsMinus(id){
        $.ajax({
        type: "POST",
        url: "delPolovina.php",
        data: {id:id},
        dataType: "json"
    }).done(function(data)
        {
            $("#msg"+id).html(data.price);
            $(".daaaas").html(data.totalPrice);
            $("#caart").html(data.cart);
            $("#cartQuantity").html(data.cartQuantity);
            $(".daaaaaaaas").html(data.selectFree);
        });
}

$( ".mesto" ).change(function() {
    var cls = $(this).val();
        if(cls == 3){
            $('#daas').hide();
            $('#daaaas').hide();
            $('#daaaaas').show();
            $('#daaaaaaaas').show();
            
            //var p;
            //p = document.getElementById('daas');
            //p = document.getElementById('daas');
            //p.innerHTML = '<?php //echo ((($_SESSION['totalQuantity']/0.5)*30)+$_SESSION['totalPrice']).' ฿';?>';
            //return getSelect(3);
        }
        else if(cls != 3){
            //return getSelect1(2);
            $('#daaaaas').hide();
            $('#daaaaaaaas').hide();
            $('#daas').show();
            $('#daaaas').show();

           
        }
});
/*
function getdetailsMesto(id){
        $.ajax({
        type: "POST",
        url: "nadbavka.php",
        data: {id:id},
        dataType: "json"
    }).done(function(data)
        {
            $("#msg"+id).html(data.price);
            $("#daas").html(data.totalPrice);
            $("#caart").html(data.cart);
            $("#cartQuantity").html(data.cartQuantity);
            $("#daas").html(data.selectFree);
        });
}
$('#first').change(function(){
    var cls = $(this).val();
    $('#second option').hide();
    $('#second ' + '.' + cls).show();
});
*/


/*
function getSelect(id){
            $.ajax({
                type: "POST",
                url: "nadbavka.php",
                data: {id:id},
                dataType: "json"
            }).done(function(data)
            {
                //$("#msg").html(data.price);
                //(data.selectFree);
                //alert(data.selectFree);
                //$("#daas").html(data.cartQuantity);
                //$("#daas").html(data.selectFree);
                //$("#cart").html(data.cart);
                //$("#cartQuantity").html(data.cartQuantity);
            });
}


function getSelect1(id){
            $.ajax({
                type: "POST",
                url: "nadbavka.php",
                data: {id:id},
                dataType: "json"
            }).done(function(data)
            {
                //$("#msg").html(data.price);
                //(data.selectFree);
                //alert(data.selectFree);
                //$("#daas").html(data.totalPrice);
                //$("#cart").html(data.cart);
                //$("#cartQuantity").html(data.cartQuantity);
            });
}*/
</script>


<script type="text/javascript">
    $('.add').datepicker({
        format: "yyyy.mm.dd",
        weekstart:0, 
        startDate: '<?php echo date( "Y.m.d", time() + 86400 );?>',
        endDate: '<?php echo date( "Y.m.d", time() + 86400 * 7 );?>',
        daysOfWeekDisabled: "1,2,3,5,6",
        daysOfWeekHighlighted: "4,0"
});

    $('.adddd').datepicker({
        format: "yyyy.mm.dd",
        weekstart:0, 
        startDate: '<?php echo date( "Y.m.d", time() + 86400 );?>',
        endDate: '<?php echo date( "Y.m.d", time() + 86400 * 7 );?>',
        daysOfWeekDisabled: "0,1,2,3,4,5",
        daysOfWeekHighlighted: "6"
});


    $('.addddss').datepicker({
        format: "yyyy.mm.dd",
        weekstart:0, 
        startDate: '<?php echo date( "Y.m.d", time() + 86400 );?>',
        endDate: '<?php echo date( "Y.m.d", time() + 86400 * 7 );?>',
        daysOfWeekDisabled: "1,2,3,4,5,6",
        daysOfWeekHighlighted: "0"
});


</script>

 <script type="text/javascript">
/*   $(function () {
      $('#datetimepicker1').datetimepicker({
	    locale: 'ru',
		stepping:10,
		format: 'DD.MM.YYYY',
		defaultDate: moment('01.11.2017').format('DD.MM.YYYY'),
		daysOfWeekDisabled:[0,6]
	  });
      $('#datetimepicker2').datetimepicker({
	    locale: 'ru'
	  });
    });*/
  </script>

<script>
/*$('.datepicker').datepicker({
weekStart:1,
color: 'red'
});

$(document).ready(function(){
    $('.datepicker').datepicker({beforeShowDay: function(date){
        return [date.getDay() != 1, ''];
    }});
});

$(document).ready(function(){
    $('input').datepicker({beforeShowDay: function(date){ return [date.getDay() != 1, '']; }});
});*/
</script>    
  
    
    
    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style>

.cta-100 {
  margin-top: 100px;
  padding-left: 8%;
  padding-top: 7%;
}
.col-md-4{
    padding-bottom:20px;
}

.white {
  color: #fff !important;
}
.mt{float: left;margin-top: -20px;padding-top: 20px;}
.bg-blue-ui {
  background-color: #708198 !important;
}
figure img{width:300px;}

#blogCarousel {
  padding-bottom: 100px;
}

.blog .carousel-indicators {
  left: 0;
  top: -50px;
  height: 50%;
}


/* The colour of the indicators */

.blog .carousel-indicators li {
  background: #708198;
  border-radius: 50%;
  width: 8px;
  height: 8px;
}

.blog .carousel-indicators .active {
  background: #0fc9af;
}




.item-carousel-blog-block {
  outline: medium none;
  padding: 15px;
}

.item-box-blog {
  border: 1px solid #dadada;
  text-align: center;
  z-index: 4;
  padding: 20px;
}

.item-box-blog-image {
  position: relative;
}

.item-box-blog-image figure img {
  width: 100%;
  height: auto;
}

.item-box-blog-date {
  position: absolute;
  z-index: 5;
  padding: 4px 20px;
  top: -20px;
  right: 8px;
  background-color: #41cb52;
}

.item-box-blog-date span {
  color: #fff;
  display: block;
  text-align: center;
  line-height: 1.2;
}

.item-box-blog-date span.mon {
  font-size: 18px;
}

.item-box-blog-date span.day {
  font-size: 16px;
}

.item-box-blog-body {
  padding: 10px;
}

.item-heading-blog a h5 {
  margin: 0;
  line-height: 1;
  text-decoration:none;
  transition: color 0.3s;
}

.item-box-blog-heading a {
    text-decoration: none;
}

.item-box-blog-data p {
  font-size: 13px;
}

.item-box-blog-data p i {
  font-size: 12px;
}

.item-box-blog-text {
  max-height: 100px;
  overflow: hidden;
}

.mt-10 {
  float: left;
  margin-top: -10px;
  padding-top: 10px;
}

.btn.bg-blue-ui.white.read {
  cursor: pointer;
  padding: 4px 20px;
  float: left;
  margin-top: 10px;
}

.btn.bg-blue-ui.white.read:hover {
  box-shadow: 0px 5px 15px inset #4d5f77;
}
.card-pricing.popular {
    z-index: 1;
    border: 3px solid #007bff;
}
.card-pricing .list-unstyled li {
    padding: .5rem 0;
    color: #6c757d;
}
</style>
    
<script src="http://code.jquery.com/jquery-latest.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src="js/stepper.min.js"></script>


  <script src="datepicker/js/jquery-3.2.1.min.js"></script>
  <script src="datepicker/js/moment-with-locales.min.js"></script>
  <script src="datepicker/js/bootstrap.min.js"></script>
  <script src="datepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
  /*
    $(function () {
      $('#datetimepicker1').datetimepicker({
	    locale: 'ru',
		stepping:10,
		format: 'DD.MM.YYYY',
		defaultDate: moment('01.11.2017').format('DD.MM.YYYY'),
		daysOfWeekDisabled:[0,6]
	  });
      $('#datetimepicker2').datetimepicker({
	    locale: 'ru'
	  });
    });*/
  </script>    
    
<?php
    require_once 'footer.php';
?>
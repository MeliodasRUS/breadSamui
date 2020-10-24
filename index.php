<?php
    require_once('header.php');
    

?>

    <section class="slider-section">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators 
            <ol class="carousel-indicators slider-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>-->

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="images/slider1.jpg" style="width:100%; height:auto;" width="1648" height="600" alt="">
                    <div class="carousel-caption">
                        <h2>We bake a real,homemade SOURDOUGH RYE BREAD,and other sourdough products. </h2>
                        <h3>
                            <Span>No adding,colors,artificial ingredients,preservatives are added.</Span>
                        </h3>
                        <a href="#product">Buy</a>
                    </div>
                </div>
            <!--
                <div class="item" >
                    <img src="images/baner3.jpg" style="width:100%; height:auto;" width="1648" height="600" alt="">
                    <div class="carousel-caption">
                        <h2>It is simply "THE Sourdough Bread"...</h2>
                        <h3>It is a real, powerful, healthy, positively charged treasure, which is done for you with our honest love and care.
                            <Span></Span>
                        </h3>
                        <a href="#product">Buy</a>
                    </div>
                </div>
                <div class="item ">
                    <img src="images/slider.jpg" width="1648" height="600" alt="">
                    <div class="carousel-caption">
                        <h2>DRESSES <b>&</b> JEANS</h2>
                        <h3>FROM OURFAMOUS BRANDS
                            <Span>SALE</Span>
                        </h3>
                        <a href="#">Buy Now</a>
                    </div>
                </div>
            -->
            </div>

            <!-- Controls 
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="pe-7s-angle-left glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="pe-7s-angle-right glyphicon-chevron-right" aria-hidden="true"></span>
            </a>-->
        </div>
    </section>

<style>

.row-flex{
display: flex; 
display: -webkit-flex; 
-webkit-flex-wrap: wrap; 
-ms-flex-wrap: wrap; 
flex-wrap: wrap; 
}
.thumb{



height: calc(100% - 15px); 
padding:0px; 
}
</style>
    <section class="featured-section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titie-section wow fadeInDown animated ">
                        <h1>OUR PRODUCT</h1>
                    </div>
                </div>
            </div>
            <br><div class="row featured isotope">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-menu">
                        <ul class="button-group sort-button-group">
                            <li class="button0 active" id="0" onClick="getCategory(0)">All</li>
                            <li class="button1 " id="1" onClick="getCategory(1)">Bread</li>
                            <li class="button2 " id="2" onClick="getCategory(2)">Strudels</li>
                            <li class="button3 " id="3" onClick="getCategory(3)">Pizza</li>
                            <li class="button4 " id="4" onClick="getCategory(4)">Lasagna</li>
                            <li class="button5 " id="5" onClick="getCategory(5)">Pie</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row row-flex">
        <?php
            $product = new Model_Base($pdo);
            $product->AllProduct();
        ?>
        </div>
<script type="text/javascript">
                function getCategory(id){
                    if(id === 0){
                        $('.category1').show();
                        $('.category2').show();
                        $('.category3').show();
                        $('.category4').show();
                        $('.category5').show();

                        document.querySelector('.button1').classList.remove("active");
                        document.querySelector('.button2').classList.remove("active");
                        document.querySelector('.button3').classList.remove("active");
                        document.querySelector('.button4').classList.remove("active");
                        document.querySelector('.button5').classList.remove("active");

                        document.querySelector('.button0').classList.add("active");
                        //var p;
                        //p = document.getElementById('daas');
                        //p = document.getElementById('daas');
                        //p.innerHTML = '<?php //echo ((($_SESSION['totalQuantity']/0.5)*30)+$_SESSION['totalPrice']).' ฿';?>';
                        //return getSelect(3);
                    }
                    else if(id === 1){
                        document.querySelector('.button1').classList.add("active");
                        document.querySelector('.button2').classList.remove("active");
                        document.querySelector('.button3').classList.remove("active");
                        document.querySelector('.button0').classList.remove("active");
                        document.querySelector('.button4').classList.remove("active");
                        document.querySelector('.button5').classList.remove("active");




                        //return getSelect1(2);
                        $('.category1').show();
                        //document.querySelectorAll('#category2').hide();
                        //document.querySelectorAll('#category3').hide();
                        $('.category2').hide();
                        $('.category3').hide();
                        $('.category4').hide();
                        $('.category5').hide();

                        
                    }
                    else if(id === 2){
                        document.querySelector('.button1').classList.remove("active");
                        document.querySelector('.button2').classList.add("active");
                        document.querySelector('.button3').classList.remove("active");
                        document.querySelector('.button0').classList.remove("active");
                        document.querySelector('.button4').classList.remove("active");
                        document.querySelector('.button5').classList.remove("active");

                        $('.category1').hide();
                        $('.category2').show();
                        $('.category3').hide();
                        $('.category4').hide();
                        $('.category5').hide();

                    }
                    else if(id === 3){
                        document.querySelector('.button1').classList.remove("active");
                        document.querySelector('.button2').classList.remove("active");
                        document.querySelector('.button3').classList.add("active");
                        document.querySelector('.button0').classList.remove("active");
                        document.querySelector('.button4').classList.remove("active");
                        document.querySelector('.button5').classList.remove("active");

                        $('.category1').hide();
                        $('.category2').hide();
                        $('.category3').show();
                        $('.category4').hide();
                        $('.category5').hide();

                    }
                    else if(id === 4){
                        document.querySelector('.button1').classList.remove("active");
                        document.querySelector('.button2').classList.remove("active");
                        document.querySelector('.button3').classList.remove("active");
                        document.querySelector('.button0').classList.remove("active");
                        document.querySelector('.button4').classList.add("active");
                        document.querySelector('.button5').classList.remove("active");

                        $('.category1').hide();
                        $('.category2').hide();
                        $('.category3').hide();
                        $('.category4').show();
                        $('.category5').hide();

                    }
                    else if(id ===5){
                        document.querySelector('.button1').classList.remove("active");
                        document.querySelector('.button2').classList.remove("active");
                        document.querySelector('.button3').classList.remove("active");
                        document.querySelector('.button0').classList.remove("active");
                        document.querySelector('.button4').classList.remove("active");
                        document.querySelector('.button5').classList.add("active");

                        $('.category1').hide();
                        $('.category2').hide();
                        $('.category3').hide();
                        $('.category4').hide();
                        $('.category5').show();
                    }
                    else{
                        document.querySelector('.button1').classList.remove("active");
                        document.querySelector('.button2').classList.remove("active");
                        document.querySelector('.button3').classList.remove("active");
                        document.querySelector('.button0').classList.add("active");
                        document.querySelector('.button4').classList.remove("active");
                        document.querySelector('.button5').classList.remove("active");
                        $('.category1').show();
                        $('.category2').show();
                        $('.category3').show();
                        $('.category4').show();
                        $('.category5').show();

                    }
                };
            </script>

<script>
function getdetails(id){
    $.ajax({
        type: "POST",
        url: "addPol.php",
        data: {id:id},
        dataType: "json"
    }).done(function(data)
        {
            $("#caart").html(data.cart);
            $("#cartQuantity").html(data.cartQuantity);
        });
}

</script>
<!--   
        <div class="col-md-9 card-columns">

  <div class="card" >
    <img src="images/product1.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Raspberry Pie 120,00 ฿</h5>
      <p class="card-text">Homemade Vegetarian Lasagna, FRESHLY MADE pasta, tomato sauce, bechamel. They're made in 8 layers. It goes with stir-fried mushrooms and slightly roasted violet eggplant, Mozzarella cheese in between layers, and cheddar cheese sprinkled on the top</p>
    <div class="card-header">
    Выпечка в понедельник,среду,пятницу
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">...</li>
  </ul>
    </div>
     
  </div>
-->





</div>
</div>
    </section>


<!--
    <section class="offer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeInDown animated ">
                    <h1>END OF SEASON SALE</h1>
                    <h2>Up to 35% off Women's Denim</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="best-seller-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titie-section wow fadeInDown animated ">
                        <h1>BEST SELLERS</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 wow fadeInDown animated" data-wow-delay="0.2s">
                    <div class="product-item">
                        <img src="images/1.png" class="img-responsive" width="255" height="322" alt="">
                        <div class="product-hover">
                            <div class="product-meta">
                                <a href="#"><i class="pe-7s-like"></i></a>
                                <a href="#"><i class="pe-7s-shuffle"></i></a>
                                <a href="#"><i class="pe-7s-clock"></i></a>
                                <a href="#"><i class="pe-7s-cart"></i>Add to Cart</a>
                            </div>
                        </div>
                        <div class="product-title">
                            <a href="#">
                                <h3>Blue Tshirt</h3>
                                <span>$26</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInDown animated" data-wow-delay="0.4s">
                    <div class="product-item">
                        <img src="images/2.png" class="img-responsive" width="255" height="322" alt="">
                        <div class="product-hover">
                            <div class="product-meta">
                                <a href="#"><i class="pe-7s-like"></i></a>
                                <a href="#"><i class="pe-7s-shuffle"></i></a>
                                <a href="#"><i class="pe-7s-clock"></i></a>
                                <a href="#"><i class="pe-7s-cart"></i>Add to Cart</a>
                            </div>
                        </div>
                        <div class="product-title">
                            <a href="#">
                                <h3>WOMAN shirt</h3>
                                <span>$31</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInDown animated" data-wow-delay="0.6s">
                    <div class="product-item">
                        <img src="images/3.png" class="img-responsive" width="255" height="322" alt="">
                        <div class="product-hover">
                            <div class="product-meta">
                                <a href="#"><i class="pe-7s-like"></i></a>
                                <a href="#"><i class="pe-7s-shuffle"></i></a>
                                <a href="#"><i class="pe-7s-clock"></i></a>
                                <a href="#"><i class="pe-7s-cart"></i>Add to Cart</a>
                            </div>
                        </div>
                        <div class="product-title">
                            <a href="#">
                                <h3>YELLOW Tshirt</h3>
                                <span>$21</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInDown animated" data-wow-delay="0.8s">
                    <div class="product-item">
                        <img src="images/4.png" class="img-responsive" width="255" height="322" alt="">
                        <div class="product-hover">
                            <div class="product-meta">
                                <a href="#"><i class="pe-7s-like"></i></a>
                                <a href="#"><i class="pe-7s-shuffle"></i></a>
                                <a href="#"><i class="pe-7s-clock"></i></a>
                                <a href="#"><i class="pe-7s-cart"></i>Add to Cart</a>
                            </div>
                        </div>
                        <div class="product-title">
                            <a href="#">
                                <h3>Cool lingerie</h3>
                                <span>$56</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <section class="review-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titie-section wow fadeInDown animated ">
                        <h1>customer review</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="feedback" class="carousel slide feedback" data-ride="feedback">
                   
                    <div class="carousel-inner" role="listbox">
                        
                        <div class="item active">
                            <img src="images/otziv0.jpg" width="320" height="439" alt="">
                            <div class="carousel-caption">
                                <p>Firstly, I am a bread baker and have been for 10 years... just for home and usually 3 times a week.

I bought their three loaves, the Dark, Semi-dark and FIT. I really liked them all. It is great that they are different in taste and texture. The added seeds and grains makes them really stand out. Their starter provides depth of flavour and texture, which comes through in the crumb of the loaf, with a great pattern of air holes. The bread remains moist and firm which allows for the easy cutting.... all in all great bread.

Oh... their veggie Lasagna was super too. It is great when someone go through to the effort to home make the sauces and ingredients. I especially liked the fresh peppercorns in it, as they gave an instant burst of flavour when they popped in your mouth.

I look forward to tasting more from this great family kitchen. Clearly great talent to bake so many things in their wood fired oven..., I must build one  </p>
                                <h3>- David Morland -</h3>
                                <span></span>
                            </div>
                        </div>
                        <div class="item ">
                            <img src="images/otziv.jpg" width="320" height="439" alt="">
                            <div class="carousel-caption">
                                <p>If only we were in Samui longer for all the delicious, artisanal and truly healthful things this wonderful family provides. You can literally taste the love that goes into every item that comes out of the wood fired oven. Such a treasure unique to this island. My husband particularly LOVED the multiple layered lasagna and somehow wishes I did not eat the other half. The kids would gobble down the bread, crackers and apple strudel before we could even peel out of their driveway! They know what's good and looked forward to our visits! I myself will really miss the spinach vegan strudel with the cashew cheese. Free roaming ducks, chickens, turtles and fish in a pond. You will be welcomed with every visit to this beautiful environment.</p>
                                <h3>- Maria Kayun -</h3>
                                <span></span>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/otziv1.jpg" width="320" height="439" alt="">
                            <div class="carousel-caption">
                                <p>We are a big fan of sourdough bread. We found sourdough bread samui via vegan samui group. Today we went to pick up the bread. came home and tried it. We love it so much. 
                                The owner was really nice. She explained it to us how the bread was made, when to cut and how to store the bread at home. Thank you for beautiful bread. </p>
                                <h3>- Taiwaree Vannasiri Stefanko -</h3>
                                <span></span>
                            </div>
                        </div>
                    </div>
                  
                    <ol class="carousel-indicators review-controlar">
                        <li data-target="#feedback" data-slide-to="0" class="active">
                            <img src="images/otziv0.jpg" width="320" height="439" alt="">
                        </li>
                        <li data-target="#feedback" data-slide-to="1">
                            <img src="images/otziv.jpg" width="320" height="439" alt="">
                        </li>
                        <li data-target="#feedback" data-slide-to="2">
                            <img src="images/otziv1.jpg" width="320" height="439" alt="">
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
<!--
    <section class="news-letter-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="titie-section white wow fadeInDown animated ">
                        <h1>NEWSLETTER</h1>
                    </div>
                    <p>Follow a collection of news & promotions</p>
                </div>
            </div>
            <div class="row subscribe-from">
                <form class="form-inline col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1  wow fadeInDown animated">
                    <div class="form-group">
                        <input type="email" class="form-control subscribe" id="email" placeholder="Enter your email">
                        <button class="suscribe-btn"><i class="pe-7s-next"></i></button>
                    </div>
                </form>
                
            </div>
           
        </div>
       
    </section>


    <section class="client-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="titie-section wow fadeInDown animated ">
                        <h1>our partner</h1>
                    </div>
                </div>
            </div>
            <div id="client" class="row owl-carousel owl-theme client-area">
                <div class="col-md-12 item">
                    <a href="#">
                        <img src="images/client_01.jpg" class="img-responsive" width="300" height="200" alt="">
                    </a>
                </div>
                <div class="col-md-12 item">
                    <a href="#">
                        <img src="images/client_02.jpg" class="img-responsive" width="300" height="200" alt="">
                    </a>
                </div>
                <div class="col-md-12 item">
                    <a href="#">
                        <img src="images/client_03.jpg" class="img-responsive" width="300" height="200" alt="">
                    </a>
                </div>
                <div class="col-md-12 item">
                    <a href="#">
                        <img src="images/client_04.jpg" class="img-responsive" width="300" height="200" alt="">
                    </a>
                </div>
                <div class="col-md-12 item">
                    <a href="#">
                        <img src="images/client_01.jpg" class="img-responsive" width="300" height="200" alt="">
                    </a>
                </div>
                <div class="col-md-12 item">
                    <a href="#">
                        <img src="images/client_02.jpg" class="img-responsive" width="300" height="200" alt="">
                    </a>
                </div>
                <div class="col-md-12 item">
                    <a href="#">
                        <img src="images/client_03.jpg" class="img-responsive" width="300" height="200" alt="">
                    </a>
                </div>
                <div class="col-md-12 item">
                    <a href="#">
                        <img src="images/client_04.jpg" class="img-responsive" width="300" height="200" alt="">
                    </a>
                </div>
            </div>
            <div class="customNavigation works-navigation">
                <a class="btn-work works-prev"><i class="pe-7s-angle-left"></i></a>
                <a class="btn-work works-next"><i class="pe-7s-angle-right"></i></a>
            </div>
            
        </div>
    </section>
-->
    <section class="news-section" id="news">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="titie-section wow fadeInDown animated ">
                        <h1>Latest News</h1>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
                $new = new Model_Base($pdo);
                $new->allNews();
            
            ?><!--
                <div class="col-sm-4 wow fadeInDown animated" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <a href="#"><img src="images/blog1.jpg" width="350" height="262" alt=""></a>
                        <h3>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean </h3>
                        <p>Nam nec tellus a odio tincidunt auc. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
                <div class="col-sm-4 wow fadeInDown animated" data-wow-delay="0.4s">
                    <div class="blog-item">
                        <a href="#"><img src="images/blog2.jpg" width="350" height="262" alt=""></a>
                        <h3>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean </h3>
                        <p>Nam nec tellus a odio tincidunt auc. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt</p>
                        <a href="#">Read More</a>

                    </div>
                </div>
                <div class="col-sm-4 wow fadeInDown animated" data-wow-delay="0.6s">
                    <div class="blog-item">
                        <a href="#"><img src="images/blog3.jpg" width="350" height="262" alt=""></a>
                        <h3>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean </h3>
                        <p>Nam nec tellus a odio tincidunt auc. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt</p>
                        <a href="#">Read More</a>
                    </div>
                </div>-->
            </div>
        </div>
    </section>

   
    

    
    
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
    padding-bottom:30px;
    
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
    
    
<?php
    //include 'action/auth.php';
    require_once 'footer.php';
?>

    
    

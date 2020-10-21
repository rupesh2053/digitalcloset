<?php 

    $active='Cart';
    include("header.php");
    include "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styles/cartStyle.css">

  <style type="text/css">
   
   .glyphicon-search{
      width: 60px;
      padding: 3.5px;
    }
    
    .product1{
      height: 350px;
      width: 200px;
      box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.1);
      margin-bottom: 30px;
      background-color: #fff;
      padding: 10px;
    }
    .hr{
      border-top: 1px solid rgba(0,0,0,0.2);
      margin-bottom: 15px;
    }
    .panel{
      border: 1px solid rgba(0,0,0,0.2);
      padding: 10px;
      background: #fff;
      margin-bottom: 20px;
      margin-left: 18px;
      margin-right: 20px;
    }
    .question{
      border: 1px solid rgba(0,0,0,0.2);
      padding: 20px;
      margin-bottom: 10px;
      background: #fff;
      margin-left: 15px;
      margin-right: 20px;
    }
    .imgC{
     box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.2);
     padding: 10px;
     padding-bottom: 10px;
     background-color: #fff;
     height: 280px;
     width: 330px;
    }
  </style>
  
</head>
<body>

<br>
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Shop
                   </li>
                   
                   <li>
                       <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                   </li>
                   <li> <?php echo $pro_title; ?> </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           <br><br><br><br>
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators Finish -->
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 3-b"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3-c"></center>
                                   </div>
                               </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- left carousel-control Finish -->
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- right carousel-control Finish -->
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->
                   </div><!-- col-sm-6 Finish -->
                  
                  
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->

                           
                           <?php add_cart(); ?>
                           
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label class="col-md-5 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                         <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           <option>6</option>
                                           <option>7</option>
                                           <option>8</option>
                                           <option>9</option>
                                           <option>10</option>


                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish --> 
                                   
                               </div><!-- form-group Finish -->
                               
                               <div class="form-group"><!-- form-group Begin -->
                                   <label class="col-md-5 control-label">Product Size</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                       
                                       <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')"><!-- form-control Begin -->
                                          
                                           <option disabled selected>Select a Size</option>
                                           <option>Small</option>
                                           <option>Medium</option>
                                           <option>Large</option>
                                           
                                       </select><!-- form-control Finish -->
                                       
                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->




                               <div class="form-group"><!-- form-group Begin -->
                                   <label class="col-md-5 control-label">Product Color</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                       
                                       <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')"><!-- form-control Begin -->
                                          
                                           <option disabled selected>Select a Color</option>
                                           <option>Black</option>
                                           <option>Red</option>
                                           <option>Green</option>
                                           <option>Yellow</option>
                                           <option>Pink</option>
                                           <option>Velvet</option>

                                           
                                       </select><!-- form-control Finish -->
                                       
                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->


                               <p class="price" style = "font-size: 18px; margin-left: 10px">Price :<b> Rs. <?php echo "(<label style = 'font-weight: 100'><strike style = 'color:red'>Rs.$pro_price/-</strike></label>)"; ?>/- (<span>With Discount</span>)</b></p>
                               
                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>
                               
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                       
                       <div class="row" id="thumbs"><!-- row Begin -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product 2" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product 4" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                       </div><!-- row Finish -->
                       
                   </div><!-- col-sm-6 Finish -->
                   
                   
               </div><!-- row Finish -->
               <br>
               
               <div class="box" id="details"><!-- box Begin -->
                       <div style = " margin-left: 20px">
                       <h4 style = "font-size: 24px; font-weight: 700">Product Details</h4>
                   
                   <p>
                       
                       <?php echo $pro_desc; ?>
                       
                   </p>
                   
                       <h4 style = "font-size: 24px; font-weight: 700">Size</h4>
                       
                       <ul>
                           <li>Small</li>
                           <li>Medium</li>
                           <li>Large</li>
                       </ul> 
                       <hr>
                   
               </div><!-- box Finish -->
             </div>
             <br><br>
               <div class = "hr" style = ""></div><br>
               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Products You May Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->
                   
                   <?php 
                   
                    $get_products = "SELECT * FROM product ORDER BY rand() LIMIT 0,3";
                   
                    $run_products = mysqli_query($conn,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                       $pro_id = $row_products['product_id'];
                       
                       $pro_title = $row_products['product_title'];
                       
                       $pro_img1 = $row_products['product_img1'];
                       
                       $pro_price = $row_products['product_price'];
                       $pro_disc = $row_products['discount'];
                       $pro_discount = ($pro_price * $pro_disc)/100;
                       $pro_price = ($pro_price-$pro_discount);
                       $no_discount = $row_products['product_price'];
                       
                       echo "
                       
                        <div class='col-md-3 col-sm-6 center-responsive'>
                        
                            <div class='product1 same-height'>
                            
                                <a href='details.php?pro_id=$pro_id'>
                                
                                    <img class = 'imgProduct' src='admin_area/product_images/$pro_img1'>
                                
                                </a>
                                
                                <div class='text txtHeading'>
                                
                                    <h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>
                                    
                                    <p class='price'> Rs. $pro_price /-(<label style = 'font-weight: 100'><strike style = 'color:red'>Rs.$no_discount</strike></label>)</p>
                                
                                </div>
                            
                            </div>
                        
                        </div>
                       
                       ";
                       
                   }
                   
                   ?>
                   
               </div><!-- #row same-heigh-row Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   <div class = "hr"></div>
 
<!-- myCarousel Begin -->
<h2 style = "margin-left: 15px">Customer who viewed this item also viewed</h2>
<div class="container contnr" style = "width: 1500px;">  
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner ci" style = " background-color: #01DFD7; margin: 5px; margin-left: 0px;">
       <?php 
                   
                   $get_slides = "SELECT * FROM product WHERE product_catagories = 'T-SHIRT' ORDER BY rand() LIMIT 0,1";
                   
                   $run_slides = mysqli_query($conn,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       $get_slides2 = "SELECT * FROM product WHERE product_catagories = 'Jackets' ORDER BY rand() LIMIT 0,1";
                       $run_slides2 = mysqli_query($conn,$get_slides2);
                       $row_slides2=mysqli_fetch_array($run_slides2);

                       $get_slides3 = "SELECT * FROM product WHERE product_catagories = 'Shoes' ORDER BY rand() LIMIT 0,1";
                       $run_slides3 = mysqli_query($conn,$get_slides3);
                       $row_slides3=mysqli_fetch_array($run_slides3);

                       $get_slides4 = "SELECT * FROM product WHERE catagories = 'kids' ORDER BY rand() LIMIT 0,1";
                       $run_slides4 = mysqli_query($conn,$get_slides4);
                       $row_slides4=mysqli_fetch_array($run_slides4);

                       $slide_image1 = $row_slides['product_img1'];
                       $slide_title1 = $row_slides['product_title'];

                       $slide_image2 = $row_slides2['product_img1'];
                       $slide_title2 = $row_slides['product_title'];
                       
                       $slide_image3 = $row_slides3['product_img1'];
                       $slide_title3 = $row_slides['product_title'];
                       
                       $slide_image4 = $row_slides4['product_img1'];
                       $slide_title4 = $row_slides['product_title'];
                      





                       
                       echo "
                       
                        <div class='item active'>
                        
                        <div class='col-md-3'><img src='admin_area/product_images/$slide_image1' class = 'imgC'></div>
                        <div class='col-md-3'><img src='admin_area/product_images/$slide_image2' class = 'imgC'></div>
                        <div class='col-md-3'><img src='admin_area/product_images/$slide_image3' class = 'imgC'></div>
                        <div class='col-md-3'><img src='admin_area/product_images/$slide_image4' class = 'imgC'></div>
                        </div> ";

                        
                       
                   }

                   
                   $get_slides = "SELECT * FROM product WHERE product_catagories = 'jackets' ORDER BY rand() LIMIT 1,5";
                   
                   $run_slides = mysqli_query($conn,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $get_slides2 = "SELECT * FROM product WHERE product_catagories = 'Jackets' ORDER BY rand() LIMIT 0,1";
                       $run_slides2 = mysqli_query($conn,$get_slides2);
                       $row_slides2=mysqli_fetch_array($run_slides2);

                       $get_slides3 = "SELECT * FROM product WHERE product_catagories = 'Shoes' AND catagories = 'women' ORDER BY rand() LIMIT 0,1";
                       $run_slides3 = mysqli_query($conn,$get_slides3);
                       $row_slides3=mysqli_fetch_array($run_slides3);

                       $get_slides4 = "SELECT * FROM product WHERE catagories = 'kids' ORDER BY rand() LIMIT 0,1";
                       $run_slides4 = mysqli_query($conn,$get_slides4);
                       $row_slides4=mysqli_fetch_array($run_slides4);

                       $slide_image1 = $row_slides['product_img1'];
                       $slide_image2 = $row_slides2['product_img1'];
                       $slide_image3 = $row_slides3['product_img1'];
                       $slide_image4 = $row_slides4['product_img1'];

                       
                       echo "
                       
                       <div class='item'>
                        <div class='col-md-3'><img src='admin_area/product_images/$slide_image1' class = 'imgC'></div>
                        <div class='col-md-3'><img src='admin_area/product_images/$slide_image2' class = 'imgC'></div>
                        <div class='col-md-3'><img src='admin_area/product_images/$slide_image3' class = 'imgC'></div>
                        <div class='col-md-3'><img src='admin_area/product_images/$slide_image4' class = 'imgC'></div>
                        </div>
                       
                       ";
                       
                   }
                   
                   ?>


       <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" style = "color: red"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" style = "color: red"></span>
      <span class="sr-only">Next</span>
    </a>
     </div>
  </div>
</div>

<div class = "hr"></div>

<!-- Question Area Begin -->

<div class = "question">
<h3 >Have a question?</h3>
<div class="container" style = "margin-left: 10px">
  <form>
    <div class="input-group">
      <input type="text" class = "form-control" placeholder = "Search">
      <div class="input-group-btn">
        <button class = "btn btn-info" type = "submit" style = "margin-left: 10px;">
          <i class = "glyphicon glyphicon-search"></i>
        </button>
      </div>
    </div>
  </form>
</div>
</div>



<div class = "hr"></div>
<div class="panel panel-default panel">
<div class = "review"><!-- col-md-7 Begin -->
 <h2>User Reviews</h2>
</div><!-- col-md-12 Finish -->
</div>

<div class = "hr"></div> 

<div class="col-md-12"><!-- col-md-12 Begin -->
  
  <?php include "CommentSection/index.php" ?>

</div><!-- col-md-12 Finish -->


</div><!-- Question Area col-md-12 Finish -->
</div>


<div class="col-md-12" style = " margin-top: 20px"><?php include "footer.php" ?></div>
  <script src="js/jquery-331.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>
</body>
</html>



<?php 
    include "db.php";
    $active='Shop';
    include "header.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="ProStyle.css">
    <style type="text/css">
    body{
     background-color:#E6E6E6;
    }
    .imgC{
     box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.2);
     margin-top: 10px;
     background-color: #fff;
     height: 280px;
     width: 270px;
     margin-left: -8px;
    }
    #latestPro h2{
      box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.2);
    }
    .product{
      border-radius: 5px;
      border: 1px solid red;
    }
    .bttn{
  margin-left: 105px;
  margin-top: -33px;
  margin-bottom: 15px;
 }


.products{
  box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.2);
  height : 470px;
  width: 250px;
  padding: 10px ;
  padding-bottom: 15px;
  background: #fff;
  margin-bottom: 20px;
}
.price{
  font-weight: 600;
}

.text h3{
  background-color:#00BFFF;
  border-radius: 5px;
  padding: 4px;
}
.text h3 a{
  color: #fff;
  margin-left: 5px;
  text-decoration: none;
}
 .imgBox{
  height: 250px;
  width: 230px;

 }

 
 .inStock{
  color: #00BFFF;
  font-weight: 400;
  margin-top: -15px;
 }


 .row{
  margin-left: 1px;
 }
 .row .imgC{
  margin-top: 10px;
  height: 300px;
  width: 250px;
 }
 .contnr{
  margin-top: 20px;
  margin-bottom: 20px;
  margin-left: -7px;
 }
 .ci{
  background-color: #fff;
  height: 300px;
 }
 .box h1{
  font-weight: 700;
 }
  
   
    </style>
  
</head>
<body style = "background-color:#F2F2F2;">

   <div id  = "content"><!-- #content start -->
       <div class="container"><!-- container start -->
         <div class="col-md-12"><!-- col-md-6 start -->
          <ul class="breadcrumb" style = "background-color:#fff;"><!-- breadcrumb start -->
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>Shop</li>
          </ul><!-- breadcrumb Finish -->
         </div><!-- col-md-6 Finish -->




    <div class="container contnr">  
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner ci" style = " background-color: #fff;">
       <?php 
                   
                   $get_slides = "SELECT * FROM product WHERE product_catagories = 't-shirt' ORDER BY rand() LIMIT 0,1";
                   
                   $run_slides = mysqli_query($conn,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       $get_slides2 = "SELECT * FROM product WHERE product_catagories = 't-shirt' ORDER BY rand() LIMIT 0,1";
                       $run_slides2 = mysqli_query($conn,$get_slides2);
                       $row_slides2=mysqli_fetch_array($run_slides2);

                       $get_slides3 = "SELECT * FROM product WHERE product_catagories = 't-shirt' ORDER BY rand() LIMIT 0,1";
                       $run_slides3 = mysqli_query($conn,$get_slides3);
                       $row_slides3=mysqli_fetch_array($run_slides3);

                       $get_slides4 = "SELECT * FROM product WHERE product_catagories = 't-shirt' ORDER BY rand() LIMIT 0,1";
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

                   
                   $get_slides = "SELECT * FROM product WHERE product_catagories = 't-shirt' ORDER BY rand() LIMIT 1,5";
                   
                   $run_slides = mysqli_query($conn,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $get_slides2 = "SELECT * FROM product WHERE product_catagories = 't-shirt' ORDER BY rand() LIMIT 0,1";
                       $run_slides2 = mysqli_query($conn,$get_slides2);
                       $row_slides2=mysqli_fetch_array($run_slides2);

                       $get_slides3 = "SELECT * FROM product WHERE product_catagories = 't-shirt' ORDER BY rand() LIMIT 0,1";
                       $run_slides3 = mysqli_query($conn,$get_slides3);
                       $row_slides3=mysqli_fetch_array($run_slides3);

                       $get_slides4 = "SELECT * FROM product WHERE product_catagories = 't-shirt' ORDER BY rand() LIMIT 0,1";
                       $run_slides4 = mysqli_query($conn,$get_slides4);
                       $row_slides4=mysqli_fetch_array($run_slides4);

                       $slide_image1 = $row_slides['product_img1'];
                       $slide_image2 = $row_slides2['product_img1'];
                       $slide_image3 = $row_slides3['product_img1'];
                       $slide_image4 = $row_slides4['product_img1'];

                       
                       echo "
                       
                       <div class='item'>
                        <div class='col-md-3'><img src='admin_area/product_images/$slide_image1' class = 'imgC'></div>
                        <div class='col-md-3'><img src='admin_area/product_images/$slide_image2' class = 'imgC' ></div>
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




         <div class = "col-md-3"><!-- col-md-3 start -->
           <?php include("sidebar.php"); ?>
         </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
           <?php 
               
                if(!isset($_GET['p_cat'])){
                    
                    if(!isset($_GET['cat'])){ ?>
              
                      

                       <div class='box'> <!-- box Begin -->
                           <h1><a href="shop.php">Shop</a> > T-Shirt</h1>
                           <p>
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut.
                           </p>
                       </div> <!-- box Finish -->

                       
                        <?php
                    }
                   
                   }
               
               ?>
               <br><br>
               
               <div class="row"><!-- row Begin -->
               
                   <?php 
                   
                        if(!isset($_GET['p_cat'])){
                            
                         if(!isset($_GET['cat'])){
                            
                            $per_page=9; 
                             
                            if(isset($_GET['page'])){
                                
                                $page = $_GET['page'];
                                
                            }else{
                                
                                $page=1;
                                
                            }
                            
                            $start_from = ($page-1) * $per_page;
                             
                            $get_products = "SELECT * FROM product WHERE product_catagories = 't-shirt' ORDER BY 1 DESC LIMIT $start_from,$per_page";
                             
                            $run_products = mysqli_query($conn,$get_products);
                             
                            while($row_products=mysqli_fetch_array($run_products)){
                                
                                $pro_id = $row_products['product_id'];
        
                                $pro_title = $row_products['product_title'];

                                $pro_price = $row_products['product_price'];

                                $pro_img1 = $row_products['product_img1'];
                                $pro_descount = $row_products['discount'];

                                $pro_stock = $row_products['stock'];

                                $noDis = ($pro_price * $pro_descount)/100;
                                $noDis = $pro_price - $noDis;
                                
                                echo "
                                
                                    <div class='col-md-4 col-sm-6 center-responsive'>
                                    
                                        <div class='products'>

                                        
                                            <a href='details.php?pro_id=$pro_id'>
                                            
                                                <img class='imgBox' src='admin_area/product_images/$pro_img1'>
                                            
                                            </a>


                                            
                                            <div class='text'>

                                            <h3>
                                                    <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                                                
                                                </h3>
                                            
                                                <p class='price'>
                    
                                                 <label style = 'font-weight: 800'>Rs. $noDis/-</label> (<label style = 'font-weight: 100'><strike style = 'color:red'>Rs.$pro_price</strike></label>) ($pro_descount% <label style = 'color: red'>OFF</label>)
                    
                                                </p>

                                                <p class='buttons'>

                                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                                        View Details

                                                    </a>

                                                    <a class='btn btn-primary bttn' href='details.php?pro_id=$pro_id'>

                                                        <i class='fa fa-shopping-cart'></i> Add To Cart

                                                    </a>

                                                </p>

                                                 <p style = 'font-weight: 600; color: #2E9AFE'>Only <b>$pro_stock</b> item in stock. Order Soon.</p>
                                            
                                            </div>
                                        
                                        </div>
                                    
                                    </div>
                                
                          ";
                         } ?>
               
               </div><!-- row Finish -->
               
               <center>
                   <ul class="pagination"><!-- pagination Begin -->
           <?php
                             
                    $query = "SELECT * FROM product WHERE product_catagories = 't-shirt'";
                             
                    $result = mysqli_query($conn,$query);
                             
                    $total_records = mysqli_num_rows($result);
                             
                    $total_pages = ceil($total_records / $per_page);
                             
                        echo "
                        
                            <li>
                            
                                <a href='tshirt_c.php?page=1'> ".'First Page'." </a>
                            
                            </li>
                        
                        ";
                             
                        for($i=1; $i<=$total_pages; $i++){
                            
                              echo "
                        
                            <li>
                            
                                <a href='tshirt_c.php?page=".$i."'> ".$i." </a>
                            
                            </li>
                        
                        ";  
                            
                        };
                             
                        echo "
                        
                            <li>
                            
                                <a href='tshirt_c.php?page=$total_pages'> ".'Last Page'." </a>
                            
                            </li>
                        
                        ";
                             
                }
              
            }
           
           ?> 
                       
                   </ul><!-- pagination Finish -->
               </center>

              
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   
    
  <?php
     include("footer.php");
     ?>
</body>
</html>

  
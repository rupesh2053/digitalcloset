

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="styles/IndexStyle.css">
  
</head>
<body>
   <?php 
   $active = "Home";
   include ("header.php");
    ?>
    <?php include "navbar.php" ?>


   
   <div id  = "content"><!-- #content start -->
       <div class="container"><!-- container start -->
         <div class="col-md-20"><!-- col-md-6 start -->
          <ul class="breadcrumb"><!-- breadcrumb start -->
            <li>
              <a href="index.php">Home</a>
            </li>
          </ul><!-- breadcrumb Finish -->
         </div><!-- col-md-6 Finish -->

          
    <div class = "col-md-3"><!-- col-md-3 start -->
   <div class="container" id="slider" style = "width: 1173px"><!-- container Begin -->
       
       <div class="col-md-12"><!-- col-md-12 Begin -->
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
               
               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                  
     
               </ol><!-- carousel-indicators Finish -->
               
               <div class="carousel-inner" style = "width: 100%; height: 490px"><!-- carousel-inner Begin -->
                  
                  <?php 
                   
                   $get_slides = "SELECT * FROM tbl_slider LIMIT 0,1";
                   
                   $run_slides = mysqli_query($conn,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item active'>
                       
                       <img src='admin_area/slides_images/$slide_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   $get_slides = "SELECT * FROM tbl_slider LIMIT 1,9";
                   
                   $run_slides = mysqli_query($conn,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item'>
                       
                       <img src='admin_area/slides_images/$slide_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   ?>
                   
               </div><!-- carousel-inner Finish -->
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a><!-- left carousel-control Finish -->
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a><!-- left carousel-control Finish -->
               
           </div><!-- carousel slide Finish -->
           
       </div><!-- col-md-12 Finish -->
       
   </div><!-- container Finish -->
   
   <div id="advantages"><!-- #advantages Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="same-height-row"><!-- same-height-row Begin -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-heart"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">Best Offer</a></h3>
                       
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-tag"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">Best Prices</a></h3>
                       
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-thumbs-up"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">100% Original</a></h3>
                       
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
           </div><!-- same-height-row Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- #advantages Finish -->


   		<div class="container container1"><!-- #container start -->
   			<div class="col-md-12"> <!-- col-md-12start -->
  
   				<h2 class = "prod" style = "box-shadow: 1px 2px 1px 1px rgba(0,0,0,0.1); ">
   					OUR LATEST PRODUCTS
   				</h2>
   				
   			</div> <!-- col-md-12 end -->
   			
   		</div><!-- #container Finish -->

   	



   <div id = "content" class = "container"><!-- container Start -->
   	<div class="row" ><!-- row Start --> 
     
    <?php getPro(); ?>
   
   	</div><!-- row Finish --> 
   </div><!-- container Finish --> 

 </div>
</div>
<br><br><br>

   <!-- Footer -->
<?php include "footer.php" ?>
<!-- Footer End -->


</div>

   <!-- Footer End -->  

</body>
</html>


  <?php 
 $active = "products";
 include "db.php";
 include "header.php";
 include "navbar.php";
 ?>
<!DOCTYPE html>
<html>
<head>

</head>

<body style = "background-color: #F8E0E0;">

	<div class="col-lg-12" style ="margin-top: 30px" >

	<div class="col-md-5" style = "margin-top: 180px;margin-left:50px">
     <?php include "productSlider.php"; ?>
     </div>



<div class="col-md-3">
<div class="container" style = "height: 370px; width: 780px;"> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="admin_area\slides_images\slide-6.jpg"  style="height:100%; width: 780px">
      </div>

      <div class="item">
        <img src="admin_area\slides_images\slide-8.jpg"  style="height:100%; width: 780px">
      </div>
    
      <div class="item">
        <img src="admin_area\slides_images\slide-9.jpg"  style="height:100%; width: 780px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" style = "color: yellow"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" style = "color: yellow"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
  </div>
</div>
</div> 
      
      <div class="col-md-12">
      <div class="col-md-2" > <?php include "sidebar.php" ?></div>
     	<div style = 'margin-top: 100px;'><?php include "bagDesign.php" ?></div>

      </div>



</body>
</html>
<div class="col-lg-12" style = "margin-top: 240px">
<?php include "footer.php"; ?>
</div>
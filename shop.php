<?php 
    include "db.php";
    $active='Shop';
    include "header.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styles/StyleShop.css">

<style type="text/css">
  .bttn{
  margin-left: 105px;
  margin-top: -33px;
  margin-bottom: 15px;
 }
 .right-set .color{
  margin: 1.3rem 0;
}
.right-set .color:after{
  content: "";
  display: block;
  clear: left;
}
.right-set .color button.li{
  width: 25px;
  height: 25px;
  border: solid 1.5px #aaa;
  border-radius: 4px;
  float: left;
  margin-right: 0.4rem;
  cursor: pointer;
  transition: all 0.4s ease;
}
.right-set .color button.li:nth-child(1){
  background: #222;
}
.right-set .color button.li:nth-child(1):hover{
  border-color: #222;
}
.right-set .color button.li:nth-child(2){
  background: crimson;
}
.right-set .color button.li:nth-child(2):hover{
  border-color: crimson;
}

</style>

</head>
<body style = "background-color:#F2F2F2;">
  <div id  = "content"><!-- #content start -->
  <div class="container"><!-- container start -->

  <div class="col-md-12"><!-- col-md-6 start -->
  <ul class="breadcrumb" style = "background-color:#fff;"><!-- breadcrumb start -->
  <li><a href="index.php">Home</a></li>
  <li>Shop</li>
  </ul><!-- breadcrumb Finish -->
  </div><!-- col-md-6 Finish -->

  <div class = "col-md-3"><?php include("sidebar.php"); ?></div>
           
  <div class="col-md-9"><!-- col-md-9 Begin -->
  <?php        
    if(!isset($_GET['p_cat'])){
    if(!isset($_GET['cat'])){ ?>
    <div class='box'> <!-- box Begin -->
    <h1>Shop</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut.</p>
    </div> <!-- box Finish -->
  <?php }} ?><br><br>
               
  <div class="row"><!-- row Begin -->
   <?php 
    if(!isset($_GET['p_cat'])){
    if(!isset($_GET['cat'])){
    $per_page=9; 
    if(isset($_GET['page']))
      $page = $_GET['page'];
    else
      $page=1;

    $start_from = ($page-1) * $per_page;
    $get_products = "SELECT * FROM product ORDER BY 1 DESC LIMIT $start_from,$per_page";
    $run_products = mysqli_query($conn,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){
      $pro_id = $row_products['product_id'];
      $pro_title = $row_products['product_title'];
      $pro_price = $row_products['product_price'];
      $pro_img1 = $row_products['product_img1'];
      $pro_img2 = $row_products['product_img2'];
      $pro_descount = $row_products['discount'];
      $pro_stock = $row_products['stock'];
      $noDis = ($pro_price * $pro_descount)/100;
      $noDis = $pro_price - $noDis;
      echo "
        <div class='col-md-4 col-sm-6 center-responsive'>
        <div class='products' style = 'height: 470px'>
        <div class = 'left-set'>
        <a href='details.php?pro_id=$pro_id'>
        <img class='imgBox' src='admin_area/product_images/$pro_img1'>
        </a>
        </div>
        
        <div class='text'>
        <h3><a href='details.php?pro_id=$pro_id'> $pro_title </a></h3>
        <p class='price'>
        <label style = 'font-weight: 800'>Rs. $noDis/-</label> (<label style = 'font-weight: 100'><strike style = 'color:red'>Rs.$pro_price</strike></label>) ($pro_descount% <label style = 'color: red'>OFF</label>)
        </p>

        <p class='buttons'>
        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>View Details</a>
        <a class='btn btn-primary bttn' href='details.php?pro_id=$pro_id'>
        <i class='fa fa-shopping-cart'></i> Add To Cart</a>
        </p>

        <p style = 'font-weight: 600; color: #2E9AFE'>Only <b>$pro_stock</b> item in stock. Order Soon.</p>
        </div></div></div>";
      } ?>
  </div><!-- row Finish -->

  <center>
    <ul class="pagination"><!-- pagination Begin -->
		<?php
      $query = "SELECT * FROM product";
      $result = mysqli_query($conn,$query);
      $total_records = mysqli_num_rows($result);
      $total_pages = ceil($total_records / $per_page);
      echo "<li><a href='shop.php?page=1'> ".'First Page'." </a></li>";
      for($i=1; $i<=$total_pages; $i++){
        echo "<li><a href='shop.php?page=".$i."'> ".$i." </a></li>";                    
    };
    
    echo "<li><a href='shop.php?page=$total_pages'> ".'Last Page'." </a></li>";
    }}?>                  
  </ul><!-- pagination Finish -->
  </center>

              
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   
    
  <?php
     include("footer.php");
     ?>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script type="text/javascript">
    $("button.li:nth-child(1)").click(function(){
      $(".left-set img:nth-child(2)").animate({
        opacity:1
      });
    });
    $("button.li:nth-child(2)").click(function(){
      $(".left-set img:nth-child(2)").animate({
        opacity:0
      });
  });
  </script>

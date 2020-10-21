<?php
	$conn = mysqli_connect('localhost','root','','ecom_db');

	$get_products = "SELECT * FROM product WHERE product_id = '107' ";
                             
        $run_products = mysqli_query($conn,$get_products);
                             
        while($row_products=mysqli_fetch_array($run_products)){
                                
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];

        $pro_price = $row_products['product_price'];

        $pro_cat = $row_products['product_catagories'];

        $pro_desc = $row_products['product_desc'];

        $pro_img1 = $row_products['product_img1'];

        $pro_img2 = $row_products['product_img2'];

        $pro_img3 = $row_products['product_img3'];

                                
       ?>


<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../colorChanger/tshirtSlider.css">
</head>
<body>
	
	<div class="main">
	<div class="container">
		<ul class="thumb">
			<li><a href =../admin_area/product_images/<?php echo $pro_img1 ?> target = "imgBox"><img src='../admin_area/product_images/<?php  echo $pro_img1; ?>' height = "70" width = "70" style = 'color:red'></a></li>

			<li><a href =../admin_area/product_images/<?php echo $pro_img2 ?> target = "imgBox"><img src='../admin_area/product_images/<?php  echo $pro_img2; ?>' height = "70" width = "70"></a></li>

			<li><a href =../admin_area/product_images/<?php echo $pro_img3 ?> target = "imgBox"><img src='../admin_area/product_images/<?php  echo $pro_img3; ?>' height = "70" width = "70"></a></li>
		</ul>
		<div class="imgBox">
			<img src=../admin_area/product_images/<?php echo $pro_img1; ?> height = "400" width = "350"></div>
        </div>

		
		
	     <div class="right-set" style = "height: 360px;">
			<div class="name"><?php echo $pro_title; ?></div>
			<div class="subname"><?php echo $pro_cat; ?></div>
			<div class="price">Rs.<?php echo $pro_price; ?> /-</div>
			<div class="description">
				<p><?php echo $pro_desc; ?></p>
			</div>
			<button  style = "margin-top: 100px;">ADD TO CART</button>
		   </div>
		   </div>


		<?php } ?>
		
	<script type="text/javascript">
		$(document).ready(function(){
			$('.thumb a').mouseover(function(e){
				e.preventDefault();
				$('.imgBox img').attr("src",$(this).attr("href"));
			})
		})
	</script>
</body>
</html>
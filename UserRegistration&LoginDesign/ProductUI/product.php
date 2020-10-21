	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php 
	$conn = mysqli_connect('localhost','root','','ecom_db');

	$query = "SELECT * FROM product WHERE product_catagories = 'T-Shirt' LIMIT 4";
	$run_query = mysqli_query($conn,$query);
	while($row = mysqli_fetch_array($run_query)){
		$image = $row['product_img1'];
		$title = $row['product_title'];
		$price = $row['product_price'];
    ?>

	<div style = 'margin-left: 15px'></div>
	<div class="card">
		<div class="price-corner"></div>
		<div class="hot-corner">HOT</div>

		<div class="img-wrapper">
			<img src="tshirt.jpg">
		</div>
		<div class="content-wrapper">
			<h3 class="title"><?php echo $title; ?></h3>
			<p class="price">Rs.<?php echo $price; ?>/-</p>
			<img src = '../ShoppingSite/admin_area/product_images/<?php echo $image; ?>'>

			<div class="inner-content-wrapper">
				<p class="sizes">SIZE : 
					<span class="active">S</span> | 
					<span>M</span> | 
					<span class="active">L</span> | 
					<span>XL</span>
				</p>
				<p class="colors">
					<span class="color color1"></span>
					<span class="color color2"></span>
					<span class="color color3"></span>
					<span class="color color4"></span>

					<div class="icons">
					<span class="icon icon1"><i class = 'fa fa-globe'></i></span>
					<span class="icon icon2"><i class = 'fa fa-cart-plus'></i></span>
					<span class="icon icon3"><i class = 'fa fa-heart'></i></span>
					</div>
				</p>
			</div>
		</div>
	</div>

	<?php } ?>

</body>
</html>

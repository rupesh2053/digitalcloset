<?php include "../db.php";?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="bag.css">
	<link rel="stylesheet" type="text/css" href="https://fonts/googleapis.com/css?family=Roboto">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <!-- Latest compiled JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body style = "background-color: pink">


	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

	
	<?php
	$conn = mysqli_connect('localhost','root','','ecom_db');

	$get_products = "SELECT * FROM product ";
                             
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
    <div class='col-md-4 col-sm-6' style = "margin-left: 150px;">
	<div class="single-item" style = "background: #fff">
		<div class="left-set">
		
			<img src="../admin_area/product_images/<?php echo $pro_img1 ?>">
			<img src="../admin_area/product_images/<?php echo $pro_img2 ?>">
			</div>
		<div class="right-set">
			<div class="name"><?php echo $pro_title; ?></div>
			<div class="price" style = " color: red">Rs.<?php echo $pro_price; ?> /-</div>
			<div class="description">
				<p><?php echo $pro_desc; ?></p>
			</div>
			<div class="color">
				<button class="li"></button>
				<button class="li"></button>
			</div>
			<?php  
			echo "<p class='button'>
                   <a class = 'btn btn-primary' href='../details.php?pro_id=$pro_id'>
					
             		<i class='fa fa-shopping-cart' style = 'color: red'></i> ADD TO CART
                  </a>
            </p>
            ";
           ?>
		</div>
	</div>
</div>

	<?php }  ?>

	


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


</body>
</html>

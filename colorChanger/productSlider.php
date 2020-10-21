
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="ProductSliderStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
	<div class="main">
	<div class="imgSection">

		<img src="green.png" class = "headphone h1">
		<img src="white.png" class = "headphone h2">
		<img src="orange.png" class = "headphone h3">


		<img src="jblLogo.png" class = "logo">
	</div>
	<div class="infoSection">

		<div class="product1">
			<div class="productName">CURSHER WIRELESS</div>
			<div class="productNo">56CRW</div>
			<div class="price">Rs.1479.99/-</div>
			<div class="productColor">FIND YOUR COLOR</div>
			<div class="colors">
				<div class="c1"></div>
				<div class="c2"></div>
				<div class="c3"></div>

			</div>
			<div class="line"></div>
			<div class="rate">4.7 / 5.0</div>
			<div class="productRate">RATE</div>
			<div class="addToCart">ADD TO CART</div>
		</div>

		<div class="product2">
			<div class="productName">HESH-2 WIRELESS</div>
			<div class="productNo">71Y4</div>
			<div class="price">Rs.1779.99/-</div>
			<div class="productColor">FIND YOUR COLOR</div>
			<div class="colors">
				<div class="c1"></div>
				<div class="c2"></div>
				<div class="c3"></div>

			</div>
			<div class="line"></div>
			<div class="rate">4.5 / 5.0</div>
			<div class="productRate">RATE</div>
			<div class="addToCart">ADD TO CART</div>
		</div>

		<div class="product3">
			<div class="productName">UPROAR WIRELESS</div>
			<div class="productNo">K590</div>
			<div class="price">Rs.2178.99/-</div>
			<div class="productColor">FIND YOUR COLOR</div>
			<div class="colors">
				<div class="c1"></div>
				<div class="c2"></div>
				<div class="c3"></div>

			</div>
			<div class="line"></div>
			<div class="rate">4.8 / 5.0</div>
			<div class="productRate">RATE</div>
			<div class="addToCart">ADD TO CART</div>
		</div>



	</div>
	<div class="next">&#8594;</div>
	<div class="pre">&#8592;</div>


	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			counter = 2;

			$(".next").click(function(){
				if(counter == 1){
					$(".product1").fadeOut(500);
					$(".product2").fadeIn(500);
					$(".h1").animate({top:"-30%"});
					$(".h2").animate({top:"50%"});
					counter = 2;
				} else if(counter == 2){
					$(".product2").fadeOut(500);
					$(".product3").fadeIn(500);
					$(".h2").animate({top:"-30%"});
					$(".h3").animate({top:"50%"});
					counter = 3;
				} 
				 
			});

			$(".pre").click(function(){
				if(counter == 2)
				{
					$(".product1").fadeOut(500);
					$(".product2").fadeIn(500);
					$(".h1").animate({top:"50%"});
					$(".h2").animate({top:"130%"});
					counter = 1;
				}
				 else if(counter == 3)
				{
					$(".product3").fadeOut(500);
					$(".product1").fadeIn(500);
					$(".h2").animate({top:"50%"});
					$(".h3").animate({top:"130%"});
					counter = 2;
				}
			});
		});

	</script>


	

</body>
</html>
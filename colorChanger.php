<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<title>Product color changer</title>
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="colorChangerStyle.css">
	<meta name = "robots" content = "noindex,follow">

</head>
<body>


	<main class = "container">
	<!-- LeftColumn / Headphones Images -->
	<div class="left-column">
		<img data-image = "black" src="colorChanger/black.jpg" alt = "">
		<img data-image = "pink" src="colorChanger/pink.png" style = "height: 500px; width: 400px; margin-left: 30px">

		<img data-image = "blue" src="colorChanger/blue.jpg" alt = "">
		<img data-image = "yellow" src="colorChanger/yellow.jpg" alt = "" style = "height: 500px; width: 450px">
		<img data-image = "green" src="colorChanger/green.png" style = "width: 90%">
		<img data-image = "orange" src="colorChanger/orange.png">

		<img data-image = "purple" src="colorChanger/purple1.png" alt = "">
		<img data-image = "red" class = "active" src="colorChanger/red.jpg" alt = "">
	</div>

	<div class="right-column">
		<div class="product-description">
			<!-- <span>Headphones</span> -->
			<h1>BEATS SOLO EP</h1>
			<p>New : A brand-new, unused and unchanged item. See the seller's listing for full details. Sturdy headband and on-ear cushions suitable for live performance</p>
		</div>
		<div class="product-configuration">
			
			<div class="product-color">
				<span>Select color</span>

				<div class="color-choose">
					<div>
						<input type="radio" name="color" data-image = "red" id = "red" value = "red" checked>
						<label for = "red"><span></span></label>
					</div>
					<div>
						<input data-image = "blue" type="radio" name="color" id = "blue" value = "blue">
						<label for = "blue"><span></span></label>
					</div>
					<div>
						<input data-image = "black" type="radio" name="color" id = "black" value = "black">
						<label for = "black"><span></span></label>
					</div>
					<div>
						<input data-image = "pink" type="radio" name="color" id = "pink" value = "pink">
						<label for = "pink"><span></span></label>
					</div> 
					<div>
						<input data-image = "yellow" type="radio" name="color" id = "yellow" value = "yellow">
						<label for = "yellow"><span></span></label>
					</div>
					<div>
						<input data-image = "purple" type="radio" name="color" id = "purple" value = "purple">
						<label for = "purple"><span></span></label>
					</div>
					<div>
						<input data-image = "green" type="radio" name="color" id = "green" value = "green">
						<label for = "green"><span></span></label>
					</div>
					<div>
						<input data-image = "orange" type="radio" name="color" id = "orange" value = "orange">
						<label for = "orange"><span></span></label>
					</div>
				</div>
			</div>

			<!-- Cable Configuration -->
			<div class="cable-choose">
				<button>Straight</button>
				<button>Coiled</button>
				<button>Long-coiled</button>
			</div>
		</div>
	

	<!-- Product Pricing -->
	<div class="product-price">
		<span>Rs.4344/- </span>
	
	<div class = "cart-btn"><a href="#">Add to cart</a></div>
	</div>
	</div>

	</main>

	<!-- script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
	
	    $('.color-choose input').on('click', function(){
		var headphonesColor = $(this).attr('data-image');

		$('.active').removeClass('active');
		$('.left-column img[data-image =' +headphonesColor+ ']').addClass('active');
		$(this).addClass('active');

	});
});
	</script>

</body>
</html>
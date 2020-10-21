<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="t-shirtStyle.css">
</head>
<body>
	<div class="card">
		<div class="top-section">
			<img id = "image-container" src="redBag.png" height = '300px' width = '300px'>
			<div class="nav">
				<img onclick="change_img(this)" src="redBag.png" style = 'margin-left: 40px'>
				<img onclick="change_img(this)" src="blackBag.png">
				<img onclick="change_img(this)" src="blueBag.png">
			</div>
		</div>
		<div class="product_info">
			<div class="name">Nike kid's school bagpack</div>
			<div class="Price">Rs.4000/-</div>
			<div class="Description"></div>
		</div>
		<a href="#" class = 'btn'> Add to cart</a>
	</div>


	<script type="text/javascript">
		var container = document.getElementById('image-container');
		function change_img(image){
			container.src = image.src;

		}
	</script>


</body>
</html>
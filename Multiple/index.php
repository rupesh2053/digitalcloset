<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<!--<link rel="stylesheet" type="text/css" href="bootstrap-337.min.css">-->


     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>
<body>
	<br><br>
	<div class="container">
		<div class="card">
		<br>
		<h2 align = "center">Multiple data can be insert</h2>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered" id = "crud_table"   style = "box-shadow: 2px 2px 5px 3px rgba(0,0,0,0.5)">
			<tr>
				<th width = "10%">Item Name</th>
				<th width = "10%">Item Keywords</th>
				<th width = "20%">Description</th>
				<th width = "10%">Price</th>
				<th width = "10%">Image</th>
				<th width = "10%">P-Cat_id</th>
				<th width = "10%">Cat_Id</th>
				<th width = "5%"></th>
			</tr>
			<tr>
				<td contenteditable="true" class = "product_title"></td>
				<td contenteditable="true" class = "product_keywords"></td>
				<td contenteditable="true" class = "product_desc"></td>
				<td contenteditable="true" class = "product_price"></td>
				<td contenteditable="true" class = "product_image"></td>
				<td contenteditable="true" class = "product_catagories"></td>
				<td contenteditable="true" class = "catagories"></td>

				<td></td>
			</tr>
				
			</table>
			<div align="right">
				<button type = "button" name = "add" id = "add" class = "btn btn-success btn-xs">+</button>
			</div>
			<div align="center">
				<button type = "button" name = "save" id = "save" class = "btn btn-info btn-xs">Save</button> 
			
			</div>
			<br>
			<div id="inserted_item_data"></div>

		</div>
		</div>
	</div><!--Container end -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
	

<script >
	$(document).ready(function(){
		 var count = 1;
		$('#add').click(function(){
			count = count + 1;
			var html_code = "<tr id = 'row"+count+"'>";
		    html_code += "<td contenteditable = 'true' class = 'product_name'></td>";
		    html_code += "<td contenteditable = 'true' class = 'product_keyword'></td>";
		    html_code += "<td contenteditable = 'true' class = 'product_desc'></td>";
		    html_code += "<td contenteditable = 'true' class = 'product_price'></td>";
		    html_code += "<td contenteditable = 'true' class = 'product_image'></td>";
		    html_code += "<td contenteditable = 'true' class = 'product_catagories'></td>";
		    html_code += "<td contenteditable = 'true' class = 'catagories'></td>";

		    html_code += "<td><button type = 'button' name = 'remove' data-row = 'row"+count+"'class = 'btn btn-danger btn-xs remove'>-</button></td>";
		    html_code += "</tr>";
		    $('#crud_table').append(html_code);
		}); 
		$(document).on('click','.remove',function(){
			var delete_row = $(this).data("row");
			$('#'+delete_row).remove();
		});

		//$('#save').click(function()
		$(document).on('click','#save',function(){
			var product_name = [];
			var product_keyword = [];
			var product_desc = [];
			var product_price = [];
			var product_image = [];
			var product_catagories = [];
			var catagories = [];

			$('.product_name').each(function(){
				product_name.push($(this).text());
			});

			$('.product_keyword').each(function(){
				product_keyword.push($(this).text());
			});

			$('.product_desc').each(function(){
				product_desc.push($(this).text());
			});

			$('.product_price').each(function(){
				product_price.push($(this).text());
			});

			$('.product_image').each(function(){
				product_image.push($(this).text());
			});

			$('.product_catagories').each(function(){
				product_catagories.push($(this).text());
			});

			$('.catagories').each(function(){
				catagories.push($(this).text());
			});

			$.ajax({
				url:"insert.php",
				method:"POST",
				data:{product_name:product_name, product_keyword:product_keyword,product_desc:product_desc,product_price:product_price,product_image:product_image,product_catagories:product_catagories,catagories:catagories},
				success:function(data){
					$("td[contenteditable='true]").text("");
					for(var i=2;i<=count;i++){
						$('tr#'+i+'').remove();
					}
					fetch_item_data();
				}
			});
		});


	
	function fetch_item_data()
	{
		$.ajax({
			url: "fetch.php",
			method:"POST",
			success:function(data)
			{
				$('#inserted_item_data').html(data);
			}
		});
	}
	fetch_item_data();
});
</script>

</body>
</html>
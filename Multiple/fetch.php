<?php 
		$connect = mysqli_connect("localhost","root","","ecom_db");
		$output = '';
		$query = "SELECT * FROM product ORDER BY product_id ASC";
		$result = mysqli_query($connect,$query);
		$output .= '
		<br>
		<h3 align="center">Item Data</h3>
		<table class = "table table-bordered table-striped"  style = "box-shadow: 2px 2px 5px 3px rgba(0,0,0,0.5)">
		<tr>
			<th width="20%">Product Name</th>
			<th width="20%">Product Keyword</th>
			<th width="20%">Description</th>
			<th width="20%">Image</th>
			<th width="10%">Price</th>
			<th width="5%">Product Catagories</th>
			<th width="5%">Catagories</th>
		</tr>
		';

		while($row = mysqli_fetch_array($result))
		{
			$output .= '
			<tr>
				<td>'.$row["product_title"].'</td>
				<td>'.$row["product_keywords"].'</td>
				<td>'.$row["product_desc"].'</td>
				<td>'.$row["product_img1"].'</td>
				<td>'.$row["product_price"].'</td>
				<td>'.$row["product_catagories"].'</td>
				<td>'.$row["catagories"].'</td>
			</tr>
			';
		}

		$output .= '</table>';
		 echo $output;

 ?>
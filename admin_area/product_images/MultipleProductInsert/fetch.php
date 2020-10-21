<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "ecom_db");
$output = '';
$query = "SELECT * FROM product ORDER BY product_id DESC LIMIT 10";
$result = mysqli_query($connect, $query);
$output = '
<br />
<h3 align="center">Item Data</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="20%">Product Name</th>
  <th width="10%">Product price</th>
  <th width="10%">Catagories</th>
  <th width="10%">Product catagories</th>
  <th width="10%">Product date</th>
  <th width="5%">Product Discount</th>
  <th width="5%">Product Stock</th>
  <th width="5%">Product Status</th>

 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["product_title"].'</td>
  <td><b>Rs.'.$row["product_price"].'/-</b></td>
  <td>'.$row["catagories"].'</td>
  <td>'.$row["product_catagories"].'</td>
  <td>'.$row["product_date"].'</td>
  <td>'.$row["discount"].'%</td>
  <td>'.$row["stock"].' item(s)</td>
  <td>'.$row["product_status"].'</td>


 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>
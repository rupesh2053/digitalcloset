<?php 
$connect = mysqli_connect("localhost","root","","ecom_db");
if(isset($_POST["save"]))
{

  $product_name = $_POST['product_name'];
  $product_code = $_POST['product_keyword'];
  $product_desc = $_POST['product_desc'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_catagories = $_POST['product_catagories'];
  $catagories = $_POST['catagories'];


  $query = '';
  for($count = 0;$count<count($product_name); $count++){
  	$product_name_clean = mysqli_real_escape_string($connect, $product_name[$count]);
  	$product_keyword_clean = mysqli_real_escape_string($connect, $product_keyword[$count]);
    $product_desc_clean = mysqli_real_escape_string($connect, $product_desc[$count]);
  	$product_price_clean = mysqli_real_escape_string($connect, $product_price[$count]);
    $product_image_clean = mysqli_real_escape_string($connect, $product_image[$count]);
    $product_pid_clean = mysqli_real_escape_string($connect, $product_catagories[$count]);
    $product_cid_clean = mysqli_real_escape_string($connect, $catagories[$count]);

  	if($product_name_clean != '' && $product_keyword_clean != '' && $product_desc_clean != '' && $product_price_clean != '' && $product_image_clean != '' && $product_pid_clean != '' && $product_cid_clean != '')
  	{
  		$query .= '
  		INSERT INTO product(product_title,product_keyword,product_desc, product_price, product_img1,product_catagories,catagories) VALUES("'.$product_name_clean.'","'.$product_keyword_clean.'","'.$product_desc_clean.'","'.$product_price_clean.'","'.$product_image_clean.'","'.$product_pid_clean.'","'.$product_cid_clean.'");';
   	}
  }
  if($query != '')
  {
  	if(mysqli_multi_query($connect,$query))
  	{
  		echo "Item Data Inserted";
  	}
  	else
  	{
  		echo 'ERROR';
  	}
  }
   else
  {
  	echo "All Field are Required";

  }


 }
 ?>

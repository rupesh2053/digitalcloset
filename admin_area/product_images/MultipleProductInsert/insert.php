
<?php
//insert.php
$error = [];
$connect = mysqli_connect("localhost", "root", "", "ecom_db");
if(isset($_POST["item_name"]))
{
 $item_name = $_POST["item_name"];
 $item_code = $_POST["item_code"];
 $item_desc = $_POST["item_desc"];
 $item_price = $_POST["item_price"];
 $item_catagories = $_POST["item_catagories"];
 $catagories = $_POST["catagories"];

 $query = '';
 for($count = 0; $count<count($item_name); $count++)
 {
  $item_name_clean = mysqli_real_escape_string($connect, $item_name[$count]);
  $item_code_clean = mysqli_real_escape_string($connect, $item_code[$count]);
  $item_desc_clean = mysqli_real_escape_string($connect, $item_desc[$count]);
  $item_price_clean = mysqli_real_escape_string($connect, $item_price[$count]);
  $item_catagories_clean = mysqli_real_escape_string($connect, $item_catagories[$count]);
  $catagories_clean = mysqli_real_escape_string($connect, $catagories[$count]);

  if($item_name_clean != '' && $item_code_clean != '' && $item_desc_clean != '' && $item_price_clean != '')
  {
   $query .= '
   INSERT INTO product(product_title, product_keywords, product_desc, product_price,product_catagories,catagories) 
   VALUES("'.$item_name_clean.'", "'.$item_code_clean.'", "'.$item_desc_clean.'", "'.$item_price_clean.'", "'.$item_catagories_clean.'", "'.$catagories_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>

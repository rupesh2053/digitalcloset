
<?php

include('database_connection.php');

if(isset($_POST["action"]))
{
 $query = "SELECT * FROM product WHERE product_status = '1'";
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .=" AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'";
 }
 if(isset($_POST["product_catagories"]))
 {
  $brand_filter = implode("','", $_POST["product_catagories"]);
  $query .=" AND product_catagories IN('".$brand_filter."')";
 }
 if(isset($_POST["catagories"]))
 {
  $ram_filter = implode("','", $_POST["catagories"]);
  $query .=" AND catagories IN('".$ram_filter."')";
 }

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="col-sm-2 col-lg-4 col-md-4">
    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:380px;">
     <img src="../'. $row['product_img1'] .'" alt="" style = "height: 200px; width: 227px; margin-bottom: 10px; justify-content: center" >
     <p align="center"><strong><a href="#">'. $row['product_title'] .'</a></strong></p>
     <h3 style="text-align:center;" class="text-danger" >Rs. '. $row['product_price'] .'/-</h3>
     <h4 style="text-align:center;" class="text-danger" >'. $row['product_catagories'] .'</h4>
     <h4 style="text-align:center;" class="text-danger" >'. $row['catagories'] .'</h4>
    </div>

   </div>
   ';
  }
 }
 else
 {
  $output = '<p align = "center" class = "alert-danger" style = "padding: 10px; font-size: 18px; font-weight: 600">No data found !!</p>';
 }
 echo $output;
}

?>

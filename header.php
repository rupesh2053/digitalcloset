<?php 
session_start();
include("db.php");
include("functions/function.php");
include ("functions/functions.php");
?>


<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from product where product_id='$product_id'";
    
    $run_product = mysqli_query($conn,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];

    $p_cat_title = $row_product['product_catagories'];
     
}

?>
<?php include "styles/bootstrap.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>


   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                <?php 
               if(!isset($_SESSION['customer_email'])){
                echo "Welcome: Guest";

               }else{
                echo "Welcome: ".$_SESSION['customer_email']."";
               }
                ?></a>

                
 
                    <?php  
                       $ip_add = getRealIpUser();
                       $select_cart = "SELECT * from cart where p_add='$ip_add'";
                       $run_cart = mysqli_query($conn,$select_cart);
                       $count = mysqli_num_rows($run_cart);
                      ?>
                   <span><?php echo $count;  ?> item(s) in your cart</span>


               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu" style = "font-size: 13px; font-weight: 600;"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="customer_register.php">Register</a>
                   </li>
                   <li>
                       <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href="cart.php">Go To Cart</a>
                   </li>
                    <li>
                       <a href="checkout.php">
                           
                          <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                              echo "<a href='checkout.php'> Login </a>";

                              }else{

                               echo " <a href='logout.php'> Log Out </a> ";

                             }
                           
                           ?>  
                           
                       </a>
                   </li>
                  
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->

     
   
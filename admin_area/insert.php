<?php 

  $conn = mysqli_connect("localhost","root","","ecom_db") or die("error in connection");

    
    $product_title = mysqli_real_escape_string($conn,$_POST['product_title']);
    $product_price = mysqli_real_escape_string($conn,$_POST['product_price']);
    $product_cat = mysqli_real_escape_string($conn,$_POST['product_cat']);
    $cat = mysqli_real_escape_string($conn,$_POST['cat']);
    $discount = mysqli_real_escape_string($conn,$_POST['discount']);
    $stock = mysqli_real_escape_string($conn,$_POST['stock']);


    $product_img1 = mysqli_real_escape_string($conn,$_FILES['product_img1']['name']);
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    move_uploaded_file($temp_name1,"product_images/$product_img1");

    $product_img2 = mysqli_real_escape_string($conn,$_FILES['product_img2']['name']);
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    move_uploaded_file($temp_name2,"product_images/$product_img2");

    $product_img3 = mysqli_real_escape_string($conn,$_FILES['product_img3']['name']);
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    move_uploaded_file($temp_name3,"product_images/$product_img3");

    $product_keywords = mysqli_real_escape_string($conn,$_POST['product_keywords']);
    $product_desc = mysqli_real_escape_string($conn,$_POST['product_desc']);

    $discountPrice = ($product_price * $discount)/100;
    $no_discount = $product_price - $discountPrice;

 
    $query = "INSERT INTO product (product_title,product_price,product_catagories,catagories,product_img1,product_img2,product_img3,product_keywords,product_desc,product_date,discount,stock,no_discount) VALUES ('$product_title','$product_price','$product_cat','$cat','$product_img1','$product_img2','$product_img3','$product_keywords','$product_desc',NOW(),'$discount','$stock','$no_discount')";
    
    $result = mysqli_query($conn,$query);
    
    if($result){
     echo "<script>alert('Data has been successfully inserted.');</script>";
     echo "<script>window.open('index.php?view_products','_self')</script>";
    }else{
     echo "<script>alert('Some error occor while data inserting.');</script>";

    }
 
?>
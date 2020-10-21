<?php 
include "function.php"; 

  $conn = mysqli_connect("localhost","root","","ecom_db") or die("error in connection");

    
    $customer_fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $customer_lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $customer_email = mysqli_real_escape_string($conn,$_POST['email']);
    $customer_password = md5(mysqli_real_escape_string($conn,$_POST['password']));
    $customer_country = mysqli_real_escape_string($conn,$_POST['country']);
    $customer_city = mysqli_real_escape_string($conn,$_POST['city']);
    $customer_contact = mysqli_real_escape_string($conn,$_POST['contact']);
    $customer_address = mysqli_real_escape_string($conn,$_POST['address']);

    $customer_profile = mysqli_real_escape_string($conn,$_FILES['customer_profile']['name']);
    $temp_name = $_FILES['customer_profile']['tmp_name'];
     $c_ip = getRealIpUser();

    move_uploaded_file($temp_name,"customer_profiles/$customer_profile");
   
   
    $query = "INSERT INTO tblcustomer(customer_fname,customer_lname,customer_email,customer_password,customer_country,customer_city,customer_contact,customer_address,customer_profile,customer_ip) VALUES('$customer_fname','$customer_lname','$customer_email','$customer_password','$customer_country','$customer_city','$customer_contact','$customer_address','$customer_profile','$c_ip')";
    
    $run_customer = mysqli_query($conn,$query);
    $sel_cart = "SELECT * FROM cart WHERE p_add = '$c_ip'";
    $run_cart = mysqli_query($conn,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if($check_cart)
    {
      $_SESSION['customer_email'] = $customer_email;
      echo "<script>alert('You have been register successfully');</script>";
      echo "<script>window.open('..\login.php','_self')</script>";
    }else{

      $_SESSION['customer_email'] = $customer_email;
      echo "<script>alert('You have been register successfully');</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    
   
 
?>
<?php 
$conn = mysqli_connect("localhost","root","","ecom_db");

$email = $_POST['email'];
$password = $_POST['password'];

$email = stripcslashes($email);
$password = stripcslashes($password);

$emil = mysqli_real_escape_string($conn,$email);
$password = mysqli_real_escape_string($conn,$password);

 $query = "SELECT * FROM tblcustomer WHERE customer_email = '$email' AND customer_password = '$password'" or die("Fsiled to query database".mysql_error());
 $result = mysqli_query($conn,$query);
 $row = mysqli_fetch_array($result);
 if(($row['customer_email'] == $email) && ($row['customer_password'] == $password))
 {
 	echo "<script>window.open('welcome.php','_self')</script>";
 }
 		
 else
 {
    echo "<script>alert('Login failed');</script>";
 	echo "<script>window.open('loginDesign.php','_self')</script>";
 }

 ?>
<?php 
if(isset($_GET['token'])){
	//Process Verification
	$token = $_GET['token'];
	//connect to database
  $mysqli = NEW mysqli('localhost','root','','ecom_db');
  $resultSet = $mysqli->query("SELECT verify_key,verified FROM tbl_customer WHERE verified = 'not verified' AND verify_key = '$token' LIMIT 1");

    if($resultSet->num_rows == 1){
  	//validate the email
  	$update = $mysqli->query("UPDATE tbl_customer SET verified = 'Verified' WHERE verify_key = '$token' LIMIT 1");
  	if($update){
  		echo "Your account has been verified. You may now login.";
      echo "<script>window.open('index.php','_self');</script>";
  	}else{
  		echo $mysqli->error;
  	}
  } 
}else{
      echo "Your account has already been verified.";
	
 }


?>
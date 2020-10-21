<?php 
if(isset($_GET['vkey'])){
	//Process Verification
	$vkey = $_GET['vkey'];
	//connect to database
  $mysqli = NEW mysqli('localhost','root','','test');
  $resultSet = $mysqli->query("SELECT vkey,verified FROM accounts WHERE verified = '0' AND vkey = '$vkey' LIMIT 1");

    if($resultSet->num_rows == 1){
  	//validate the email
  	$update = $mysqli->query("UPDATE accounts SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
  	if($update){
  		echo "Your account has been verified. You may now login.";
  	}else{
  		echo $mysqli->error;
  	}
  } 
}else{
	die("Something went wrong");
 }


?>
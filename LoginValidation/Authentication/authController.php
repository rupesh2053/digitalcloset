<?php 
session_start();
require 'db.php';

$error = array();
$username = "";
$email = "";

//if user click on sign up button
if(isset($_POST['signup-btn'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordConf = $_POST['passwordConf'];

	//validation
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$error['email'] = "Email address is invalid";
	}
	if(empty($username)){
		$error['username'] = "Username required";
	}
	if(empty($email)){
		$error['email'] = "Email required";
	}
	if(empty($password)){
		$error['password'] = "Password required";
	}
	if($password !== $passwordConf){
		$error['password'] = "Password do not matched!";
	}

	$emailQuery = "SELECT * FROM accounts WHERE email=? LIMIT 1";
	$stmt = $conn->prepare($emailQuery);
	$stmt->bind_param('s',$email);
	$stmt->execute();
	$result = $stmt->get_result();
	$userCount = $result->num_rows;
	$stmt->close();
	if($userCount>0){
		$error['email'] = "Email already exists";
	}

	if(count($error) === 0){
		$password = password_hash($password, PASSWORD_DEFAULT);
		$token = md5(bin2hex(random_bytes(50)));
		$verified = false;

		$sql = "INSERT INTO accounts (username, password, email, verified, vkey, createdate) VALUES(?,?,?,?,?,NOW())";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param('sssbs',$username,$password,$email,$verified,$token);
		if($stmt->execute()){
			//login user
			$user_id = $conn->insert_id;
			$_SESSION['id'] = $user_id;
			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;
			$_SESSION['verified'] = $verified; 

			//email Conteoller code

				$base_url = "http://localhost/ShoppingSite/LoginValidation/Authentication/index.php";
			   $mail_body = "
			   <p>Hi ".$_POST['username'].",</p>
			   <p>Thanks for Registration. Your password is ".$password.", This password will work only after your email verification.</p>
			   <p>Please Open this link to verified your email address - ".$base_url."email_verification.php?activation_code=".$token."
			   <p>Best Regards,<br />Webslesson</p>
			   ";
			   require_once 'phpmailer/PHPMailerAutoload.php';
			   $mail = new PHPMailer;
			   $mail->isSMTP();
			   $mail->Host = 'smtp.gmail.com';
			   $mail->port = 465;
			   $mail->SMTPAuth = true;
			   $mail->Username = 'sharmarojan77@gmail.com';
			   $mail->Password = 'rojansharma123';     //Sets SMTP password
			   $mail->SMTPSecure = 'ssl';
			    
			   $mail->From = 'sharmarojan77@gmail.com';
			   $mail->FromName = 'DigitalCloset';
			   $mail->AddAddress($_POST['email'], $_POST['username']);   
			   $mail->WordWrap = 50;
			   $mail->IsHTML(true);   
			   $mail->Subject = 'Email Verification';
			   $mail->Body = $mail_body;
			   if($mail->Send())
			   {
				$_SESSION['message'] = "Your verification code is send to $email on $createdate!";
				$_SESSION['alert-class']='alert-success';
				header('location:index.php');
				exit(); 
			   }else {
			     $_SESSION['message'] = "Mailer Error: " . $mail->ErrorInfo;
			   }
		}else{
		$error['db_error'] = "Database error: failed to register";

		}
	}
}

//login page 
if(isset($_POST['login-btn'])){
  
	$email = $_POST['email'];
	$password = $_POST['password'];

	//validation
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$error['email'] = "Email address is invalid";
	}
	if(empty($email)){
		$error['email'] = "Email required";
	}
	if(empty($password)){
		$error['password'] = "Password required";
	}

	if(count($error) === 0){
	$sql = "SELECT * FROM accounts WHERE email=? OR username=? AND password=? LIMIT 1";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('sss',$email,$email,$password);
	$stmt->execute();
	$result = $stmt->get_result();
	$user = $result->fetch_assoc();
	
		$verified = $user['verified'];
		$createdate = $user['createdate'];
    	$createdate = strtotime($createdate);
    	$createdate = date('M d Y',$createdate);
		$email = $user['email'];

	    if($verified != 0){
		//login success
		$_SESSION['id'] = $user['id'];
		$_SESSION['username'] = $user['username'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['verified'] = $user['verified'];

		//set flash message
		$_SESSION['message'] = 'You are logged in!';
		$_SESSION['alert-class'] = 'alert-success';
		header('location: index.php');
		exit();

	   }elseif($verified == 0){

	    $error['login_fail'] = "Your are not yet been verified. Verification code is sent to $email on $createdate.";

	}
	elseif(!$result){
		   $error['login_fail'] = 'Wrong credentials';
	 }
  }  

}
//Logout code
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	unset($_SESSION['email']);
	unset($_SESSION['veriried']);
	header('location: login.php');
	exit();
}




 ?>
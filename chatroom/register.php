<?php
	include('conn.php');
	session_start();
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=check_input($_POST['username']);
		
		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
			$_SESSION['sign_msg'] = "Username should not contain space and special characters!"; 
			header('location: signup.php');
		}
		else{
			
		$fusername=$username;
		
		$password = check_input($_POST["password"]);
		$fpassword=md5($password);
		$fname = check_input($_POST["name"]);
		$email = check_input($_POST["email"]);

		
		mysqli_query($conn,"INSERT INTO `user` (uname, username, password, access) VALUES ('$fname', '$fusername', '$fpassword', '2')");
		
		$_SESSION['msg'] = "Sign up successful. You may login now!"; 
		header('location: index.php');
		}
	}
?>
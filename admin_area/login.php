<?php 
session_start();
include "db.php";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

<style type="text/css">
		body{
	padding-top: 10%;
	background-color: lightseagreen; 
}
.form-login{
	max-width: 350px;
	padding: 40px;
	border: 3px #286290;
	border-radius: 20px;
	background: #e9e9e9;
	margin: 0 auto;
	box-shadow: rgba(0,0,0,0.7) 13px 13px 10px;
}
.form-login .form-login-heading{
	color: #286290;
	text-align: center;
}
.form-login .form-control{
	position: relative;
	height: auto;
	box-sizing: border-box;
	padding: 10px;
	font-size: 16px;

}
.form-login input(type="email"){
	margin-bottom: 5px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 0px;
}

.form-login input(type="password"){
	margin-bottom: 10px;
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
}
	</style>
</head>
<body>
	

	<div class="container">
		<form class="form-login" method = "post">
			<h2 class="form-login-heading">
				Admin Login
			</h2>
			<input type = "email" class="form-control" placeholder = "Email Address" name = "admin_email" required>
			<input type = "password" class = "form-control" placeholder = "Admin Password" name = "admin_pass" required>
			<BUTTON type = "submit" class = "btn btn-primary btn-block" name = "admin_login">
				Login
			</BUTTON>
				
			</input>
		</form>
	</div>

</body>
</html>

<?php 
	if(isset($_POST['admin_login'])){
		$admin_email = mysqli_real_escape_string($conn,$_POST['admin_email']);
		$admin_pass = mysqli_real_escape_string($conn,$_POST['admin_pass']);
		$get_admin = "SELECT * FROM admins WHERE admin_email = '$admin_email' AND admin_pass = '$admin_pass'";
		$run_admin = mysqli_query($conn,$get_admin);
		$count = mysqli_num_rows($run_admin);
		if($count == 1){
			$_SESSION['admin_email'] = $admin_email;
			echo "<script>alert('Logged In. Welcome Back');</script>"; 
			echo "<script>window.open('index.php?dashboard','_self');</script>";
		}else{
			echo "<script>alert('Sorry your email or password is wrong. Please try again!');</script>";
		}
	}
 ?>

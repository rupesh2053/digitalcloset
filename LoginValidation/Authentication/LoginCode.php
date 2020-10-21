
//login page 
if(isset($_POST['login-btn'])){
  
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = md5($password);

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

	   }if($verified == 0){

	    $error['login_fail'] = "Your are not yet been verified. Verification code is sent to $email on $createdate.";

	}
	else{
		   $error['login_fail'] = 'Wrong credentials';
	 }
  }  

}
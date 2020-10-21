<?php 
$error = NULL;

if(isset($_POST['submit'])){
  //Get all data
  $u = $_POST['u'];
  $p1 = $_POST['p1'];
  $p2 = $_POST['p2'];
  $e = $_POST['e'];


//connect to database
  $mysqli = NEW mysqli('localhost','root','','test');
  $get_email = "SELECT email FROM accounts WHERE email = '$e'";
  $run_email = mysqli_query($mysqli,$get_email);
  $count = mysqli_num_rows($run_email);

  if(strlen($u) == 0 || strlen($p1) == 0){
  $error = "<p>Username and password field must not be empty.</p>";

  }elseif(strlen($u) < 5){
  $error = "<p>Your username must be at least 5 characters</p>";
  }elseif(strlen($p1) < 8){
  $error = "<p>Your password must be at least 8 characters</p>";
  }elseif($p2 != $p1){
  $error .= "<p>Your password do not match</p>";
  }elseif($count){
    //validate the email
     $error = "<p>Oops! This email was already taken.</p>";

}

else{
  //sanitize form data
$u = $mysqli->real_escape_string($u);
$p1 = $mysqli->real_escape_string($p1);
$p2 = $mysqli->real_escape_string($p2);
$e = $mysqli->real_escape_string($e);

//Generate VKey
$vkey = md5(time().$u);

//inserting data to database
$p1 = md5($p1);

$insert = $mysqli->query("INSERT INTO accounts(username,password,email,vkey) VALUES('$u','$p1','$e','$vkey')");
if($insert){
include phpMailer\phpMailer\phpMailer;
include_once "phpMailer\phpMailer.php";
$mail = new phpMailer();
$mail->setFrom('hello@gmail.com');
$mail->addAddress($email,$name);
$mail->Subject = "Please verify email";
$mail->isHTML(true);
$mail->Body = "Please click on the link below:<br><br>
<a href="http:dulalrupak3232@gmail.com/PHPEmailConfirmation/verify.php?email=$e&vkey=$vkey">Confirm Here</a>
";

if($mail->send()){
  $error = "<p>Oops! Verification code send to $e.</p>";
}else{
  $error = "<p>Oops! Something wrong happen.</p>";
}
}

}
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>signup page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
​
<div class="container">
  <h2>Login form</h2>
  <form method = "post" action="">
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="u">
    </div>
    
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"placeholder="Enter password" name="p1">
    </div>
    <div class="form-group">
      <label for="pwd">Repeat Password:</label>
      <input type="password" class="form-control"placeholder="Enter password" name="p2">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="e">
    </div>
    <button type="submit" name = "submit" class="btn btn-info">Register</button>
  </form>
  <?php 
   echo $error;
   ?>
</div>

</body>
</html>


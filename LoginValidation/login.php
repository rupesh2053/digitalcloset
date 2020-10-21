
<?php 
$error = NULL;
if(isset($_POST['submit'])){
  //connect to database
  $mysqli = NEW mysqli('localhost','root','','test');

  //Get data From database
  $e = $mysqli->real_escape_string($_POST['e']);
  $p1 = $mysqli->real_escape_string($_POST['p1']);
  $p1 = md5($p1);

  //Query the databse
  $resultSet = $mysqli->query("SELECT * FROM accounts WHERE email = '$e' AND password = '$p1' LIMIT 1");
  if($resultSet->num_rows != 0){
    //process login
    $row = $resultSet->fetch_assoc();
    $verified = $row['verified'];
    $email = $row['email'];
    $date = $row['createdate'];
    $date = strtotime($date);
    $date = date('M d Y',$date);


    if($verified == 1)
    {
      //continue processing
    $error = "<b>Your account has been registered successfully and you have been logged in.<b>";

    }else{
    $error = "<b>This account has not been varified yet. An email was sent to $email on $date.<b>";


    }

  }else{
    //invalid credentials
    $error = "The username or password you entered is incorrect";

  }

}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>login page</title>
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
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="e">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="p1">
    </div>
    <button type="submit" name = "submit" class="btn btn-default">Login </button>
    <a href="signup.php"> Not signup yet?</a>

  </form>
  <center>
  <?php 
    echo $error;
 ?>
 </center>
</div>

</body>
</html>


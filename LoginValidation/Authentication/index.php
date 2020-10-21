<?php 
require_once 'authController.php';
if(!isset($_SESSION['id'])){
  header('location: login.php');
  exit();
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-4 offset-md-4" style = 'border: 2px solid; padding: 20px; border-radius: 5px'>
   
<?php if(isset($_SESSION['message'])): ?>
    <div class="alert <?php echo $_SESSION['alert-class']; ?>">
   <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    unset($_SESSION['alert-class']);
    ?>
    </div>
<?php endif; ?>
 

 <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>
 <a href="index.php?logout=1" class = "logout">logout</a>

<?php if(!$_SESSION['verified']): ?>
 <div class="alert alert-warning">
   You need to verify your account.
   Sign in to your email account and click on the verification link we just emailed you at 
   <strong><?php echo $_SESSION['email']; ?></strong>
 </div>
<?php endif; ?>

<?php if($_SESSION['verified']): ?>
 <button class = "btn btn-block btn-lg btn-primary">I'm verified!</button>
<?php endif; ?>

</div>
</div>
</div>

</body>
</html>

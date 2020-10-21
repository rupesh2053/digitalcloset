
<?php require_once 'authController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container">

    <div class="col-md-6 offset-md-4" style = 'border: 2px solid; padding: 20px; border-radius: 5px'>
  <form action="signup.php" method = "post">

  <h2>Sign Up User</h2>

  	<?php if(count($error)>0): ?>
  	<div class="alert alert-danger">
  		<?php foreach($error as $error): ?>
  		<li><?php echo $error; ?></li>
    <?php endforeach; ?>
  	</div>
    <?php endif; ?>

  	<div class="form-group">
      <input type="text" class="form-control" placeholder="Enter username" value = "<?php echo $username ?>" name="username">
    </div>
    <div class="form-group">
      <input type="email" class="form-control" placeholder="Enter email" value = "<?php echo $email ?>" name="email">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name = "password" placeholder="Enter password">
    </div>

    <div class="form-group">
      <input type="password" class="form-control" name = "passwordConf" placeholder="Confirm password">
    </div>
    <button type="submit" class="btn btn-success btn-block" name = "signup-btn">Sign Up</button>
    <p class = "text-center">Aleady a member?<a href="login.php">Sign in</a></p>
  </form>
</div>
</div>

</body>
</html>

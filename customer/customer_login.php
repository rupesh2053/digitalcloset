<?php include 'authControl.php' ?>
<div class="col-md-11">
<div class="box">
	<div class="box-header">
		<center>
			<h1>Login Form</h1>
			<p class = "lead">Already have an account..?</p>
			<!--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.</p>-->
		</center>
	</div>
	<center><?php if(count($error)>0): ?>
  	<div class="alert <?php echo $_SESSION['alert-class']; ?>">
  		<?php foreach($error as $error): ?>
  		<p><?php echo $error; ?></p>
    <?php endforeach; ?>
  	</div>
    <?php endif; ?></center>
	<form method="post" action = "checkout.php">
		<div class="form-group">
			<input type="email" name="c_email" class = "form-control" placeholder="Email or Username"  value = "<?php echo $c_email ?>">
		</div>
		<div class="form-group">
			<input type="password" name="c_pass" class = "form-control" placeholder="Password">
		</div>
		<div class="text-center">
			<button name = "login" class = "btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
			<button name = "loginFB" class = "btn btn-success" style = 'font-size: 19px'> <i class="fa fa-facebook-f"> Log in with Facebook</i></button>

		</div>
	</form>
	<center>
		<a href="customer_register.php">
			<h3>Don't have account..? Register here &rarr;</h3>
		</a>
	</center>
  </div>


</div>

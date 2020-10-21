<?php 
$active = "Contact";
include "header.php";
include "navbar.php";
$error = array();
$name = "";
$email = "";
$subject = "";
$message = "";

if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($conn,$_POST['name']);
  	$email = mysqli_real_escape_string($conn,$_POST['email']);
  	$subject = mysqli_real_escape_string($conn,$_POST['subject']);
  	$message = mysqli_real_escape_string($conn,$_POST['message']);

 if(empty($name)){
    $error['name'] = "Name required.";
	$_SESSION['alert-class']='alert-danger';
  }

  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	$error['email'] = "Email address is invalid.";
	$_SESSION['alert-class']='alert-danger';
	}

  if(empty($email)){
    $error['email'] = "Email required.";
	$_SESSION['alert-class']='alert-danger';
  }

  if(empty($subject)){
    $error['subject'] = "Subject required.";
	$_SESSION['alert-class']='alert-danger';
  }

  if(empty($message)){
  }

  if(strlen($message)<15){
    $error['message'] = "Message should be more than 15 characters.";
	$_SESSION['alert-class']='alert-danger';
  }

  if(count($error) == 0){
        $subject;
		$message;
		$to = 'dulalrupak3232@gmail.com';
        $returnval=mail($to, $subject, $message, "From: '$email'");
        if ($returnval==true) {

    		$error['message'] = "Message successfully send. Thank you for contacting us. We will help you soon.";
			$_SESSION['alert-class']='alert-success';

        }
        else{
        	$error['message'] = "Message not sent. Please try again.";
			$_SESSION['alert-class']='alert-danger';
        } 
  }
}
?>

<!DOCTYPE html>
<html>
<body>
<div class="content"><!-- content Begin -->
	<div class="container"><!-- container Begin -->

		<div class="col-md-12"><!-- col-md-12 Begin -->
			<ul class="breadcrumb" style = "background: #fff">
			<li>
				<a href="index.php">Home</a>
				<li>Contact Us</li>
			</li>
			</ul>
		</div>	<!-- col-md-12 Finish -->	

    <div class="col-md-3"><?php include "sidebar.php" ?></div>
    
<div class = "col-md-8"><!-- col-md-9 Begin -->
	<div class="box"><!-- boxbox Begin -->
		<div class="box-header"><!-- box-header Begin-->
			<center><!-- Center Begin -->
				<h2 style = "font-weight: 600">FEEL FREE TO CONTACT US</h2>
				<p class = "text-muted"><!--p begin -->
					If you have any question, feel free to contact us. Our Customer Service work <strong>24/7</strong>.
				</p><!--p Finish -->
			</center><!-- Center Finish -->
		</div><!-- box-header Finish -->
		<hr>
		 <center><?php if(count($error)>0): ?>
  		<div class="alert <?php echo $_SESSION['alert-class']; ?>">
  		<?php foreach($error as $error): ?>
  		<p><?php echo $error; ?></p>
    	<?php endforeach; ?>
  		</div>
    	<?php endif; ?></center>

  		
		<form action = "" method = "post">
			    <div class="form-group"><!-- form-group Begin -->
				<input type="text" name="name" class = "form-control" value = "<?php echo $name; ?>" placeholder = "Name">
			    </div><!-- form-group Finish -->

				<div class="form-group"><!-- form-group Begin -->
				<input type="email" name="email" class = "form-control" value = "<?php echo $email ?>"  placeholder = "Email">
			    </div><!-- form-group Finish -->


			    <div class="form-group"><!-- form-group Begin -->
				<input type="text" name="subject" class = "form-control" value = "<?php echo $subject ?>"  placeholder = "Subject">
			    </div><!-- form-group Finish --> 

			    <div class="form-group"><!-- form-group Begin -->
				<textarea name = "message" cols = "30" rows = "10" class = "form-control" placeholder = "Message"><?php echo $message ?></textarea>
			    </div><!-- form-group Finish -->

			    <div class="text-center"><!-- text-center Begin -->
			    <button type = "submit" name = "submit" class = "btn btn-info">Send message &rarr;</button>
			    </div><!-- text-center Finish -->
		</form>

		 
	</div><!-- box Finish -->
</div><!-- col-md-9 Finish -->
</div><!-- container Finish -->
</div><!-- content Finish -->





<?php 
include "footer.php"; 
?>
</body>
</html>

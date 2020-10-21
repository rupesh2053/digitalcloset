<?php $active = 'Account'; include "header.php"?>
<?php 
    $error = array();
    $customer_fname = "";
    $customer_lname = "";
    $customer_email = "";
    $customer_country = "";
    $customer_city = "";
    $customer_address = "";
    $customer_contact = "";

    if(isset($_POST['updateProfile'])){
	$customer_session = $_SESSION['customer_email'];
	$get_customer = "SELECT * FROM tbl_customer WHERE customer_email = '$customer_session'";
	$run_customer = mysqli_query($conn,$get_customer);
	$row_customer = mysqli_fetch_array($run_customer);
	$customer_id = $row_customer['customer_id'];

    $update_id = $customer_id;
    $customer_fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $customer_lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $customer_email = mysqli_real_escape_string($conn, $_POST['email']);
    $customer_country = mysqli_real_escape_string($conn, $_POST['country']);
    $customer_city = mysqli_real_escape_string($conn, $_POST['city']);
    $customer_address = mysqli_real_escape_string($conn, $_POST['address']);
    $customer_contact = mysqli_real_escape_string($conn, $_POST['contact']);

    //validation
    if(empty($customer_contact))
	{
		$error['customer_contact'] = "Phone number is required.";
		$_SESSION['alert-class']='alert-danger';		
	}
    if(strlen($customer_contact) != 10 || (!is_numeric($customer_contact))){
    $error['customer_contact']= "Phone number is invalid.";
    $_SESSION['alert-class']='alert-danger';
    }

	if(!filter_var($customer_email,FILTER_VALIDATE_EMAIL)){
		$error['email'] = "Email address is invalid";
		$_SESSION['alert-class']='alert-danger';

	}
	if(empty($customer_fname))
	{
		$error['customer_fname'] = "First name required.";
		$_SESSION['alert-class']='alert-danger';		
	}
	if(empty($customer_lname))
	{
		$error['customer_lname'] = "Last name required.";
		$_SESSION['alert-class']='alert-danger';		
	}
	if(empty($customer_email))
	{
		$error['customer_email'] = "Email address required.";
		$_SESSION['alert-class']='alert-danger';		
	}
  
    if((count($error) == 0)){
    $update_customer = "UPDATE tbl_customer SET customer_fname='$customer_fname',customer_lname='$customer_lname',customer_email='$customer_email',customer_country='$customer_country',customer_city='$customer_city',customer_address='$customer_address',customer_contact='$customer_contact' WHERE customer_id='$update_id' ";
    
    $run_customer = mysqli_query($conn,$update_customer);
    if($run_customer){
        echo "<script>alert('Your account has been edited, to complete the process, please Relogin.')</script>";
		echo "<script>window.open('logout.php','_self')</script>";
        
    }
  } 
}
 ?>

<div class="container">
	<div class="containts">
		<div class="col-md-12"><!-- col-md-12 Begin -->
        <ul class="breadcrumb" style = "background: #fff;box-shadow:1px 1px 2px 2px rgba(0,0,0,0.2);padding: 10px"><!-- breadcrumb Begin -->
            <li><a href="index.php">Home</a></li>
            <li>My Account</li>
        </ul><!-- breadcrumb Finish -->
        </div><!-- col-md-12 Finish -->
		
		<?php include "slidebar.php" ?>
		<div class="col-md-9" style = "box-shadow: 1px 1px 2px 2px rgba(0,0,0,0.2); padding: 30px; margin-bottom: 30px; background-color: #fff">
		
<?php 
	$customer_session = $_SESSION['customer_email'];
	$get_customer = "SELECT * FROM tbl_customer WHERE customer_email = '$customer_session'";
	$run_customer = mysqli_query($conn,$get_customer);
	$row_customer = mysqli_fetch_array($run_customer);
	$customer_id = $row_customer['customer_id'];
	$customer_fname = $row_customer['customer_fname'];
	$customer_lname = $row_customer['customer_lname'];
	$customer_email = $row_customer['customer_email'];
	$customer_password = $row_customer['customer_password'];
	$customer_country = $row_customer['customer_country'];
	$customer_city = $row_customer['customer_city'];
	$customer_contact = $row_customer['customer_contact'];
	$customer_address = $row_customer['customer_address'];
	$customer_ip = $row_customer['customer_ip'];
 ?>


<h1 align = "center">Edit Your Account</h1>

        <?php if(count($error)>0): ?>
        <div class="alert <?php echo $_SESSION['alert-class']; ?>">
  		<?php foreach($error as $error): ?>
  		<li><?php echo $error; ?></li>
    	<?php endforeach; ?>
  		</div>
    	<?php endif; ?>

<form action = "" method = "post" enctype = "multiport/form-data"><!-- Form Begin -->
	<div class="form-group"><!-- form-group Begin -->
	<label>First Name: </label>
	<input type="text" name="fname" class = "form-control" value = "<?php echo $customer_fname; ?>">
	</div><!-- form-group Finish -->

	<div class="form-group"><!-- form-group Begin -->
	<label>Last Name: </label>
	<input type="text" name="lname" class = "form-control" value = "<?php echo $customer_lname; ?>">
	</div><!-- form-group Finish -->

	<div class="form-group"><!-- form-group Begin -->
	<label>Customer Email: </label>
	<input type="email" name="email" class = "form-control" value = "<?php echo $customer_email; ?>">
	</div><!-- form-group Finish -->

	<div class="form-group"><!-- form-group Begin -->
	<label>Customer Country: </label>
	<input type="text" name="country" class = "form-control" value = "<?php echo $customer_country; ?>">
	</div><!-- form-group Finish -->

	<div class="form-group"><!-- form-group Begin -->
	<label>Customer City: </label>
	<input type="text" name="city" class = "form-control" value = "<?php echo $customer_city; ?>">
	</div><!-- form-group Finish -->

	<div class="form-group"><!-- form-group Begin -->
	<label>Customer Contact: </label>
	<input type="text" name="contact" class = "form-control" value = "<?php echo $customer_contact; ?>">
	</div><!-- form-group Finish -->

	<div class="form-group"><!-- form-group Begin -->
	<label>Customer Address: </label>
	<input type="text" name="address" class = "form-control" value = "<?php echo $customer_address; ?>">
	</div><!-- form-group Finish -->


	<div class="text-center"><!-- text-center Begin -->
	<button name = "updateProfile" class = "btn btn-info">
	<i class = "fa fa-user-md"></i> Update Now &rarr;
	</button>	
	</div><!-- text-center Finish -->
</form><!-- Form Finish -->
		</div>
	</div>
</div>

<?php include "footer.php" ?>
<?php 





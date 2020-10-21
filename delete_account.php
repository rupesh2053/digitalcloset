
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php $active = "Account";
	?>
	<div class="container">
		<div class="containt">


<div class="col-md-9" style = "box-shadow: 1px 1px 2px 2px rgba(0,0,0,0.2); padding: 50px; background: #fff">


<center> <!-- center begin -->
	<h1>Do You Really Want To Delete Your Account ? </h1>

	<form action = "" method = "post"><!-- form begin -->
		<input type="submit" name="Yes" value = "Yes, I Want To Delete" class = "btn btn-danger">
		<input type="submit" name="No" value = "No, I Don't Want To Delete" class = "btn btn-primary">
	</form><!-- form finish -->
</center> <!-- center finish -->


</div>
</div>
</div>
	</div>
	

</body>

</html>


<?php 

$c_email = $_SESSION['customer_email'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "DELETE FROM tblcustomer WHERE customer_email='$c_email'";
    
    $run_delete_customer = mysqli_query($conn,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Successfully delete your account, feel sorry about this. Good Bye')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    
}

?>

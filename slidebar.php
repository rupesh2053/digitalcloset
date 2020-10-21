<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.name{
			font-size: 18px;
			font-weight: 700;
			color: #610B38;
		}
		.imgBx{
			height: 200px;

		}
	</style>
	</head>
<body>



<div class="col-md-3"><!--col-md-4 Begin -->
<div class="panel panel-default slidebar-menu" style = "box-shadow: 2px 2px 5px 3px rgba(0,0,0,0.5); background-color: #fff"><!-- panel panel-default slidebar-menu Begin-->
	<div class="panel-heading"><!-- panel-heading Begin-->
	 <?php 
	 	$customer_session = $_SESSION['customer_email'];

	 	$get_customer = "SELECT * FROM tbl_customer WHERE customer_email = '$customer_session'";

	 	$run_customer = mysqli_query($conn,$get_customer);
	 	$row_customer = mysqli_fetch_assoc($run_customer);
	 	$customer_fname = $row_customer['customer_fname'];
	 	$customer_lname = $row_customer['customer_lname'];

	 	if(!isset($_SESSION['customer_email'])){

	 	}else{
	 		echo "
	 			<center>
	 				<img src='profile.png' class = 'img-responsive imgBx'>
	 			</center>
	 			<br>

	 			<h3 class = 'panel-title name' align = 'center'>
			    Name : $customer_fname $customer_lname
		        </h3>

	 		";
	 	}

	  ?>
		
	</div><!-- panel-heading Finish-->
	<div class="panel-body"><!-- panel-body Begin-->
		<nav class="nav-pills nav-stacked nav"><!-- nav-pills nav-stacked-nav Begin-->

			<li class = " 
			<?php 
			if(isset($_GET['my_orders']))
			{
				echo 'active';
			}
			?>">
				
				<a href="my_account.php?my_orders">
					<i class="fa fa-list"></i> My Orders
				</a>

			</li>

				<li class = " 
			<?php 
			if(isset($_GET['pay_offline']))
			{
				echo 'active';
			}
			?>">
				
				<a href="my_account.php?pay_offline">
					<i class="fa fa-bolt"></i> Pay Offline
				</a>

			</li>

			<li class = " 
			<?php 
			if(isset($_GET['edit_account']))
			{
				echo 'active';
			}
			?>">
				
				<a href="edit_account.php">
					<i class="fa fa-pencil"></i> Edit Account
				</a>

			</li>

				<li class = " 
			<?php 
			if(isset($_GET['change_pass']))
			{
				echo 'active';
			}
			?>">
				
				<a href="change_pass.php">
					<i class="fa fa-user"></i> Change Password
				</a>

			</li>

			<li class = " 
			<?php 
			if(isset($_GET['delete_account']))
			{
				echo 'active';
			}
			?>">
				
				<a href="my_account.php?delete_account">
					<i class="fa fa-trash-o"></i> Delete Account
				</a>

			</li>

				<li>
				
				<a href="logout.php">
					<i class="fa fa-sign-out"></i> Log Out
				</a>

			</li>
			
		</nav><!-- nav-pills nav-stacked-nav Finish-->
	</div><!-- panel-body Finish-->

</div><!-- panel panel-default slidebar-menu Finish-->

</div><!--col-md-4 Finish -->
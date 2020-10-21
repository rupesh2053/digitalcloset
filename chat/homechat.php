<!DOCTYPE html>
<?php
session_start();
//include("include/connection.php");
//if(!isset($_SESSION['user_email'])){
	//header("location: signin.php");


?>
<html>
<head>
	<title>My chat - home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awsome/4.7.0/css/font-awsome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</head>
<body>
	<div class="container main-section">
		<div calss="row">
			<div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
				<div class="input-group-btn">
					<div class="input-group-btn">
					<center><a href="include/find_friends.php"><buttom class="btn btn-default search-icon" name="search_user" type="submit">add new user</buttom></a></center>
				</div>
			</div>
			<div class="left-chat">
				<ul>
					<?php include("include/get_user_data.php");?>
				</ul>
			</div>
		</div>

			<div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
				<div class="row">
					<?php
						$user= $_SESSION['admin_email'];
						$get_user="select * from admins where admin_email='$user'";
						$run_user=mysqli_query($con,$get_user);
						$row=mysqli_fetch_array($run_user);

						$user_id= $row['admin_id'];
						$user_name=$row['admin_name'];

					?>

					<?php
						if(isset($_GET['admin_name'])){
							global $con;

							$get_username=$get['admin_name'];
							$get_user= "select * from admins where admin_name='$get_username'";
							$run_user=mysqli_querry($con,$get_user);
							$run_user= mysqli_fetch_array($run_user);
							$username=$row_user['admin_name'];
							$user_profile_image=$row_user['admin_image'];
						}

						if(isset($GET['customer_fname'])){
							global $con;
							$get_username1=$get['customer_fname' && 'customer_lname'];
							$get_user1="select * from tbl_customer where customer_fnmae='&get_username1'";
							$run_user1=mysqli_querry($con,$get_user1);
							$run_user1= mysqli_fetch_array($run_user1);
							$username1=$row_user1['customer_fname'];
							




						}
						
						$total_messages = "select * from user_chats where (sender_username='$user_name' AND receiver_isername='$username') OR (receiver_username='$user_name' AND sender_username='$username') OR  (sender_username='$user_name1' AND receiver_username='$username1') OR (receiver_username='$user_name1' AND sender_username='$username1')";

						$run_messages=mysqli_query($con, $total_messages);
						$total = mysqli_num_rows($run_messages);
						?>



						<div class="col-md-12 right-header">
							<div class="right-header-detail">
								<form method="post">
									<p><?php echo "$username";?></p>
									<spam><?php echo $total; ?>messages</spam>&nbsp &nbsp
									<button name="logout" class="btn btn-danger">logout</button>
								</form>
								<?php
									if(isset($_POST['logout'])){
										$update_msg= mysqli_query($con,"UPDATE users SET log_in='offile' WHERE user_name='$user_name'");
										header("location:logoutchat.php");
										exit();
									}
										

								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div id="scrolling_to_bottom" class="col-md-12 right-header-contentchat">
							<?php
								$update_msg= mysqli_query($con,"UPDATE users_chats SET msg_status='read' WHERE sender_username='$username' AND receiver_username='$username' AND receiver_username='$user_name'");

								$sel_msg= "select * from user_chats where (sender_username='$user_name' AND receiver_isername='$username') OR (receiver_username='$user_name' AND sender_username='$username') OR  (sender_username='$user_name1' AND receiver_username='$username1') OR (receiver_username='$user_name1' AND sender_username='$username1') ORDER by 1 ASC";	
								$run_msg= mysqli_query($con,$sel_msg);

								while ($row=mysqli_fetch_array($run_msg)){
									$sender_username=$row['sender_username'];
									$receiver_username=$row['receiver_username'];
									$msg_content=$row['msg_content'];
									$msg_date=$row['msg_date'];
								?>
								<ul>
									<?php
										if($user_name == $sender_username AND $username== $receiver_username)
										{
											echo"
									 			<li>
													<div class='rightside-chat'>
														<span> $username <small>$msg_dates</small></span>
														<p>$msg_content</p>
													</div>
												</li>
												";
											}

										if($user_name == $receiver_username AND $username== $sender_username)
										{
											echo"
									 			<li>
													<div class='rightside-chat'>
														<span> $username <small>$msg_dates</small></span>
														<p>$msg_content</p>
													</div>
												</li>
												";
										}
									?>
								</ul>
								<?php
									}
								?>

							</div>
							</div>
							<div class row="row">
								<div class="col-md-12 right-chat-textbox">
									<form method="post">
										<input autocomplete="off" type="text" name="msg_content" placeholder="write your message........">
										<button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php

					if(isset($_POST['submit'])){
						$msg=htmlentities($_POST['msg_content']);
						if($msg== ""){

							echo"
							<div class='alert alert-danger'>
								<strong><center>message was unable to send</center></strong>
								</div>
							";
						}
						else if(strlen($msg)>100){
							echo"
								<div class='alert alert-danger'>
									<strong><center>messege is too long.use only 100 characters</center></strong>
								</div>
								";
						}

						else{
							$insert ="insert into users_chats(sender_username,receiver_username,msg_content,msg_status,msg_date) values('$user_name','$username', '$msg','unread',NOW())";
							$run_insert=mysqli_query($con,$insert);
						}
					}
				?>
</body>
</html>







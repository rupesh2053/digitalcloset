<?php
$con = mysqli_connect("localhost", "root","","mychat");
	$user="select * from tbl_customer";
	$run_user= mysqli_query($con, $user);

	while ($row_user=mysqli_fetch_array($run_user))
	{

		$user_id=$row_user['user_id'];
		$user_name=$row_user['user_name'];
		$user_profile = $row_user['user_profile'];
		$login = $row_user['log_in'];

		echo"
			<li>
				<div class='chat-left-detail'>
				<p><a href='home.php?user_name=$user_name'>$user_name</a></p>";
			if($login == 'online')
			{
				echo"<span><i class='fa fa-circle' aria-hidden='true'></i> online/span>";

			}else{
				echo"<span><i class='fa fa-circle-o' aria-hiddden='true'></i>offline</span>";
			}
			"

			</div>
			</li>
			";

	}
?>

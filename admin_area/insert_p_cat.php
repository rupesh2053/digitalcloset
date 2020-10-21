<?php 
$error = array();
$p_cat_title = "";
$p_cat_desc = "";
if(isset($_POST['submit'])){
     
	$p_cat_title = $_POST['p_cat_title'];
	$p_cat_desc = $_POST['p_cat_desc'];

	if(empty($p_cat_title))
	{
		$error['p_cat_title'] = "Product catagory name required.";
		$_SESSION['alert-class']='alert-danger';
	}
	if(strlen($p_cat_desc)<30)
	{
		$error['p_cat_desc'] = "Product catagory description must be more than 30 characters.";
		$_SESSION['alert-class']='alert-danger';
	}

	$CatQuery = "SELECT * FROM product_catagories WHERE p_cat_title=? LIMIT 1";
	$stmt = $conn->prepare($CatQuery);
	$stmt->bind_param('s',$p_cat_title);
	$stmt->execute();
	$result = $stmt->get_result();
	$userCount = $result->num_rows;
	$stmt->close();
	if($userCount>0){
		$error['p_cat_title'] = "Product catagory title already exists.";
		$_SESSION['alert-class']='alert-danger';
	}


	if(count($error)==0)
	{
	$insert_p_cat = "INSERT INTO product_catagories(p_cat_title,p_cat_desc) VALUES('$p_cat_title','$p_cat_desc')";
	$run_p_cat = mysqli_query($conn,$insert_p_cat);
	if($run_p_cat){
		echo "<script>alert('Your new Product Catagory has been inserted!');</script>";
		echo "<script>window.open('index.php?view_p_cats','_self');</script>";
	}
}
}

 ?>

<?php
    if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self');</script>";

}else{ 


?>
<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Insert Product Catagory

			</li>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			   <h3 class="panel-title">
				<i class="fa fa-money fa-fw"></i>Insert Catagory
			  </h3>
			</div>
			<div class="panel-body">
			<center><?php if(count($error)>0): ?>
  			<div class="alert <?php echo $_SESSION['alert-class']; ?>">
  			<?php foreach($error as $error): ?>
  			<p><?php echo $error; ?></p>
    		<?php endforeach; ?>
  			</div>
    		<?php endif; ?></center>
				<form class="form-horizontal" method = "post" action = "">
					<div class="form-group">
					<label class="control-label col-md-3">
							Product Catagory Title
					</label>
					<div class="col-md-6">
						<input type="text" name="p_cat_title" class = "form-control" value = "<?php echo $p_cat_title; ?>">
					</div>
					</div>

					<div class="form-group">
					<label class="control-label col-md-3">
							Product Catagory Description
					</label>
					<div class="col-md-6">
						<textarea type = "text" name="p_cat_desc" cols="30" rows="10" class = "form-control"><?php echo $p_cat_desc; ?>
						</textarea>
					</div>
					</div>

					<div class="form-group">
					<label class="control-label col-md-3">
							
					</label>
					<div class="col-md-6">
						<input name = "submit" value ="Submit" class="form-control btn btn-primary" type = "submit">
					</div>
				</div>
					
				</form>
			</div>
		</div>
	</div>
</div>



<?php } ?>	
<?php 
$error = array();
$cat_title = "";
$cat_desc = "";

if(isset($_POST['submit'])){
	$cat_title = $_POST['cat_title'];
	$cat_desc = $_POST['cat_desc'];

	if(empty($cat_title))
	{
		$error['cat_title'] = "Catagory name and description required.";
		$_SESSION['alert-class']='alert-danger';
	}
	$CatQuery = "SELECT * FROM catagories WHERE cat_title=? LIMIT 1";
	$stmt = $conn->prepare($CatQuery);
	$stmt->bind_param('s',$cat_title);
	$stmt->execute();
	$result = $stmt->get_result();
	$userCount = $result->num_rows;
	$stmt->close();
	if($userCount>0){
		$error['cat_title_err'] = "Catagory title already exists.";
		$_SESSION['alert-class']='alert-danger';
	}
	
	if(count($error)==0){
	$insert_cat = "INSERT INTO catagories(cat_title,cat_desc) VALUES('$cat_title','$cat_desc')";
	$run_cat = mysqli_query($conn,$insert_cat);
	if($run_cat){
		echo "<script>alert('Your new Product Catagory has been inserted!');</script>";
		echo "<script>window.open('index.php?view_cats','_self');</script>";
	}else{

		$error['db_error'] = "Something went wrong.";
		$_SESSION['alert-class']='alert-danger';
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
				<i class="fa fa-dashboard"></i> Dashboard / Insert Catagory

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
							Catagory Title
					</label>
					<div class="col-md-6">
						<input type="text" name="cat_title" class = "form-control" value = '<?php echo $cat_title; ?>'>
					</div>
					</div>

					<div class="form-group">
					<label class="control-label col-md-3">
							Catagory Description
					</label>
					<div class="col-md-6">
						<textarea type = "text" name="cat_desc" cols="30" rows="10" class = "form-control"><?php echo $cat_desc; ?>
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
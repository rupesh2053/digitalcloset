<?php
    if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self');</script>";

}else{ 


?>
<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / View Catagory

			</li>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			   <h3 class="panel-title">
				<i class="fa fa-money fa-fw"></i>View Catagories
			  </h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
					<tr>
						<th>Catagory ID</th>
						<th>Catagory Title</th>
						<th>Catagory Desc</th>
						<th>Product Catagory</th>
						<th>Product Catagory</th>
					</tr>
					</thead>
					<tbody>
						<?php 
						$i = 0;
						$get_cats = "SELECT * FROM catagories";
						$run_cats = mysqli_query($conn,$get_cats);
						while($row_cats = mysqli_fetch_array($run_cats)){
							$cat_id = $row_cats['cat_id'];
							$cat_title = $row_cats['cat_title'];
							$cat_desc = $row_cats['cat_desc'];
							$i++;
						 ?>
						
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $cat_title; ?></td>
						<td><?php echo $cat_desc; ?></td>
						<td>
						<a href="index.php?edit_cat=<?php echo $cat_id; ?>">
								<i class="fa fa-pencil"></i> Edit
							</a>
						</td>



						<td>
							<a href="index.php?delete_cat=<?php echo $cat_id; ?>">
								<i class="fa fa-trash-o"></i> Delete
							</a>
						</td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>



<?php } ?>	
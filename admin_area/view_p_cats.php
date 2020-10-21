<?php
    if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self');</script>";

}else{ 


?>
<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / View Product Catagory

			</li>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
			   <h3 class="panel-title">
				<i class="fa fa-money fa-fw"></i>View Products Catagories
			  </h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
					<tr>
						<th>roduct Catagory ID</th>
						<th>Product Catagory Title</th>
						<th>Product Catagory Desc</th>
						<th>Delete Product Catagory</th>
						<th>Edit Product Catagory</th>
					</tr>
					</thead>
					<tbody>
						<?php 
						$i = 0;
						$get_p_cats = "SELECT * FROM product_catagories";
						$run_p_cats = mysqli_query($conn,$get_p_cats);
						while($row_p_cats = mysqli_fetch_array($run_p_cats)){
							$p_cat_id = $row_p_cats['p_cat_id'];
							$p_cat_title = $row_p_cats['p_cat_title'];
							$p_cat_desc = $row_p_cats['p_cat_desc'];
							$i++;
						 ?>
						
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $p_cat_title; ?></td>
						<td><?php echo $p_cat_desc; ?></td>
						<td>
						<a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
								<i class="fa fa-pencil"></i> Edit
							</a>
						</td>



						<td>
							<a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
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
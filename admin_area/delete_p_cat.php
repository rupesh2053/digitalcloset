<?php
    if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self');</script>";

}else{ 

if(isset($_GET['delete_p_cat'])){
 $delete_p_cat_id = $_GET['delete_p_cat'];
	$delete_p_cat = "DELETE FROM product_catagories WHERE p_cat_id = '$delete_p_cat_id'";
	$run_p_cat = mysqli_query($conn,$delete_p_cat);
	if($run_p_cat){
		echo "<script>alter('Some of your product catagories has been deleted!');</script>";
		echo "<script>window.open('index.php?view_p_cats','_self');</script>";
	}
}
?>

<?php } ?>

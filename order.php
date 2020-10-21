<?php
session_start();
include "functions/function.php";
include "db.php";

?>

<?php
if(isset($_GET['c_id'])){
	$customer_id = $_GET['c_id'];
}

$select_customer_email = "SELECT * FROM tbl_customer WHERE customer_id = '$customer_id'";
$run_customer_email = mysqli_query($conn,$select_customer_email);
while($row_customer_email = mysqli_fetch_assoc($run_customer_email)){
	$customer_email = $row_customer_email['customer_email'];
	$name =  $row_customer_email['customer_fname'];
	}

$ip_add = getRealIpUser();
$status = "Pending";
$invoice_no = mt_rand();

$select_cart = "SELECT * FROM cart WHERE p_add = '$ip_add'";
$run_cart = mysqli_query($conn,$select_cart);
while($row_cart = mysqli_fetch_assoc($run_cart)){
	$pro_id = $row_cart['p_id'];
	$pro_qty = $row_cart['qty'];
	$pro_size = $row_cart['size'];
	$get_product = "SELECT * FROM product WHERE product_id = '$pro_id'";
	
	$run_product = mysqli_query($conn,$get_product);

	while($row_product = mysqli_fetch_array($run_product)){
		$sub_total = $row_product['product_price']*$pro_qty;
		$insert_customer_order = "INSERT INTO customer_orders (customer_id,due_amount,invoice_no,qty,size,order_date,order_status) VALUES('$customer_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";
		$run_customer_order = mysqli_query($conn,$insert_customer_order);
	
		$insert_pending_order = "INSERT INTO pending_order (customer_id,invoice_no,qty,size,order_status,product_id) VALUES('$customer_id','$invoice_no','$pro_qty','$pro_size','$status','$pro_id')";
		$run_pending_order = mysqli_query($conn,$insert_pending_order);

		$delete_cart = "DELETE FROM cart WHERE p_add = '$ip_add'";
		$run_delete_cart = mysqli_query($conn,$delete_cart);

		//Sending ordering information to customer email
		$message = '
			   		 Hi '.$name.'
					 Your order detail is:
					 Your id: '.$customer_id.'
					 Product id: '.$pro_id.'
					 Product Quentity: '.$pro_qty.'
					 Product Size: '.$pro_size.'
					 Invoice No: '.$invoice_no.'
					 Product amount: Rs.'.$sub_total.'/-
					 Your order status: '.$status.'
					 Please make sure your payment soon to get your order fast.
					 ';
		$subject='Order Details.';
        $headers = "From: dulalrupak3232@gmail.com \r\n";
        $headers .="MIME-Version: 1.0\r\n";
        $headers .="Content-type: text/html\r\n";
        $returnval=mail($customer_email, $subject, $message, "From: dulalrupak3232@gmail.com");
        if ($returnval==true) {
				echo "<script>alert('Your order has been submitted, Thanks.');</script>";
				echo "<script>window.open('my_account.php?my_orders','_self');</script>";
          
       }
	}
}

 ?>

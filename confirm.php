
<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('checkout.php','_self')</script>";
    
}else{

include("db.php");
include("functions/function.php");

if(isset($_GET['order_id'])){
  $order_id = $_GET['order_id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M-Dev Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Welcome: Guest";
                       
                   }else{
                       
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
               
               </a>
               <a href="checkout.php"> <?php // items(); ?> Items In Your Cart | Total Price: <?php //total_price(); ?> </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="customer_register.php">Register</a>
                   </li>
                   <li>
                       <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href=".cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="checkout.php">
                       
                        <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

                               }
                           
                         ?>
                       
                       </a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="../index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   <img src="logo.jpg" alt="Digital Closet Logo" class="hidden-xs" width = "140px" height = "50px">
                   
                   <!--<img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">-->
                   <!--<img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">-->
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li>
                           <a href="index.php">Home</a>
                       </li>
                       <li>
                           <a href="shop.php">Shop</a>
                       </li>
                       <li class="active">
                           <a href="my_account.php">My Account</a>
                       </li>
                       <li>
                           <a href="cart.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="contact.php">Contact Us</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php //items(); ?> Items In Your Cart</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query">
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       My Account
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php include("sidebar.php"); ?>
               
      </div><!-- col-md-3 Finish -->
           
        <div class="col-md-9" style = "box-shadow: 1px 1px 2px 2px rgba(0,0,0,0.2); padding: 20px; background: #fff; margin-bottom: 20px"><!-- col-md-9 Begin -->
        <div class="box"><!-- box Begin -->
        <h1 align="center"> Please confirm your payment</h1>
        <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data"><!-- form Begin -->

        <div class="form-group"><!-- form-group Begin -->
        <label> Invoice No: </label>
        <input type="text" class="form-control" name="invoice_no">
        </div><!-- form-group Finish -->
                       
        <div class="form-group"><!-- form-group Begin -->
        <label> Amount Sent: </label>
        <input type="text" class="form-control" name="amount_sent">
        </div><!-- form-group Finish -->

        <div class="form-group"><!-- form-group Begin -->
        <label> Select Payment Mode: </label>
        <select name="payment_mode" class="form-control"><!-- form-control Begin -->
        <option> Select Payment Mode </option>
        <option> Back Code </option>
        </select><!-- form-control Finish -->
        </div><!-- form-group Finish -->

        <div class="text-center"><!-- text-center Begin -->
        <button class="btn btn-primary btn-lg" name="confirm_payment"><!-- tn btn-primary btn-lg Begin -->
        <i class="fa fa-user-md"></i> Confirm Payment
        </button><!-- tn btn-primary btn-lg Finish -->
        </div><!-- text-center Finish -->
        </form><!-- form Finish -->
                   
<?php 
  if(isset($_POST['confirm_payment'])){
    
    $update_id = $_GET['update_id'];
    $invoice_no = $_POST['invoice_no'];
    $amount = $_POST['amount_sent'];
    $payment_mode = $_POST['payment_mode'];
    $ref_no = mt_rand();
    $complete = "Complete";
    $select_customer = "SELECT * FROM customer_orders WHERE order_id = '$update_id'";
      $run_customer = mysqli_query($conn,$select_customer);
      while($row_customer = mysqli_fetch_assoc($run_customer)){
      $order_invoice = $row_customer['invoice_no'];
        }
      $insert_payment = "INSERT INTO payments (invoice_no,amount,payment_mode,ref_no,payment_date) VALUE$amount','$payment_mode','$ref_no',NOW())";
                        
      $run_payment = mysqli_query($conn,$insert_payment);
                        
      $update_customer_order = "UPDATE customer_orders SET order_status='$complete' WHERE order_id='$update_id'";
                        
      $run_customer_order = mysqli_query($conn,$update_customer_order);
                        
      $update_pending_order = "UPDATE pending_order SET order_status='$complete' WHERE order_id='$update_id'";
                        
      $run_pending_order = mysqli_query($conn,$update_pending_order);
        

     if($run_pending_order)
         {
          if($invoice_no != $order_invoice)
          {
            echo"<br><p align='center' class = 'alert-danger'>Invoice number must match!!</p>";
          } elseif($invoice_no == $order_invoice)
          {
            $select_customer = "SELECT * FROM customer_orders WHERE order_id = '$update_id'";
            $run_customer = mysqli_query($conn,$select_customer);
            while($row_customer = mysqli_fetch_assoc($run_customer)){
            $order_date = $row_customer['order_date'];
            $pro_size = $row_customer['size'];
            $pro_amount = $row_customer['due_amount'];
            $invoice_no = $row_customer['invoice_no'];   
            $order_status = $row_customer['order_status'];   
            $customer_id = $row_customer['customer_id']; 
            }
            $select_customer = "SELECT * FROM tbl_customer WHERE customer_id = '$customer_id'";
            $run_customer = mysqli_query($conn,$select_customer);
            while($row_customer = mysqli_fetch_assoc($run_customer)){
            $customer_email = $row_customer['customer_email'];
            $customer_name = $row_customer['customer_fname'];
            $customer_contact = $row_customer['customer_contact'];
            }
          //Sending ordering information to customer email
            $message = '
            Hi '.$customer_name.'
            Your order detail is:
            Your id: '.$customer_id.'
            Product Size: '.$pro_size.'
            Invoice No: '.$invoice_no.'
            Order date: '.$order_date.'
            Product amount: Rs.'.$pro_amount.'/-
            Your order status: '.$order_status.'
               We will contact you and try to complete your order within possible days. We will contact you on '.$customer_contact.'.
                                 ';
                $subject='Payment Details.';
                $headers = "From: dulalrupak3232@gmail.com \r\n";
                $headers .="MIME-Version: 1.0\r\n";
                $headers .="Content-type: text/html\r\n";
                $returnval=mail($customer_email, $subject, $message, "From: dulalrupak3232@gmail.com");
                if ($returnval==true) {
                  echo'<br><p align = "center" class = "alert-success">Your order has been submitted, Thanks.';
                                
                         }
                       }
                       else{
                          echo'<br><p align = "center" class = "alert-danger">Your has been already send.';
                       }
                    }
                  }
               ?>
    
    </div><!-- box Finish -->           
    </div><!-- col-md-9 Finish -->       
    </div><!-- container Finish -->
    </div><!-- #content Finish -->
   
   <?php include("footer.php"); ?>
    
</body>
</html>
<?php } ?>
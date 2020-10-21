
    



    <div class="container">
        <div class="containt" >
        <div class="col-md-9" style = "background: #fff; box-shadow: 1px 1px 2px 2px rgba(0,0,0,0.3); padding: 10px">
        <center><!--  center Begin  -->
        <h1> My Orders </h1>
        <p class="lead"> Your orders on one place</p>
        <p class="text-muted">
        If you have any questions, feel free to <a href="contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>
        </p>
        </center><!--  center Finish  -->
    </div>


<hr>

<div class="col-md-9" style = "background: #fff; box-shadow: 1px 1px 2px 2px rgba(0,0,0,0.3); padding: 20px; margin-bottom: 30px">
<div class="table-responsive"><!--  table-responsive Begin  -->
    
    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr><!--  tr Begin  -->
                
                <th> ON: </th>
                <th> Due Amount: </th>
                <th> Invoice No: </th>
                <th> Qty: </th>
                <th> Size: </th>
                <th> Order Date:</th>
                <th> Paid / Unpaid: </th>
                <th> Status: </th>
                
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
        
        <tbody><!--  tbody Begin  -->
           
           <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "SELECT * FROM tbl_customer WHERE customer_email='$customer_session'";
            
            $run_customer = mysqli_query($conn,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "SELECT * FROM customer_orders WHERE customer_id='$customer_id'";
            
            $run_orders = mysqli_query($conn,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty'];
                
                $size = $row_orders['size'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
                
                if($order_status=='Pending'){
                    
                    $order_status = 'Unpaid';
                    
                }else{
                    
                    $order_status = 'Paid';
                    
                }
            
            ?>
            
            <tr><!--  tr Begin  -->
                
                <th> <?php echo $i; ?> </th>
                <td> Rs.<?php echo $due_amount; ?> /-</td>
                <td> <?php echo $invoice_no; ?> </td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $size; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
                
                <td>
                <?php  if($order_status != 'Paid'): ?>
                  <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn-sm"> Confirm Paid </a>
                <?php endif; ?>   
                </td>
                
            </tr><!--  tr Finish  -->
            
            <?php } ?>
            
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->
    </div>
</div>
</div>
</div>
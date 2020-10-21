<div class="box" style = "box-shadow: 2px 3px 3px 2px rgba(0,0,0,0.5); padding: 20px"><!-- box Begin -->
   

    <?php 
        $session_email = $_SESSION['customer_email'];
        $select_customer = "SELECT * FROM tbl_customer WHERE customer_email = '$session_email'";
        $run_customer = mysqli_query($conn, $select_customer);
       $row_customer = mysqli_fetch_array($run_customer);
       $customer_id = $row_customer['customer_id'];
     ?>

    
    <h1 class="text-center" style = "box-shadow: 1px 1px 2px 2px rgba(0,0,0,0.25); padding: 10px">Payment Options For You</h1>  
    
     <p class="lead text-center"><!-- lead text-center Begin -->
         
         <a class="" href="order.php?c_id=<?php echo $customer_id ?>"> Offline Payment </a>
         
     </p><!-- lead text-center Finish -->
     
     <center><!-- center Begin -->
         
        <p class="lead"><!-- lead Begin -->
            
            <a href="#">
                
                Esewa Payment
                
                <img class="img-responsive" src="esewa-nepal.jpg" alt="img-paypall" style = "height: 300px; width: 300px">
                
            </a>
            
        </p> <!-- lead Finish -->
         
     </center><!-- center Finish -->
    
</div><!-- box Finish -->
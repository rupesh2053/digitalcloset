 <?php 
 include "db.php";
 ?>

 <?php
            switch(true){
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
            
       }

        
        //$p_add = getRealIpUser();
         //p_add='$p_add' AND
        
        $p_id = $_POST['pro_id'];

        $product_qty = $_POST['product_qty'];
        
        $product_size = $_POST['product_size'];
        
        $check_product = "SELECT * from cart where p_id ='$p_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "INSERT into cart(p_id,qty,size) values('$p_id','$product_qty','$product_size')";
            $run_query = mysqli_query($conn,$query);
            if($run_query){
                echo "<script>alert('This product has been added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }else{
            echo "<script>alert('Some error happende'
        );</script>";
        }
            
            
        }
       
        
    
  ?>
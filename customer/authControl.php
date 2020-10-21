<?php
$conn = NEW mysqli('localhost','root','','ecom_db');
$error = array();

$c_fname = "";
$c_lname = "";
$c_email = "";
$c_country = "";
$c_city = "";
$c_contact = "";
$c_address = "";
$c_old_pass = "";
$c_new_pass = "";
$c_new_pass_again = "";
$errors = NULL;
if(isset($_POST['register'])){
    $c_fname = mysqli_real_escape_string($conn,$_POST['c_fname']);
    $c_lname = $_POST['c_lname'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $conf_pass = $_POST['conf_pass'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    
    $c_ip = getRealIpUser();

    $emailQuery = "SELECT * FROM tbl_customer WHERE customer_email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s',$c_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();
    if($userCount>0){
        $_SESSION['alert-class']='alert-danger';
        $errors .= "Email already exists.";
    }

    $emailQuery = "SELECT * FROM tbl_customer WHERE customer_contact=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s',$c_contact);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();
    if($userCount>0){
        $_SESSION['alert-class']='alert-danger';
        $errors .= "<p>Phone number already taken.</p>";
    }

    if(strlen($c_contact) != 10 || (!is_numeric($c_contact))){
    $errors .= "<p>Phone number is invalid.</p>";
    $_SESSION['alert-class']='alert-danger';
    }

    if(!filter_var($c_email,FILTER_VALIDATE_EMAIL)){
    $errors = "<p>Email address is invalid.</p>";
    $_SESSION['alert-class']='alert-danger';
     }
     if(empty($c_email)){
    $errors .= "<p>Email is required.</p>";
    $_SESSION['alert-class']='alert-danger';
     }
    if(empty($c_fname) || empty($c_lname)){
    $errors .= "<p>Full Name required.</p>";
    $_SESSION['alert-class']='alert-danger';
     }
     if(strlen($c_pass)<8){
    $errors .= "<p>Password must be more than 8 characters.</p>";
    $_SESSION['alert-class']='alert-danger';
     }
    if(empty($c_pass)){
    $errors .= "<p>Password required.</p>";
    $_SESSION['alert-class']='alert-danger';
     }
    if(($c_pass != $conf_pass)){
    $errors .= "<p>Password didn't matched.</p>";
    $_SESSION['alert-class']='alert-danger';
     }
     
    if($errors == NULL){
    $verified = "not verified";
    $c_pass = password_hash($c_pass, PASSWORD_DEFAULT);
    $token = md5(bin2hex(random_bytes(50)));
    $insert_customer = "INSERT INTO tbl_customer(customer_fname,customer_lname,customer_email,customer_password,customer_country,customer_city,customer_contact,customer_address,customer_ip,verified,verify_key,createdate) VALUES ('$c_fname','$c_lname','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_ip','$verified','$token',NOW())";
    
    $run_customer = mysqli_query($conn,$insert_customer);
    
    $sel_cart = "SELECT * FROM cart WHERE p_add = '$c_ip'";
    
    $run_cart = mysqli_query($conn,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        /// If register have items in cart ///
        //$_SESSION['customer_email']=$c_email;
        $subject='Please very your email.';
        $message ="http://localhost/ShoppingSite/verify.php?token={$token}";
        $headers = "From: dulalrupak3232@gmail.com \r\n";
        $headers .="MIME-Version: 1.0\r\n";
        $headers .="Content-type: text/html\r\n";
        $returnval=mail($c_email, $subject, $message, "From: dulalrupak3232@gmail.com");
        if ($returnval==true) {
        $_SESSION['alert-class']='alert-success';
        $errors = "<p style = 'color: green'>You have been Registered Sucessfully. Please verify your account with verification key send to $c_email.</p>";
        }
        else{
           
        $_SESSION['alert-class']='alert-danger';
        $errors = "<p style = 'color: green'>Something went wrong while registering.</p>";
        }
        
        }else{
        /// If register without items in cart ///$_SESSION['customer_email']=$c_email;
        $subject='Please very your email.';
        $message ="http://localhost/ShoppingSite/verify.php?token={$token}";
        $headers = "From: dulalrupak3232@gmail.com \r\n";
        $headers .="MIME-Version: 1.0\r\n";
        $headers .="Content-type: text/html\r\n";
        $returnval=mail($c_email, $subject, $message, "From: dulalrupak3232@gmail.com");
        if ($returnval==true) {
        $_SESSION['alert-class']='alert-success';
        $errors = "<p style = 'color: green'>You have been Registered Sucessfully. Please verify your account with verification key send to $c_email.</p>";
          
       }   
   }
    }
}

/** if(isset($_POST['login'])){

    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];

    if(!filter_var($c_email,FILTER_VALIDATE_EMAIL)){
    $error['c_email'] = "Email address is invalid";
    $_SESSION['alert-class']='alert-danger';
     }
    if(empty($c_email)){
    $error['c_email'] = "Email address required.";
    $_SESSION['alert-class']='alert-danger';
     }
    if(empty($c_pass)){
    $error['c_pass'] = "Password required.";
    $_SESSION['alert-class']='alert-danger';
     }

    if(count($error) === 0){
    //$c_pass = password_hash($c_pass, PASSWORD_DEFAULT);
    $select_customer = "SELECT * FROM tbl_customer WHERE customer_email = '$c_email'";
    $run_customer = mysqli_query($conn,$select_customer);
    $get_ip = getRealIpUser();
    $check_customer = mysqli_num_rows($run_customer);

   
        $select_cart = "SELECT * FROM cart WHERE p_add = '$get_ip'";
        $run_cart = mysqli_query($conn,$select_cart);
        $check_cart = mysqli_num_rows($run_cart);
        if($check_customer==0){

        $error['c_email'] = "Login Failed.";
        $_SESSION['alert-class']='alert-danger';

        }else if($check_customer==1 AND $check_cart==0){

        $_SESSION['customer_email']=$c_email;
        echo "<script>window.open('my_account.php?my_orders','_self');</script>";
        exit();

    }else{
        $_SESSION['customer_email']=$c_email;
        echo "<script>window.open('checkout.php','_self');</script>";
    }
  }
} **/
//login page 
if(isset($_POST['login'])){
  
    $email = $_POST['c_email'];
    $password = $_POST['c_pass'];

    //validation
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error['c_email'] = "Email address is invalid";
    }
    if(empty($email)){
        $error['c_email'] = "Email required";
    }
    if(empty($password)){
        $error['c_password'] = "Password required";
    }

    if(count($error) === 0){
    $sql = "SELECT * FROM tbl_customer WHERE customer_email=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
        $verified = $user['verified'];
        $createdate = $user['createdate'];
        $createdate = strtotime($createdate);
        $createdate = date('M d Y',$createdate);
        $email = $user['customer_email'];
        
        if($verified != 'not verified'){
        $_SESSION['customer_email']=$email;//login success
        //set flash message
        echo "<script>window.open('my_account.php?my_orders','_self');</script>";
        exit();

       }elseif($verified == 'not verified'){

        $error['login_fail'] = "Your are not yet been verified. Verification code is sent to $email on $createdate.";
        $_SESSION['alert-class'] = 'alert-danger';

    }
    elseif(!$result){
           $error['login_fail'] = 'Wrong credentials';
           $_SESSION['alert-class'] = 'alert-danger';
     }
  }  

}

if(isset($_POST['updatePass'])){
    $c_email = $_SESSION['customer_email'];
    $c_old_pass = $_POST['old_pass'];
    $c_new_pass = $_POST['new_pass'];
    $c_new_pass_again = $_POST['new_pass_again'];

    if(empty($c_old_pass)){   
        $error['c_old_pass'] = 'Old password required.';
        $_SESSION['alert-class']='alert-danger';
    }
    if(empty($c_new_pass)){   
        $error['c_new_pass'] = 'New password required.';
        $_SESSION['alert-class']='alert-danger';
    }
    if(empty($c_new_pass_again)){   
        $error['c_new_pass_again'] = 'Confirm password required.';
        $_SESSION['alert-class']='alert-danger';
    }
    
    $c_old_pass = password_hash($c_old_pass, PASSWORD_DEFAULT);
    $sel_c_old_pass = "SELECT * FROM tbl_customer WHERE customer_password='$c_old_pass' AND customer_email='$c_email'";
    $run_c_old_pass = mysqli_query($conn,$sel_c_old_pass);
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);

    if($check_c_old_pass == 0 ){
        $_SESSION['message'] = 'Sorry, password you have entred is not found. Please try again with new password.';
        $_SESSION['alert-class'] = 'alert-danger';
    }
    
    if($c_new_pass!=$c_new_pass_again){
        $error['$c_new_pass'] = 'Sorry, your new password did not match';
        $_SESSION['alert-class']='alert-danger';
    }

    if(count($error) == 0){
        $c_new_pass = password_hash($c_new_pass, PASSWORD_DEFAULT);
        $update_c_pass = "UPDATE tbl_customer SET customer_password='$c_new_pass' WHERE customer_email='$c_email'";
        $run_c_pass = mysqli_query($conn,$update_c_pass);
    
        if($run_c_pass){  
            $error['$c_new_pass'] = 'Your password has been updated successfully.'; 
            $_SESSION['alert-class']='alert-success';
            //sleep(5);         
            //echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        } 
      }
    }
?>
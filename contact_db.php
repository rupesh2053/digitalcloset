<?php 

    $conn = mysqli_connect("localhost","root","","ecom_db") or die("error in connection");
    $customer_fname = mysqli_real_escape_string($conn,$_POST['name']);
    $customer_email = mysqli_real_escape_string($conn,$_POST['email']);
    $customer_subject = mysqli_real_escape_string($conn,$_POST['subject']);
    $customer_message = mysqli_real_escape_string($conn,$_POST['message']);

    $query = "INSERT INTO tblcontact(customer_name,customer_email,subject,message) VALUES('$customer_name','$customer_email','$customer_subject','$customer_message')";
    
    $result = mysqli_query($conn,$query);
    
    if($result){
     echo "<script>alert('Data has been successfully inserted.');</script>";
     echo "<script>window.open('contact.php','_self')</script>";
    }else{
         echo "Some error happened!";
    }
 
?>
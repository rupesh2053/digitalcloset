
<?php
//register.php
require 'PHPMailer/PHPMailerAutoload.php';
include('database_connection.php');

if(isset($_SESSION['user_id']))
{
 header("location:index.php");
}

$message = '';

if(isset($_POST["register"]))
{
 $query = "
 SELECT * FROM register_user 
 WHERE user_email = :user_email
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':user_email' => $_POST['user_email']
  )
 );
 $no_of_row = $statement->rowCount();
 if($no_of_row > 0)
 {
  $message = '<label class="text-danger">Email Already Exits</label>';
 }
 else
 {
  $user_password = rand(100000,999999);
  $user_encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
  $user_activation_code = md5(rand());
  $insert_query = "
  INSERT INTO register_user 
  (user_name, user_email, user_password, user_activation_code, user_email_status) 
  VALUES (:user_name, :user_email, :user_password, :user_activation_code, :user_email_status)
  ";
  $statement = $connect->prepare($insert_query);
  $statement->execute(
   array(
    ':user_name'   => $_POST['user_name'],
    ':user_email'   => $_POST['user_email'],
    ':user_password'  => $user_encrypted_password,
    ':user_activation_code' => $user_activation_code,
    ':user_email_status' => 'not verified'
   )
  );
  $result = $statement->fetchAll();
  if(isset($result))
  {
   //$base_url = "http://localhost/ShoppingSite/LoginValidation/Authentication/TryThis/login.php";
   $mail_body = "
   <p>Hi ".$_POST['user_name'].",</p>
   <p>Thanks for Registration. Your password is ".$user_password.", This password will work only after your email verification.</p>
   <p>Please Open this link to verified your email address - ".$base_url."email_verification.php?activation_code=".$user_activation_code."
   <p>Best Regards,<br />Webslesson</p>
   ";
   require_once 'phpmailer/class.phpmailer.php';
   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->port = 465;
   $mail->SMTPAuth = true;
   $mail->Username = 'sharmarojan77@gmail.com';
   $mail->Password = '';     //Sets SMTP password
   $mail->SMTPSecure = 'ssl';
    
   $mail->From = 'sharmarojan77@gmail.com';
   $mail->FromName = 'DigitalCloset';
   $mail->AddAddress($_POST['user_email'], $_POST['user_name']);   
   $mail->WordWrap = 50;
   $mail->IsHTML(true);   
   $mail->Subject = 'Email Verification';
   $mail->Body = $mail_body;
   if($mail->Send())
   {
    $message = '<label class="text-success">Register Done, Please check your mail.</label>';
   }else {
  $message = "Mailer Error: " . $mail->ErrorInfo;
   }
  }
 }
}

?>

<!DOCTYPE html>
<html>
 <head>
  <title>PHP Register Login Script with Email Verification</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container" style="width:100%; max-width:600px">
   <h2 align="center">PHP Register Login Script with Email Verification</h2>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading"><h4>Register</h4></div>
    <div class="panel-body">
     <form method="post" id="register_form">
      <?php echo $message; ?>
      <div class="form-group">
       <label>User Name</label>
       <input type="text" name="user_name" class="form-control" pattern="[a-zA-Z ]+" required />
      </div>
      <div class="form-group">
       <label>User Email</label>
       <input type="email" name="user_email" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="register" id="register" value="Register" class="btn btn-info" />
      </div>
     </form>
     <p align="right"><a href="login.php">Login</a></p>
    </div>
   </div>
  </div>
 </body>
</html>
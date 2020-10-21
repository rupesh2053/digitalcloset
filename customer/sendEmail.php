
<?php 
		$to = 'dulalrupak3232@gmail.com';
        $subject='copy the following url and paste';
		$message ="copy the following url and paste";
        $returnval=mail($to, $subject, $message, "From: dulalrojan77@gmail.com");
        if ($returnval==true) {
        	echo "email sent Successfully";
        }
        else{
        	echo "email not sent";
        } 

 ?>
<?php 
    $active='Account';
    include("header.php");
    include "navbar.php";
    include "customer/authControl.php";
?>

<!DOCTYPE html>
<html>
<head>
<style>
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
</head>
<body>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
            <ul class="breadcrumb" style = "box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.3); background-color: #fff"><!-- breadcrumb Begin -->
            <li><a href="index.php">Home</a></li>
            <li>Register</li>
            </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
          <div class="col-md-3"><!-- col-md-3 Begin -->
          <?php include("sidebar.php"); ?>
          </div><!-- col-md-3 Finish -->
           
          <div class="col-md-9"><!-- col-md-9 Begin -->
          <div class="box"><!-- box Begin -->
                   
                    <div class="box-header"><!-- box-header Begin -->
                    <center><!-- center Begin -->
                    <h2> Register a new account </h2>
                    </center>
                    </div>
                           
                    <center><?php if($errors!=NULL): ?>
                    <div class="alert <?php echo $_SESSION['alert-class']; ?>">
                    <p><?php echo $errors; ?></p>
                    </div>
                    <?php endif; ?></center>

                    <!-- Password validation -->
                    <div id="message">
                    <h4 style = "font-weight: 800">Password must contain the following &rarr;</h4>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
                    <!-- Password validation End-->

                    <form action="customer_register.php" method="post" enctype="multiport/form-data"><!-- form Begin -->
                      <div class="form-group"><!-- form-group Begin -->
                      <input type="text" class="form-control" name="c_fname" placeholder="First name" value = "<?php echo $c_fname ?>" >
                      </div><!-- form-group Finish -->

                      <div class="form-group"><!-- form-group Begin -->
                      <input type="text" class="form-control" name="c_lname" placeholder="Last name" value = "<?php echo $c_lname ?>" >
                      </div><!-- form-group Finish -->
                           
                      <div class="form-group"><!-- form-group Begin -->
                      <input type="text" class="form-control" name="c_email" placeholder="Email" value = "<?php echo $c_email ?>" >
                      </div><!-- form-group Finish -->
                           
                      <div class="form-group"><!-- form-group Begin -->
                      <input type="password" id="c_pass" class="form-control" name="c_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password">
                      </div><!-- form-group Finish -->

                      <div class="form-group"><!-- form-group Begin -->
                      <input type="password" id="c_pass" class="form-control" name="conf_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirm password">
                      </div><!-- form-group Finish -->
                           
                      <div class="form-group"><!-- form-group Begin -->
                      <input type="text" class="form-control" name="c_country" placeholder="Country" value = "<?php echo $c_country ?>">
                      </div><!-- form-group Finish -->
                           
                      <div class="form-group"><!-- form-group Begin -->
                      <input type="text" class="form-control" name="c_city"  placeholder="City" value = "<?php echo $c_city ?>">
                      </div><!-- form-group Finish -->
                           
                      <div class="form-group"><!-- form-group Begin -->
                      <input type="text" class="form-control" name="c_contact" placeholder="Contact no" value = "<?php echo $c_contact ?>">
                      </div><!-- form-group Finish -->

                      <div class="form-group"><!-- form-group Begin -->
                      <input type="text" class="form-control" name="c_address"  placeholder="Address" value = "<?php echo $c_address ?>">
                      </div><!-- form-group Finish -->
                           

                           
                      <div class="text-center"><!-- text-center Begin -->
                      <button type="submit" name="register" class="btn btn-primary">
                      <i class="fa fa-user-md"></i> Register
                      </button>
                      </div><!-- text-center Finish -->  

                     </form><!-- form Finish -->  
                   </div><!-- box-header Finish -->
               </div><!-- box Finish -->
           </div><!-- col-md-9 Finish --> 
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   <?php include("footer.php"); ?>
</body>
</html>

<script>
var myInput = document.getElementById("c_pass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>





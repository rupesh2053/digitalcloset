<?php
	$active = "Account";
	include "header.php";
	include "navbar.php";
	include 'customer/authControl.php';
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
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

	<div class="container">
		<div class="containt">
		<div class="col-md-12"><!-- col-md-12 Begin -->
      	<ul class="breadcrumb"  style = "box-shadow: 0px 1px 5px rgba(0,0,0,0.8); padding: 8px 15px;  margin-bottom: 20px;  border-radius: 5px; font-weight: 600">
      	<li>
        <a href="index.php">Home</a>
        <li>My Account / Change Password</li>
      	</li>
      	</ul>
    </div>  <!-- col-md-12 Finish -->
			
		
<?php include "slidebar.php" ?>

<div class="col-md-9" style = "box-shadow: 1px 1px 2px 2px rgba(0,0,0,0.2); padding: 20px; background: #fff">

<h1 align = "center"> Change Password</h1>

	<center><?php if(count($error)>0): ?>
  	<div class="alert <?php echo $_SESSION['alert-class']; ?>">
  	<?php foreach($error as $error): ?>
  	<p><?php echo $error; ?></p>
    <?php endforeach; ?>
  	</div>
    <?php endif; ?></center>

    

		<form action = "" method = "post" enctype = "multiport/form-data"><!-- Form Begin -->
		<div class="form-group"><!-- form-group Begin -->
		<label>Your Old Password: </label>
		<input type="password" name="old_pass" class = "form-control" id = "myInput1">
		<input type="checkbox" onclick="myFunction1()">Show Password
		</div><!-- form-group Finish -->
		<script>
			function myFunction1() {
 			 var x = document.getElementById("myInput1");
  			if (x.type === "password") {
  			  x.type = "text";
 			 } else {
               x.type = "password";
 			 }
			}
		</script>


		<div class="form-group"><!-- form-group Begin -->
		<label>Your New Password: </label>
		<input type="password" name="new_pass" class = "form-control" id = "c_pass">
		<input type="checkbox" onclick="myFunction2()">Show Password
		</div><!-- form-group Finish -->

		<script type="text/javascript">function myFunction2() {
  			var x = document.getElementById("c_pass");
 			if (x.type === "password") {
 			    x.type = "text";
   			} else {
  	       	x.type = "password";
  		 	 }
			}
		</script>


		<div class="form-group"><!-- form-group Begin -->
		<label>Confirm Your New Password: </label>
		<input type="password" name="new_pass_again" class = "form-control" id = "myInput3">
		<input type="checkbox" onclick="myFunction3()">Show Password
		</div><!-- form-group Finish -->

		<script type="text/javascript">function myFunction3() {
  			var x = document.getElementById("myInput3");
 	 		if (x.type === "password") {
 	 		  x.type = "text";
  			} else {
  			  x.type = "password";
  				}
			}
		</script>

		<div class="text-center"><!-- text-center Begin -->
		<button name = "updatePass" type = "submit" class = "btn btn-info">
		<i class = "fa fa-user-md"></i> Update Now &rarr;
		</button>	
		</div><!-- text-center Finish -->

	</form><!-- Form Finish -->
	<!-- Password validation -->
    <div id="message">
    <h4 style = "font-weight: 800">Password must contain the following &rarr;</h4>
    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
    <p id="number" class="invalid">A <b>number</b></p>
    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
    <!-- Password validation End-->
	</div>
	</div>
	</div>
	</div>
	    <?php include "footer.php" ?>
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



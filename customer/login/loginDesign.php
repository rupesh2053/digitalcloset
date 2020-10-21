
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
​
<div class="container">
   
    <div class="col-md-6" style = "margin-left: 300px;box-shadow: 2px 2px 5px 3px; border-radius: 10px; padding: 20px">
    	<h2 class = "text-center" style = "background-color: purple; color: white; padding: 5px; margin-bottom: 20px">Login Form</h2>
    <form method = "post" action = "login.php">
    <div class="form-group">
    <label>Your Email</label>
    <input type="email" name="email" id = "email" class = "form-control" required>
    </div>
    <div class="form-group">
    <label for="pwd">Your Password</label>
    <input type="password" name="password" id = "password" class = "
				form-control" required>
    </div>
    <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn" style = "margin-left: 230px;background-color:purple;color: white; font-size:20px; font-weight:600 ">Submit &rarr;</button><br><br>
    <label><a href="#" style = "text-decoration: none; margin-left: 380px;  font-weight:600 ">Forget password? &rarr;</a></label><br>
    <label><a href="#" style = "text-decoration: none; margin-left: 380px;  font-weight:600 ">Create an account? &rarr;</a></label>

    </form>

    </div>
    </div>
   
</body> 
</html>
​


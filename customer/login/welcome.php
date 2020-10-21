<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Product Filter</h2>
  <p>Type a product name/title</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>

  
      <div class = "col-md-12">
    
    <table class="table table-hover table-borderless table-responsive">
      <thead style = "background-color: #100719; color: #fff">
        <th width = "10%">Product Name</th>
        <th width = "10%">Product Catagories</th>
        <th width = "10%">Catagories</th>
        <th width = "10%">Product Image</th>
        <th width = "10%">Product Date</th>
        <th width = "10%">Product Price</th>
        <th width = "10%">Product Keywords</th>
        <th width = "10%">Product Desc</th>


      </thead>
  
            <?php 
      $conn = mysqli_connect("localhost","root","","ecom_db");
      $query = "SELECT * FROM product";
      $result = mysqli_query($conn,$query);
      if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_array($result)){ ?>

      <tbody id = "myTable">
        <td width = "10%"><?php echo $row['product_title']; ?></td>
        <td width = "10%"><?php echo $row['product_catagories']; ?></td>
        <td width = "10%"><?php echo $row['catagories']; ?></td>
        <td><?php echo $row['product_img1']; ?></td>
        <td><?php echo $row['product_date']; ?></td>
        <td><?php echo $row['product_price']; ?></td>
        <td><?php echo $row['product_keywords']; ?></td>
        <td><?php echo $row['product_desc']; ?></td>
      </tbody>
    
  <?php } } ?>

</table>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>

<?php include "db.php" ?>
<div style = "font-size: 18px; font-weight: 600">
<?php include "header.php" ?>
</div>


<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styletshirt.css">
  <title></title>
</head>
<body>


  <section>
    <div class="container">
      <div class="row">
        <?php 
        $get_products = "SELECT * FROM product WHERE catagories = 'men' ";
                $run_products = mysqli_query($conn,$get_products);
              while($row_products=mysqli_fetch_array($run_products)){ ?>
        <div class="col-md-3">
          <div class="card">
            <div class="imgBox" style = "height: 300px">
              <img src = admin_area/product_images/<?php echo $row_products['product_img1'] ?> style = "width:260px">
            </div>
            <div class="details">
              <h3 style = "background-color: red; padding: 2px; color: #fff; border-radius: 5px"><?php echo $row_products["product_title"] ?></h3>
              <div class="price">Price: Rs. <?php echo $row_products["product_price"] ?>/-</div>
              <br><br>

              <h4>Sizes</h4>
              <ul>
                <li>XS</li>
                <li>S</li>
                <li>H</li>
                <li>XL</li>
                <li>XXL</li>
              </ul>

              <h4>Colors</h4>
              <ul class = "color" style = "height: 16px; width: 16px;background-color: red">
                <li></li>
              </ul>
              <ul class = "color" style = "height: 16px; width: 16px;background-color: green; margin-left: 35px; margin-top: -31px">
                <li></li>
              </ul>
                <ul class = "color" style = "height: 16px; width: 16px;background-color: black; margin-left: 55px; margin-top: -31px">
                <li></li>
              </ul>
                <ul class = "color" style = "height: 16px; width: 16px;background-color:blue; margin-left: 75px; margin-top: -31px">
                <li></li>
              </ul>
                <ul class = "color" style = "height: 16px; width: 16px;background-color: yellow; margin-left: 95px; margin-top: -31px">
                <li></li>
              </ul>
                <ul class = "color" style = "height: 16px; width: 16px;background-color: grey; margin-left: 115px; margin-top: -31px">
                <li></li>
              </ul>
              <a href="#" style = "font-size: 18px; font-weight: 600; background: red; color: #fff">Add To Cart &rarr;</a>
            </div>
          </div>
        </div>
      <?php } ?>


      </div>
    </div>
  </section>
  <br><br><br>
</body>
</html>
<div style = "font-size: 18px; padding: 5px">
<?php include "footer.php" ?>
</div>

<!DOCTYPE html>
<html>
<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="checkoutstyle.css">
  <script type="text/javascript">
  $(document).ready(function(){
  $('.bxslider').bxSlider({
    controls: false
  });
});
</script>
</head>
<body>
   <div class="wrapper">
  <div class="slider_container">
    <h3>your cart</h3>
    <ul class="bxslider">
  <li><img src="https://i.imgur.com/1mJWEZb.png" /></li>
  <li><img src="https://i.imgur.com/XASvbYf.png" /></li>
  <li><img src="https://i.imgur.com/dQJu1dt.png" /></li>
</ul>
  </div>
  <div class="checkout_container">
    <h3>credit card details</h3>
    <div class="form">
      <div class="input_item">
        <label>Name</label>
        <input type="text">
      </div>
      <div class="input_item">
        <label>Card number</label>
        <input type="text">
      </div>
      <div class="input_item grp">
        <div class="item">
          <label>Expiry date</label>
          <input type="text">
        </div>
        <div class="item">
          <label>CVV</label>
          <input type="text">
        </div>
      </div>
      <div class="btn">
        <a href="#">Proceed</a>
      </div>
    </div>
  </div>
</div>


</body>
</html>



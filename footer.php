<div>
<div id="footer"><!-- #footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
               
               <h4>Pages</h4>
                
                <ul style = "list-style-type: none"><!-- ul Begin -->
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                </ul><!-- ul Finish -->
                
                <hr>
                
                <h4>User Section</h4>
                
                <ul style = "list-style-type: none"><!-- ul Begin -->
                    <?php  
                      if(!isset($_SESSION['customer_email'])){
                            echo "<a  href = 'checkout.php'>My account</a>";
                         }else{
                            echo "<a  href = 'my_account.php?my_orders'>My account</a>";
                         }
                         ?>

                    <li>
                        <?php  
                      if(!isset($_SESSION['customer_email'])){
                            echo "<a  href = 'checkout.php'>Edit Account</a>";
                         }else{
                            echo "<a  href = 'my_account.php?edit_account'>Edit Account</a>";
                         }
                         ?>

                    </li>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Top Products Categories</h4>
                
                <ul><!-- ul Begin -->
                    <?php 
                      /* $conn = mysqli_connect("localhost","root","","ecom_db");
                       $get_p_cats = "SELECT * FROM product_catagories";
                       $run_p_cats = mysqli_query($conn,$get_p_cats);
                       while($row_p_cats = mysqli_fetch_array($run_p_cats)){
                       $p_cat_id = $row_p_cats['p_cat_id'];
                       $p_cat_title = $row_p_cats['p_cat_title'];
                       echo "
                       <a href = 'details.php'><option values='$p_cat_id'>$p_cat_title</option></a>
                       ";
                       } */
                      ?>

            <li><a href="jackets_c.php">Jackets</a></li>
            <li><a href="accessories_c.php">Accessories</a></li>
            <li><a href="shoes_c.php">Shoes</a></li>
            <li><a href="coats_c.php">Coats</a></li>
            <li><a href="tshirt_c.php">T-Shirt</a></li>
            <li><a href="bag_catagory.php">Backpack</a></li>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Find Us</h4>
                
                <p><!-- p Start -->
                    
                    <strong>Digital Closet inc.</strong>
                    <br/>Nepal
                    <br/>Kathmandu
                    <br/>+977-9803657199
                    <br/>digital_closet@gmail.com
                    <br/><strong>Our Team</strong>
                    
                </p><!-- p Finish -->
                
                <a href="contact.php">Check Our Contact Page</a>
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3">
                
                <h4>Get The News</h4>
                
                <p class="text-muted">
                    Dont miss our latest update products.
                </p>
                
                <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=M-devMedia', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" method="post"><!-- form begin -->
                    <div class="input-group"><!-- input-group begin -->
                        
                        <input type="text" class="form-control" name="email">
                        
                        <input type="hidden" value="M-devMedia" name="uri"/><input type="hidden" name="loc" value="en_US"/>
                        
                        <span class="input-group-btn"><!-- input-group-btn begin -->
                            
                            <input type="submit" value="subscribe" class="btn btn-default">
                            
                        </span><!-- input-group-btn Finish -->
                        
                    </div><!-- input-group Finish -->
                </form><!-- form Finish -->
                
                <hr>
                
                <h4>Keep In Touch</h4>
                
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>
                
            </div>
        </div><!-- row Finish -->
    </div><!-- container Finish -->
</div><!-- #footer Finish -->


<div id="copyright"><!-- #copyright Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-6"><!-- col-md-6 Begin -->
            
            <p class="pull-left">&copy; 2018 Degital Store All Rights Reserve</p>
            
        </div><!-- col-md-6 Finish -->
        <div class="col-md-6"><!-- col-md-6 Begin -->
            
            <p class="pull-right">Theme by: <a href="#">Our Team</a></p>
            
        </div><!-- col-md-6 Finish -->
    </div><!-- container Finish -->
</div><!-- #copyright Finish -->
</div>
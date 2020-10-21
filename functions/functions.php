
<div style = "box-shadow: 0px 1px 1px 1px">
<?php 

$db = mysqli_connect("localhost","root","","ecom_db");

function getPro(){
    
    global $db;
    
    $get_products = "SELECT * from product order by rand() DESC ";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        
        //$pro_price = $row_products['product_price'];
        $no_discount = $row_products['product_price'];

        
        $pro_img1 = $row_products['product_img1'];

        $pro_descount = $row_products['discount'];

        $pro_stock = $row_products['stock'];

        $noDis = ($no_discount * $pro_descount)/100;
        $noDis = $no_discount - $noDis;

        //$no_discount = $row_products['no_discount'];
        $pro_price = $row_products['no_discount'];


        echo "

        <div class = 'card-deck'>
        <div class='col-md-4 col-sm-6 single'>
            <div class='products' style = 'margin-left: -5px; width: width: 260px; height: 520px'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='imgBx' src='admin_area/product_images/$pro_img1' style = 'width: 240px'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>

                    
                    </h3>
                    
                    <p class='price'>
                    
                        <label style = 'font-weight: 800'>Rs. $pro_price/-</label> (<label style = 'font-weight: 100'><strike style = 'color:red'>Rs.$no_discount</strike></label>) ($pro_descount% <label style = 'color: red'>OFF</label>)
                    
                    </p>
                    <p class='color' style = 'font-weight: 600'>
                    
                        Colors: <label style = 'color: red'>Red</label> | <label style = 'color: green'>Green</label> | <label style = 'color: blue'>Blue</label> | <label style = 'color: black'>Black</label>
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            View Details

                        </a>
                    
                        <a class='btn btn-primary bttn' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Add to Cart

                        </a>
                    
                    </p>

                    <p style = 'font-weight: 600; color: #2E9AFE'>Only <b>$pro_stock</b> item in stock. Order Soon.
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
        </div>
     
        
        ";
        
    }
    
}


?>
</div>

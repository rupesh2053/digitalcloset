    <?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "ecom_db");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {      
           //echo "Item already in a cart!";
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     //echo '<script>alert("Item Removed")</script>';  
                   //  echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Shopping Cart</title>  
             
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 

      </head>  
      <body>  
      	


          
           <div class="container" > 
           <br> 
            <div class="col-md-12 text-center  " style = "margin-top: 10px; padding: 10px; background-color: black; color: white; font-size: 20px; font-weight: 600">SHOPPING CART</div><br><br><br><br><br>
           	 
	       
                
                <?php  
                $query = "SELECT * FROM tbl_product ORDER BY product_id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-3">
                
                	<div class="card border-primary" style = "margin-bottom: 10px; box-shadow: 3px 3px 2px 4px rgba(0,0,0,0.6); border: none" >
                			<div class="card-body">
                		      <form method="post" action="index.php?action=add&id=<?php echo $row["product_id"]; ?>">  
                            <div style= "background-color:#fff;padding:16px;" >  
                              <!-- <img src=" <?php echo $row["admin_area/product_images/$product_img1"]; ?>" class="img-responsive" /><br /> -->

                             
                             <h4 class="text-info" style = "font-weight: 500; font-size: 20px; margin-left: 20px"><?php echo $row["product_title"]; ?></h4>  
                               <h4 class="text-danger" style = "margin-left: 20px">Rs. <?php echo $row["product_price"]; ?>/-</h4> 
                               <h4 class="text-info" style = "margin-left: 20px"> <?php echo $row["product_desc"]; ?></h4>  

                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["product_title"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" />  
                               <button type="submit" name="add_to_cart" style="margin-top:5px; margin-left: 0px" align = "left" class="btn btn-info">Add to Cart&rarr; </button> 
                               <button type="submit" name="buy_now" style="margin-top:5px; margin-left: 10px; background-color: purple; color: #fff; font-weight: 400" align = "left" class="btn" > Buy Now&rarr;  </button> 
                               




                          </div> 
                     </form>  
             		</div>
               </div>
             </div>
                 
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                <h3  style = "box-shadow: 1px 1px 5px 3px ; padding: 7px" ><center>Order Details</center></h3>  
                <div class="table-responsive" style = "box-shadow: 1px 1px 5px 3px ">  
                     <table class="table table-bordered" >  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text text-danger btn-lg">x</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right" class = "text-info" style = "font-weight : 600">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                  
                </div>
           </div>  
           <br />  
      </body>  
 </html>
   
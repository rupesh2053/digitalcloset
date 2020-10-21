<?php 
  if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self');</script>" ;
  }else{
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">

    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
 	<title></title>
 </head>
 <body>
 	<br>

 	<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Products
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->

<div class="col-md-12">
	<h3 class = "text-center " style = "margin-top: -10px;margin-bottom: 10px;background-color: purple; padding: 10px; color: #fff; font-weight: 800"><i class="fa fa-money fa-fw"></i>Insert Products</h3>
</div>

<div class="panel-body"><!-- panel-body Begin -->
	
            <form method="post" action = "insert.php" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                <div class="form-group"><!-- form-group Begin -->     
                <label class="col-md-3 control-label"> Product Title </label>  
                <div class="col-md-6"><!-- col-md-6 Begin -->    
                <input name="product_title" type="text" class="form-control" required>
                </div><!-- col-md-6 Finish --> 
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->     
                <label class="col-md-3 control-label"> Product Catagories </label>  
                <div class="col-md-6"><!-- col-md-6 Begin -->    
                <select name="product_cat" class="form-control"><!-- form-control Begin -->
                      <option> Select a Category Product </option>      
                      <?php 
                      $conn = mysqli_connect("localhost","root","","ecom_db") or die("error in connection");
                       $get_p_cats = "SELECT * FROM product_catagories";
                       $run_p_cats = mysqli_query($conn,$get_p_cats);
                       while($row_p_cats = mysqli_fetch_array($run_p_cats)){
                       $p_cat_id = $row_p_cats['p_cat_id'];
                       $p_cat_title = $row_p_cats['p_cat_title'];
                       echo "
                       <option values='$p_cat_id'>$p_cat_title</option>
                       ";
                       }
                      ?>    
                </select><!-- form-control Finish -->
                </div><!-- col-md-6 Finish --> 
                </div><!-- form-group Finish -->


                <div class="form-group"><!-- form-group Begin -->     
                <label class="col-md-3 control-label">Catagories </label>  
                <div class="col-md-6"><!-- col-md-6 Begin -->    
                <select name="cat" class="form-control"><!-- form-control Begin -->
                      <option> Select a Categories</option>      
                        <?php 
                             $get_cats = "SELECT * FROM catagories";
                             $get_cats = "SELECT * FROM catagories";
                             $run_cats = mysqli_query($conn,$get_cats);
                             while($row_cats = mysqli_fetch_array($run_cats)){
                             $cat_id = $row_cats['cat_id'];
                             $cat_title = $row_cats['cat_title'];
                             echo "
                             <option values='$cat_id'>$cat_title</option>
                              ";
                             }
                             ?>    
                </select><!-- form-control Finish -->
                </div><!-- col-md-6 Finish --> 
                </div><!-- form-group Finish -->


                <div class="form-group"><!-- form-group Begin -->
                <label class="col-md-3 control-label"> Product Image 1</label> 
                <div class="col-md-6"><!-- col-md-6 Begin -->
                <input name="product_img1" type="file" class="form-control" required>
                </div><!-- col-md-6 Finish -->
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->
                <label class="col-md-3 control-label"> Product Image 2</label> 
                <div class="col-md-6"><!-- col-md-6 Begin -->
                <input name="product_img2" type="file" class="form-control" required>
                </div><!-- col-md-6 Finish -->
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->
                <label class="col-md-3 control-label"> Product Image 3</label> 
                <div class="col-md-6"><!-- col-md-6 Begin -->
                <input name="product_img3" type="file" class="form-control" required>
                </div><!-- col-md-6 Finish -->
                </div><!-- form-group Finish -->

               
                <div class="form-group"><!-- form-group Begin -->     
                <label class="col-md-3 control-label"> Product Price </label>  
                <div class="col-md-6"><!-- col-md-6 Begin -->    
                <input name="product_price" type="text" class="form-control" required>
                </div><!-- col-md-6 Finish --> 
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->
                <label class="col-md-3 control-label"> Discount (in % ) </label> 
                <div class="col-md-6"><!-- col-md-6 Begin -->
                <input name="discount" type="text" class="form-control" required>
                </div><!-- col-md-6 Finish -->
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->
                <label class="col-md-3 control-label"> Product (in stock) </label> 
                <div class="col-md-6"><!-- col-md-6 Begin -->
                <input name="stock" type="text" class="form-control" required>
                </div><!-- col-md-6 Finish -->
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->     
                <label class="col-md-3 control-label"> Product Keywords </label>  
                <div class="col-md-6"><!-- col-md-6 Begin -->    
                <input name="product_keywords" type="text" class="form-control" required>
                </div><!-- col-md-6 Finish --> 
                </div><!-- form-group Finish -->

                <div class="form-group"><!-- form-group Begin -->     
                <label class="col-md-3 control-label">Product Desc</label>  
                <div class="col-md-6"><!-- col-md-6 Begin -->    
                <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>
                </div><!-- col-md-6 Finish --> 
                </div><!-- form-group Finish -->



                <div class="form-group"><!-- form-group Begin -->     
                <div class="col-md-6"><!-- col-md-6 Begin -->    
                <button class = "btn" type = "submit" style = "color: #fff; background-color: purple; margin-left: 440px">Insert Product &rarr;</button>
                </div><!-- col-md-6 Finish --> 
                </div><!-- form-group Finish -->

               
             </form>
         </div>

</body>
</html>
<?php } ?>

<?php 

//index.php

include('database_connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <!-- Page Content -->
    <div class="container">

        <h2 align = 'center' style = 'box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.5); padding: 10px'>Product Filter</h2>
    <div class="row">
    <div class="col-md-3">
    <div class="list-group">
    <h3>Price</h3>
    <input type="hidden" id="hidden_minimum_price" value="0" />
    <input type="hidden" id="hidden_maximum_price" value="200000" />
    <p id="price_show">0 - 200000</p>
    <div id="price_range"></div>
    </div>    

    <div class="list-group">
    <h3>Product Catagories</h3>
    <div>
    <?php
        $query = "SELECT DISTINCT(product_catagories) FROM product ORDER BY product_id DESC";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row)
            {
    ?>
        <div class="list-group-item checkbox">
        <label><input type="checkbox" class="common_selector product_catagories" value="<?php echo $row['product_catagories']; ?>"> <?php echo $row['product_catagories']; ?></label>
        </div>
    <?php } ?>
        </div>
        </div>

    <div class="list-group">
     <h3>Catagories</h3>
     <div>
        <?php
        $query = "SELECT DISTINCT(catagories) FROM product ORDER BY catagories DESC";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
        ?>
        <div class="list-group-item checkbox">
        <label><input type="checkbox" class="common_selector catagories" value="<?php echo $row['catagories']; ?>" > <?php echo $row['catagories']; ?></label>
        </div>
        <?php } ?>
        </div>
        </div>
        </div>



    <div class="col-md-9">
    <br />
    <div class="row filter_data">
    </div>
    </div>

    </div>
    </div>
<style>
#loading
{
 text-align:center; 
 background: url('loader.gif') no-repeat center; 
 height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading"></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var product_catagories = get_filter('product_catagories');
        var catagories = get_filter('catagories');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, product_catagories:product_catagories, catagories:catagories},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:500000,
        values:[1000,500000],
        step:50,
        stop:function(event,ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css copy/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../style.css">
    
    <script type="text/javascript" src="../js copy/bootstrap.min.js"></script>
  
    <style>

.product_img{
    width:100px;
    object-fit:contain;
}


</style>
</style>
</head>
<body>
    <div class="contianer table-responsive">
    <h1 class="twxt-center text-sucess"> All Products </h1>
    <table class="table table-striped">
        <thead class="bg-primary">
            <tr>
                <th>Product Id</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Statuts</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            $get_query="select * from `products`";
            $connection=mysqli_query($conn,$get_query);
            $number=0;
            while($row=mysqli_fetch_assoc($connection)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $status=$row['status'];
                $number++;
                ?>
               
                <tr>
                <td><?php echo $number;?> </td>
                <td><?php echo $product_title; ?></td>
                <td><img src='../Product_img/<?php echo $product_image1; ?>' class='product_img'></td>
                <td><?php $product_price; ?></td>
                <td>
                    <?php

  $get_count="select * from `order_pending` where product_id=$product_id";
  $result_count=mysqli_query($conn,$get_count);
  $rows_count=mysqli_num_rows($result_count);
  echo $rows_count; ?>



                </td>
                <td><?php echo $status; ?></td>
                <td><a href='orders.php?edit_products=<?php echo $product_id ?>' class='text-light'><i class='fas fa-edit'></i></i></td>
                <td><a href='orders.php?delete_product=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></td>
            </tr>
  
       <?php }?>
       
        
        </tbody>
    </table>
    </div>
</body>
</html>
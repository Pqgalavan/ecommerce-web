<?php
include('../db.php');
if(isset($_POST['insert_product'])){
    $ptitle = $_POST['product_title'];
    $pdescription = $_POST['description_title'];
    $pkeyword = $_POST['keyword_title'];
    $pcatogiries = $_POST['product_catogiries'];
    $pbrands = $_POST['product_brands'];
    $pprice = $_POST['product_price'];
    $pstatus = 'true';


//acces img
    $pimage1= $_FILES['Product_Image1'] ['name'];
    $pimage2= $_FILES['Product_Image2'] ['name'];
    $pimage3= $_FILES['Product_Image3'] ['name'];

    $timage1= $_FILES['Product_Image1'] ['tmp_name'];
    $timage2= $_FILES['Product_Image2'] ['tmp_name'];
    $timage3= $_FILES['Product_Image3'] ['tmp_name'];
  

    move_uploaded_file($timage1,"../Product_img/$pimage1");
    move_uploaded_file($timage2,"../Product_img/$pimage2");
    move_uploaded_file($timage3,"../Product_img/$pimage3");



    $sql = "insert into `products`(product_title,product_description,product_keyword,cat_id,brand_id,product_image1,product_image2,product_image3,
    product_price,date,status) values (' $ptitle',' $pdescription','$pkeyword','$pcatogiries','$pbrands','$pimage1',
    '$pimage2','$pimage3','$pprice',NOW(),'$pstatus')";

    $result = mysqli_query($conn ,$sql);
    if($result){
        echo '<script>alert("sucessfully uploaded the products")</script>';
    }


    
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css copy/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../style.css">
    
    <script type="text/javascript" src="../js copy/bootstrap.min.js"></script>
    <title>admin insert</title>
    <style>
        select{
            margin: 3%;
           
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto" >
                <label for="Product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="Product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>


            <div class="form-outline mb-4 w-50 m-auto" >
                <label for="Description_title" class="form-label">Description</label>
                <input type="text" name="description_title" id="Description_title" class="form-control" placeholder="Enter Description" autocomplete="off" required="required">
            </div>


            <div class="form-outline mb-6 w-50 m-auto" >
                <label for="Keyword_title" class="form-label">Keyword</label>
                <input type="text" name="keyword_title" id="Keyword_title" class="form-control" placeholder="Enter Keyword" autocomplete="off" required="required">
            </div>



            <div class="form-outline m-6 w-50 m-auto" >


               <select name="product_catogiries" id="" class="form-control mb-6 px-3">
               <option value="">select catogiries</option>
                <?php
                $sql = "SELECT * FROM `catagories`";
                $result = mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $cat_title = $row['catogiries_title'];
                    $cat_id =$row['catogiries_id'];
                   echo "<option value='$cat_id'>$cat_title</option>";

                }


                ?>

               </select>
            </div>


            <div class="form-outline w-50 m-6 m-auto " >
               <select name="product_brands" id="" class="form-control mb-6 px-3">
                <option value="">select brands</option>
                <?php
                $sql = "SELECT * FROM `brands`";
                $result = mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $brand_title = $row['brands_title'];
                    $brand_id =$row['brands_id'];
                   echo "<option value='$brand_id'>$brand_title</option>";

                }


                ?>
               </select>
            </div>


          <div class="form-outline mb-4 w-50 m-auto" >
                <label for="Product_Image1" class="form-label">Product Image</label>
                <input type="file" name="Product_Image1" id="Product_Image1" class="form-control" placeholder="Enter Product Image" autocomplete="off" required="required">
            </div>


            <div class="form-outline mb-4 w-50 m-auto" >
                <label for="Product_Image2" class="form-label">Product Image</label>
                <input type="file" name="Product_Image2" id="Product_Image2" class="form-control" placeholder="Enter Product Image" autocomplete="off" required="required">
            </div>


            <div class="form-outline mb-4 w-50 m-auto" >
                <label for="Product_Image3" class="form-label">Product Image</label>
                <input type="file" name="Product_Image3" id="Product_Image3" class="form-control" placeholder="Enter Product Image" autocomplete="off" required="required">
            </div>
           

          <div class="form-outline m-4 w-50 m-auto" >
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter price" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto" >
                <input type="submit" name="insert_product" value="Insert Product"  class="btn btn-infor mb-3 px-3">

        </form>
    </div>
    

</body>
</html>
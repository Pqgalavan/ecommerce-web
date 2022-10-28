<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

.edit_img{
    width:100px;
    object-fit:contain;
}
</style>
<?php

if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
$products="select * from `products` where product_id=$edit_id";
$result=mysqli_query($conn,$products);
$fetch=mysqli_fetch_assoc($result);
$product_title=$fetch['product_title'];
$product_description=$fetch['product_description'];
$product_keyword=$fetch['product_keyword'];
$cat_id=$fetch['cat_id'];
$brand_id=$fetch['brand_id'];
$product_image1=$fetch['product_image1'];
$product_image2=$fetch['product_image2'];
$product_image3=$fetch['product_image3'];
$product_price=$fetch['product_price'];


 $select_cat= "SELECT * FROM `catagories` where catogiries_id=$cat_id ";
 $result_cat=mysqli_query($conn,$select_cat);
 $row=mysqli_fetch_assoc($result_cat);
 $cat_title=$row['catogiries_title'];
 
 $select_brands= "SELECT * FROM `brands` where brands_id=$brand_id ";
 $result_brands=mysqli_query($conn,$select_brands);
 $row1=mysqli_fetch_assoc($result_brands);
 $brand_title=$row1['brands_title'];
 

}



?>

</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">

    <div class="form-outline  w-50 m-auto ">
        <label for="product" class="form-label">Product Title</label>
        <input type="text "  id="product" name="product_title" class="form-control" value="<?php echo $product_title; ?>" required>
    
    </div>
    <div class="form-outline  w-50 m-auto ">
        <label for="des" class="form-label">Product Description</label>
        <input type="text "  id="des" name="product_description" class="form-control" value="<?php echo $product_description; ?>" required>
    
    </div>
    <div class="form-outline  w-50 m-auto ">
        <label for="key" class="form-label">Product Keyword</label>
        <input type="text "  id="key" name="product_keyword" class="form-control" value="<?php echo $product_keyword; ?>"  required>
    
    </div>
    <div class="form-outline  w-50 m-auto ">
        <label for="cat" class="form-label">Product Catogiries</label>
        <select name="product_catogory" id="cat" class="form-control">
           
           <?php 


$select_cat_all= "SELECT * FROM `catagories` ";
 $result_cat_all=mysqli_query($conn,$select_cat_all);
 while($row_all=mysqli_fetch_assoc($result_cat_all)){
 $cat_title_all=$row_all['catogiries_title'];
 $cat_id=$row_all['catogiries_id'];
 echo " <option value=$cat_id> $cat_title_all</option>";
 }
?>
        </select>
    </div>
    
    <div class="form-outline  w-50 m-auto ">
        <label for="brand" class="form-label">Product Brands</label>
        <select name="product_brands" id="brand" class="form-control">
        <?php 


$select_brands_all= "SELECT * FROM `brands` ";
 $result_brands_all=mysqli_query($conn,$select_brands_all);
 while($row_all_brands=mysqli_fetch_assoc($result_brands_all)){
 $brands_title_all=$row_all_brands['brands_title'];
 $brands_id=$row_all_brands['brands_id'];
 echo " <option value=$brands_id> $brands_title_all</option>";
 }
?>
        </select>
    </div>
    <div class="form-outline  w-50 m-auto ">
        <label for="img" class="form-label">Product Image1</label>
        <div class="d-flex">
        <input type="file"  id="img" name="product_img1" class="form-control w-90 m-auto" required>
        <img src="../Product_img/<?php echo $product_image1; ?>" alt="" class="edit_img">
</div>
    </div>
    <div class="form-outline  w-50 m-auto ">
        <label for="img2" class="form-label">Product Image2</label>
        <div class="d-flex">
        <input type="file"  id="img2" name="product_img2" class="form-control w-90 m-auto" required>
        <img src="../Product_img/<?php echo $product_image2; ?>" alt="" class="edit_img">
</div>
    </div>
    <div class="form-outline  w-50 m-auto ">
        <label for="img3" class="form-label">Product Image3</label>
        <div class="d-flex">
        <input type="file"  id="img3" name="product_img3" class="form-control w-90 m-auto" required>
        <img src="../Product_img/<?php echo $product_image3; ?>" alt="" class="edit_img">
</div>
    </div>
    <div class="form-outline  w-50 m-auto ">
        <label for="price" class="form-label">Product Price</label>
        <input type="text "  id="price" name="product_price" class="form-control" value=" <?php echo $product_price; ?>"required>
    
    </div>
    <div class="text-center">
        <input type="submit" name="edit_product" value="Update Product" class="btn btn-primary px-3 mb-3">
    </div>
    


    </form>
</div>

<?php
  
if(isset($_POST['edit_product'])){
    $title=$_POST['product_title'];
    $description=$_POST['product_description'];
    $keyword=$_POST['product_keyword'];
    $cat=$_POST['product_catogory'];
    $brands=$_POST['product_brands'];
    $price=$_POST['product_price'];

    $img1=$_FILES['product_img1'] ['name'];
    $img2=$_FILES['product_img2'] ['name'];
    $img3=$_FILES['product_img3'] ['name'];
 
    $temp_img1=$_FILES['product_img1'] ['tmp_name'];
    $temp_img2=$_FILES['product_img2'] ['tmp_name'];
    $temp_img3=$_FILES['product_img3'] ['tmp_name'];

move_uploaded_file($temp_img1,"../Product_img/$img1");
move_uploaded_file($temp_img2,"../Product_img/$img2");
move_uploaded_file($temp_img3,"../Product_img/$img3");
// echo "$cat,$brands,";
 $update_product="update `products` set product_title='$title',product_description='$description',product_keyword='$keyword',
 cat_id=$cat,brand_id=$brands,product_image1='$img1',product_image2='$img2',product_image3='$img3',
 product_price=$price,date=NOW() where product_id=$edit_id";
$update_query=mysqli_query($conn,$update_product);
if($update_query){
    echo " <script>alert('product inserted sucessfully')</script>";
    echo " <script>window.open('view_products.php'.'_self')</script>";
}



}





?>

</body>
</html>
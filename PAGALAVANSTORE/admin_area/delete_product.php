<?php
if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    $delete_product="delete from `products` where product_id=$delete_id";
    $result_product=mysqli_query($conn,$delete_product);
    echo " <script>alert('Product Deleted sucessfully')</script>";
    echo " <script>window.open('view_products.php'.'_self')</script>";

}
if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
    $delete_brand="delete from `brands` where brands_id=$brand_id";
    $result_brand=mysqli_query($conn,$delete_brand);
    echo " <script>alert('brand Deleted sucessfully')</script>";
    echo " <script>window.open('view_products.php'.'_self')</script>";

}
if(isset($_GET['cat'])){
    $cat_id=$_GET['cat'];
    $delete_cat="delete from `catagories` where catogiries_id=$cat_id";
    $result_cat=mysqli_query($conn,$delete_cat);
    echo " <script>alert('Catogirires Deleted sucessfully')</script>";
    echo " <script>window.open('view_products.php'.'_self')</script>";

}
if(isset($_GET['user'])){
    $user_id=$_GET['order'];
    $delete_order="delete from `user_orders` where order_id=$order_id";
    $result_order=mysqli_query($conn,$delete_order);
    echo " <script>alert('Order Deleted sucessfully')</script>";
    echo " <script>window.open('view_products.php'.'_self')</script>";

}
if(isset($_GET['user'])){
    $user_id=$_GET['user'];
    $delete_user="delete from `user_register` where user_id=$user_id";
    $result_user=mysqli_query($conn,$delete_user);
    echo " <script>alert('User Deleted sucessfully')</script>";
    echo " <script>window.open('view_products.php'.'_self')</script>";

}
?>
<?php
include('../db.php');
include('../function.php');


if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

}


$ip=getIpAddress();
$total_price=0;
$cart_query="select * from `cart` where ip_adress='$ip'";
$result_price=mysqli_query($conn,$cart_query);
$invoice_number=mt_rand();
$status='pending';
$row_product=mysqli_num_rows($result_price);
while($row_cart=mysqli_fetch_array($result_price)){
$product_id=$row_cart['product_id'];


    $product_price=array($row_cart['product_price'] * $row_cart['quantity']);
    $quantity= $row_cart['quantity'];
    $product_price_sum=array_sum($product_price);
    $total_price+=$product_price_sum;
}






$insert_order= "insert into `user_orders`(user_id,amount_due,invoice_number,total_products,order_date,order_status)
values ($user_id,$total_price,$invoice_number,$row_product,NOW(),'$status')";
$result_query=mysqli_query($conn,$insert_order);
if($result_query){
    echo "<script>alert('orders are submitted sucessfully')</script>";
   


$insert_order_pending= "insert into `order_pending`(user_id,invoice_number,product_id,quantity,order_status)
values ($user_id,$invoice_number,$product_id,$quantity,'$status')";

$result_pending=mysqli_query($conn,$insert_order_pending);



$empty_cart = "delete  from `cart` where ip_adress='$ip'";
$result_delete=mysqli_query($conn,$empty_cart);
echo "<script>window.open('profile.php','_self')</script>";
}



?>
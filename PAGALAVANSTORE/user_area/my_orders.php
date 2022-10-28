<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <style>




</style>
</head>
<body>
    
<?php
$username=$_SESSION['username'];
$user="select * from `user_register` where user_name='$username'";
$result=mysqli_query($conn,$user);
$fetch=mysqli_fetch_assoc($result);
$user_id=$fetch['user_id'];

?>

<div class="container-fluid table-responsive">
 <h3 class="text-center text-sucess">
    All My Orders
 </h3>
 <table  class="table table-bordered mt-5 bg-primary bodywrapcenter">
    <tr>
        <th>S.No</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
    <tbody class="bg-secondary ">
        <?php

        $order="select * from `user_orders` where user_id=$user_id";
        $result_orders=mysqli_query($conn,$order);
        $number=1;
        while($row_orders=mysqli_fetch_assoc($result_orders)){
            $oid=$row_orders['order_id'];
            $amount=$row_orders['amount_due'];
            $total_products=$row_orders['total_products'];
            $invoice_number=$row_orders['invoice_number'];
            $order_status=$row_orders['order_status'];
            if($order_status=='pending'){
                $order_status='Incomplete';
            }else{
                $order_status='Complete';
            }
            $date=$row_orders['order_date'];
         
            echo"    <tr>
            <td>$number</td>
            <td>$amount</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$date</td>
            <td>$order_status</td>";
        
            ?>
            <?php
            if($row_orders['order_status']=='complete'){
                echo "<td>Paid</td>";
            }else{
                
          echo " <td><a href='confirm_payment.php?order_id=$oid' class='text-light'>Confirm</a></td>
    </tr>";
   
            }
            $number++ ;
            }
        
        ?>
    
    </tbody>
 </table>
 </div>
</body>
</html>
<div class="container table-responsive">
<h3 class="text-center text-primary">All Orders</h3>


<table class="table table-bordered  mt-5">

<thead class="bg-info">
    <th>S.No</th>
    <th>Due Amount</th>
    <th>Invoice No</th>
    <th>Total Product</th>
    <th>Order Date</th>
    <th>Status</th>
    <th>Delete</th>
</thead>

<?php
$get_orders="select * from `user_orders`";
$result=mysqli_query($conn,$get_orders);
$row=mysqli_num_rows($result);
if($row==0){
    echo "<h1 class='text-center text-danger mt-5'>No Orders Yet</h1>";
}else{

$number=0;

while($fetch=mysqli_fetch_assoc($result)){
    $oid=$fetch['order_id'];
    $uid=$fetch['user_id'];
    $due=$fetch['amount_due'];
    $i_no=$fetch['invoice_number'];
    $total_products=$fetch['total_products'];
    $o_date=$fetch['order_date'];
    $o_status=$fetch['order_status'];

$number++;
echo"
<tbody class='text-dark'>
<tr>
<td>$number</td>
<td>$due</td>
<td>$i_no</td>
<td>$total_products</td>
<td>$o_date</td>
<td>$o_status</td>
<td><a href='orders.php?order=$oid' class='text-dark'><i class='fa-solid fa-trash'></i></td>
</tr>
";

    }}
?>


    
</div>
</tbody>
</table>
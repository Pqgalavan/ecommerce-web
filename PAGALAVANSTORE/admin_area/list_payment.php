<div class="container table-responsive">

<h3 class="text-center text-primary">All Payments</h3>


<table class="table table-bordered  mt-5">

<thead class="bg-info">
    <th>S.No</th>
    <th>Amount</th>
    <th>Invoice No</th>
    <th>Payment Method</th>
    <th>Date</th>
    
</thead>

<?php
$get_orders="select * from `user_payments`";
$result=mysqli_query($conn,$get_orders);
$row=mysqli_num_rows($result);
if($row==0){
    echo "<h1 class='text-center text-danger mt-5'>No Payments Yet</h1>";
}else{

$number=0;

while($fetch=mysqli_fetch_assoc($result)){
    $oid=$fetch['order_id'];
    $pid=$fetch['payment_id'];
    $amount=$fetch['amount'];
    $i_no=$fetch['invoice_number'];
    $mode=$fetch['payment_mode'];
    $date=$fetch['date'];
  

$number++;
echo"
<tbody class='text-dark'>
<tr>
<td>$number</td>
<td>$amount</td>
<td>$i_no</td>
<td>$mode</td>
<td>$date</td>

</tr>
";

    }}
?>
</div>



</tbody>
</table>
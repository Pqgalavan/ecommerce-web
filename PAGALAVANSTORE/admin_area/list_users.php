
<div class="container table-responsive">

<h3 class="text-center text-primary">All Users</h3>


<table class="table table-bordered  mt-5">

<thead class="bg-info">
    <th>S.No</th>
    <th>Username</th>
    <th>User email</th>
    <th>Adress</th>
    <th>Mobile</th>
    <th>Delete</th>
    
</thead>

<?php
$get_orders="select * from `user_register`";
$result=mysqli_query($conn,$get_orders);
$row=mysqli_num_rows($result);
if($row==0){
    echo "<h1 class='text-center text-danger mt-5'>No Users Yet</h1>";
}else{

$number=0;

while($fetch=mysqli_fetch_assoc($result)){
    $uid=$fetch['user_id'];
    $uname=$fetch['user_name'];
    $uemail=$fetch['user_email'];
    $uadress=$fetch['user_adress'];
    $contact=$fetch['user_contact'];
   

$number++;
echo"
<tbody class='text-dark'>
<tr>
<td>$number</td>
<td>$uname</td>
<td>$uemail</td>
<td>$uadress</td>
<td>$contact</td>
<td><a href='orders.php?user=<?php echo $uid?>' class='text-dark'><i class='fa-solid fa-trash'></i></td>

</tr>
";

    }}
?>
</div>


</tbody>
</table>
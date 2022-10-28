
<h3 class="text-center text-danger">All brands</h3>

<table class="table table-bordered mt-5">
   <thead class="bg-info text-center">
    <th>S.No</th>
    <th>brand Title</th>
    <th>Delete</th>
   </thead>
  
    <tbody class="bg-seconday text-dark">
        <tr>
            <?php
            $select_brands="select * from `brands`";
            $result_brands=mysqli_query($conn,$select_brands);
            $number=0;
           while( $fetch=mysqli_fetch_assoc($result_brands)){
 $brands_id=$fetch['brands_id'];
 $brands_title=$fetch['brands_title'];
 $number++;
      ?>
           <td><?php echo $number ?></td>
           <td><?php echo $brands_title ?></td>
                <td><a href='orders.php?brand=<?php echo $brands_id?>' class='text-dark'><i class='fa-solid fa-trash'></i></td>
        </tr>
   <?php } ?>
   </tbody>
</table>




<?php






?>
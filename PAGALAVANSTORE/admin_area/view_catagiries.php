
<h3 class="text-center text-danger">All Catageries</h3>

<table class="table table-bordered mt-5">
   <thead class="bg-info text-center">
    <th>S.No</th>
    <th>Catogiries Title</th>
    <th>Delete</th>
   </thead>
  
    <tbody class="bg-seconday text-dark">
        <tr>
            <?php
            $select_cat="select * from `catagories`";
            $result_cat=mysqli_query($conn,$select_cat);
            $number=0;
           while( $fetch=mysqli_fetch_assoc($result_cat)){
 $cat_id=$fetch['catogiries_id'];
 $cat_title=$fetch['catogiries_title'];
 $number++;
      ?>
           <td><?php echo $number ?></td>
           <td><?php echo $cat_title ?></td>
                <td><a href='orders.php?cat=<?php echo $cat_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></td>
        </tr>
   <?php } ?>
   </tbody>
</table>




<?php






?>
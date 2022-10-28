<?php
include('../db.php');
if(isset($_POST['insert_brands'] )){
  $brand_title = $_POST['brands_title'];

  $present = "SELECT * FROM `brands` WHERE brands_title = '$brand_title'";
  $result = mysqli_query($conn,$present);
  $number = mysqli_num_rows($result);
  if($number > 0 ){
    echo "<script>alert('your brands is already present')</script>";
  }else{
  $sql = "INSERT INTO `brands`(brands_title) VALUES ('$brand_title')";
  $result = mysqli_query($conn,$sql);
  if($result){
    echo "<script>alert('sucessful')</script>";
  }else{
    echo "<script>alert('error')</script>";
  }
}

}
?>







<form action="" method="post" class="mb-2">


    <div class="input-group w-90 mb-2">
      <span class="input-group-text bg-info" id="one">@</span>
      <input type="text" class="form-control" name="brands_title" placeholder="Insert Brands">
    </div>
    <div class="input-group w-10 mb-2">
    <button class="form-control bg-info " style= "color:white" name='insert_brands'>insert_brands </button>
    </div>
</form>
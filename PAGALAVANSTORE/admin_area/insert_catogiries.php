<?php
include('../db.php');
if(isset($_POST['insert_cat'] )){
  $cat_title = $_POST['cat_title'];

  $present = "SELECT * FROM `catagories` WHERE catogiries_title = '$cat_title'";
  $result = mysqli_query($conn,$present);
  $number = mysqli_num_rows($result);
  if($number > 0 ){
    echo "<script>alert('your catogiries is already present')</script>";
  }else{
  $sql = "INSERT INTO `catagories`(catogiries_title) VALUES ('$cat_title')";
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
      <input type="text" class="form-control" name='cat_title' placeholder="Insert_Catogiries">
    </div>
    <div class="input-group w-10 mb-2">
    <button class="form-control bg-info " style= "color:white" name='insert_cat'>Insert_Catogiries </button>
    </div>
</form>
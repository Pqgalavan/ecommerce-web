<?php

if(isset($_GET['edit_account'])){
    $username=$_SESSION['username'];
    $select_query="select * from `user_register` where user_name='$username'";
    $result_query=mysqli_query($conn,$select_query);
    $fetch_data=mysqli_fetch_assoc($result_query);
    $user_id=$fetch_data['user_id'];
    $user_name=$fetch_data['user_name'];
    $user_email=$fetch_data['user_email'];
    $user_adress=$fetch_data['user_adress'];
    $user_mobile=$fetch_data['user_contact'];
}

    if(isset($_POST['update'])){
        $update_id=$user_id;
    $user_name=$_POST['username'];
    $user_email=$_POST['email'];
    $user_adress=$_POST['adress'];
    $user_mobile=$_POST['mobile'];

    $update_query="update `user_register` set user_name= '$user_name' , user_email='$user_email', user_adress='$user_adress', user_contact='$user_mobile' ";
    $result_query_update=mysqli_query($conn,$update_query);
    if($result_query_update){
        echo"<script>alert('User updated Sucessfully')</script>";
        echo"<script>window.open('profile.php','_self')</script>";
    }



    }






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">
     Edit Account
    </h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="username" value="<?php echo $user_name?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="email" value="<?php echo $user_email?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="adress" value="<?php echo $user_adress?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="mobile" value="<?php echo $user_mobile?>">
        </div>
        <input type="submit" class="btn btn-info py-2 px-3 mb-3 b-0"  value="update" name="update" >
    </form>
</body>
</html>
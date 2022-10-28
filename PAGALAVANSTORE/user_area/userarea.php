<?php
include('../db.php');
include('../function.php');

@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css copy/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../style.css">
    
    <script type="text/javascript" src="../js copy/bootstrap.min.js"></script>
  
    <title>User Login</title>
    <style>
       
    body{
        overflow-x:hidden;
        background-image: url('../img/user.jpeg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
       
        background-size: cover;
   
    }
    
        </style>
</head>
<body>

    <div class="container-fluid my-3 ">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center ">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data" >
                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-label">
                            Username
                        </label>
                        <input type="text" id="user_username" class="form-control"
                         placeholder="Enter Your Username" autocomplete="off" required name="username" >

                    </div>
                   
                    
                    <div class="form-outline mb-3">
                        <label for="user_password" class="form-label">
                            Password
                        </label>
                        <input type="password" id="user_password" class="form-control"
                         placeholder="Enter Your Password" autocomplete="off" required name="password" >

                    </div>
                   
                    
                    <div class="text-center">
                        <input type="submit" value="Login" 
                        class="btn btn-info py-3 px-3 border-0  " name="login">
                        <p class="fw-bold mt-2 pt-1">Don't have an account? <a href="./user_registration.php" class="text-primary">Register</a></p>
                    </div>
                </form>

        </div>
    </div>
    </div>
    
</body>
</html>




<?php

if(isset($_POST['login'])){
    $uname=$_POST['username'];
    $pass=$_POST['password'];

$select_query="select * from `user_register` where user_name='$uname'";
$result=mysqli_query($conn,$select_query);
$row=mysqli_num_rows($result);
$data=mysqli_fetch_assoc($result);
$ip= getIpAddress();

//cart items

$cart="select * from `cart_item` where ip_adress='$ip'";
$query=mysqli_query($conn,$cart);
$row_cart=mysqli_num_rows($query);




if($row > 0){
    $_SESSION['username']=$uname;
if(password_verify($pass,$data['user_password'])){
   
    if($row==1 and $row_cart==0){
        $_SESSION['username']=$uname;
        echo "<script>alert('Login Sucessfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";

    } else{
        $_SESSION['username']=$uname;
        echo "<script>alert('Login Sucessfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";

    }
}
    else{
        echo "<script>alert(' Credentials')</script>";

}


}else{
    echo "<script>alert('Invalid Credentials')</script>";}
}


?>
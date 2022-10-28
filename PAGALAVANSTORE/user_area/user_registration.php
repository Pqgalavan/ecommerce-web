<?php
include('../db.php');
include('../function.php')

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
  
    <title>User Registration</title>
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
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >
                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-label">
                            Username
                        </label>
                        <input type="text" id="user_username" class="form-control"
                         placeholder="Enter Your Username" name="username" autocomplete="off" required >

                    </div>
                    <div class="form-outline mb-3">
                        <label for="user_email" class="form-label">
                            Email
                        </label>
                        <input type="email" id="user_email" class="form-control"
                         placeholder="Enter Your email" name="email" autocomplete="off" required>

                    </div>
                   
                    <div class="form-outline mb-3">
                        <label for="user_password" class="form-label">
                            Password
                        </label>
                        <input type="password" id="user_password" class="form-control"
                         placeholder="Enter Your Password"  name="password" autocomplete="off" required >

                    </div>
                    <div class="form-outline mb-3">
                        <label for="user_conpass" class="form-label">
                            Confirm Password
                        </label>
                        <input type="text" id="user_conpass" class="form-control"
                         placeholder="Confirm password"  name="conpass" autocomplete="off" required>

                    </div>
                    <div class="form-outline mb-3">
                        <label for="user_adress" class="form-label">
                            Adress
                        </label>
                        <input type="text" id="user_adress" class="form-control"
                         placeholder="Enter Your adress" name="adress" autocomplete="off" required>

                    </div>
                    <div class="form-outline mb-3">
                        <label for="user_contact" class="form-label">
                            Contact
                        </label>
                        <input type="text" id="user_contact" class="form-control"
                         placeholder="Enter Your mobile number" name="contact" autocomplete="off" required >

                    </div>
                    <div class="text-center">
                        <input type="submit" value="Register" 
                        class="btn btn-info py-3 px-3 border-0  " name="register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="userarea.php" class="text-danger">Login</a></p>
                    </div>
                </form>

        </div>
    </div>
    </div>
    
</body>
</html>


<?php
if (isset($_POST['register'])){
    $uname=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $hash=password_hash($pass,PASSWORD_DEFAULT);
    $conpass=$_POST['conpass'];
    $adress=$_POST['adress'];
    $contact=$_POST['contact'];
    $ip= getIpAddress();

    $sql="select * from `user_register` where user_name='$uname' and user_email='$email'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);
    if($row > 0){
        echo "<script>alert('Your username or email already exists')</script>";
    }elseif($pass!=$conpass){
        echo "<script>alert('Confirm Password do not match')</script>";
    } else{
        $sql1="insert into `user_register`(user_name,user_email,user_password,user_ip,user_adress,user_contact) values('$uname','$email','$hash','$ip','$adress','$contact')";
        $result2=mysqli_query($conn,$sql1);
            echo "<script>alert('Your form is registered sucessfully')</script>";

    }
         //selecting cart itemm

   $select_cart_item= "select * from `cart_item` where ip_adress='$ip'";
   $result_cart= mysqli_query($conn,$select_cart_item);
   $rows_cart=mysqli_num_rows($result_cart);
   if($rows_cart>0){
       $_SESSION['username']=$uname;
       echo"<script>alert('you have items in your cart')</script>";
       echo"<script>window.open('checkout.php','_self')</script>";
   }else{
       echo"<script>window.open('../index.php','_self')</script>";
   }
    
}



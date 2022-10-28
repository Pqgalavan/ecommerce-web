<?php
include('./db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" >
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
    if(isset($_POST['submit'])){
        $uname=$_POST['username'];
        $pass=$_POST['password'];
        $email=$_POST['email'];
        $sql="SELECT * FROM `cheking` where username='$uname'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_num_rows($result);
        if($row > 0){
            echo "<script>alert('username already exists')</script>";
        }else{
            $query="insert into `cheking`(username,email,password) values ('$uname','$email','$pass')";
            $result_query= mysqli_query($conn,$query);
            echo "<script>alert('sucess')</script>";
        }
    } ?>
    
</body>
</html>
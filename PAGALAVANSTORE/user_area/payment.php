

  <?php
  include('../db.php');
  include('../function.php');
  
  @session_start();
  ?>

  
          <!--second child-->
   

          </nav>
        
    <!-- Php code to acess user id -->
    <?php
$ip=getIpAddress();
$get_user="select * from `user_register` where user_ip='$ip'";
$result=mysqli_query($conn,$get_user);
$run_query=mysqli_fetch_assoc($result);
$user_id=$run_query['user_id'];


?>

    <div class="container">
        <h2 class="tect-center text-info"> Payment option</h2>
        <div class="row align-items-center">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img src="../img/tvs-raider.jpg" alt="" style="width: 500px;" class="my-3"></a>
            </div>
            <div class="col-md-6 ">
            <a href="order.php?user_id=<?php echo $user_id ?>" class="text-dark text-center"> <h2> Pay Offline </h2></a>
            </div>
            
        </div>
    </div>

</body>
</html>
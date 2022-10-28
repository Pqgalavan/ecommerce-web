

  <?php
  include('../db.php');
  
  session_start();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" type="text/css" href="../css copy/bootstrap.min.css"/>
   
    
    <script type="text/javascript" src="../js copy/bootstrap.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="container-fluid p-0" >
        <nav class="navbar navbar-expand-lg bg-light">
        <img src="../img/GS BLUE.png" style="width:40px; ">
            
           
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span ><i class="fa-solid fa-bars"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../index.php">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./user_registration.php">Register</a>
                  </li>
                 
                 
              
        
                </form>
        
            </div>
          </nav>
          <!--second child-->
          <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-bar  row">
<?php
if(!isset($_SESSION['username'])){
  echo " <div class='nav-item  col-8'>
  <div><a class='nav-link'  style='color:white' href='#'>Welcome Guest</a></div>
</div>";
}else{
  echo " <div class='nav-item  col-8'>
  <div><a class='nav-link'  style='color:white' href='#'>Welcome ".$_SESSION['username']."</a></div>
</div>";
}
?>


<?php
if(!isset($_SESSION['username'])){
  echo "<div class='nav-item  col-4'>
  <div> <a class='nav-link'  style='color:white' href='./userarea.php' >LogIn</a></div>
</div> ";
}else{
  echo "<div class='nav-item  col-4'>
  <div> <a class='nav-link'  style='color:white' href='../Logout.php' >Logout </a></div>
</div> ";
}
?>


</ul>
          </nav>
          <!--third child-->



<div class="bg-light">
  <h3 class="text-center">Pagalavan Store</h3>
  <p class="text-center">communication is the heart of e-commerce and community</p>
</div>
<!--fourth child-->
<div class="row px-1">
    <div class="col-md-10">
    
        <div class="row">
            <?php
            if(!isset($_SESSION['username'])){
              include('./userarea.php');
            }else{
              include('payment.php');
            }
  
            ?>
        </div>
    </div>
</div>
 
<?php include("../footer.php")
?>

    
</body>
</html>

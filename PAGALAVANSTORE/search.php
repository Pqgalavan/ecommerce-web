

  <?php
  include('./db.php');
  include ('./function.php');
  session_start();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indexmerce website</title>
    <link rel="stylesheet" type="text/css" href="./css copy/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="./style.css">
    
    <script type="text/javascript" src="./js copy/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    body{
        overflow-x:hidden;
        background-image: url('./img/img.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
       
        background-size: cover;
   
    }
    
    </style>
    
</head>
<body>
    <div class="container-fluid p-0" >
      
        <nav class="navbar navbar-expand-lg bg-light">
        <img src="./img/GS BLUE.png" style="width:60px; ">
            
           
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span ><i class="fa-solid fa-bars"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Products</a>
                  </li>

                  <?php
                  if(isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                    <a href='./user_area/profile.php' class='nav-link'>My account</a></li>";
                  }else{
                    echo "
                  <li class='nav-item'>
                    <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
                  </li>";
                }?> 
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="cart.php"><i class="fa-regular fa-cart-shopping-fast"></i>Cart</a>
                  </li>
              </ul>
<?php
  
if(!isset($_SESSION['username'])){
  echo "   <form class='form-inline my-2 my-lg-0'>
  <div class='nav-item  mr-sm-12 '>
  <div><a class='nav-link my-2 my-sm-0'  style='color:blue;' href='#'>Welcome Guest</a></div>
</div></form>";
}else{
  echo "<form class='form-inline my-2 my-lg-0'> 
  <div class='nav-item  mr-sm-12 '
  <div><a class='nav-link my-2 my-sm-0'  style='color:blue;' href='#'>Welcome ".$_SESSION['username']."</a></div>
</div> </form>";
}

?>

<?php
if(!isset($_SESSION['username'])){
  echo " <form class='form-inline my-2 my-lg-0'>
  <div class='nav-item  mr-sm-12 '>
  <div> <a class='nav-link my-2 my-sm-0'  style='color:blue;' href='./user_area/userarea.php' >LogIn</a></div>
</div> </form>";
}else{
  echo " <form class='form-inline my-2 my-lg-0'>
  <div class='nav-item  mr-sm-12'>
  <div> <a class='nav-link my-2 my-sm-0'  style='color:blue;' href='Logout.php' >Logout </a></div>
</div>  </form>";
}
?>
               
        
            </div>
          </nav>
      
          <!--second child-->
          <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
          <ul class="navbar-bar  mr-auto">
              
         

</ul>
<form class="d-flex gopal"  role="search"  action="search.php" method="get">
                  <input class="form-control " type="search" placeholder="Search" aria-label="Search" name="search_data">
                 
                  <input type="submit" class="btn btn-outline-success" value= "Search" name="search_data_product">
                </form>
          </nav>
          <!--third child-->



<div class="bg-light">
  <h3 class="text-center">Pagalavan Store</h3>
  <p class="text-center">communication is the heart of e-commerce and community</p>
  
</div>
  <!--fourth child-->
 <div class="row px-1">
  <div class ="col-md-10">
    <div class ="row">
<?php
//  getproducts();
search();
 get_cat_id();
 get_brand_id();

 ?>
 </div>
</div>

 <div class='col-md-2 bg-secondary '>
    <ul class='navbar-nav me-auto text-center'>
   <li class='nav-item bg-info'>
     <a href='#' class='nav-link text-light'><h3>Delevary brands</h3></a>
     <?php
     getbrand();
     ?>
    </ul>


 <ul class='navbar-nav me-auto text-center'>
 <li class='nav-item bg-info'>
     <a href='#' class='nav-link text-light'><h3>Catageries</h3></a>
   </li>
  <?php
 getcat();
 ?>
 </ul>


</div>

</div>
";
<?php include("./footer.php")
?>

    
</body>
</html>

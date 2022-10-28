

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
                  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Delivery Brands
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?php
                $sql = "select * from `brands`";
                $result = mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $brand_title= $row['brands_title'];
                    $brand_id = $row['brands_id'];
                    echo " 
                    <a href='index.php?brand=$brand_id' class='nav-link' text-light'>$brand_title</a>
                    ";

                }


                ?>
     
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?php
               $sql = "select * from `catagories`";
               $result = mysqli_query($conn,$sql);
               while($row=mysqli_fetch_assoc($result)){
                   $cat_title= $row['catogiries_title'];
                   $cat_id = $row['catogiries_id'];
                   echo " 
                   <a href='index.php?cat=$cat_id' class='nav-link' text-light'>$cat_title</a>
                   ";

                }


                ?>
     
        </div>
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

if(!isset($_GET['cat'])){
  if(!isset($_GET['brand'])){

$sql = "select * from `products` order by product_title";
$result = mysqli_query($conn,$sql);
// $row= mysqli_fetch_assoc($result);
// echo $row['product_title'];
while( $row= mysqli_fetch_assoc($result)){
  $product_id = $row['product_id'];
  $product_title =$row['product_title'];
  $product_description = $row['product_description'];
  $product_keyword = $row['product_keyword'];
  $catogiry_id = $row['cat_id'];
  $brand_id = $row['brand_id'];
  $img1= $row['product_image1'];
  $product_price =$row['product_price'];
  $product_code=$row['product_code'];
 
  echo "

  <div class='col-md-4 mb-2 ' >
  <form action='' method='post'>
 
         <div class='card'>
         <a href='product_detail.php?product_id=$product_id'> <img src='./Product_img/$img1' class='card-img-top' alt='...'> </a>
          <div class='card-body'>
           <h5 class='card-title'> $product_title</h5>
           <p class='card-text'> $product_description</p>
           <input type='text' name='qty' > 
           <input type='hidden' value='$product_id' name='pid'>
           <input type='hidden' value='$product_title' name='ptitle'>
           <input type='hidden' value='$product_description' name='pdescription'>
           <input type='hidden' value='$product_keyword' name='pkeyword'>
           <input type='hidden' value='$product_price'name='pprice'>
           <input type='hidden' value='$img1'name='pimg'>
           <input type='hidden' value='$product_code'name='pcode'>
           <p class='card-text text-info'>Price: $product_price/-</p>
           <input type='submit' value='Add to cart'  name='add_cart' class='btn btn-primary'>
           </form>
   
          </div>
         </div>
         </div>
        
       
     
"
;

}
}}?>

       
<?php
 get_cat_id();
 get_brand_id();
 if(isset($_POST['add_cart'])){
  global $conn;
  $ip = getIpAddress();
  $product_id=$_POST['pid'];
  $product_description=$_POST['pdescription'];
  $product_keyword=$_POST['pkeyword'];
  $product_title=$_POST['ptitle'];
  $product_price=$_POST['pprice'];
  $img=$_POST['pimg'];
  $code=$_POST['pcode'];
  $quantity=$_POST['qty'];
  if (empty($quantity)){
    $quantity=1;
  }else{
    $quantity =$quantity;
  }
  $sql ="select * from `cart` where ip_adress='$ip'  and product_id='$product_id'";
  $result = mysqli_query($conn,$sql);
  $num_of_rows= mysqli_num_rows($result);
  if( $num_of_rows>0){
    echo "<script>alert('this item is already present inside card')</script>";
    echo "<script> window.open('index.php',_self')</script>";
  
}else{
 
 
  $insert_query= "insert into `cart`(product_id,product_title,product_description,product_keyword,
  product_image,product_price,quantity,ip_adress) values ($product_id,'$product_title','$product_description','$product_keyword','$img',$product_price,'$quantity','$ip')";
  $result = mysqli_query($conn, $insert_query);
  echo "<script>window.open('index.php,'_self')</script>";
}
}


 ?>
 </div>
</div>

 <div class='col-md-2 bg-secondary '>
    <ul class='navbar-nav me-auto text-center'>
   <li class='nav-item bg-info'>
     <a href='#' class='nav-link text-light'><h3>Delivery brands</h3></a>
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

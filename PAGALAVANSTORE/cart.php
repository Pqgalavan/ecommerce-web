

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
    .cart{
             width:200px;
             height: 200px;
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
  <div class="container table-responsive">
    <div class="row">
      <form action="" method= "post">
        <table class="table table-bordered " id="no-more-tables">
        
      <?php
 
  $ip = getIpAddress();
  $total = 0;
  $sql = "select * from `cart` where ip_adress='$ip' ";
  $result_1 = mysqli_query($conn,$sql);
  $result_row=mysqli_num_rows($result_1);
  if($result_row>0){
    echo "
    <thead class='text-info'>
    <tr>
      
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Quantity</th>
        <th>Total price</th>
        <th>Remove</th>
        <th>Operation</th>
    </tr>
</thead>
<tbody>
    
    
    ";
  while($row=mysqli_fetch_array($result_1)){
    $product_id = $row['product_id'];
      $product_price = array($row['product_price'] * $row['quantity'] );
      $product_table= $row['product_price'];
      $product_qty= $row['quantity'];
      $product_title = $row['product_title'];
      $product_img1 = $row['product_image'];
      $product_values=array_sum($product_price);
      $total +=$product_values;
      
      
      ?>
              <tr>
             
                <td data-title="title"><p class="text-primary"><?php echo $product_title?></p></td>
                <td data-title="img"><img src="./Product_img/<?php echo $product_img1?>" alt="" class="cart text-primary"> </td>
                <td data-title="quantity"><p class="text-primary"><?php echo $product_qty?></p></td>
               
               
                <td data-title="checkout"><p class="text-primary"><?php echo $product_table?></p></td>
                <td> <input type="checkbox" name="removeitem[]" value="<?php 
                echo $product_id ?>">  </td>
                <td data-title="button">
                <input type="submit" name="remove_cart" class="btn btn-primary mb-3 px-3 py-2 border-0 mx-3" value="Remove">
                </td>
                </tr>

                <?php }}
                else{
             echo "<h2 class='text-center text-danger'> Card is Empty</h1>" ; } ?>
             
            </tbody>
        </table>
        <div class="d-flex">
          <?php
          $ip = getIpAddress();
          $sql = "select * from `cart` where ip_adress='$ip' ";
          $result_1 = mysqli_query($conn,$sql);
          $result_row=mysqli_num_rows($result_1);
          if($result_row>0){
            echo"
            <h4 class='px-4'>Subtotal: <strong class='text-info'> $total/-</strong></h4>
            <a href='index.php' class='btn btn-primary mb-3 px-3 py-2 border-0 mx-3'>Continue Shopping</a>
            <a href='./user_area/checkout.php' class='btn btn-success m-2 mb-3 p-3 py-2 border-2 text-light'>CheckOut</a> ";
          }else{
            echo " <a href='index.php' class='btn btn-primary mb-3 px-3 py-2 border-0 mx-3'>Continue Shopping</a>";
          }?>
        </div>
    </div>
  </div>
  </form>

   <?php
   function removeitem(){
    global $conn;
    if(isset($_POST['remove_cart'])){
      foreach($_POST['removeitem']as $remove_id){
        echo $remove_id;
        $dlt_query="delete from `cart` where product_id=$remove_id";
        $dlt= mysqli_query($conn,$dlt_query);
        if($dlt){
          echo "<script>window.open('cart.php','_self')</script>";
        }
      }
      }
    }
   echo $remove_item = removeitem();?>
  
<?php include("./footer.php")
?>



    
</body>
</html>

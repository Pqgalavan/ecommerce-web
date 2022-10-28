<?php
// include ('./db.php');



function getproducts(){
global $conn;

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
  <form action='{$_SERVER['REQUEST_URI']}' method='post'>
         <div class='card'>
         <a href='product_detail.php?product_id=$product_id'> <img src='./Product_img/$img1' class='card-img-top' alt='...'> </a>
          <div class='card-body'>
           <h5 class='card-title'> $product_title</h5>
           <p class='card-text'> $product_description</p>
           <input type='text' name='qty'> 
           <input type='hidden' value='$product_id' name='pid'>
           <input type='hidden' value='$product_title' name='ptitle'>
           <input type='hidden' value='$product_description' name='pdescription'>
           <input type='hidden' value='$product_keyword' name='pkeyword'>
           <input type='hidden' value='$product_price'name='pprice'>
           <input type='hidden' value='$img1'name='pimg'>
           <input type='hidden' value='$product_code'name='pcode'>
           <p class='card-text text-info'>Price: $product_price/-</p>
           <input type='submit' value='Add to cart'  class='btn btn-primary'>
      </form>
          </div>
         </div>
         </div>
       
       
     
";
}
}}}


function get_cat_id(){
  global $conn;
if(isset($_GET['cat'])){
 $cat= $_GET['cat'];
$sql = "select * from `products` where cat_id=$cat";
$result = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($result);
if($rows===0){
  echo "<h1 class='text-center text-danger'> No catogiries is available</h1>";
}
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
  echo "

  <div class='col-md-4 mb-2 ' >
  <div class='card'>
  <a href='product_detail.php?product_id=$product_id'> <img src='./Product_img/$img1' class='card-img-top' alt='...'> </a>
   <div class='card-body'>
    <h5 class='card-title'> $product_title</h5>
    <p class='card-text'> $product_description</p>
    <p class='card-text text-info'>Price: $product_price/-</p>
    <a href='index.php?add_cart=$product_id' class='btn btn-primary'>Add to card</a>
  
   </div>
  </div>
  </div>
   

";
}
}
}

function get_brand_id(){
  global $conn;
if(isset($_GET['brand'])){
 $brand_id= $_GET['brand'];

$sql = "select * from `products` where brand_id=$brand_id";
$result = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($result);
if($rows===0){
  echo "<h1 class='text-center text-danger'> No brand is available</h1>";
}
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
  echo "

  <div class='col-md-4 mb-2 ' >
  <div class='card'>
  <a href='product_detail.php?product_id=$product_id'> <img src='./Product_img/$img1' class='card-img-top' alt='...'> </a>
   <div class='card-body'>
    <h5 class='card-title'> $product_title</h5>
    <p class='card-text'> $product_description</p>
    <p class='card-text text-info'>Price: $product_price/-</p>
    <a href='index.php?add_cart=$product_id' class='btn btn-primary'>Add to card</a>
   
   </div>
  </div>
  </div>
   

";
}
}
}

function getbrand(){
    global $conn;

    $sql = "select * from `brands`";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $brand_title= $row['brands_title'];
        $brand_id = $row['brands_id'];
        echo " <li class='nav-item'>
        <a href='index.php?brand=$brand_id' class='nav-link' text-light'>$brand_title</a>
        </li>";
    }
}

function getcat(){
    global $conn;

    $sql = "select * from `catagories`";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $cat_title= $row['catogiries_title'];
        $cat_id = $row['catogiries_id'];
        echo " <li class='nav-item'>
        <a href='index.php?cat=$cat_id' class='nav-link' text-light'>$cat_title</a>
        </li>";
    }
}

function search(){
  global $conn;
  if(isset($_GET['search_data_product'])){
    $value = $_GET['search_data'];
 
  $sql = "select * from `products` where product_keyword like '%$value%' ";
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
    echo "
  
    <div class='col-md-4 mb-2 ' >
           <div class='card'>
           <a href='product_detail.php?product_id=$product_id'> <img src='./Product_img/$img1' class='card-img-top' alt='...'> </a>
            <div class='card-body'>
             <h5 class='card-title'> $product_title</h5>
             <p class='card-text'> $product_description</p>
             <p class='card-text text-info'>Price: $product_price/-</p>
             <a href='index.php?add_cart=$product_id' class='btn btn-primary'>Add to card</a>
           
            </div>
           </div>
           </div>
         
         
       
  ";
  }
  }
}





function product_details(){
  global $conn;
  if(isset($_GET['product_id'])){
  if(!isset($_GET['cat'])){
    if(!isset($_GET['brand'])){

      $product_id = $_GET['product_id'];
  
  $sql = "select * from `products` where product_id=$product_id";
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
    $img2= $row['product_image2'];
    $img3= $row['product_image3'];
    $product_price =$row['product_price'];
    echo "
  
    <div class='col-md-4 mb-2 ' >
           <div class='card'>
            <img src='./Product_img/$img1' class='card-img-top' alt='...'>
            <div class='card-body'>
             <h5 class='card-title'> $product_title</h5>
             <p class='card-text'> $product_description</p>
             <p class='card-text text-info'>Price: $product_price/-</p>
             <a href='index.php?add_cart=$product_id' class='btn btn-primary'>Add to card</a>
             <a href='index.php?' class='btn btn-dark'> Go Home</a>
            </div>
           </div>
           </div>
         
     <div class='col-md-8'>
     <div class='row'>
     <div class='col-md-12'>
     <h4 class='text-center text-info mb-5'>Related Products </h4>
     </div>
     <div class= 'col-md-6'>
     <img src='./Product_img/$img2' class='card-img-top' >
     </div>  
     <div class= 'col-md-6'>
     <img src='./Product_img/$img3' class='card-img-top' >
     </div>  
       </div>
       </div>
  ";
  }
  }}}}
  

  function getIpAddress()
  {
      $ipAddress = '';
      if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
        
          $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
      } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         
          $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
          foreach ($ipAddressList as $ip) {
              if (! empty($ip)) {
               
                  $ipAddress = $ip;
                  break;
              }
          }
      } else if (! empty($_SERVER['HTTP_X_FORWARDED'])) {
          $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
      } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
          $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
      } else if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
          $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
      } else if (! empty($_SERVER['HTTP_FORWARDED'])) {
          $ipAddress = $_SERVER['HTTP_FORWARDED'];
      } else if (! empty($_SERVER['REMOTE_ADDR'])) {
          $ipAddress = $_SERVER['REMOTE_ADDR'];
      }
      return $ipAddress;
  }
  
 function cart(){

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
 }}



function price(){
  global $conn;
  $ip = getIpAddress();
  $total = 0;
  $sql = "select * from `cart_item` where ip_adress='$ip' ";
  $result = mysqli_query($conn,$sql);
  while($row=mysqli_fetch_array($result)){
    $product_id = $row['product_id'];
    $select_query = "select * from `products` where product_id=$product_id";
    $result_product =mysqli_query($conn,$select_query);
    while($row_price=mysqli_fetch_array($result_product)){
      $product_price = array($row_price['product_price']);
      $product_values=array_sum($product_price);
      $total +=$product_values;
    }
  }
  echo $total;
}

function cart_add(){
 
  global $conn;
  if(isset($_POST['update_cart'])){

   $ip = getIpAddress();
  $product_id = $_POST['name']; 
  $quantity=$_POST['qty'];
  // $product_id = $_POST['value']
  
echo "$product_id"; 

  $query="update `cart` set quantity=$quantity where ip_adress='$ip' and product_id=$product_id  ";
  $result = mysqli_query($conn,$query);
 
  $total = $total*$quantity;
  } 
}




function order_details(){
global $conn;
$username=$_SESSION['username'];
$get_details="select * from `user_register`where user_name='$username' ";
$result_query=mysqli_query($conn,$get_details);
while($row=mysqli_fetch_array($result_query)){
  $user_id=$row['user_id'];
  if(!isset($_GET['edit_account'])){
    if(!isset($_GET['my_orders'])){
      if(!isset($_GET['delete_account'])){
     $get_orders= "select * from `user_orders` where user_id=$user_id and order_status='pending'";
     $result_order=mysqli_query($conn,$get_orders);
     $row_count=mysqli_num_rows($result_order);
     if($row_count > 0 ){
      echo "<h3 class='text-center my-5'>You have <span class='text-danger'>$row_count</span>
      Pending orders</h3>
      <p class='text-center'><a href='profile.php?my_orders' class='text-center my-5 text-dark'> Order Details</a> </p>
      <p class='text-center'><a href='../index.php' class='text-center my-5 text-dark'>Explore Products</a> </p>";
     }
      }
    }
  }
}


}
?>

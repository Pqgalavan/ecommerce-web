
  <?php
  include('../db.php');
  
 

 
 
    ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin area</title>
    <link rel="stylesheet" type="text/css" href="../css copy/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../style.css">
    
    <script type="text/javascript" src="../js copy/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
   
</head>
<body>

 

    <div class="container-fluid p-0  ">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
              
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                  
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link"> Welcome Guest</a>
                        </li>
                    </ul>


                </nav>
            </div>
        </nav>


        <!--2nd child-->
        <div class="bg-light">
            <h3 class="text-center p-2">
                Manage Details 
            </h3>


        </div>
        <!--3rd child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex">
                <div class="col-md-2">
                   
                    <p class="text-light">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="orders.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="orders.php?insert_catogiries" class="nav-link text-light bg-info my-1">Inset Catageries</a></button>
                    <button><a href="orders.php?view_catagiries" class="nav-link text-light bg-info my-1">View Catageries</a></button>
                    <button><a href="orders.php?insert_brands" class="nav-link text-light bg-info my-1">Insert brands</a></button>
                    <button><a href="orders.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="orders.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button><a href="orders.php?list_payment" class="nav-link text-light bg-info my-1">All payments</a></button>
                    <button><a href="orders.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div> </div>

    </div>
    <!--fourth child-->
   
    <div class="container mt-3">
        <?php
        if(isset($_GET['insert_catogiries'])){
            include('insert_catogiries.php');
        }
        if(isset($_GET['insert_brands'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_catagiries'])){
            include('view_catagiries.php');
        }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        if(isset($_GET['brand'])){
            include('delete_product.php');
        }
        if(isset($_GET['cat'])){
            include('delete_product.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['order'])){
            include('delete_product.php');
        }
        if(isset($_GET['list_payment'])){
            include('list_payment.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        if(isset($_GET['user'])){
            include('delete_product.php');
        }
        ?>
    </div>
 
    
<?php include("../footer.php")
?>

</body>
</html>


  <?php
  include('../db.php');
  session_start();
  if(isset($_GET['order_id'])){
    $oid=$_GET['order_id'];
    $select_data="select * from `user_orders` where order_id=$oid";
    $result=mysqli_query($conn,$select_data);
    $row=mysqli_fetch_assoc($result);
    $invoice_number=$row['invoice_number'];
    $amount_due=$row['amount_due'];

  }


  if(isset($_POST['submit'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="insert into `user_payments`(order_id,invoice_number,amount,payment_mode,date) 
    values($oid,$invoice_number,$amount,'$payment_mode',NOW())";
    $result1=mysqli_query($conn,$insert_query);
    if($result1){
        echo "<h3><script>alert('Sucesfully Payment Completed')</script></h3>";
        echo "<h3><script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders="update `user_orders` set order_status='complete' where order_id=$oid";
    $result_orders=mysqli_query($conn,$update_orders);
  }
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" type="text/css" href="../css copy/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../style.css">
    
    <script type="text/javascript" src="../js copy/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>
  <body class="bg-secondary my-5">
   
    <div class="container my-5">
    <h1 class="text-center text-light ">Confirm Payment</h1>
        <form action="" method="post" >
            <div class="form-outline my-5 text-center w-50 m-auto">
            <label for="" class="text-light">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-5 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-5 text-center w-50 m-auto">
          
              <select name="payment_mode" class="form-select mb-5 w-50 m-auto">
                <option >Select Payment Mode</option>
                <option >UPI</option>
                <option >PAYPAL</option>
                <option >Cash on Delivary</option>
                <option >Pay Offline</option>
              </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
              
                <input type="submit" class="bg-info py-2 px-3 border-0" name="submit" value="Confirm Payment">
            </div>
        </form>

    </div>
    
  </body>
  </html>


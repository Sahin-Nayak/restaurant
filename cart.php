<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Your cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<style>
   body{
      background-color:#e8e8e8;
   }
</style>
<body>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">Your cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         $user = $_SESSION["email2"];
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE `Cust-id`='$user'");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="<?php echo $fetch_cart['Img']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['Name']; ?></td>
            <td>₹<?php echo number_format($fetch_cart['Rate']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['Code']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['Quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>₹<?php echo $sub_total = ($fetch_cart['Rate'] * $fetch_cart['Quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['Code']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="Afterlogin.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>₹<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>
<section class="shopping-cart">
<h1 class="heading">Your order</h1>

<table>

   <thead>
      <th>bill no</th>
      <th>name</th>
      <th>total quantity</th>
      <th>total price</th>
      <th>status</th>
      <th>bill</th>
   </thead>

   <tbody>

   <?php 
         $status = "No Order Is Present";
         $select = mysqli_query($conn, "SELECT * FROM `order` WHERE `Cust-id`='$user'");
         if(mysqli_num_rows($select) > 0){
            while($row = mysqli_fetch_assoc($select)){
               $t_q = $row['Quantity'];
               $rate_of_one = $row['Rate'];
               $t_r = $t_q * $rate_of_one;
         ?>

      <tr>
         <?php $bill = $row['Bill No']; 
         if (isset($_SESSION["bilno"])){
            unset($_SESSION["bilno"]);
            $_SESSION["bilno"]=$bill;
         }
         //MP ?>   
         <td><?php echo $row['Bill No']; ?></td>
         <td><?php echo $row['Names']; ?></td>
         <td><?php echo $t_q; ?></td>
         <td>₹<?php echo $t_r; ?>/-</td>
         <td><span class="sts"><?php echo $row['Status'];?></span></td>
         <td><a href="bill1.php?name=<?php echo $bill; ?>" class="delete-btn"> view bill</a></td>
      </tr>
      <?php
            };
         };
      ?>

   </tbody>

</table>  
</section>

<?php

if(isset($_POST['update_update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET Quantity = '$update_value' WHERE Code = '$update_id'");
    if($update_quantity_query){
       header('location:cart.php');
    };
 };

 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE Code = '$remove_id'");
    header('location:cart.php');
 };

 if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart`");
    header('location:cart.php');
 }

?>


</div>

</body>
<style>
    :root{
   --blue:#2980b9;
   --red:tomato;
   --orange:orange;
   --black:#333;
   --white:#fff;
   --bg-color:#eee;
   --dark-bg:rgba(0,0,0,.7);
   --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
   --border:.1rem solid #999;
}

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   text-transform: capitalize;
}

html{
   font-size: 62.5%;
   overflow-x: hidden;
}

.container{
   max-width: 1200px;
   margin:0 auto;
   /* padding-bottom: 5rem; */
}

section{
   padding:2rem;
}

.heading{
   text-align: center;
   font-size: 3.5rem;
   text-transform: uppercase;
   color:var(--black);
   margin-bottom: 2rem;
}

.btn,
.option-btn,
.delete-btn{
   display: block;
   width: 100%;
   text-align: center;
   background-color: var(--blue);
   color:var(--white);
   font-size: 1.7rem;
   padding:1.2rem 3rem;
   border-radius: .5rem;
   cursor: pointer;
   margin-top: 1rem;
}

.btn:hover,
.option-btn:hover,
.delete-btn:hover{
   background-color: var(--black);
}

.option-btn i,
.delete-btn i{
   padding-right: .5rem;
}

.option-btn{
   background-color: var(--orange);
}

.delete-btn{
   margin-top: 0;
   background-color: var(--red);
}
.shopping-cart table{
   text-align: center;
   width: 100%;
}

.shopping-cart table thead th{
   padding:1.5rem;
   font-size: 2rem;
   color:var(--white);
   background-color: var(--black);
}

.shopping-cart table tr td{
   border-bottom: var(--border);
   padding:1.5rem;
   font-size: 2rem;
   color:var(--black);
}

.shopping-cart table input[type="number"]{
   border: var(--border);
   padding:1rem 2rem;
   font-size: 2rem;
   color:var(--black);
   width: 10rem;
}

.shopping-cart table input[type="submit"]{
   padding:.5rem 1.5rem;
   cursor: pointer;
   font-size: 2rem;
   background-color: var(--orange);
   color:var(--white);
}

.shopping-cart table input[type="submit"]:hover{
   background-color: var(--black);
}

.shopping-cart table .table-bottom{
   background-color: var(--bg-color);
}

.shopping-cart .checkout-btn{
   text-align: center;
   margin-top: 1rem;
}

.shopping-cart .checkout-btn a{
   display: inline-block;
   width: auto;
}

.shopping-cart .checkout-btn a.disabled{
   pointer-events: none;
   opacity: .5;
   user-select: none;
   background-color: var(--red);
}
.sts{
   color: #138808;
}

</style>
</html>
<?php
include("connection.php");
session_start();

if(isset($_POST['add_product'])){
   $product_code = $_POST['product_code'];
   $product_name = $_POST['product_name'];
   $product_category = $_POST['product_category'];
   $product_price = $_POST['product_price'];
   $file_name = $_FILES["product_image"]["name"];
   $file_tmp= $_FILES["product_image"]["tmp_name"];
   move_uploaded_file($file_tmp,"img/".$file_name);

   $img="img/".$_FILES["product_image"]["name"];
   $message = $_POST['message'];
   $sql="insert into `food-item` (Code,Name,Category,Rate,Img,Description) values ('$product_code','$product_name','$product_category','$product_price','$img','$message')";
   $result=mysqli_query($conn,$sql);
   header("location: add_new.php");
}
if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $sql = "DELETE FROM `food-item` WHERE `Code`='$id' ";
   $result=mysqli_query($conn,$sql);
   header("location: add_new.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Product AdminHub</title>
   <!-- <link rel="stylesheet" href="style.css"> -->
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>   
<!-- Start of navigation bar -->
<section class="This is Nevigation Bar">
    <nav class="navbar">
        <div class="logo">Kolkata Kravings</div>
        <div class="box123"><a href="adminPage.php">Go Back</a></div>
    </nav>
    </div>
</section>

<div class="container">

   <div class="admin-product-form-container">

      <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
         <h3>add a new product</h3>
         <input type="text" placeholder="Enter product code" name="product_code" class="box" required>
         <input type="text" placeholder="Enter product name" name="product_name" class="box" required>
         <input type="text" placeholder="Enter product category" name="product_category" class="box" required>
         <input type="number" placeholder="Enter product price" name="product_price" class="box" required>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box" required>
         <textarea name="message" class="input" placeholder="Enter Your Messege" class="box" required></textarea>
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>
   <?php
         $sql="select * from `food-item`";
         $result=mysqli_query($conn,$sql);
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>image</th>
            <th>code</th>
            <th>name</th>
            <th>category</th>
            <th>price</th>
            <th>description</th>
            <th>action</th>
         </tr>
         </thead>
         <?php
            while($row=mysqli_fetch_assoc($result)){
               $img = $row["Img"];
               $code = $row["Code"];
               $name = $row["Name"];
               $cat = $row["Category"];
               $rate = $row["Rate"];
               $des = $row["Description"];               
         ?>
         <tr>
            <td><img src="<?php echo $img; ?>" height="100" alt=""></td>
            <td><?php echo $code; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $cat; ?></td>
            <td>₹<?php echo $rate; ?></td>
            <td class="center"><?php echo $des; ?></td>
            <td>
               <a href="aedit_new1.php?edit=<?php echo $code?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="add_new.php?delete=<?php echo $code?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr><?php }?>
      </table>
   </div>
</div>
</body>
<style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

:root{
   --green:#27ae60;
   --black:#333;
   --white:#fff;
   --bg-color:#eee;
   --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
   --border:.1rem solid var(--black);
}

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0px;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   text-transform: capitalize;
}

html{
   font-size: 62.5%;
   overflow-x: hidden;
}

body{
   background-size: cover;
   background-repeat: no-repeat;
}

/* nav*/
/* Navbar styling */
.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    background-color: teal;
    color: #fff;
    box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.272), -1px -1px 8px rgba(0,0,0,0.2);
    position: sticky;
    z-index: 1000;
}    
.navbar .box123 a {   
    color: #fff;
}

/* Logo */    
.logo {    
    font-size: 45px;
    transition: 1.5s ease;
}
.box123{
   font-size: 23px;
}




.center{
   text-align: left;
}
.btn{
   display: block;
   width: 100%;
   cursor: pointer;
   border-radius: .5rem;
   margin-top: 1rem;
   font-size: 1.7rem;
   padding:1rem 3rem;
   background: var(--green);
   color:var(--white);
   text-align: center;
}

.btn:hover{
   background: var(--black);
}

.message{
   display: block;
   background: var(--bg-color);
   padding:1.5rem 1rem;
   font-size: 2rem;
   color:var(--black);
   margin-bottom: 2rem;
   text-align: center;
}

.container{
   max-width: 1200px;
   padding:2rem;
   margin:0 auto;
}

.admin-product-form-container.centered{
   display: flex;
   align-items: center;
   justify-content: center;
   min-height: 100vh;
   
}

.admin-product-form-container form{
   max-width: 50rem;
   margin:0 auto;
   padding:2rem;
   border-radius: .5rem;
   background: var(--bg-color);
}

.admin-product-form-container form h3{
   text-transform: uppercase;
   color:var(--black);
   margin-bottom: 1rem;
   text-align: center;
   font-size: 2.5rem;
}

.admin-product-form-container form .box{
   width: 100%;
   border-radius: .5rem;
   padding:1.2rem 1.5rem;
   font-size: 1.7rem;
   margin:1rem 0;
   background: var(--white);
   text-transform: none;
}
.admin-product-form-container form textarea{
   width: 100%;
   height: 150px
}

.product-display{
   margin:2rem 0;
}

.product-display .product-display-table{
   width: 100%;
   text-align: center;
}

.product-display .product-display-table thead{
   background: var(--bg-color);
}

.product-display .product-display-table th{
   padding:1rem;
   font-size: 2rem;
}


.product-display .product-display-table td{
   padding:1rem;
   font-size: 2rem;
   border-bottom: var(--border);
}

.product-display .product-display-table .btn:first-child{
   margin-top: 0;
}

.product-display .product-display-table .btn:last-child{
   background: crimson;
}

.product-display .product-display-table .btn:last-child:hover{
   background: var(--black);
}





@media (max-width:415px){

.logo{
   font-size: 35px;
}
.box123{
   font-size: 18px;
}

}


@media (max-width:991px){

   html{
      font-size: 55%;
   }

}

@media (max-width:768px){

   .product-display{
      overflow-y:scroll;
   }

   .product-display .product-display-table{
      width: 80rem;
   }

}

@media (max-width:450px){

   html{
      font-size: 50%;
   }

}
</style>
</html>
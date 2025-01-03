<?php
include("connection.php");
session_start();
$id = $_GET['edit'];
$sql="select * from `food-item` where `Code`='$id'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $code = $row['Code'];
    $name = $row['Name'];
    $category = $row['Category'];
    $price = $row['Rate'];
    $img=$row['Img'];
    $message = $row['Description'];
}
if(isset($_POST['submit'])){
    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $file_name = $_FILES["new_img_link"]["name"];
    $file_tmp= $_FILES["new_img_link"]["tmp_name"];
    move_uploaded_file($file_tmp,"img/".$file_name);

    $new_img = "img/".$_FILES["new_img_link"]["name"];
    if($new_img=="img/"){
      $new_img= $_POST['old_img_link'];
    }
    $s="update `food-item` set `Name`='$product_name', `Category`='$product_category' , `Rate`='$product_price', `Img`='$new_img' WHERE `Code` = '$product_code'";
    $res=mysqli_query($conn,$s);
     header("location: add_new.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page Edit</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body> 
<section class="This is Nevigation Bar">
    <nav class="navbar">
        <div class="logo">Kolkata Kravings</div>
        <div class="box123"><a href="add_new.php">Go Back</a></div>
    </nav>
    </div>
</section>   

<div class="container">

   <div class="admin-product-form-container">

      <form action="aedit_new1.php" method="POST" enctype="multipart/form-data">
         <h3>update a product</h3>
         <center><img src="<?php echo $img?>" alt="" width="400px"></center>
         <input type="text" placeholder="Enter product code" name="product_code" class="box" value= "<?php echo $code?>" required>
         <input type="text" placeholder="Enter product name" name="product_name" class="box" value= "<?php echo $name?>" required>
         <input type="text" placeholder="Enter product category" name="product_category" value= "<?php echo $category?>" class="box" required>
         <input type="hidden" name="old_img_link" value="<?php echo $img?>">
         <input type="file" name="new_img_link" class="box" >
         <input type="number" placeholder="Enter product price" name="product_price" value= "<?php echo $price?>" class="box" required>
         <input type="submit" class="btn" name="submit" value="update product">
         <a href="adminPage.php" class="btn">go back admin page!</a>
      </form>
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


@media (max-width:415px){

.logo{
   font-size: 35px;
}
.box123{
   font-size: 18px;
}

}
@media (max-width:540px){

.logo{
   font-size: 30px;
}
}
@media (max-width:380px){

.logo{
   font-size: 25px;
}
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
</body>
</html>
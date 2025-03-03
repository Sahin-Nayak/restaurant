<?php
   session_start();
    include("connection.php");
    $food = $_GET['food'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<section class="This is Nevigation Bar">
    <nav class="navbar">
        <div class="logo">Kolkata Kravings</div>
        <div class="box123"><a href="Afterlogin.php">Go Back</a></div>
    </nav>
    </div>
</section>

<div class="container_product">

   <h3 class="title_product"> Related Products </h3>

    <?php   
        
        $sql="select * from `food-item` where `Category`='$food'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num>0){
            $count =1;
            echo "<div class=products-container>";
            while($row=mysqli_fetch_assoc($result)){
                $img= $row["Img"];
                $name= $row["Name"];
                $rate= $row["Rate"];
                // echo "<div class=products-container>";
                echo "<div class=product data-name=p-$count>";
                echo "<img src=$img alt=>";
                echo "<h3>$name</h3>";
                echo "<div class=price>₹ $rate</div>";
                $count = $count+1;
                echo "</div>";

            }}
            echo "</div>";
    ?>

</div>

<div class="products-preview">
<?php
        $s="select * from `food-item` where `Category`='$food'";
        $r=mysqli_query($conn,$s);
        $n=mysqli_num_rows($r);
        if($n>0){
$count1=1;
while($row1=mysqli_fetch_assoc($r)){
    $image= $row1["Img"];
    $Name= $row1["Name"];
    $Rate= $row1["Rate"];
    $Code= $row1["Code"];
    $Des = $row1["Description"];
    echo "<div class=preview data-target=p-$count1>";
    echo    "<i class=fas fa-times></i>";
    echo    "<img src=$image alt=>";
    echo    "<h3>$Name</h3>";
    echo    "<div class=stars>";
    echo    "<i class=fas fa-star></i>";
    echo    "<i class=fas fa-star></i>";
    echo    "<i class=fas fa-star></i>";
    echo    "<i class=fas fa-star></i>";
    echo    "<i class=fas fa-star-half-alt></i>";
    // echo    "<span>( $rate )</span>";
    echo    "</div>";
    echo    "<p>$Des</p>";
    echo    "<div class=price>₹ $Rate</div>";
    echo    "<div class=buttons>";
   //  echo    "<a href=# class=buy>buy now</a>";
    echo    "<a href=insert_cart.php?code=$Code class=cart>add to cart</a>";
    echo    "</div>";
    echo  "</div>";
    $count1=$count1+1;
}}
?>

</div>

</body>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600&display=swap');

*{
   font-family: 'Nunito', sans-serif;
   margin:0; 
   padding:0;
   box-sizing: border-box;
   outline: none; 
   border:none;
   text-decoration: none;
   transition: all .2s linear;
   text-transform: capitalize;
}

html{
   font-size: 62.5%;
   overflow-x: hidden;
}

body{
   background: #eee;
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
.box123{
   font-size: 16px;
}

}
@media (max-width:380px){

.logo{
   font-size: 25px;
}
.box123{
   font-size: 14px;
}
.header_booking{
    font-size: 16px;
}
}

    
.container_product{
   max-width: 1200px;
   margin:0 auto;
   padding:3rem 2rem;
}

.container_product .title_product{
   font-size: 3.5rem;
   color:#444;
   margin-bottom: 3rem;
   text-transform: uppercase;
   text-align: center;
}

.container_product .products-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
   gap:2rem;
}

.container_product .products-container .product{
   text-align: center;
   padding:3rem 2rem;
   background: #fff;
   box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
   outline: .1rem solid #ccc;
   outline-offset: -1.5rem;
   cursor: pointer;
}

.container_product .products-container .product:hover{
   outline: .2rem solid #222;
   outline-offset: 0;
}

.container_product .products-container .product img{
   height: 25rem;
}

.container_product .products-container .product:hover img{
   transform: scale(.9);
}

.container_product .products-container .product h3{
   padding:.5rem 0;
   font-size: 2rem;
   color:#444;
}

.container_product .products-container .product:hover h3{
   color:#27ae60;
}

.container_product .products-container .product .price{
   font-size: 2rem;
   color:#444;
}

.products-preview{
   position: fixed;
   top:0; left:0;
   min-height: 100vh;
   width: 100%;
   background: rgba(0,0,0,.8);
   display: none;
   align-items: center;
   justify-content: center;
}

.products-preview .preview{
   display: none;
   padding:2rem;
   text-align: center;
   background: #fff;
   position: relative;
   margin:2rem;
   width: 40rem;
}

.products-preview .preview.active{
   display: inline-block;
}

.products-preview .preview img{
   height: 30rem;
}

.products-preview .preview .fa-times{
   position: absolute;
   top:1rem; right:1.5rem;
   cursor: pointer;
   color:#444;
   font-size: 4rem;
}

.products-preview .preview .fa-times:hover{
   transform: rotate(90deg);
}

.products-preview .preview h3{
   color:#444;
   padding:.5rem 0;
   font-size: 2.5rem;
}

.products-preview .preview .stars{
   padding:1rem 0;
   font-size: 1.7rem;
}

.products-preview .preview .stars i{
   color:#27ae60;
}

.products-preview .preview .stars span{
   color:#999;
}

.products-preview .preview p{
   line-height: 1.5;
   padding:1rem 0;
   font-size: 1.6rem;
   color:#777;
}

.products-preview .preview .price{
   padding:1rem 0;
   font-size: 2.5rem;
   color:#27ae60;
}

.products-preview .preview .buttons{
   display: flex;
   gap:1.5rem;
   flex-wrap: wrap;
   margin-top: 1rem;
}

.products-preview .preview .buttons a{
   flex:1 1 16rem;
   padding:1rem;
   font-size: 1.8rem;
   color:#444;
   border:.1rem solid #444;
}

.products-preview .preview .buttons a.cart{
   background: #444;
   color:#fff;
}

.products-preview .preview .buttons a.cart:hover{
   background: #111;
}

.products-preview .preview .buttons a.buy:hover{
   background: #444;
   color:#fff;
}


@media (max-width:991px){

   html{
      font-size: 55%;
   }

}

@media (max-width:768px){

   .products-preview .preview img{
      height: 25rem;
   }

}

@media (max-width:450px){

   html{
      font-size: 50%;
   }

}
</style>
<script>
let preveiwContainer = document.querySelector('.products-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');

document.querySelectorAll('.products-container .product').forEach(product =>{
  product.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    let name = product.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('active');
      }
    });
  };
});

previewBox.forEach(close =>{
  close.querySelector('.fa-times').onclick = () =>{
    close.classList.remove('active');
    preveiwContainer.style.display = 'none';
  };
});
</script>
</html>
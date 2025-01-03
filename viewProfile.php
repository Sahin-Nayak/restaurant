<?php
    session_start();
    include("connection.php");

    $id=  $_SESSION["email2"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile view</title>
    <!-- custom css file link  -->
    <!-- <link rel="stylesheet" href="style.css"> -->

</head>
<body >
<!-- home section starts  -->

<section class="home" id="home">
    <?php
        $sql="select * from customer_registration where C_Email='$id'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){

    ?>
    <div class="content">
        <span class="hi"> hi Welcome,</span>
        <h3> <span> <?php  echo $row["C_Name"]; ?> </span> </h3>
        <form action="update.php" name="myForm" onsubmit="return registervalidateForm()" method="POST" enctype="multipart/form-data" autocomplete="off">
        <p class="info"><b>Email : </b><input type="email" value="<?php echo $id ?>" name="email" readonly></p>
        <p class="info"><b>Address : </b><input type="text" value="<?php echo $row["Address"]; ?>" name="address" required></p>
        <p class="info"><b>Phone : </b><input type="tel" value="<?php echo $row["Phone"]; ?>" name="phone" pattern="[0-9]{10}" required></p>
        <p class="info"><b>Password : </b><input type="text" value="<?php echo $row["Password"]; ?>" name="password" required></p>
        <p class="info"><input type="hidden" value="<?php echo $row["Img"]; ?>" name="old_pic_link"></p>
        <p class="info"><b>Picture : </b><input type="file" name="image" id="image" value="<?php echo $row["Img"];?>" disabled></p>
        <p class="info"><input input type="submit" name="submit" class="btn" value="Save Changes"></p>
        <a href="Afterlogin.php" class="btn">Go Back</a>
        </form>
        <p class="text"> We are provided our best service to you. You can change what ever you want. But you can't change the Email details and your Name of your account because the Email id is registered in our database. </p>
    </div>
    <div class="image">
        <img src="<?php echo $row["Img"]; ?>" alt="">
    </div>
    <?php } ?>
</section>
<!-- home section ends -->
<!-- custom js file link  -->
</body>
<style>
    
:root{
    --main-color:#e38528;
}

*{
    font-family: 'Roboto', sans-serif;
    margin:0; padding:0;
    box-sizing: border-box;
    outline: none; border:none;
    text-decoration: none;
    text-transform: capitalize;
    transition: all .2s linear;
    line-height: 1.5;
}

html{
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-behavior: smooth;
}

body{
    background: #fcf2e8;
    padding-left: 30rem;
    padding-right: 30rem ;
}

section{
    padding:1rem 5%;
    min-height: 100vh;
}

.home{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap:1.5rem;
}

.home .image{
    flex:1 1 40rem;
}

.home .image img{
    width:100%;
}

.home .content{
    flex:1 1 40rem;
}

.home .content .hi{
    font-size: 2rem;
    color:var(--main-color);
}

.home .content h3{
    font-size: 4.5rem;
    color:#111;
    text-transform: uppercase;
}

.home .content h3 span{
    color:var(--main-color);
    text-transform: uppercase;
}

.home .content .info{
    font-size: 2.5rem;
    color:#111;
    padding:.5rem 0;
}

.home .content .text{
    font-size: 1.7rem;
    color:#666;
    padding:.5rem 0;
}
img{
    clip-path: circle();
}

input{
    height:40px;
    border: 0px;
    font-size: 2.5rem;
    color:#111;
    background: #fcf2e8;
}

.btn{
    display: inline-block;
    margin-top: 1rem;
    padding:.8rem 3rem;
    background:var(--main-color);
    color:#fff;
    cursor: pointer;
    font-size: 1.7rem;
}

.btn:hover{
    background:#111;
    letter-spacing: .2rem;
}


/* media queries  */
@media (max-width:991px){

    html{
        font-size: 55%;
    }
    
    body{
        padding: 0;
    }

}

@media (max-width:450px){

    html{
        font-size: 50%;
    }

}
</style>
</html>

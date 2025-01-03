<?php
    session_start();
    include("connection.php");
    $code = $_GET['code'];
    $sql="SELECT * FROM `food-item` WHERE Code = '$code'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $img= $row["Img"];
        $name= $row["Name"];
        $rate= $row["Rate"];
        $cust = $_SESSION['email2'];
        $cat = $row["Category"];
        $sq="SELECT * FROM `cart` WHERE Code = '$code' and `Cust-id` = '$cust'";
        $r=mysqli_query($conn,$sq);
        $n=mysqli_num_rows($r);
        if($n==1){
            echo "<script>alert(Already In Your Cart)</script>";
            header("location: Afterlogin.php");
        }
        else{
            $s="INSERT INTO `cart`(`Code`, `Name`, `Rate`, `Img`, `Cust-id`, `Quantity`,`Category`) VALUES ('$code','$name','$rate','$img','$cust',1,'$cat')";
            $res=mysqli_query($conn,$s);
            echo "<script> alert(Successfully Added To Your Cart)</script>";
            header("location: Afterlogin.php");
        }
    }
?>
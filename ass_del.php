<?php
include("connection.php");
session_start();
$sql="select * from `order`";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $bill = $row["Bill No"]; 
    $name = "submit".$bill ;
    if(isset($_POST[$name])){
        $name1 =$_POST["s_name"];
        $sq="SELECT C_Email FROM `customer_registration` WHERE `C_Name` = '$name1'";
        $r=mysqli_query($conn,$sq);
        $row1=mysqli_fetch_assoc($r);
        $email1=$row1["C_Email"];
        $s = "UPDATE `order` SET `D_Boy`='$name1', `D_Email`='$email1' WHERE `Bill No`='$bill'";
        $res=mysqli_query($conn,$s);
        header("location: adminPage.php");
    }
}

?>
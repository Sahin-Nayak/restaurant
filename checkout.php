<?php
include("connection.php");
session_start();
$cust = $_SESSION['email2'];
$sq="SELECT * FROM `cart` WHERE `Cust-id` = '$cust'";
$r=mysqli_query($conn,$sq);

$num=mysqli_num_rows($r);
if($num>0){
    $billNo = 1;
        while(true){
            $sql123 = "SELECT * FROM `order` WHERE `Bill No` = '$billNo'";
            $r123=mysqli_query($conn,$sql123);
            $num123=mysqli_num_rows($r123);
            if($num123>0){
                $billNo = $billNo+1;
            }
            else{
                break;
            }
        }
    while($row=mysqli_fetch_assoc($r)){
        $code = $row['Code'];
        $name= $row['Name'];
        $rate_demo = $row['Rate'];
        $quantity = $row['Quantity'];
        // $rate = $quantity*$rate_demo;
        $cat = $row['Category'];
        $status = "Order Confirmed";
        $date = date("d/m/Y");

        $s="INSERT INTO `order`(`Bill No`, `Names`, `Rate`, `Cust-id`, `Quantity`, `Category`,`O_Date`,`Status`, `D_Boy`, `D_Email`) VALUES ('$billNo','$name','$rate_demo','$cust','$quantity','$cat','$date','$status','No','No')";
        $res=mysqli_query($conn,$s);
        $sql="DELETE FROM `cart` WHERE `Cust-id` = '$cust'";
        $result=mysqli_query($conn,$sql);
        header("location: payment.php");
    }
}
?>
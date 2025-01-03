<?php
include("connection.php");
session_start();
$id= $_GET["delete"];
$sql="SELECT * FROM `table_booking` WHERE `C_Email`='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    $time = $row["Booking_Time"];
    $table = $row["Table_No"];

    if($time = '12:00'){
        $sq ="UPDATE `table` SET `12:00`='O' WHERE `Table No` = '$table'";
        $res = mysqli_query($conn,$sq);
    }
    else if($time = '14:00'){
        $sq ="UPDATE `table` SET `14:00`='O' WHERE `Table No` = '$table'";
        $res = mysqli_query($conn,$sq);
    }
    else if($time = '16:00'){
        $sq ="UPDATE `table` SET `16:00`='O' WHERE `Table No` = '$table'";
        $res = mysqli_query($conn,$sq);
    }
    else if($time = '18:00'){
        $sq ="UPDATE `table` SET `18:00`='O' WHERE `Table No` = '$table'";
        $res = mysqli_query($conn,$sq);
    }
    else if($time = '20:00'){
        $sq ="UPDATE `table` SET `20:00`='O' WHERE `Table No` = '$table'";
        $res = mysqli_query($conn,$sq);
    }
    else{
        $sq ="UPDATE `table` SET `22:00`='O' WHERE `Table No` = '$table'";
        $res = mysqli_query($conn,$sq);
    }
    $sql1="DELETE FROM `table_booking` WHERE `C_Email`='$id'";
    $result1=mysqli_query($conn,$sql1);
header("location: Afterlogin.php");
?>
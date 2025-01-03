<?php
session_start();
include("connection.php");
$id=  $_SESSION["email2"];
if(isset($_POST["submit"])){
    $Email= $_POST["email"];
    $Address=$_POST["address"];
    $Phone=$_POST["phone"];
    $Password=$_POST["password"];
    $file_name = $_FILES["image"]["name"];
    $file_tmp= $_FILES["image"]["tmp_name"];
    move_uploaded_file($file_tmp,"img/".$file_name);
    $img="img/".$_FILES["image"]["name"];
    if($img=="img/"){
        $img = $_POST["old_pic_link"];
    }

    $sql="update customer_registration set Address='$Address',Phone='$Phone',Password='$Password',Img='$img' where C_Email='$Email'";
    $result=mysqli_query($conn,$sql);
    $sql1 = "UPDATE `session` SET `Img`='$img' WHERE `Email`='$id'";
    mysqli_query($conn,$sql1);
    echo "<script>alert(Changes Successful)</script>";
    header("location: viewProfile.php");
}
?>
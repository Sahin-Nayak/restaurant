<?php
include("connection.php");
if(isset($_POST["submit"])){
    $UserName=$_POST["userName"];
    $Email=$_POST["Email"];
    $Address=$_POST["Address"];
    $Phone=$_POST["Phone"];
    $Password=$_POST["Passs"];
    $Category=$_POST["Category"];
    // $file_name = $_FILES["image"]["name"];
    // $file_tmp= $_FILES["image"]["tmp_name"];
    // move_uploaded_file($file_tmp,"img/".$file_name);
    // $img="img/".$_FILES["image"]["name"];
    $img = "img/chef-1.jpg";
    $security = $_POST["Pass_ans"];
    $s= "select * from customer_registration where C_Email='$Email'";
    $r=mysqli_query($conn,$s);
    $n=mysqli_num_rows($r);
    if($n==0){
        $sql="insert into customer_registration (C_Name,C_Email,Address,Phone,Password,Security_Ans,Category,Img) values ('$UserName','$Email','$Address','$Phone','$Password','$security','$Category','$img')";
        $result=mysqli_query($conn,$sql);
        echo "<script>document.location='login.html'</script>";
    }
    else{
        echo "<script>alert('Account Already Exists')</script>";
        header("Location: login.html");
    }
}
?>
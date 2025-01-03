<?php
include("connection.php");
if(isset($_POST["submit"])){
    $id=$_POST["userId"];
    $birth_city = $_POST["birth_city"];
    $new_password=$_POST["Newpass"];
    $r=mysqli_query($conn,"select * from customer_registration where C_Email='$id'");
    $n=mysqli_num_rows($r);
    while($row=mysqli_fetch_assoc($r)){
        $pass_ans=$row["Security_Ans"];
    }
    if($n>0 && $pass_ans==$birth_city){
        $res=mysqli_query($conn,"update customer_registration set Password='$new_password' where C_Email='$id'");
        echo "<script>alert('Password Successfully Changed');
        document.location='login.html'</script>;";
    }
    else{
        echo "<script>alert('No Such User or You give the answer wrong');
        document.location='forgot.html'</script>";
    }
}
<?php
    include("connection.php");


    function getUserIP() {
        // Check for shared internet or proxy server IP
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // Check for IPs passed from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            // Use REMOTE_ADDR if no proxy is used
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    $ipAddress = getUserIP();


    if(isset($_POST["submit"])){
        $id=$_POST["email"];
        $pass=$_POST["pass"];
        $sql="select * from customer_registration where C_Email='$id' and Password='$pass'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num>0){
            if($row=mysqli_fetch_assoc($result)){
                $x = $row["Category"];
                $link = $row["Img"];
                if($x=="Admin"){
                    $sql="select * from session where Email='$id' and Password='$pass'";
                    $result=mysqli_query($conn,$sql);
                    $n=mysqli_num_rows($result);
                    if($n==1){
                        echo "<script>alert('Session Already Exists');
                        document.location='index.php'</script>";
                    }
                    else{
                        session_start();
                        $_SESSION["user"]=$id;
                        $sql="insert into session (Email,Password,Category,Img,Ip) values ('$id','$pass','$x','$link',' ')";
                        $result=mysqli_query($conn,$sql);
                        header("Location: adminPage.php");
                    }
                }
                elseif($x=="User"){
                    $sql="select * from session where Email='$id' and Password='$pass'";
                    $result=mysqli_query($conn,$sql);
                    $n=mysqli_num_rows($result);
                    if($n==1){
                        echo "<script>alert('Session Already Exists');
                        document.location='index.php'</script>";
                    }
                    else{
                        session_start();
                        $_SESSION["email2"]=$id;
                        $sql="insert into session (Email,Password,Category,Img,Ip) values ('$id','$pass','$x','$link','$ipAddress')";
                        $result=mysqli_query($conn,$sql);
                        header("Location: Afterlogin.php");
                    }
                }
                else if($x=="Delivery Boy"){
                    $sql="select * from session where Email='$id' and Password='$pass'";
                    $result=mysqli_query($conn,$sql);
                    $n=mysqli_num_rows($result);
                    if($n==1){
                        echo "<script>alert('Session Already Exists');
                        document.location='index.php'</script>";
                    }
                    else{
                        session_start();
                        $_SESSION["email3"]=$id;
                        $sql="insert into session (Email,Password,Category,Img,Ip) values ('$id','$pass','$x','$link',' ')";
                        $result=mysqli_query($conn,$sql);
                        header("Location: DeliveryBoy.php");
                    }
                }
                else{
                    echo "<script>alert('Invalid Email Or Password Register Please');
                    document.location='login.html'</script>";
                }
            }
        }
        else{
            echo "<script>alert('No Such User Id Enter a valid User Id Other Wise Register');
            document.location='login.html'</script>;";
        }
    }
?>
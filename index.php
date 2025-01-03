<?php
include("connection.php");

error_reporting(E_ALL & ~E_NOTICE);  // Show all errors except notices


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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Account</title>
    <link rel="stylesheet" href="indexPhp.css">
</head>
<body>
<div class="navbar"><center><h2>Choose Your Account</h2></center></div>
<div class="cards"><center>
<?php
        $sql="select * from session where Ip='$ipAddress' and Category='User'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        $x=1;
        if($num>=1){
            echo "<a href=login.html><section class=container>
            <div class=card>
                <center><img src=img/logooo.png class=img alt=></center>
                <div class=card-email><center><h2>
                        New Account Login/Register
                    </h2></center></div>
            </div>
        </section></a>"; 
            while($row=mysqli_fetch_assoc($result)){
                $e=$row["Email"];
                $cat=$row["Category"];
                $image=$row["Img"];
                if($cat=="Admin"){
                    session_start();
                    $_SESSION["user"]=$e;
                    echo "<a href=adminPage.php value=$e>";
                }
                else if($cat=="User"){
                    session_start();
                    $_SESSION["email2"]=$e;
                    echo "<a href=Afterlogin.php>";
                }
                else if($cat=="Reception"){
                    echo "<a href=reception.php>";
                }
                else if($cat=="Delivery Boy"){
                    session_start();
                    $_SESSION["email3"]=$e;
                    echo "<a href=DeliveryBoy.php>";
                }
?>
            <section class="container">
                <div class="card">
                    <center><img src="<?php echo $image?>" class="img" alt=""></center>
                    <div class="card-email"><center><h2>
                            <?php
                                $y=$row["Email"];
                                echo $row["Email"];
                            ?>
                        </h2></center></div>
                        <?php
                            $s="select Email,Category from session where Email='$y'";
                            $res=mysqli_query($conn,$s);
                            $number=mysqli_num_rows($res);
                        ?>
                </div>
            </section>
    <?php
                echo "</a>";
            }
        }
        else{
            header("Location: login.html");
        }
    ?>
    </center>
</div>     
</body>
</html>
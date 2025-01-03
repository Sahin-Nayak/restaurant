<?php

include("connection.php");
session_start();

$bill = isset($_GET["name"]) ? $_GET["name"] : '';   //MP
//$bill=$_SESSION["bilno"];  //MP
$billDate = ' ';
$custId = ' ';
$d_Query = "SELECT * FROM `order` WHERE `Bill No`='$bill'";
$details = mysqli_query($conn, $d_Query);
while($row_del = mysqli_fetch_assoc($details)){
    $billNo = $row_del["Bill No"];
    $billDate = $row_del["O_Date"];
    $custId = $row_del["Cust-id"];
}
$details1 = mysqli_query($conn, "SELECT * FROM `gst`");
$row_del1 = mysqli_fetch_assoc($details1);
$gst_bill1 = $row_del1["GST"];
$insert= mysqli_query($conn, "INSERT INTO `order_bill`(`Bill No`, `Bill_Date`, `C_Email`, `C_Phone`, `T_Amount`,`G_Tax`, `Net_Amount`) VALUES ('$bill','$billDate','$custId',0,0,'$gst_bill1',0)");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Generater</title>
</head>
<body>
    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Kolkata Kravings</h1>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Order No : <?php echo $bill;?></h2>
                    <h3 class="sub-heading">Order Status : Confirmed </h3>
                    <h3 class="sub-heading">Email Address : <?php echo $_SESSION["email2"];?> </h3>
                </div>
                <?php
                            $email=$_SESSION["email2"];
                            $sel = mysqli_query($conn, "SELECT * FROM `customer_registration` WHERE `C_Email`='$email'");
                            while($r = mysqli_fetch_assoc($sel)){
                                $name = $r["C_Name"];
                                $ph = $r["Phone"];
                                $add = $r["Address"];
                            }
                ?>
                <div class="col-6">
                    <h4 class="sub-heading">Full Name : <?php echo $name;?> </h4>
                    <h4 class="sub-heading">Address : <?php echo $add;?> </h4>
                    <h4 class="sub-heading">Phone Number : <?php echo $ph;?> </h4>
                </div>
            </div>
        </div>
        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th class="w-20">Product Names</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `order` WHERE `Bill No`='$bill'");
                    $sub_total=0;
                    $status = ' ';
                    while($row = mysqli_fetch_assoc($select)){
                        
                        $status = $row["Status"];
                        $p_name = $row["Names"];
                        $rate = $row["Rate"];
                        $quan = $row["Quantity"];
                        $rate_quan = $rate*$quan;
                        $sub_total = $rate_quan+$sub_total;
                ?>
                    <tr>
                        <td class="w-20"><?php echo $p_name;?></td>
                        <td class="w-20"><?php echo $rate;?></td>
                        <td class="w-20"><?php echo $quan;?></td>
                        <td class="w-20"><?php echo $rate_quan;?></td>
                    </tr>
                <?php  }?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right">Sub Total</td>
                        <td class="w-20"><?php echo $sub_total;?></td>
                    </tr>
                    <?php
                    $gst = mysqli_query($conn, "SELECT G_Tax FROM `order_bill` WHERE `Bill No`='$bill'");
                    $gst1 = mysqli_fetch_assoc($gst);
                    $gst_rate=$gst1["G_Tax"];
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right">GST <?php echo $gst_rate;?>%</td>
                        <?php $n_rate= round($sub_total*($gst_rate/100));
                              $Gst_rate = round($sub_total+$n_rate); ?>
                        <td class="w-20"><?php echo $n_rate;?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right">Grand Total</td>
                        <td class="w-20"><?php echo $Gst_rate;?></td>
                    </tr>
                </tbody>
            </table>
            <?php
                $updateBill = mysqli_query($conn,"UPDATE `order_bill` SET `C_Phone`='$ph',`T_Amount`='$sub_total',`Net_Amount`='$Gst_rate' WHERE `Bill No`='$bill'");
            ?>
            <br>
            <?php
                if($status == 'Delivered'){
            ?>
            <h3 class="sub-heading">Delivery Status: Delivered</h3>
            <?php } 
                else{
            ?>
                        <h3 class="sub-heading">Delivery Status: Not Delivered </h3>
            <?php } ?>
            <?php echo "Enjoy your testy foods and don't forget to give us rate in playstore";?>
        </div>     
    </div>      

</body>
<style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            padding-top: 10%;
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 19px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
            font-size: 18px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: right;
            font-size: 18px;
        }
        .w-20{
            text-align: center;
            width: 20%;
            font-size: 20px;
        }
        .float-right{
            float: right;
        }
        .brand-section{
            width:594px;
        }
        .body-section{
            width:686px;
        }
        table{
            width:900px;
        }
        //generate pdf

    </style>
</html>
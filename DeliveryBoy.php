<?php
    include("connection.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <title>Delivery Boy Page</title>
</head>
<body>
<!--Start of navigation bar-->
<section class="This is Nevigation Bar">
    <nav class="navbar">
        <!-- Name Of Restaurent with logo -->
        <!-- <img src="img/logo for restaurent.png" alt="logo of restaurent" class="image_logo"> -->
        <div class="logo">Kolkata Kravings </div>

        <!-- Navigation -->
        <ul class="nav-links">

            <!-- checkbox case -->
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>

            <!-- Navigation menus-->
            <div class="menu">
                <li><a href="forgot.html">change password</a></li>
                <li><a href="logoutdelivery.php">log out</a></li>
                <li class="no_hover" ></li>
                <li id= bgcolor=#4c9e9e><label>
                <?php
                    if($_SESSION["email3"]){
                        $user=$_SESSION["email3"];
                        $sql="select Img from session where Email='$user'";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($result);
                        echo "</li>";
                        echo "<li id=><label><img src=$row[Img] class=>";
                    }
                ?>
                </label></li>
            </div>
        </ul>
    </nav>
    </div>
</section>
<section class="video12">
    <video width="100%" height="" muted autoplay loop>
        <source src="img/Delivery Service Animation Video (1080p).mp4" scrollamount="5" controls="false">
    </video>
</section>
<div class="table-data">
	<div class="order">
		<div class="head">
			<h3>Recent Orders</h3>
			<i class='bx bx-search' ></i>
			<i class='bx bx-filter' ></i>
		</div>
		<table>

			<thead>
				<tr>
					<th>User</th>
					<th>Bill No</th>
					<th>Order Names</th>
                    <th>Total Quantity</th>
                    <th>Rate</th>
                    <th>Address</th>
                    <th>Delivered status</th>
				</tr>
			</thead>
			<?php
                $s="select * from `order` where D_Email='$user'";
                $r=mysqli_query($conn,$s);
                while($row2=mysqli_fetch_assoc($r)){
                    $bill = $row2["Bill No"];
                    $names_order = $row2["Names"];
                    $rate = $row2["Rate"];
                    $cust = $row2["Cust-id"];
                    $quan = $row2["Quantity"];
                    $sts = $row2["Status"];

                $sqll="select * from `customer_registration` where C_Email='$cust'";
                $resss=mysqli_query($conn,$sqll);
                $row4=mysqli_fetch_assoc($resss);
                $add = $row4["Address"];
                $cusName =  $row4["C_Name"];
            ?>
			<tbody>
				<tr>
					<td><?php echo $cusName; ?></td>
					<td><?php echo $bill;?></td>
                    <td><?php echo $names_order;?></td>
                    <td><?php echo $quan;?></td>
                    <td><?php echo $rate;?></td>
                    <td><?php echo $add;?></td>
					<?php 
						if($sts!="Delivered"){
					?>
					<td>
						<!-- <span class="status completed">Completed</span> -->
						<form action="" method="POST"><input type="submit" value="deliver" name="del_sub" class="status completed"></form>
					</td>
					<?php }
					else{
					?>
					<td><span class="status completed">Completed</span></td>
					<?php } ?>
				</tr>
			</tbody>
			<?php } ?>
	    </table>
	</div>
</div>
<?php
	if(isset($_POST["del_sub"])){
		$sql123 = "UPDATE `order` SET `Status`='Delivered' WHERE `Bill No`='$bill'";
        $res123=mysqli_query($conn,$sql123);
	}

?>
 <script type="text/javascript" src="script.js"></script>
</body>
<style>
:root {
	--poppins: 'Poppins', sans-serif;
	--lato: 'Lato', sans-serif;

	--light: #F9F9F9;
	--blue: #3C91E6;
	--light-blue: #CFE8FF;
	--grey: #eee;
	--dark-grey: #AAAAAA;
	--dark: #342E37;
	--red: #DB504A;
	--yellow: #FFCE26;
	--light-yellow: #FFF2C6;
	--orange: #FD7238;
	--light-orange: #FFE0D3;
}

html {
	overflow-x: hidden;
}
    
    
    
    img{
        clip-path: circle();
        width: 30px;
    }



 .table-data {
	display: flex;
	flex-wrap: wrap;
	grid-gap: 24px;
	margin-top: 24px;
	width: 100%;
	color: var(--dark);
}
 .table-data > div {
	border-radius: 20px;
	background: var(--light);
	padding: 24px;
	overflow-x: auto;
}
 .table-data .head {
	display: flex;
	align-items: center;
	grid-gap: 16px;
	margin-bottom: 24px;
}
 .table-data .head h3 {
	margin-right: auto;
	font-size: 24px;
	font-weight: 600;
}
 .table-data .head .bx {
	cursor: pointer;
}

.table-data .order {
	flex-grow: 1;
	flex-basis: 500px;
}
 .table-data .order table {
	width: 100%;
	border-collapse: collapse;
}
.table-data .order table th {
	padding-bottom: 12px;
	font-size: 13px;
	text-align: left;
	border-bottom: 1px solid var(--grey);
}
 .table-data .order table td {
	padding: 16px 0;
}
 .table-data .order table tr td:first-child {
	display: flex;
	align-items: center;
	grid-gap: 12px;
	padding-left: 6px;
}
 .table-data .order table td img {
	width: 36px;
	height: 36px;
	border-radius: 50%;
	object-fit: cover;
}
 .table-data .order table tbody tr:hover {
	background: var(--grey);
}
 .table-data .order table tr td .status {
	font-size: 10px;
	padding: 6px 16px;
	color: var(--light);
	border-radius: 20px;
	font-weight: 700;
}
 .table-data .order table tr td .status.completed {
	background: var(--blue);
}


</style>
</html>
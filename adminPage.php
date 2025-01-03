<?php
	include("connection.php");
	session_start();
?>
<?php
	if(isset($_POST["gst_sub"])){
		$gst_new = $_POST["gst_val"];
		$gst_query = mysqli_query($conn,"UPDATE `gst` SET `GST`='$gst_new'");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->

	<title>AdminHub</title>
</head>
<body>

<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Kolkata Kravings </span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#dashboard">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="add_new.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Add Items</span>
				</a>
			</li>
			<li>
				<a href="#user">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Users</span>
				</a>
			</li>
			<li>
				<a href="#delivery">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Delivery Boy</span>
				</a>
			</li>
			<li>
				<a href="#table_booking_details">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Table Booking Details</span>
				</a>
			</li>
			<li>
				<a href="#msg11">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
<!-- SIDEBAR -->
 <!-- dashboard -->
<section id="dashboard">
	<!-- CONTENT -->
	<section id="content" class="box All Others">
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#"><?php echo $_SESSION["user"];?></a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<?php
                    $select = mysqli_query($conn, "SELECT * FROM `order`");
                    $c=mysqli_num_rows($select);
					$num = 0;
					while($row2=mysqli_fetch_assoc($select)){
						$num = $num+$row2["Rate"];
					}
					$select1 = mysqli_query($conn, "SELECT * FROM `customer_registration` where Category='User'");
                    $c1=mysqli_num_rows($select1);
					?>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $c;?></h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $c1;?></h3>
						<p>Total Customer</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>₹<?php echo $num;?></h3>
						<p>Total Sales</p>
					</span>
				</li>
				<?php
				$G = mysqli_query($conn,"SELECT GST FROM `gst`");
				$row_gst=mysqli_fetch_assoc($G);
				?>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
					<p>GST Percentage</p>
						<form action="" method="POST">
							<input type="text" name="gst_val" value="<?php echo $row_gst["GST"];?>"  id="gst_input"><span id="gst_span">%</span>
							<input type="submit" value="change gst" class="btn" name="gst_sub" id="gst_btn">
						</form>
					</span>
				</li>

			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<!-- <i class='bx bx-search' ></i> -->
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Order Status</th>
								<th>Delivery Boy Name</th>
								<th>Assing Delivery</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
							$old=0;
							    $sql= "select * from `order`";
								$result=mysqli_query($conn,$sql);
								while($row=mysqli_fetch_assoc($result)){
									$email=$row["Cust-id"];
									$sts=$row["Status"];
									$dname = $row["D_Boy"];
									$bill_no = $row["Bill No"];
									$s= "select * from `customer_registration` where C_Email='$email'";
									$res=mysqli_query($conn,$s);
									while($row1=mysqli_fetch_assoc($res)){
										$name = $row1["C_Name"];
										$pic = $row1["Img"];
									}
							?>
								<td>
									<img src="<?php echo $pic;?>">
									<p><?php echo $name;?></p>
								</td>
								<td><?php echo $sts;?></td>
								<td><?php echo $dname;?></td>
								<td >
								<?php
								if($bill_no==$old){
									echo "<img src=img/arrow.png>";
								}
								else if($dname == "No"){
								?>	
										<form action="ass_del.php" method="POST">
										<select name="s_name" class="btn" id="select">
										<?php
											$s13= "select * from `customer_registration` where Category='Delivery Boy'";
											$result4=mysqli_query($conn,$s13);
											while($row5=mysqli_fetch_assoc($result4)){
												$del_name = $row5["C_Name"];
												$s14= "select * from `order` where D_Boy='$del_name' and Status != 'Delivered'";
												$result5=mysqli_query($conn,$s14);
												$n=mysqli_num_rows($result5);
												if($n==0){
													echo "<option value=$del_name>$del_name</option>";
												}
											}
												
										?>
										</select>
											<input type="submit" class="btn" name="submit<?php echo $bill_no ?>">
										</form>
								<?php	
									}
									else{
										echo "<span class=btn><a href= ><font color=white>assinged</font></a></span>";
									}
									$old = $bill_no;
								?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
</section>

<!-- users -->
<section id="user">
	<!-- CONTENT -->
	<section id="content" class="box All Others">
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Users Details</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Users</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>All Persons</h3>
						<!-- <i class='bx bx-search' ></i> -->
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Picture</th>
								<th>Name</th>
								<th>Email</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Password</th>
								<!-- <th>Action</th> -->
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
									$s= "select * from `customer_registration` where Category='User'";
									$res=mysqli_query($conn,$s);
									while($row1=mysqli_fetch_assoc($res)){
										$name = $row1["C_Name"];
										$pic = $row1["Img"];
										$email = $row1["C_Email"];
										$add = $row1["Address"];
										$ph = $row1["Phone"];
										$pass = $row1["Password"];
									
							?>
								<td><img src="<?php echo $pic;?>"></td>
								<td><?php echo $name;?></td>
								<td><?php echo $email;?></td>
								<td><?php echo $add;?></td>
								<td><?php echo $ph;?></td>
								<td><?php echo $pass;?></td>
								<!-- <td><a href="adminPage.php?delete=<?php echo $email?>" class="btn"> <i class="fas fa-trash"></i> delete </a></td> -->
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
</section>

 <!-- delivery -->
 <section id="delivery">
	<!-- CONTENT -->
	<section id="content" class="box All Others">
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Delivery Boy Details</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Delivery Boy</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>All Persons</h3>
						<a href="DeliveryReg.html" class="banner_link1">+ Add Delivery Boy</a>
						<!-- <i class='bx bx-search' ></i> -->
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Picture</th>
								<th>Name</th>
								<th>Email</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Password</th>
								<!-- <th>Action</th> -->
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
									$s12= "select * from `customer_registration` where Category='Delivery Boy'";
									$res12=mysqli_query($conn,$s12);
									while($row12=mysqli_fetch_assoc($res12)){
										$name12 = $row12["C_Name"];
										$pic12 = $row12["Img"];
										$email12 = $row12["C_Email"];
										$add12 = $row12["Address"];
										$ph12 = $row12["Phone"];
										$pass12 = $row12["Password"];
									
							?>
								<td><img src="<?php echo $pic;?>"></td>
								<td><?php echo $name12;?></td>
								<td><?php echo $email12;?></td>
								<td><?php echo $add12;?></td>
								<td><?php echo $ph12;?></td>
								<td><?php echo $pass12;?></td>
								<!-- <td><a href="adminPage.php?delete=<?php echo $email?>" class="btn"> <i class="fas fa-trash"></i> delete </a></td> -->
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
</section>

<!-- table booking details -->
<section id="table_booking_details">
	<!-- CONTENT -->
	<section id="content" class="box All Others">
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Table Booking Details</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">All Details</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>All Details</h3>
						<!-- <i class='bx bx-search' ></i> -->
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Booking No</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>person No</th>
								<th>Table Seat</th>
								<th>Time</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
									$sql01= "SELECT * FROM `table_booking` ;";
									$res01=mysqli_query($conn,$sql01);
									while($row01=mysqli_fetch_assoc($res01)){
										$BookNo = $row01["Book No"];
										$nameC = $row01["C_Name"];
										$email01 = $row01["C_Email"];
										$pho = $row01["Phone"];
										$personNo = $row01["Person No"];
										$tableSeat = $row01["Table Seater"];	
										$b_time = $row01["Booking_Time"];
							?>
								<td><?php echo $BookNo;?></td>
								<td><?php echo $nameC;?></td>
								<td><?php echo $email01;?></td>
								<td><?php echo $pho;?></td>
								<td><?php echo $personNo;?></td>
								<td><?php echo $tableSeat;?></td>
								<td><?php echo $b_time;?></td>
								<!-- <form action="ass_del1.php" method="POST"> -->
								<td><a href="ass_del1.php?billNo=<?php echo $BookNo;?>" class="btn">check out</a></td>
								<!-- </form> -->
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
</section>

 <!-- bill details -->
 <section id="msg11">
	<!-- CONTENT -->
	<section id="content" class="box All Others">
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Bill Details</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">All Details</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>All Details</h3>
						<!-- <i class='bx bx-search' ></i> -->
						<i class='bx bx-filter' ></i>
					</div>
					<table colspan="2">
						<thead>
							<tr>
								<th width="10%">Bill No</th>
								<th width="10%">Bill Date</th>
								<th width="10%">Email</th>
								<th width="10%">Phone No.</th>
								<th width="10%">Total</th>
								<th width="10%">GST</th>
								<th width="40%">Net Amount</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
							    $sql12= "select * from `order_bill`";
								$result12=mysqli_query($conn,$sql12);
								while($row12=mysqli_fetch_assoc($result12)){
									$bill_no=$row12["Bill No"];
									$bill_date = $row12["Bill_Date"];
									$email_con=$row12["C_Email"];
									$phone_con=$row12["C_Phone"];
									$Total=$row12["T_Amount"];
									$gst_tax=$row12["G_Tax"];
									$net=$row12["Net_Amount"];

									if($bill_no>0){
							?>
								<td width="10%"><?php echo $bill_no;?></td>
								<td width="10%"><?php echo $bill_date;?></td>
								<td width="20%"><?php echo $email_con;?></td>
								<td width="10%"><?php echo $phone_con;?></td>
								<td width="10%"><?php echo $Total;?></td>
								<td width="10%"><?php echo $gst_tax.'%';?></td>
								<td width="10%"><?php echo $net;?></td>
							</tr>
						<?php } } ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
</section>

 <!-- contact -->
 <section id="msg11">
	<!-- CONTENT -->
	<section id="content" class="box All Others">
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Messages</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Messeges</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>All Messeges</h3>
						<!-- <i class='bx bx-search' ></i> -->
						<i class='bx bx-filter' ></i>
					</div>
					<table colspan="2">
						<thead>
							<tr>
								<th width="10%">M_Id</th>
								<th width="10%">Name</th>
								<th width="10%">Email</th>
								<th width="10%">Phone No.</th>
								<th width="60%">Messeges</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php
							    $sql2= "select * from `contact`";
								$result2=mysqli_query($conn,$sql2);
								while($row2=mysqli_fetch_assoc($result2)){
									$msgid_con=$row2["MsgId"];
									$name_con = $row2["Name"];
									$email_con=$row2["Email"];
									$phone_con=$row2["Phone"];
									$msg_con=$row2["Message"];
							?>
								<td width="10%"><?php echo $msgid_con;?></td>
								<td width="10%"><?php echo $name_con;?></td>
								<td width="10%"><?php echo $email_con;?></td>
								<td width="10%"><?php echo $phone_con;?></td>
								<td width="60%"><?php echo $msg_con;?></td>
								
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
</section>
</body>


<style>
	@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

a {
	text-decoration: none;
}

li {
	list-style: none;
}

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

body.dark {
	--light: #0C0C1E;
	--grey: #060714;
	--dark: #FBFBFB;
}

body {
	background: var(--grey);
	overflow-x: hidden;
}





/* SIDEBAR */
#sidebar {
	position: fixed;
	top: 0;
	left: 0;
	width: 280px;
	height: 100%;
	background: var(--light);
	z-index: 2000;
	font-family: var(--lato);
	transition: .3s ease;
	overflow-x: hidden;
	scrollbar-width: none;
}
#sidebar::--webkit-scrollbar {
	display: none;
}
#sidebar.hide {
	width: 60px;
}
#sidebar .brand {
	font-size: 24px;
	font-weight: 700;
	height: 56px;
	display: flex;
	align-items: center;
	color: var(--blue);
	position: sticky;
	top: 0;
	left: 0;
	background: var(--light);
	z-index: 500;
	padding-bottom: 20px;
	box-sizing: content-box;
}
#sidebar .brand .bx {
	min-width: 60px;
	display: flex;
	justify-content: center;
}
#sidebar .side-menu {
	width: 100%;
	margin-top: 48px;
}
#sidebar .side-menu li {
	height: 48px;
	background: transparent;
	margin-left: 6px;
	border-radius: 48px 0 0 48px;
	padding: 4px;
}
#sidebar .side-menu li.active {
	background: var(--grey);
	position: relative;
}
#sidebar .side-menu li.active::before {
	content: '';
	position: absolute;
	width: 40px;
	height: 40px;
	border-radius: 50%;
	top: -40px;
	right: 0;
	box-shadow: 20px 20px 0 var(--grey);
	z-index: -1;
}
#sidebar .side-menu li.active::after {
	content: '';
	position: absolute;
	width: 40px;
	height: 40px;
	border-radius: 50%;
	bottom: -40px;
	right: 0;
	box-shadow: 20px -20px 0 var(--grey);
	z-index: -1;
}
#sidebar .side-menu li a {
	width: 100%;
	height: 100%;
	background: var(--light);
	display: flex;
	align-items: center;
	border-radius: 48px;
	font-size: 16px;
	color: var(--dark);
	white-space: nowrap;
	overflow-x: hidden;
}
#sidebar .side-menu.top li.active a {
	color: var(--blue);
}
#sidebar.hide .side-menu li a {
	width: calc(48px - (4px * 2));
	transition: width .3s ease;
}
#sidebar .side-menu li a.logout {
	color: var(--red);
}
#sidebar .side-menu.top li a:hover {
	color: var(--blue);
}
#sidebar .side-menu li a .bx {
	min-width: calc(60px  - ((4px + 6px) * 2));
	display: flex;
	justify-content: center;
}
/* SIDEBAR */





/* CONTENT */
#content {
	position: relative;
	width: calc(100% - 280px);
	left: 280px;
	transition: .3s ease;
}
#sidebar.hide ~ #content {
	width: calc(100% - 60px);
	left: 60px;
}




/* NAVBAR */
#content nav {
	height: 56px;
	background: var(--light);
	padding: 0 24px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
	font-family: var(--lato);
	position: sticky;
	top: 0;
	left: 0;
	z-index: 1000;
}
#content nav::before {
	content: '';
	position: absolute;
	width: 40px;
	height: 40px;
	bottom: -40px;
	left: 0;
	border-radius: 50%;
	box-shadow: -20px -20px 0 var(--light);
}
#content nav a {
	color: var(--dark);
}
#content nav .bx.bx-menu {
	cursor: pointer;
	color: var(--dark);
}
#content nav .nav-link {
	font-size: 16px;
	transition: .3s ease;
}
#content nav .nav-link:hover {
	color: var(--blue);
}


#content nav .switch-mode {
	display: block;
	min-width: 50px;
	height: 25px;
	border-radius: 25px;
	background: var(--grey);
	cursor: pointer;
	position: relative;
}
#content nav .switch-mode::before {
	content: '';
	position: absolute;
	top: 2px;
	left: 2px;
	bottom: 2px;
	width: calc(25px - 4px);
	background: var(--blue);
	border-radius: 50%;
	transition: all .3s ease;
}
#content nav #switch-mode:checked + .switch-mode::before {
	left: calc(100% - (25px - 4px) - 2px);
}
/* NAVBAR */





/* MAIN */
#content main {
	width: 100%;
	padding: 36px 24px;
	font-family: var(--poppins);
	max-height: calc(100vh - 56px);
	overflow-y: auto;
}
#content main .head-title {
	display: flex;
	align-items: center;
	justify-content: space-between;
	grid-gap: 16px;
	flex-wrap: wrap;
}
#content main .head-title .left h1 {
	font-size: 36px;
	font-weight: 600;
	margin-bottom: 10px;
	color: var(--dark);
}
#content main .head-title .left .breadcrumb {
	display: flex;
	align-items: center;
	grid-gap: 16px;
}
#content main .head-title .left .breadcrumb li {
	color: var(--dark);
}
#content main .head-title .left .breadcrumb li a {
	color: var(--dark-grey);
	pointer-events: none;
}
#content main .head-title .left .breadcrumb li a.active {
	color: var(--blue);
	pointer-events: unset;
}




#content main .box-info {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
	grid-gap: 24px;
	margin-top: 36px;
}
#content main .box-info li {
	padding: 24px;
	background: var(--light);
	border-radius: 20px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
}
#content main .box-info li .bx {
	width: 80px;
	height: 80px;
	border-radius: 10px;
	font-size: 36px;
	display: flex;
	justify-content: center;
	align-items: center;
}
#content main .box-info li:nth-child(1) .bx {
	background: var(--light-blue);
	color: var(--blue);
}
#content main .box-info li:nth-child(2) .bx {
	background: var(--light-yellow);
	color: var(--yellow);
}
#content main .box-info li:nth-child(3) .bx {
	background: var(--light-orange);
	color: var(--orange);
}
#content main .box-info li .text h3 {
	font-size: 24px;
	font-weight: 600;
	color: var(--dark);
}
#content main .box-info li .text p {
	color: var(--dark);	
}





#content main .table-data {
	display: flex;
	flex-wrap: wrap;
	grid-gap: 24px;
	margin-top: 24px;
	width: 100%;
	color: var(--dark);
}
#content main .table-data > div {
	border-radius: 20px;
	background: var(--light);
	padding: 24px;
	overflow-x: auto;
}
#content main .table-data .head {
	display: flex;
	align-items: center;
	grid-gap: 16px;
	margin-bottom: 24px;
}
#content main .table-data .head h3 {
	margin-right: auto;
	font-size: 24px;
	font-weight: 600;
}
#content main .table-data .head .bx {
	cursor: pointer;
}

#content main .table-data .order {
	flex-grow: 1;
	flex-basis: 500px;
}
#content main .table-data .order table {
	width: 100%;
	border-collapse: collapse;
}
#content main .table-data .order table th {
	padding-bottom: 12px;
	font-size: 13px;
	text-align: left;
	border-bottom: 1px solid var(--grey);
}
#content main .table-data .order table td {
	padding: 16px 0;
}
#content main .table-data .order table tr td:first-child {
	display: flex;
	align-items: center;
	grid-gap: 12px;
	padding-left: 6px;
}
#content main .table-data .order table td img {
	width: 36px;
	height: 36px;
	border-radius: 50%;
	object-fit: cover;
}
#content main .table-data .order table tbody tr:hover {
	background: var(--grey);
}
#content main .table-data .order table tr td .status {
	font-size: 10px;
	padding: 6px 16px;
	color: var(--light);
	border-radius: 20px;
	font-weight: 700;
}
#content main .table-data .order table tr td .status.completed {
	background: var(--blue);
}


/* MAIN */
/* CONTENT */

/* add delivery boy button */

.banner_link1{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

@media screen and (max-width: 768px) {
	#sidebar {
		width: 200px;
	}

	#content {
		width: calc(100% - 60px);
		left: 200px;
	}

	#content nav .nav-link {
		display: none;
	}
}

/* button */

.btn{
   display: block;
   width: 50%;
   font-size:15px;
   color: white;
   cursor: pointer;
   border-radius: .5rem;
   margin-top: 1rem;
   padding: 0.5em;
   background-color: #27ae60;
   text-align: center;
}

.btn:hover{
   background: #333;
}

/* button_gst */

#gst_input, #gst_span{
	height: 30px;
	width: 33px;
	font-size: 25px;
	font-weight: bold;
	border: 0px solid white;
}
#gst_btn{
	height:40px;
	width:100px;
}

@media screen and (max-width: 576px) {
	#content nav form .form-input input {
		display: none;
	}

	#content nav form .form-input button {
		width: auto;
		height: auto;
		background: transparent;
		border-radius: none;
		color: var(--dark);
	}

	#content nav form.show .form-input input {
		display: block;
		width: 100%;
	}
	#content nav form.show .form-input button {
		width: 36px;
		height: 100%;
		border-radius: 0 36px 36px 0;
		color: var(--light);
		background: var(--red);
	}

	#content nav form.show ~ .notification,
	#content nav form.show ~ .profile {
		display: none;
	}

	#content main .box-info {
		grid-template-columns: 1fr;
	}

	#content main .table-data .head {
		min-width: 420px;
	}
	#content main .table-data .order table {
		min-width: 420px;
	}
	#content main .table-data .todo .todo-list {
		min-width: 420px;
	}
}
</style>
<script>
	const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})


</script>
</html>
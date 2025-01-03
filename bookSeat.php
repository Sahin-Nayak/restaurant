<?php
include("connection.php");
session_start();
$user=$_SESSION["email2"];
?>
<?php

if(isset($_POST["book_table"])){

    $sql_first ="SELECT * FROM `table_booking` WHERE `C_Email`='$user' ";
    $res_first = mysqli_query($conn,$sql_first);
    $num_rows = mysqli_num_rows($res_first);
    if($num_rows==0){


    $seat_no = $_POST["seat_no1"];
    $time_no = $_POST["time_no1"];
    $seats = $_POST["seats"];
    $name = $_POST["name"];
    $Phone = $_POST["Phone"];
    $person = $_POST["person"];
    $date = date('d-m-y');   
    $time = date('h:i:s');
    $sql = "INSERT INTO `table_booking`(`C_Name`,`Date`, `Time`,`C_Email`, `Phone`, `Person No`, `Table_No`,`Table Seater`,`Booking_Time`,`Status`) VALUES ('$name','$date','$time','$user','$Phone','$person','$seats','$seat_no . seater','$time_no','Confirmed')";
    $result = mysqli_query($conn,$sql);
    $sq ="UPDATE `table` SET `22:00`='[value-8]' WHERE";
    $res = mysqli_query($conn,$sq);

    if($time_no = '12:00'){
        $sq ="UPDATE `table` SET `12:00`='B' WHERE `Table No` = '$seats'";
        $res = mysqli_query($conn,$sq);
        header("location: Afterlogin.php");
    }
    else if($time_no = '14:00'){
        $sq ="UPDATE `table` SET `14:00`='B' WHERE `Table No` = '$seats'";
        $res = mysqli_query($conn,$sq);
        header("location: Afterlogin.php");
    }
    else if($time_no = '16:00'){
        $sq ="UPDATE `table` SET `16:00`='B' WHERE `Table No` = '$seats'";
        $res = mysqli_query($conn,$sq);
        header("location: Afterlogin.php");
    }
    else if($time_no = '18:00'){
        $sq ="UPDATE `table` SET `18:00`='B' WHERE `Table No` = '$seats'";
        $res = mysqli_query($conn,$sq);
        header("location: Afterlogin.php");
    }
    else if($time_no = '20:00'){
        $sq ="UPDATE `table` SET `20:00`='B' WHERE `Table No` = '$seats'";
        $res = mysqli_query($conn,$sq);
        header("location: Afterlogin.php");
    }
    else{
        $sq ="UPDATE `table` SET `22:00`='B' WHERE `Table No` = '$seats'";
        $res = mysqli_query($conn,$sq);
        header("location: Afterlogin.php");
    }
}
else{
    echo '<script> alert("you have already booked a table")</script>';
}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reservation Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
<!-- Start of navigation bar -->
<section class="This is Nevigation Bar">
    <nav class="navbar">
        <div class="logo">Kolkata Kravings </div>
        <div class="box123"><a href="Afterlogin.php">Go Back</a></div>
    </nav>
    </div>
</section>

<!-- start of form -->
<section class = "banner">
            <h2 class="header_booking">BOOK YOUR TABLE NOW</h2>
            <div class = "card-container">
                <div class = "card-img">
                    <!-- image here -->
                </div>

                <div class = "card-content">
                    <h3>Reservation</h3>
                    <form action="" method="POST">
                    <div class = "form-row">
                            <select name = "seater"  id = "seater1" onchange="test()" required>
                                <option value = "day-select">Select Seat</option>
                                <option value = "2">2</option>
                                <option value = "3">3</option>
                                <option value = "4">4</option>
                                <option value = "6">6</option>
                                <option value = "8">8</option>
                            </select>
                            <select name = "hours" required>
                                <option value = "hour-select">Select Hour</option>
                                <option value = "12:00">12: 00</option>
                                <option value = "14:00">14: 00</option>
                                <option value = "16:00">16: 00</option>
                                <option value = "18:00">18: 00</option>
                                <option value = "20:00">20: 00</option>
                                <option value = "22:00">22: 00</option>
                            </select>
                            <div class = "form-row">
                                <input type = "submit" value = "Select" name="submit12">
                            </div>
                    </div>
                    </form>
                    <?php
                    if(isset($_POST["submit12"])){
                        $hours = $_POST["hours"];
                        $seatNo =$_POST["seater"];
                    
                    ?>
                    <form action="" method="POST">
                        <div class = "form-row">
                        <input type = "number" value = "<?php echo $_POST["seater"];?>" name = "seat_no" disabled class="echo_num">
                        <input type = "hidden" value = "<?php echo $_POST["seater"];?>" name = "seat_no1" class="echo_num">
                        <input type = "text" value = "<?php echo $hours;?>" disabled class="echo_num">
                        <input type = "hidden" value = "<?php echo $hours;?>" name = "time_no1" class="echo_num">
                        </div>
                        <div class = "form-row">
                        <select name = "seats" required>
                                <option value = "hour-select">Select Table</option>
                            <?php 
                                if($hours == '12:00'){
                                    $select = mysqli_query($conn, "SELECT * FROM `table` WHERE `Seats_No`='$seatNo' AND `12:00` = 'O' ");
                                }
                                else if($hours == '14:00'){
                                    $select = mysqli_query($conn, "SELECT * FROM `table` WHERE `Seats_No`='$seatNo' AND `14:00` = 'O' ");
                                }
                                else if($hours == '16:00'){
                                    $select = mysqli_query($conn, "SELECT * FROM `table` WHERE `Seats_No`='$seatNo' AND `16:00` = 'O' ");
                                }
                                else if($hours == '18:00'){
                                    $select = mysqli_query($conn, "SELECT * FROM `table` WHERE `Seats_No`='$seatNo' AND `18:00` = 'O' ");
                                }
                                else if($hours == '20:00'){
                                    $select = mysqli_query($conn, "SELECT * FROM `table` WHERE `Seats_No`='$seatNo' AND `20:00` = 'O' ");
                                }
                                else{
                                    $select = mysqli_query($conn, "SELECT * FROM `table` WHERE `Seats_No`='$seatNo' AND `22:00` = 'O' ");
                                }
                                if(mysqli_num_rows($select) > 0){
                                   while($row = mysqli_fetch_assoc($select)){
                                        $vari = "Table No ".$row["Table No"];
                            ?>
                            <option value = "<?php echo $row["Table No"]; ?>"><?php echo $vari; ?></option>
                            <?php } }
                            else{
                            ?>
                            <option value = "" disabled>No Table Available</option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>

                        <div class = "form-row">
                            <input type = "text" placeholder="Full Name" name="name" required>
                            <input type="tel" name="Phone" id="phone" placeholder="Phone Number" required>
                        </div>

                        <div class = "form-row">
                            <input type = "number" placeholder="How Many Persons?" name="person" min = "1" required>
                            <input type = "submit" value = "BOOK TABLE" name="book_table">
                        </div>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
</section>
        
</body>
    <script>
        function test(){
            var seat = document.getElementById("seater1");
            var value = seat.value;
            document.cookie = "selected_items="+value;
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap');


*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}
body{
    font-family: 'Poppins', sans-serif;
}
.banner{
    min-height: 90.9vh;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/banner-img.jpg") center/cover no-repeat;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: #fff;
    padding-bottom: 20px;
}
.card-container{
    display: grid;
    grid-template-columns: 420px 420px;
}
.card-img{
    background: url("img/card-img.jpg") center/cover no-repeat;
}
.banner h2{
    padding-bottom: 40px;
    margin-bottom: 20px;
}
.card-content{
    background: #fff;
    height: 400px;
}
.card-content h3{
    text-align: center;
    color: #000;
    padding: 25px 0 10px 0;
    font-size: 26px;
    font-weight: 500;
}
.form-row{
    display: flex;
    width: 90%;
    margin: 0 auto;
}
form select, form input{
    display: block;
    width: 100%;
    margin: 15px 12px;
    padding: 5px;
    font-size: 15px;
    font-family: 'Poppins', sans-serif;
    outline: none;
    border: none;
    border-bottom: 1px solid #eee;
    font-weight: 300;
}
form input[type = text], form input[type = number], form input::placeholder, select{
    color: #9a9a9a;
}
form input[type = submit]{
    color: #fff;
    background: #f2745f;
    padding: 12px 0;
    border-radius: 4px;
    cursor: pointer;
}
form input[type = submit]:hover{
    opacity: 0.9;
}
@media(max-width: 992px){
    .card-container{
        grid-template-columns: 100%;
        width: 100vw;
    }
    .card-img{
        height: 330px;
    }
}

.echo_num{
    width: 40%;
}
/* nav*/
/* Navbar styling */
.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    background-color: teal;
    color: #fff;
    box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.272), -1px -1px 8px rgba(0,0,0,0.2);
    position: sticky;
    z-index: 1000;
}    
.navbar .box123 a {   
    color: #fff;
    text-decoration: none;
}

/* Logo */    
.logo {    
    font-size: 45px;
    transition: 1.5s ease;
}
.box123{
   font-size: 23px;
}
@media (max-width:415px){

.logo{
   font-size: 35px;
}
.box123{
   font-size: 18px;
}

}
@media (max-width:540px){

.logo{
   font-size: 30px;
}
.box123{
   font-size: 16px;
}

}
@media (max-width:380px){

.logo{
   font-size: 25px;
}
.box123{
   font-size: 14px;
}
.header_booking{
    font-size: 16px;
}
}

</style>
</html>
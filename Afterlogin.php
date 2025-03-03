<?php
    include("connection.php");
    session_start();
    $use = $_SESSION["email2"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="menu.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="responsive.css">
    <title>User Page</title>
</head>
<body>

<!-- Start of navigation bar -->
<section class="This is Nevigation Bar" id="home">
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
                <li><a href="#home">Home</a></li>
                <li><a href="#about-head">About Us</a></li>
                <li><a href="#offline_menu">Our Menu</a></li>
                <?php $user=$_SESSION["email2"];?>
                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `order` WHERE `Cust-id`='$user'");
                    $c=mysqli_num_rows($select);
                    $select1 = mysqli_query($conn, "SELECT * FROM `cart` WHERE `Cust-id`='$user'");
                    $c1=mysqli_num_rows($select1);
                    
                ?>
                <li><a href="cart.php?user=<?php echo $user?>">Cart[<span class="red"><?php echo $c1;?></span>]</a></li>
                <li><a href="cart.php">Your Order[<span><?php echo $c;?></span>]</a></li>
                <li><a href="bookSeat.php">Book Seat</a></li>
                <li><a href="#booksts">Booking Status</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li class="login"><span onclick="showOptions()">Profile</span>
                    <!-- Dropdown menu -->
                    <ul class="dropdown" id="dropdown">
                        <li><a href="viewProfile.php" value="<?php $_SESSION["email2"] ?>" class="userPage">View Profile</a></li>
                        <li><a href="logoutuser.php">Log Out</a></li>
                    </ul>
                </li>
                <li class="no_hover" ></li>
                <li id= bgcolor=#4c9e9e><label>
                <?php
                    if($_SESSION["email2"]){
                        $user=$_SESSION["email2"];
                        $sql="select Img from session where Email='$user'";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($result);
                        echo "<img src=$row[Img] class=img>";
                    }
                ?>
                </label></li>
            </div>
        </ul>
    </nav>
    <!-- <div id="search_button" class="search_button"> -->
    </div>
</section>

<!-- slider -->
<section class="video">
    <!-- <video width="100%" height="" muted autoplay loop>
        <source src="img/New video.mp4" scrollamount="5" controls="false">
    </video> -->
    <img src="img/image_2.jpg" height="950px" width="100%" alt="">
    <div class="text-box">
       <center><h1 id="text6-container"></h1></center>
    </div>
</section>

<!-- about -->

<br>
<section id="about-head" class="section-p1">
        <img src="img/about.jpg" alt=""  id="about_pic" class="about_pic">
        <div>
            <span class="who_we">Who we are?</span>
            <p class="about_p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero beatae assumenda aut excepturi aperiam saepe quae sint asperiores, eius consequatur nam veniam ut blanditiis reiciendis libero deleniti. Architecto, explicabo officia. Dicta magni nam fugiat saepe suscipit, tempora et facere eaque. Repellendus nulla officiis repudiandae id unde dicta molestias cupiditate aliquam sunt voluptas! Asperiores delectus earum magni iste itaque ipsa. Blanditiis. Cumque, voluptatum itaque, nisi autem repudiandae, provident deserunt eius recusandae harum deleniti neque mollitia beatae laborum! Reiciendis eligendi sequi ab maxime ad quos veniam, et, voluptate sit obcaecati voluptates neque!</p>
            <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%">Paapi Pet is an Indian multinational restaurant aggregator and food delivery company, founded by Deepinder Goyal and Pankaj Chaddah in 2008.[4] Zomato provides information, menus and user-reviews of restaurants as well as food delivery options from partner restaurants in more than 1,000 Indian cities, as of 2022.[5]</marquee>
        </div>
</section>
    
<section id="about-app" class="section-p1">
        <div class="video">
        <h1 class="download_app">Download Our <a href="#">App</a></h1>
            <video control="false" autoplay muted loop src="img/Hevofood App _ Food Delivery Video _ After Effects (1080p60).mp4"></video>
        </div>
</section>

<!-- suggestion -->

<section class="suggest">
    <center> <h3 color="#1C1C1C" class="inspiration" id="text2-container"></h3> </center>
        <div class="suggestion">
                <div class="sec-all">
                    <div src="" class=""></div>
                        <div></div>
                        <a href="product.php?food=Biryani" class="link"><img alt="image" src="https://b.zmtcdn.com/data/dish_images/d19a31d42d5913ff129cafd7cec772f81639737697.png" loading="lazy" class="image-food"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="product.php?food=Fast" class="link"><img alt="image" src="https://b.zmtcdn.com/data/o2_assets/d0bd7c9405ac87f6aa65e31fe55800941632716575.png" loading="lazy" class="image-food"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="product.php?food=Bengali" class="link"><img alt="image" src="https://b.zmtcdn.com/data/o2_assets/52eb9796bb9bcf0eba64c643349e97211634401116.png" loading="lazy" class="image-food"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="product.php?food=Kebab" class="link"><img alt="image" src="https://b.zmtcdn.com/data/dish_images/197987b7ebcd1ee08f8c25ea4e77e20f1634731334.png" loading="lazy" class="image-food"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="product.php?food=Bengali" class="link"><img alt="image" src="https://b.zmtcdn.com/data/o2_assets/e444ade83eb22360b6ca79e6e777955f1632716661.png" loading="lazy" class="image-food"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="product.php?food=Fast" class="link"><img alt="image" src="https://b.zmtcdn.com/data/dish_images/c2f22c42f7ba90d81440a88449f4e5891634806087.png" loading="lazy" class="image-food"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="product.php?food=Fast" class="link"><img alt="image" src="https://b.zmtcdn.com/data/dish_images/ccb7dc2ba2b054419f805da7f05704471634886169.png" loading="lazy" class="image-food"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
        </div>    
</section> 

<!-- foods card -->

<section class="container" id="food_choose" bgcolor="#F2F3F5">
            <a href="product.php?food=Biryani" class="cards_for_suggestion" id="Biryani" >
                <div class="card">
                    <div class="card-image car-1"></div>
                      <h2 class="c_1">Biryani Selection</h2>
                      <hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
            </a>
            <a href="product.php?food=Mithai" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-2"></div>
                      <h2 class="c_1">Mithai - Bengali,South </h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
            </a>
            <a href="product.php?food=Handi" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-3"></div>
                      <h2 class="c_1">Handi Biryani</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
            </a>
            <a href="product.php?food=Kebab" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-4"></div>
                      <h2 class="c_1">Kebab Selection</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
            </a>
            <a href="product.php?food=Curry_Non" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-5"></div>
                      <h2 class="c_1">Non-Veg Curries</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
            </a>
            <a href="product.php?food=Gravy_Non" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-6"></div>
                      <h2 class="c_1">Non-Veg Gravies</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
            </a>
              <a href="product.php?food=Speciality" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-7"></div>
                      <h2 class="c_1">Our Specilities</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
              </a>
              <a href="product.php?food=Bengali" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-8"></div>
                      <h2 class="c_1">Bengali Food</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
              </a>
              <a href="product.php?food=Salad" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-9"></div>
                      <h2 class="c_1">Salad</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
              </a>
              <a href="product.php?food=Veg_Sabzi" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-10"></div>
                      <h2 class="c_1">Vegetarian Sabzi</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
              </a>
              <a href="product.php?food=Breads" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-11"></div>
                      <h2 class="c_1">Breads</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
              </a>
              <a href="product.php?food=Desserts" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-12"></div>
                      <h2 class="c_1">Desserts</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
              </a>
              <a href="product.php?food=Beverages" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-13"></div>
                      <h2 class="c_1">Beverages</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
              </a>
              <a href="product.php?food=Fast" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-14"></div>
                      <h2 class="c_1">Fast Foods</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
              </a>
              <a href="product.php?food=South" class="cards_for_suggestion">
                <div class="card">
                    <div class="card-image car-15"></div>
                      <h2 class="c_1">South Indian</h2><hr>
                      <table class="safty">
                          <tr>
                              <td width="40%"><img src="https://b.zmtcdn.com/data/o2_assets/0b07ef18234c6fdf9365ad1c274ae0631612687510.png?output-format=webp" alt="" class="max_safty"></td>
                              <td width="60%" class="safty_td">We Provides Our Max Safty Service Due To Corona Virus</td>
                          </tr>
                      </table>
                  </div>
              </a>
</section> 

<!-- <center><div class="more_op" width="100%"><a href="" class="banner_link1" >More Option</a></div></center><br> -->

<!-- banner of order restaurent -->

<section class="banner1">
    <center>
        <div class="banner_div"><h1 class="banner_h1" id="banner_h1"> Book Table Now And Get 20% Discount</h1></div>
        <div class="banner_link"><a href="bookSeat.php" class="banner_link1">Book A Seat Now</a></div>
    </center>
</section>

<!-- slide of restaurent -->

<center>
<nav height="50%" class="slide_picture">
    <table   cellspacing="5" cellpadding="2" height="50" class="img_slider">
        <tr><th>
        <table border="0" width="100%"  cellspacing="0" cellpadding="2" height="50" class="slide_n">
        <tr>
        <th width="90%">
            <marquee behavior="alternate" direction="left" scrollamount="3">
            <img src="Img/res1.jpg" alt="picture" width="470">
            <img src="Img/res2.jpg" alt="picture" width="420">
            <img src="Img/res3.jpg" alt="picture" width="472">
            <img src="Img/res4.jpg" alt="picture" width="470">
            <img src="Img/res5.jpg" alt="picture" width="470">
            <img src="Img/res6.jpg" alt="picture" width="470">
            <img src="Img/res7.jpg" alt="picture" width="470">
            <img src="Img/res8.jpg" alt="picture" width="494">
            <img src="Img/res9.jpg" alt="picture" width="470">
            <img src="Img/res10.jpg" alt="picture" width="470">
            <img src="Img/res11.jpg" alt="picture" width="470">
            <img src="Img/res12.jpg" alt="picture" width="440">
            <img src="Img/res13.jpg" alt="picture" width="470">
            <img src="Img/res14.jpg" alt="picture" width="416">
            <img src="Img/res15.jpg" alt="picture" width="416">
            <img src="Img/res16.jpg" alt="picture" width="470">
            <img src="Img/res17.jpg" alt="picture" width="470">
            <img src="Img/res18.jpg" alt="picture" width="470">
            <img src="Img/res19.jpg" alt="picture" width="470">
            <img src="Img/res20.jpg" alt="picture" width="470">
            </marquee> 
        </th>
        </tr>
        </table>
        </th></tr>
    </table>
</nav>
</center>

<!-- booking details -->

<section id="booksts"><br>
<h3 class="menu_h2">Seat Booking :<span id="size"> confirmed</span></h3>
<table class="table_seatbook_tr">
 <tr class="table_seatbook_tr">
 <th class="table_seatbook_th">Book No</th>
 <th class="table_seatbook_th">Name</th>
 <th class="table_seatbook_th">Date </th>
 <th class="table_seatbook_th">Time </th>
 <th class="table_seatbook_th">Action </th>
 </tr>
 <tbody>
                                <tr class="table_seatbook_tr">
                                <?php
                                        $s= "select * from `table_booking` where `C_Email`='$use'";
                                        $res=mysqli_query($conn,$s);
                                        while($row1=mysqli_fetch_assoc($res)){
                                            $no = $row1["Book No"];
                                            $name = $row1["C_Name"];
                                            $date = $row1["Date"];
                                            $b_time = $row1["Booking_Time"];
                                ?>
                                    <td class="table_seatbook_td"><?php echo $no;?></td>
                                    <td class="table_seatbook_td"><?php echo $name;?></td>
                                    <td class="table_seatbook_td"><?php echo $date;?></td>
                                    <td class="table_seatbook_td"><?php echo $b_time;?></td>
                                    <td class="table_seatbook_td"><a href="cancelSeat.php?delete=<?php echo $user?>">Cancel Booking</a></td>
                                    <!-- <td><a href="adminPage.php?delete=<?php echo $email?>" class="btn"> <i class="fas fa-trash"></i> delete </a></td> -->
                                </tr>
                            <?php } ?>
</tbody>
 </table>
</section>

<!--  menu items  -->

<section class="offline_menu" id="offline_menu">
    <div class="container_menu">
        <div class="title_menu">
            <h2 class="menu_h2">Offline Restaurent Menu</h2>
            <p class="menu_p">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi optio quis, deleniti voluptate ipsa perferendis quaerat distinctio molestias quod esse sint, commodi itaque in quo ab iusto natus. Similique, quidem nisi debitis neque, unde ipsam voluptatum quasi delectus modi.
            </p>
        </div>
        <div class="menu_content">
            <div class="menu_list">
                <li class="menu_li" data-color=".All">All Items</li>
                <li class="menu_li" data-color=".Others">Other Items</li>
                <li class="menu_li" data-color=".Breads">Breads</li>
                <li class="menu_li" data-color=".Desserts">Desserts</li>
                <li class="menu_li" data-color=".Beverages">Beverages</li>
                <li class="menu_li" data-color=".Salad">Salad</li>
                <li class="menu_li" data-color=".Special">Our Specialities</li>
            </div>

            <!-- others -->
            <div class="box_flex">
            <div class="box All Others">
                    <div class="box_img">
                        <img src="img/Chicken-Biryani.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Chicken Biryani</h3>
                        <hr>
                        <section>345.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="box All Others">
                    <div class="box_img">
                        <img src="img/Chicken-Biryani.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Chicken Special Biryani(2pcs)</h3>
                        <hr>
                        <section>485.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="box All Others">
                    <div class="box_img">
                        <img src="img/Best-Mutton-Biryani-Recipe.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Mutton Biryani</h3>
                        <hr>
                        <section>345.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="box All Others">
                    <div class="box_img">
                        <img src="img/Best-Mutton-Biryani-Recipe.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Mutton Special Biryani</h3>
                        <hr>
                        <section>485.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="box All Others">
                    <div class="box_img">
                        <img src="img/hyderabadi-egg-biryani_3894-2.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Egg Biryani(2pcs)</h3>
                        <hr>
                        <section>235.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="box All Others">
                    <div class="box_img">
                        <img src="img/Tandoori-Chicken.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Chicken Tandoor(2pcs)</h3>
                        <hr>
                        <section>270.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="box All Others">
                    <div class="box_img">
                        <img src="img/chicken.seekh.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Chicken Cheese Kebab(6pcs)</h3>
                        <hr>
                        <section>465.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="box All Others">
                    <div class="box_img">
                        <img src="img/chicken.seekh.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Chicken Seekh Kabeb(6pcs)</h3>
                        <hr>
                        <section>385.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="box All Others">
                    <div class="box_img">
                        <img src="img/Bengali-Chicken-Rezala-2-3.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Chicken Malai Kabeb(6pcs)</h3>
                        <hr>
                        <section>350.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="box All Others">
                    <div class="box_img">
                        <img src="img/63201465.webp" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Mutton Curry</h3>
                        <hr>
                        <section>300.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="box All Others">
                    <div class="box_img">
                        <img src="img/63201465.webp" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Mutton Razala(1pc)</h3>
                        <hr>
                        <section>255.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="box All Others">
                    <div class="box_img">
                        <img src="img/Bengali-Chicken-Rezala-2-3.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Chicken Razala(1pc)</h3>
                        <hr>
                        <section>250.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <!-- roti -->
                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/roti1.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Aata Roti</h3>
                        <hr>
                        <section>27.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>

                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/roti2.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Butter Roti</h3>
                        <hr>
                        <section>30.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>

                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/naan.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Butter Naan</h3>
                        <hr>
                        <section>75.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>

                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/naan.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Plain Naan</h3>
                        <hr>
                        <section>60.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>

                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/kulcha.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Plain Kulcha</h3>
                        <hr>
                        <section>65.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>

                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/kulcha.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Masala Kulcha</h3>
                        <hr>
                        <section>100.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>
                
                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/special_nun.webp" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Paapi Pet Special Naan</h3>
                        <hr>
                        <section>125.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>
                
                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/special_nun.webp" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Garlic Naan</h3>
                        <hr>
                        <section>85.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>
                
                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/rumali.webp" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Roomali Roti</h3>
                        <hr>
                        <section>25.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>
                
                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/roti2.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Tandoori Roti</h3>
                        <hr>
                        <section>25.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>
                
                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/paratha.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Tawa Paratha</h3>
                        <hr>
                        <section>45.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>
                <div class="box All Breads">
                    <div class="box_img">
                        <img src="img/paratha.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Alu Paratha</h3>
                        <hr>
                        <section>25.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Bread</article>
                    </div>
                </div>
                <!-- special -->
                <div class="box All Special">
                    <div class="box_img">
                        <img src="img/murg.webp" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Murgh Musallam</h3>
                        <hr>
                        <section>750.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Special</article>
                    </div>
                </div>
                <div class="box All Special">
                    <div class="box_img">
                        <img src="img/ranne.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Raan-E-Sikandari</h3>
                        <hr>
                        <section>1200.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Special</article>
                    </div>
                </div>
                <div class="box All Special">
                    <div class="box_img">
                        <img src="img/ran.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Raan Musallam</h3>
                        <hr>
                        <section>2500.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Special</article>
                    </div>
                </div>
                <div class="box All Special">
                    <div class="box_img">
                        <img src="img/bakra.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Bakra Musallam</h3>
                        <hr>
                        <section>13500.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Special</article>
                    </div>
                </div>

                <!-- desserts -->
                <div class="box All Desserts">
                    <div class="box_img">
                        <img src="img/firni.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Firni</h3>
                        <hr>
                        <section>85.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Desserts</article>
                    </div>
                </div>

                <div class="box All Desserts">
                    <div class="box_img">
                        <img src="img/firni.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Shahi Firni</h3>
                        <hr>
                        <section>140.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Desserts</article>
                    </div>
                </div>

                <div class="box All Desserts">
                    <div class="box_img">
                        <img src="img/ice creame.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Natural Ice Cream</h3>
                        <hr>
                        <section>180.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Desserts</article>
                    </div>
                </div>

                <div class="box All Desserts">
                    <div class="box_img">
                        <img src="img/ice creame.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Ice Cream</h3>
                        <hr>
                        <section>130.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Desserts</article>
                    </div>
                </div>
                <div class="box All Desserts">
                    <div class="box_img">
                        <img src="img/kulfi.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Kulfi</h3>
                        <hr>
                        <section>130.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Desserts</article>
                    </div>
                </div>
                <div class="box All Desserts">
                    <div class="box_img">
                        <img src="img/firni.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Mihidana with Rabri</h3>
                        <hr>
                        <section>200.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Desserts</article>
                    </div>
                </div>
                <div class="box All Desserts">
                    <div class="box_img">
                        <img src="img/kulfi.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Slice Bombay Kulfi</h3>
                        <hr>
                        <section>190.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Desserts</article>
                    </div>
                </div>
                <!-- beverages -->
                <div class="box All Beverages">
                    <div class="box_img">
                        <img src="img/drink-7.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Mineral water</h3>
                        <hr>
                        <section>35.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Beverages</article>
                    </div>
                </div>

                <div class="box All Beverages">
                    <div class="box_img">
                        <img src="img/drink-3.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Soft Drinks</h3>
                        <hr>
                        <section>60.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Beverages</article>
                    </div>
                </div>

                <div class="box All Beverages">
                    <div class="box_img">
                        <img src="img/drink-2.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Masala Soft Drink</h3>
                        <hr>
                        <section>90.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Beverages</article>
                    </div>
                </div>
                <div class="box All Beverages">
                    <div class="box_img">
                        <img src="img/drink-6.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Ghol</h3>
                        <hr>
                        <section>120.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Beverages</article>
                    </div>
                </div>
                <div class="box All Beverages">
                    <div class="box_img">
                        <img src="img/drink-5.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Jaljeera</h3>
                        <hr>
                        <section>100.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Beverages</article>
                    </div>
                </div>
                <div class="box All Beverages">
                    <div class="box_img">
                        <img src="img/drink-8.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Virgin Mojito</h3>
                        <hr>
                        <section>149.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Beverages</article>
                    </div>
                <!-- salad -->
                </div>
                <div class="box All Salad">
                    <div class="box_img">
                        <img src="img/image5.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Onion Salad</h3>
                        <hr>
                        <section>70.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Salad</article>
                    </div>
                </div>
                <div class="box All Salad">
                    <div class="box_img">
                        <img src="img/image5.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Green Salad</h3>
                        <hr>
                        <section>70.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Salad</article>
                    </div>
                </div>
                <div class="box All Salad">
                    <div class="box_img">
                        <img src="img/image5.jpg" alt="">
                    </div>
                    <div class="menu_text">
                        <h3>Mixed Raita</h3>
                        <hr>
                        <section>85.00</section>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <article>Category: Salad</article>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- our galary -->

<section class="galary">
    <center><h1 class="galary_head">Our Galary</h1></center>
    <div class="gal_container">
        <img src="img/edit1.jpg">
        <img src="img/edit2.jpg">
        <img src="img/edit3.jpg">
        <img src="img/edit4.jpg">
        <img src="img/edit5.jpg">
        <img src="img/edit6.jpg">
        <img src="img/edit7.jpg">
        <img src="img/edit8.jpg">
        <img src="img/wdit9.jpg">
        <img src="img/edit10.jpg">
      </div>
</section>

<!-- happy clints -->

<center><section class="counter_of_persons">
        <div class="row11">
            <div class="col11">
                <div class="counter-box11">
                    <i class="fa fa-users"></i>
                    <h2 class="counter_person">300+</h2>
                    <h4>DELIVERY BOYS</h4>
                </div>
            </div>
            <div class="col11">
                <div class="counter-box11">
                    <i class="fa fa-users"></i>
                    <h2 class="counter_person">101</h2><span class="counter_span">k</span>
                    <h4>HAPPY CLIENTS</h4>
                </div>
            </div>
            <div class="col11">
                <div class="counter-box11">
                    <i class="fa fa-users"></i>
                    <h2 class="counter_person">205</h2>
                    <h4>NUMBER OF CHEFS</h4>
                </div>
            </div>
            <div class="col11">
                <div class="counter-box11">
                    <i class="fa fa-globe"></i>
                    <h2 class="counter_person">10</h2>
                    <h4>REWARD FROM FSSAI</h4>
                </div>
            </div>
        </div>
</section></center>

<!-- Top commenter -->

<section class="main_comment">
    <center><h1 class="chead">Top Commenters</h1></center>
        <div class="full-boxer">
            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="img/man1.png" class="pimage">
                        </div>
                        <div class="Name">
                            <strong class="strong">Kamala Khan</strong>
                            <span class="pname">@Kamala Khan</span>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p class="pcomment">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>

            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="img/man2.png" class="pimage">
                        </div>
                        <div class="Name">
                            <strong class="strong">Captain America</strong>
                            <span class="pname">@Captain America</span>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p class="pcomment">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>

            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="img/man3.png" class="pimage">
                        </div>
                        <div class="Name">
                            <strong class="strong">Captain Marvel</strong>
                            <span class="pname">@Captain Marvel</span>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p class="pcomment">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>

            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="img/man3.png" class="pimage">
                        </div>
                        <div class="Name">
                            <strong class="strong">Scarlet Witch</strong>
                            <span class="pname">@Scarlet Witch</span>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p class="pcomment">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>
            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="img/man4.png" class="pimage">
                        </div>
                        <div class="Name">
                            <strong class="strong">Black Panther</strong>
                            <span class="pname">@Black Panther</span>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p class="pcomment">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>
            <div class="comment-box">
                <div class="box-top">
                    <div class="Profile">
                        <div class="profile-image">
                            <img src="img/man1.png" class="pimage">
                        </div>
                        <div class="Name">
                            <strong class="strong">Natasa Romanof</strong>
                            <span class="pname">@Natasa Romanof</span>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <p class="pcomment">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </div>
            </div>
        </div>
</section>

<!-- map -->

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.9287158718635!2d88.3645180149597!3d22.581769285177987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02764859e65425%3A0xec9f14a185f67b07!2sVidyasagar%20College!5e0!3m2!1sen!2sin!4v1679891633229!5m2!1sen!2sin" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

<!-- footer -->

<footer class="footer">
  	 <div class="container12">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>company</h4>
  	 			<ul>
  	 				<li><a href="#about-head">about us</a></li>
  	 				<li><a href="#">our services</a></li>
  	 				<li><a href="#">privacy policy</a></li>
  	 				<li><a href="#">affiliate program</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>get help</h4>
  	 			<ul>
  	 				<li><a href="#">FAQ</a></li>
  	 				<li><a href="#">delivery</a></li>
  	 				<li><a href="#">no returns</a></li>
  	 				<li><a href="#">payment mode : online/offline</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>online Order</h4>
  	 			<ul>
  	 				<li><a href="#">biriany</a></li>
  	 				<li><a href="#">kabeb</a></li>
  	 				<li><a href="#">burger</a></li>
                    <li><a href="#">copyright claim 2023,Sahin Nayak</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="#"><i class="fab fa-twitter"></i></a>
  	 				<a href="#"><i class="fab fa-instagram"></i></a>
  	 				<a href="#"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
</footer>

<script type="text/javascript" src="script.js"></script>
<script>
const textContainer = document.getElementById("text2-container");
const text = "Here Some Suggestion From Us";
let index = 0;

function writeText() {
    textContainer.innerHTML = text.substring(0, index);
    index++;
    if (index > text.length) {
        index = text.length;
    }
}
setInterval(writeText,700);

const textContainer1 = document.getElementById("text6-container");
const text1 = "Welcome, To Kravings";
let index1 = 0;

function writeText1() {
    textContainer1.innerHTML = text1.substring(0, index);
    index1++;
    if (index1 > text1.length) {
        index1 = text1.length;
    }
}
setInterval(writeText1,700);
/* food Cart */

console.log(document.getElementById('Biryani'));

/*menu js */

let list = document.querySelectorAll(".menu_list .menu_li");
let box = document.querySelectorAll(".box");

list.forEach((el)=>{
    el.addEventListener("click" , (e)=>{
        list.forEach((el1)=>{
            el1.style.color = "#000";
        })
        e.target.style.color = "#d4a373"
        box.forEach((el2)=>{
            el2.style.display = "none";
        })
        document.querySelectorAll(e.target.dataset.color).forEach((el3)=>{
            el3.style.display = "flex";
        })
    })
})


</script>
</body>


<style>


body {
    background-color: #ffe5ec;
}
/* slider */

.text-box{
    background-color: #333 ;
}

#text6-container{
    color: rgb(244, 178, 97);
    font-size: 90px;
}

@media (max-width: 1115px){
    #text6-container{
        font-size: 90px;
    }
}
@media (max-width: 997px){
    #text6-container{
        font-size: 70px;
    }
}
@media (max-width: 791px){
    #text6-container{
        font-size: 50px;
    }
}
@media (max-width: 611px){
    #text6-container{
        font-size: 30px;
    }
}


.img{
    clip-path: circle();
    width: 33px;
}

/* booking details */

.size{
    font-size:17px;
}
#size{
    color: green;
}

.tablebooking{
 position: absolute;
 z-index: 2;
 left: 50%;
 top: 50%;
 transform: translate(-50%,-50%);
 width: 100%; 
 border-collapse: collapse;
 box-shadow: 0 2px 15px rgba(64,64,64,.7);
 overflow: hidden;
 background-color:#FFF6CC;
}
.table_seatbook_td , .table_seatbook_th{
 padding: 5px 5px;
 text-align: center;
}
.table_seatbook_th{
 background-color: red;
 color: #fafafa;
 font-family: 'Open Sans',Sans-serif;
 font-weight: 80;
}
.table_seatbook_tr{
 width: 100%;
 background-color: #fafafa;
 font-family: 'Montserrat', sans-serif;
}
.table_seatbook_tr:nth-child(even){
 background-color: #eeeeee;
}

@media (max-width: 356px){
    .table_seatbook_th{
        font-weight: 60;
    }
}

/* MAIN */
/* CONTENT */



/*about us */

.about_pic{
    padding-left: 5px
}

#page-header.about-header{
    background-image: url("img/banner.jpg");
}
#about-head{
    display: flex;
    align-items: center;
}
#about-head img{
    width: 100%;
    height: auto;
}
#about-head div{
    padding-left: 40px;
}
#about-app{
    text-align: center;
}
#about-app .video{
    width: 60%;
    height: 100%;
    margin: 30px auto 0 auto;
}
#about-app .video video{
    width: 100%;
    height: 100%;
    margin-top: 30px;
    border-radius: 4px;
}

.who_we{
    font-size: 50px;
    font-weight: bold;
    color: tomato;
}

.download_app{
    color: tomato;
}
.section-p1{
    background-color: #ffe5ec;
}


@media (max-width: 1130px){
    #about-head{
        display: block;
    }
    #about_pic{
        height: 30%;
    }
}

@media (max-width: 945px){
    #about-head{
        display: block;
    }
    .about_p{
        padding-left: 3px;
        padding-right: 3px;
    }
    .about_pic{
        width: 100%;
        align: center;
        padding-right: 3px;
        padding-left: 3px;
    }
}

@media (max-width: 540px){
    .who_we{
        font-size: 45px;
    }
}

/*suggestion start*/

.inspiration {
  padding-top: 5px;
  font-size: 3rem;
  color: #fff;
  /* background: rgb(248, 248, 248); */
}

.link{
  text-decoration: none;
  color: white;
}
.image-food{
  width: 20vh;
}

.suggest{
  width: 100%;
  /* background: rgba(248, 248, 248, 0.58); */
  background: linear-gradient(90deg, #d803f4 0%, #ff0000 100%);
}

.sec-all{
  padding: 10px;
  font-size: 18px;
  color: white;
}
.suggestion{
  /* background: linear-gradient(90deg, #d803f4 0%, #ff0000 100%); */
  color: #fff;
  font-size: 15px;
  display: block;
  text-align: center;
  padding: 5px 20px;
  margin: 20px 50px; 
  text-decoration: none;
  border-radius: 15px;

  display: flex;
  justify-content: center;
  flex-wrap: wrap;
}
@media (max-width: 540px){
    .inspiration{
        font-size: 2rem;
    }
}
@media (max-width: 486px){
    .image-food{
        width: 15vh;
    }
}

/*food choose */

.container{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}
.card{
    width: 425px;
    height: 470px;
    margin: 20px;
    border-radius: 15px;
    box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.568), 2px 2px 2px rgb(0, 0, 0);
}
.card-image{
    width: 100%;
    height: 200px;
    margin-bottom: 15px;
    border-radius: 15px 15px 0 0;
}
.car-1{
    height: 60%;
    background-image: url('https://b.zmtcdn.com/data/pictures/6/18761176/ac0241893f90662ae294c580d014984c_o2_featured_v2.jpg?output-format=webp');
    background-size: cover;
}
.car-2{
    height: 60%;
    background-image: url('https://b.zmtcdn.com/data/pictures/chains/7/22077/df63da91354e1b0345252bc49000145b_o2_featured_v2.jpg');
    background-size: cover;
}
.car-3{
    height: 60%;
    background-image: url('img/handi.webp');
    background-size: cover;
}
.car-4{
    height: 60%;
    background-image: url('img/kebab100.jpg');
    background-size: cover;
}
.car-5{
    height: 60%;
    background-image: url('img/mutton.webp');
    background-size: cover;
}
.car-6{
    height: 60%;
    background-image: url('img/nonveg.jpg');
    background-size: cover;
}
.car-7{
    height: 60%;
    background-image: url('https://b.zmtcdn.com/data/pictures/7/19129297/009c91dc1cb6831c42ead4dc75d1f811_o2_featured_v2.jpg?output-format=webp');
    background-size: cover;
}
.car-8{
    height: 60%;
    background-image: url('img/bengali.jpg');
    background-size: cover;
}
.car-9{
    height: 60%;
    background-image: url('img/salad.jpg');
    background-size: cover;
}
.car-10{
    height: 60%;
    background-image: url('img/veg_sabji.jpg');
    background-size: cover;
}
.car-11{
    height: 60%;
    background-image: url('img/ruti.webp');
    background-size: cover;
}
.car-12{
    height: 60%;
    background-image: url('https://b.zmtcdn.com/data/pictures/chains/3/19319293/e0c279cdf70ec6d36e6239cc807b4d1a_o2_featured_v2.jpg?output-format=webp');
    background-size: cover;
}
.car-13{
    height: 60%;
    background-image: url('img/drink-1.jpg');
    background-size: cover;
}
.car-14{
    height: 60%;
    background-image: url('https://b.zmtcdn.com/data/pictures/chains/0/20630/fa7e190b167b7235b054394fdcd501c9_o2_featured_v2.jpg?output-format=webp');
    background-size: cover;
}
.car-15{
    height: 60%;
    background-image: url('https://b.zmtcdn.com/data/pictures/2/18287242/99574471c9a0ad8899c1f9e0509fd5b2_o2_featured_v2.jpg?output-format=webp');
    background-size: cover;
}


.card h2{
    padding: 15px;
    font-size: 20px;
    background: #333;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.card p{
    padding: 10px;
    font-size: 18px;
    /* color: white; */
}
.card a{
    /* background: linear-gradient(90deg, #d803f4 0%, #ff0000 100%); */
    color: #fff;
    font-size: 15px;
    display: block;
    text-align: center;
    padding: 15px 20px;
    margin: 20px 50px; 
    text-decoration: none;
    border-radius: 15px;
}

.max_safty{
    width: 70%;
    /* padding-bottom: 20%;
    padding-left: 5%; */
}
.safty{
    padding-left: 5%;
    padding-right: 5%;
}
.safty_td{
    color: #333;
}
.cards_for_suggestion{
    text-decoration: none;
}
#food_choose{
    background-color: #f5f5f5;
}
hr{
    color: #333;
}
.more_op{
    background-color: #f5f5f5;
}

@media (max-width: 486px){
    .card{
        width: 400px;
        height: 470px;
        margin: 20px;
        border-radius: 15px;
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.568), 2px 2px 2px rgb(0, 0, 0);
    }
}
@media (max-width: 420px){
    .card{
        width: 350px;
        height: 470px;
        margin: 20px;
        border-radius: 15px;
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.568), 2px 2px 2px rgb(0, 0, 0);
    }
}
@media (max-width: 362px){
    .card{
        width: 300px;
        height: 420px;
        margin: 20px;
        border-radius: 15px;
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.568), 2px 2px 2px rgb(0, 0, 0);
    }
}
@media (max-width: 313px){
    .card{
        width: 280px;
        height: 420px;
        margin: 20px;
        border-radius: 15px;
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.568), 2px 2px 2px rgb(0, 0, 0);
    }
}

/* banner of booking restaurent */


.banner1{
    height: 200px;
    background-image: url('img/pineapple.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}

.banner_div{
    padding-top: 60px;
    padding-bottom: 20px;
}
.banner_h1{
    font-size: 50px;
    color: red;
}
.banner_link{
    font-size: 30px;
    font-style: none;
}
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
@media(max-width: 702px){
    .banner_h1{
        font-size: 30px;
        color: red;
    }
    .banner_link1{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    }
    .banner1{
    height: 200px;
    background-image: url('img/pineapple.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    }
}

/* slider of res */

.slide_picture{
    background-image: url('img/res22.jpg');
}
.img_slider{
    border:0; 
    width: 70%;
}
@media (max-width: 475px){
    .slide_picture img{
    /* background: none; */
    width: 80%;
}
}
/* restaurent menu */

.offline_menu{
    background-color: #232323;
}
.container_menu{
    background-color: white;
    list-style: none;
    width: 85%;
    margin: 50px auto;
    text-align: center;
}
.container_menu .title_menu{
    width: 60%;
    margin: 0px auto 30px auto;
}
.container_menu .title_menu .menu_h2{
    font-family: 'Lobster', cursive;
    font-size: 30px;
    color: tomato;
    margin-bottom: 20px;
}
.container_menu .title_menu .menu_p{
    color: #333;
    font-size: 14px;
}
.menu_content .menu_list{
    display: flex;
    justify-content: center;
    margin-bottom: 50px;
}
.menu_content .menu_list .menu_li{
    color: #000;
    margin: 0px 15px;
    transition: .3s ease-in-out;
    cursor: pointer;
    font-size: 17px;
    font-weight: 600;
    position: relative;
}
.menu_content .menu_list .menu_li::after{
    content: "";
    position: absolute;
    bottom: -3px;
    width: 0%;
    height: 2px;
    left: 50%;
    transform: translateX(-50%);
    background: #d4a373;
    transition: .4s ease-in-out;
}
.menu_content .menu_list .menu_li:hover::after{
    width: 100%;
}
.menu_content .menu_list .menu_li:first-child{
    color: #d4a373;
}
.box_flex{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}
.box{
    width: 32%;
    background: #FFF;
    border-radius: 3px;
    padding: 10px;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    animation: movement 1s ease-in-out;
}
.box .box_img{
    width: 35%;
    text-align: center;
}
.box_img img{
    width: 130px;
    height: 130px;
}
.box .menu_text{
    text-align: left;
    width: 60%;
}
.text h3{
    text-transform: capitalize;
}
.menu_text hr{
    width: 50px;
    background: #d4a373;
    height: 3px;
    margin: 5px 0px 10px 0px;
}
.menu_text section{
    font-weight: 600;
    margin-bottom: -5px;
}
.menu_text .stars{
    margin-bottom: -2px;
}
.menu_text .stars i{
    font-size: 13px;
    color: #d4a373;
}
.menu_text article{
    font-size: 15px;
}

@keyframes movement{
    0%{
        opacity: 0;
    }
    100%{
        opacity: 1;
    }
}

@media(max-width: 1320px){
    .box{
        width: 49%;
    }
}
@media(max-width: 991px){
    .container_menu .title_menu{
        width: 80%;
    }
    .box .box_img{
        text-align: left;
    }
    .box_img img {
        width: 170px;
        height: 170px;
    }
    .box{
        width: 100%;
    }
    .box .menu_text{
        width: 70%;
    }
}

@media(max-width: 796px){
    .menu_content .menu_list .menu_li{
    color: #000;
    margin: 0px 6px;
    transition: .3s ease-in-out;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    position: relative;
}
.box_img img {
        width: 100px;
        height: 100px;
    }
    .box{
        width: 100%;
    }
    .box .menu_text{
        width: 80%;
    }
    .menu_text h3{
        font-size: 17px;
    }
}
@media(max-width: 496px){
    .menu_content .menu_list .menu_li{
        display: none;
}
}
@media(max-width: 449px){
    .box .box_img{
        text-align: left;
    }
    .box_img img {
        width: 100px;
        height: 100px;
    }
    .box{
        width: 100%;
    }
    .box .menu_text{
        text-align: right;
        width: 70%;
    }
    .menu_text hr{
        display: none;
}

}


/* happy customer */

.counter_of_persons{
    padding-top: 55px;
    padding-bottom: 55px;
    background: linear-gradient(rgba(103,58,183,0.8),rgba(33,150,243,0.5));
}

.row11{
    width: 85%;
    display: flex;
    justify-content: space-between;
}
.col11{
    flex-basis: 22%;
    text-align: center;
    color: #555;
}
.counter-box11{
    width: 100%;
    height: 100%;
    background: #fff;
    padding: 30px 0px;
    border-radius: 5px;
    box-shadow: 0 0 20px -4px #66676c;
}
.counter_person, .counter_span{
    display: inline-block;
    margin: 15px 0;
    font-size: 50px;
    color: #000;
}
.counter-box11 .fa{
    font-size: 50px;
    color: #009688;
    display: block;
}
@media(max-width: 602px){
        .row11{
            display: block;
        }
}
@media(max-width: 500px){
    .counter_person, .counter_span{
    display: inline-block;
    margin: 15px 0;
    font-size: 35px;
}
}

/* footer */

.container12{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
.footer{
	background-color: #24262b;
    padding: 70px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}

/* top commenter */

.main_comment{
    font-family: sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    background-color: #eaeff2;
    margin-top: 30px;
}
.chead{
    font-family: 'Lobster', cursive;
    font-size: 30px;
    color: tomato;
    margin-bottom: 20px;
}
.full-boxer{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.box-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.comment-box:hover{
    margin-top: 12px;
}

.comment-box{
    width: 500px;
    background: white;
    padding: 20px;
    margin: 15px;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 3px 3px 25px rgba(0,0,0,0.3);
}

.Profile{
    display: flex;
    align-items: center;
}

.profile-image{
    width: 70px;
    height: 70px;
    box-shadow: 2px 2px 30px rgba(0,0,0,0.3);
    overflow: hidden;
    border-radius: 50%;
    margin-right: 10px;
}

.profile-image .pimage{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.Name{
    display: flex;
    flex-direction: column;
    margin-left: 10px;
}

.Name .strong{
    color: black;
    font-size: 18px;
}

.Name .pname{
    color: gray;
    margin-top: 2px;
}

.comment .pcomment{
    color: black;
}

/* galary */

.galary{  
    background-image: url('img/bg_2.jpg');
}
.galary_head{
    font-family: 'Lobster', cursive;
    font-size: 30px;
    color: tomato;
    margin-bottom: 20px;
}
.gal_container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
  background-image: url('img/bg_2.jpg');
  padding: 15px;
}
.gal_container img {
  width: 100%;
  display: block;
  -webkit-filter: grayscale(1);
  filter: grayscale(1);
  transition: all 100ms ease-out;
}
.gal_container img:hover {
  transform: scale(1.04);
  -webkit-filter: grayscale(0);
  filter: grayscale(0);
}
@media (max-width: 321px){
    .gal_container img {
        width: 96%;
        display: block;
        -webkit-filter: grayscale(1);
        filter: grayscale(1);
        transition: all 100ms ease-out;
}
}
@media (max-width: 307px){
    .gal_container img {
        width: 90%;
        display: block;
        -webkit-filter: grayscale(1);
        filter: grayscale(1);
        transition: all 100ms ease-out;
}
}
</style>
</html>
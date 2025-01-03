<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  <body>

  <!-- Start of navigation bar -->
<section class="This is Nevigation Bar">
    <nav class="navbar">
        <div class="logo">Kolkata Kravings </div>
        <div class="box123"><a href="Afterlogin.php">Go Back</a></div>
    </nav>
    </div>
</section>

  
    <div class="container">
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
              Vidyasagar College is a state government-aided public college, affiliated to the University of Calcutta, located in North Kolkata, West Bengal, India. The college offers both post-graduate and under-graduate courses in a number of subjects of arts and science.
          </p>

          <div class="info">
            <div class="information">
              <img src="img/location.png" class="icon" alt="" />
              <p>39, Sankar Ghosh Ln, Simla, Machuabazar, Kolkata, West Bengal 700006</p>
            </div>
            <div class="information">
              <img src="img/email.png" class="icon" alt="" />
              <p>vidyasagarevening@yahoo.in</p>
            </div>
            <div class="information">
              <img src="img/phone.png" class="icon" alt="" />
              <p>+91 033 2241 9508</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="" autocomplete="off" method="POST">
            <h3 class="tit">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" placeholder="Enter User Name" id="name" required>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" placeholder="Enter Email Address" id="email" required>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" pattern="[0-9]{10}" placeholder="Enter Phone Number" id="phone" required>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input" placeholder="Enter Your Messege" id="msg" required></textarea>
            </div>
            <input type="submit" name="submit" value="Send" class="btn" id="btn">
          </form>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
    <!-- <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
      var btn = document.getElementById('btn');
      btn.addEventListener('click',function(e){
        e.preventDefault()
        var name = document.getElementById('name').value;      
        var email = document.getElementById('email').value; 
        var phone = document.getElementById('phone').value; 
        var message = document.getElementById('msg').value; 
        var body = 'name '+name + '<br/> email: ' + email + '<br> phone: ' +phone + '<br> message: '+ message';

        Email.send({
              SecureToken : "f3c92f5a-f5c0-407c-a009-abbea89ac395",
              To : 'nayaksahin2002@gmail.com',
              From : "nayaksahin@gmail.com",
              Subject : "Contact Message",
              Body : body
        }).then(
                  message => alert(message));
      })
    </script> -->
  </body>
  <style>
    ::placeholder{
      color:white;
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

}
  </style>
</html>
<?php
 if(isset($_POST["submit"])){
   $name=$_POST["name"];
   $email=$_POST["email"];
   $phone=$_POST["phone"];
   $msg=$_POST["message"];
   $sql="insert into contact (Name,Email,Phone,Message) values ('$name','$email','$phone','$msg')";
   $result=mysqli_query($conn,$sql);
   if($result){
     echo "<script>alert('Message Successfully Send') 
     document.location='Afterlogin.php'
     </script>"; 
   }
 }
 ?>
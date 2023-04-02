<?php
    include "../config/connect.php";
    session_start();
  
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        $user_id = '';
    }

    if(isset($_POST['submit'])){

      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $phone = $_POST['phone'];
      $phone = filter_var($phone, FILTER_SANITIZE_STRING);
      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $message = $_POST['message'];
      $message = filter_var($message, FILTER_SANITIZE_STRING);

      $verify_email = $conn->prepare("SELECT * FROM messages WHERE email = ?");
      $verify_email->execute([$email]);

      if($verify_email->rowCount() > 0){
        $warning_msg[] = 'your message has been verified!';
      }else{
        $insert_message = $conn->prepare("INSERT INTO `messages` (name, phone, email, message) VALUES(?,?,?,?)");
        $insert_message->execute([$name, $phone, $email, $message]);
        $success_msg[] = 'your message successfully!  ';
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- file css -->
    <link rel="stylesheet" href="../css/style.css" />
    <!-- file cdnjs css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <!-- link swiper -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <title>Pizza || Contact</title>
  </head>
  <body>
  
  <?php include 'Header.php'; ?>

  
    <section class="contact-us">
      <h1 class="heading">contact us</h1>
      <div class="container-contact">
        <div class="box">
          <div class="image">
              <img src="../images/contact/Contact.png" alt="">
          </div>
          <form action="#" method="post">
            <h1>tell us something!</h1>
            <input type="text" placeholder="enter your name" required name="name">
            <input type="number" placeholder="enter your number" required name="phone">
            <input type="email" placeholder="enter your email" required name="email">
            <textarea name="message" placeholder="enter your message" required ></textarea>
            <input type="submit" value="Send message" class="btn" name="submit">
          </form>
        </div>
      </div>
    </section>
   

    <footer>
      <div class="container-footer">
        <div class="box-footer">
          <h3>quich links</h3>
          <a href="../index.php"
            ><i class="fa-solid fa-chevron-right"></i> Home</a
          >
          <a href="about.php"
            ><i class="fa-solid fa-chevron-right"></i> About</a
          >
          <a href="cart.php"><i class="fa-solid fa-chevron-right"></i> Cart</a>
          <a href="contact.php"
            ><i class="fa-solid fa-chevron-right"></i>Contact Us</a
          >
        </div>
        <div class="box-footer">
          <h3>extra links</h3>
          <a href="../auth//login.php"
            ><i class="fa-solid fa-chevron-right"></i> login</a
          >
          <a href="../auth/register.php"
            ><i class="fa-solid fa-chevron-right"></i> Register</a
          >
          <a href="orders.php"
            ><i class="fa-solid fa-chevron-right"></i> Orders</a
          >
          <a href="search.php"
            ><i class="fa-solid fa-chevron-right"></i> Search</a
          >
        </div>
        <div class="box-footer">
          <h3>follow us</h3>
          <a href=""><i class="fa-brands fa-facebook"></i> facebook </a>
          <a href="#"><i class="fa-brands fa-instagram"></i>instagram</a>
          <a href=""><i class="fa-brands fa-linkedin"></i> linkedIn</a>
          <a href="#"><i class="fa-brands fa-twitter"></i>twitter</a>
        </div>
      </div>
    </footer>

    <div class="copy">
      <h2>
        © copyright @2023 by <span>MR.Mohamed Shams</span> | all rights reserved
      </h2>
    </div>

    <!-- file js -->
    <script src="../script/script.js"></script>
    <script src="../script/cart.js"></script>
  <!-- sweetalert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php
  include "../php/alret.php";
  ?>
  </body>
</html>

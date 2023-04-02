<?php
    include "../config/connect.php";
    session_start();
  
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        $user_id = '';
    }

    if(isset($_POST["register"])){
      
      $name = $_POST["name"];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $phone = $_POST["phone"];
      $phone = filter_var($phone, FILTER_SANITIZE_STRING);
      $email = $_POST["email"];
      $email = filter_var($email, FILTER_SANITIZE_STRING);

      $password = sha1( $_POST['password']);
      $password = filter_var($password, FILTER_SANITIZE_STRING);
      
      $c_pass = sha1($_POST['c_password']);
      $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

      $verify_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
      $verify_email->execute([$email]);
  
      if($verify_email->rowCount() > 0){
        $warning_msg[] = 'Email already exists!';
      }else{
        if($password != $c_pass){
          $warning_msg[] = 'Confirm password not matched!';
        }else{

          $insert_email = $conn->prepare("INSERT INTO `users`(name, email,phone ,password) VALUES(?,?,?,?)");
          $insert_email->execute([$name,$email,$phone,$password]);
          $success_msg[] = 'registered successfully!';
          $confirm_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
          $confirm_user->execute([$name,$password]);
          $row = $verify_email->fetch(PDO::FETCH_ASSOC);
          if($confirm_user->rowCount() > 0){
            $_SESSION["user_id"] = $row['id'];
          }elseif($confirm_user->rowCount() > 0){
            $_SESSION["admin_id"] = $row['id'];
          }
          header('location: login.php');
        }
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
    <title>Pizza || Register</title>
  </head>
  <body>

   <?php  include 'HeaderAuth.php'; ?>

      <section class="register login">
        <div class="container-re-lo">
            <form action="" class="box" method="POST">
                <h1>register now</h1>
                <input type="text" placeholder="enter your name" name="name" required class="input">
                <input type="number" placeholder="enter your phone" name="phone" required class="input">
                <input type="email" placeholder="enter your email" name="email" required class="input">
                <input type="password" placeholder="enter your password" name="password" required class="input">
                <input type="password" placeholder="enter your confirm password" name="c_password" required class="input">
                <input type="submit" value="Register now" name="register" class="btn">
                <p>hava an acount? <a href="login.php">Login now</a></p>
            </form>
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
          <a href="login.php"
            ><i class="fa-solid fa-chevron-right"></i> login</a
          >
          <a href="register.php"
            ><i class="fa-solid fa-chevron-right"></i> Register</a
          >
          <a href="../components/orders.php"
            ><i class="fa-solid fa-chevron-right"></i> Orders</a
          >
          <a href="../components/search.php"
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

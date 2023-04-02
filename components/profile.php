<?php
    include "../config/connect.php";
    session_start();
  
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        $user_id = '';
        header("location:../auth/login.php");
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
    <title>Pizza || profile</title>
  </head>
  <body>

  <?php include 'Header.php'; ?>

    <section class="user-details">
        <h1 class="heading">your profile</h1>
        <div class="user">
            <img src="../icons/user.png" alt="">
            <p><i class="fas fa-user"></i><span><?= $fetch_profile['name']?></span></p>
            <p><i class="fas fa-phone"></i><span><?= $fetch_profile['phone']?></span></p>
            <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email']?></span></p>
            <a href="update_profile.php" class="btn">update info</a>
            <h3 class="delivery">delivery address</h3>
            <p class="address"><i class="fas fa-map-marker-alt"></i> <?php if($fetch_profile['address'] == ''){echo 'please enter your addres!';}else{echo $fetch_profile['address']; }?></p>
            <a href="update_addres.php" class="btn">update address</a>
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
  </body>
</html>

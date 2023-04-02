<?php
    include "../config/connect.php";
    session_start();
  
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        $user_id = '';
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
    <title>Pizza || About</title>
  </head>
  <body>

  <?php include 'Header.php'; ?>

  
    <section class="about">
      <h1 class="heading">about us</h1>
      <div class="container-about">
        <div class="box">
          <div class="image">
            <img src="../images/about/Pizza maker-bro.png" alt="" />
          </div>
          <div class="contact">
            <h1>our History</h1>
            <p>
              Foods similar to pizza have been made since the Neolithic Age 23
              Records of people adding other ingredients to bread to make it
              more flavorful can be found throughout ancient history. In the 6th
              century BC, the Persian soldiers of the Achaemenid Empire during
              the rule of Darius the Great baked flatbreads with cheese and
              dates on top of their battle shields and the ancient Greeks
              supplemented their bread with oils
            </p>
          </div>
        </div>
        <div class="box">
          <div class="contact">
            <h1>Preparation</h1>
            <p>
              Pizza is sold fresh or frozen, and whole or in portion-size
              slices. Methods have been developed to overcome challenges such as
              preventing the sauce from combining with the dough, and producing
              a crust that can be frozen and reheated without becoming rigid.
              There are frozen pizzas with raw ingredients and self-rising
              crusts.
            </p>
          </div>
          <div class="image">
            <img src="../images/about/Pizza maker-pana.png" alt="" />
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img src="../images/about/Pizza maker-rafiki.png" alt="" />
          </div>
          <div class="contact">
            <h1>Baking</h1>
            <p>
              In restaurants, pizza can be baked in an oven with fire bricks
              above the heat source, an electric deck oven, a conveyor belt
              oven, or, in traditional style in a wood or coal-fired brick oven.
              The pizza is slid into the oven on a long paddle, called a peel,
              and baked directly on hot bricks, a screen (a round metal grate,
              typically aluminum), or whatever the oven surface is. Before use
            </p>
          </div>
        </div>
        <div class="box">
          <div class="image">
            <img src="../images/about/Tasting-amico.png" alt="" />
          </div>
          <div class="contact">
            <h1>why choses us?</h1>
            <p>
              Food is any substance consumed by an organism for nutritional
              support. Food is usually of plant, animal, or fungal origin, and
              contains essential nutrients, such as carbohydrates, fats,
              proteins,
            </p>
          </div>
        </div>
      </div>
      <a href="../components/menu.php" class="all-view">our menu</a>
    </section>

    <section class="simpel">
        <h1 class="heading">simpel steps</h1>
        <div class="container-simple">
            <div class="box">
                <img src="../icons/about/customer.png" alt="">
                <h1>enjoy food</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
            <div class="box">
                <img src="../icons/about/fast-delivery.png" alt="">
                <h1>fast delivery</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
            <div class="box">
                <img src="../icons/about/order-food.png" alt="">
                <h1>order food</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
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
          <a href="../auth/login.php"
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
  </body>
</html>

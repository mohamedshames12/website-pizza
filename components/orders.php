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
    <title>Pizza || Checkout</title>
  </head>
  <body>

  <?php include 'Header.php'; ?>

  
    <section class="orders">
        <h1 class="heading">your orders</h1>
        <?php
            $select_order = $conn->prepare("SELECT * FROM orders WHERE user_id = ?");
            $select_order->execute([$user_id]);
            if($select_order->rowCount() > 0) {
              while($row = $select_order->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div class="container-orders">

                <p>placed on : <span><?= $row['placed_on']?></span></p>
                <p>name : <span><?= $row['name']?></span></p>
                <p>number : <span><?= $row['phone']?></span></p>
                <p>email : <span><?= $row['email']?></span></p>
                <p>address : <span><?= $row['address']?></span></p>
                <p>your orders : <span><?= $row['total_products']?></span></p>
                <p>payment method : <span><?= $row['method']?></span></p>
                <p>payment status : <span class="pending"><?= $row['payment_status']?></span></p>
                </div>
                <?php
              }
            }else{
              echo '<p class="empty">no orders placed yet</p>';
            }
          
          ?>

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

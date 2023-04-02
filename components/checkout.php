<?php
    include "../config/connect.php";
    session_start();
  
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        $user_id = '';
        header("location:../auth/login.php");
    }

    if(isset($_POST['submit'])){
      
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $phone = $_POST['phone'];
      $phone = filter_var($phone, FILTER_SANITIZE_STRING);
      $address = $_POST['address'];
      $address = filter_var($address, FILTER_SANITIZE_STRING);
      $total_products = $_POST['total_products'];
      $total_products = filter_var($total_products, FILTER_SANITIZE_STRING);
      $total_price = $_POST['total_price'];
      $total_price = filter_var($total_price, FILTER_SANITIZE_STRING);
      $method = $_POST['method'];
      $method = filter_var($method, FILTER_SANITIZE_STRING);

      $ckeck_cart = $conn->prepare("SELECT * FROM cart WHERE user_id =?");
      $ckeck_cart->execute([$user_id]);

      if($ckeck_cart->rowCount() > 0) {

        if($address == '') {
          $warning_msg[] = "Please enter your address!";
        }else{
          $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, phone, email,method,address, total_products,total_price) VALUES(?,?,?,?,?,?,?,?)");
          $insert_order->execute([$user_id, $name, $phone, $email, $method, $address, $total_products, $total_price]);

          $delete_cart = $conn->prepare("DELETE FROM cart WHERE user_id =?");
          $delete_cart->execute([$user_id]);

          $success_msg[] = 'order placed successfully!';
        }
      }else{
        $warning_msg[] = "your cart is empty!";
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
    <title>Pizza || Checkout</title>
  </head>
  <body>
  
  <?php include 'Header.php'; ?>

    <section class="checkout">
        <h1 class="heading">order summary</h1>
        <form action="#" method="post">
        <div class="cart-item">
            <h3>cart items</h3>

            
            <?php
              $grand_total = 0;
              $cart_items[] = '';
              $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
              $select_cart->execute([$user_id]);
              if ($select_cart->rowCount() > 0) {
                while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                  $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '.$fetch_cart['qty'].') - ';
                  $total_products = implode($cart_items);
                  $grand_total += ($fetch_cart['price'] * $fetch_cart['qty']);
            ?>
            <p class="name"><span><?= $fetch_cart['name']?></span> <?= $fetch_cart['price']?> x <?= $fetch_cart['qty']?></p>
        <?php
          }
        } else {
          echo '<p class="empty">your cart is empty!</p>';
        }
        ?>
            <p class="grand-total"><span class="name">grand total : </span> <span>$<?= $grand_total?></span></p>
            <a href="cart.php" class="btn">view cart</a>
        </div>
        <input type="hidden" name="total_products" value="<?= $total_products?>">
            <input type="hidden" name="total_price" value="<?= $grand_total?>">
            <input type="hidden" name="name" value="<?= $fetch_profile['name']?>">
            <input type="hidden" name="email" value="<?= $fetch_profile['email']?>">
            <input type="hidden" name="phone" value="<?= $fetch_profile['phone']?>">
            <input type="hidden" name="address" value="<?= $fetch_profile['address']?>">
        </div>
        <div class="user-profile">
            <h3>your info</h3>
            <p><i class="fas fa-user"></i><span><?= $fetch_profile['name']?></span></p>
            <p><i class="fas fa-phone"></i><span><?= $fetch_profile['phone']?></span></p>
            <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email']?></span></p>
            <a href="update_profile.php" class="btn">update info</a>
            <h3 class="delivery">delivery address</h3>
            <p><i class="fas fa-map-marker-alt"></i> <span><?= $fetch_profile['address']?></span></p>
            <a href="update_addres.php" class="btn">update address</a>
            <select name="method" class="box" required>
                <option  disabled selected>select payment method --</option>
                <option value="cash on delivery">cash on delivery</option>
                <option value="credit cart">credit cart</option>
                <option value="paypal">paypal</option>
            </select>
            <input type="submit" value="place order" name="submit" class="btn <?php if($fetch_profile['address'] == ''){echo 'disabled';};?>" style="background-color: red; color:white;">
    </form>
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
  <!-- sweetalert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php
  include "../php/alret.php";
  ?>
  </body>
</html>

<?php
include "../config/connect.php";
session_start();

if (isset($_SESSION["user_id"])) {
  $user_id = $_SESSION["user_id"];
} else {
  $user_id = '';
}

if(isset($_POST['update_qty'])){
  
  $cart_id = $_POST['cart_id'];
  $cart_id = filter_var($cart_id, FILTER_SANITIZE_STRING);

  $qty = $_POST['qty'];
  $qty = filter_var($qty, FILTER_SANITIZE_STRING);

  $update_qty = $conn->prepare("UPDATE cart SET qty = ? WHERE id = ?");
  $update_qty->execute([$qty,$cart_id]);
  $success_msg[] = "cart updated successfully!";
}

if(isset($_POST['delete_cart'])){
  $cart_id = $_POST['cart_id'];
  $cart_id = filter_var($cart_id, FILTER_SANITIZE_STRING);
  $delete_cart = $conn->prepare("DELETE FROM cart WHERE id = ?");
  $delete_cart->execute([$cart_id]);
  $success_msg[] = "cart item deleted successfully!";
}

if(isset($_POST['delete_all'])){
  $delete_cart = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
  $delete_cart->execute([$user_id]);
  $success_msg[] = "cart deleted successfully!";
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- link swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <title>Pizza || Your Cart</title>
</head>

<body>

  <?php include 'Header.php'; ?>

  <section class="page-cart">
    <h1 class="heading">your cart</h1>

    <div class="producats">
      <div class="box-container">
        <?php
        $grand_total = 0;
        $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
        $select_cart->execute([$user_id]);
        if ($select_cart->rowCount() > 0) {
          while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <form action="" method="POST" class="box">
              <input type="hidden" name="cart_id" value="<?= $fetch_cart['id'] ?>">
              <a href="quick_view.php?pid=<?= $fetch_cart['pid'] ?>" class="fas fa-eye"></a>
              <button class="fas fa-times" type="submit" name="delete_cart" onclick="return confirm('delete this item from cart?');"></button>
              <img src="../admin/uploaded_files/<?= $fetch_cart['image']; ?>" alt="">
              <div class="name"><?= $fetch_cart['name']; ?></div>
              <div class="flex flex-end">
                <div class="price"><span>$</span><?= $fetch_cart['price']; ?></div>
                <div>
                <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['qty']; ?>">
                  <button type="submit" name="update_qty" class="fas fa-edit"></button>

                </div>
              </div>
              <div class="sub-total">sub total : <span>$<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['qty']); ?></span></div>
            </form>
        <?php
            $grand_total += $sub_total;
          }
        } else {
          echo '<p class="empty">your cart is empty!</p>';
        }
        ?>

      </div>
      <form action="" method="post">
        <button class="btn" type="submit" name="delete_all" onclick="return confirm('delete all items from cart?');">delete all</button>
      </form>
    </div>
    <div class="carts-total">
      <p>cart total : <span> $<?= $grand_total; ?></span></p>
      <a href="checkout.php" class="<?= ($grand_total > 1) ? '' : 'disabled'; ?>">Proceed Checkout</a>
    </div>
  </section>


  <footer>
    <div class="container-footer">
      <div class="box-footer">
        <h3>quich links</h3>
        <a href="../index.php"><i class="fa-solid fa-chevron-right"></i> Home</a>
        <a href="about.php"><i class="fa-solid fa-chevron-right"></i> About</a>
        <a href="cart.php"><i class="fa-solid fa-chevron-right"></i> Cart</a>
        <a href="contact.php"><i class="fa-solid fa-chevron-right"></i>Contact Us</a>
      </div>
      <div class="box-footer">
        <h3>extra links</h3>
        <a href="../auth/login.php"><i class="fa-solid fa-chevron-right"></i> login</a>
        <a href="../auth/register.php"><i class="fa-solid fa-chevron-right"></i> Register</a>
        <a href="orders.php"><i class="fa-solid fa-chevron-right"></i> Orders</a>
        <a href="search.php"><i class="fa-solid fa-chevron-right"></i> Search</a>
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
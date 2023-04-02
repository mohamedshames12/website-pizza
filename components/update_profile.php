<?php
include "../config/connect.php";
session_start();

if (isset($_SESSION["user_id"])) {
  $user_id = $_SESSION["user_id"];
} else {
  $user_id = '';
  header("location:../auth/login.php");
}

if (isset($_POST['updata-profile'])) {

  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $phone = $_POST['phone'];
  $phone = filter_var($phone, FILTER_SANITIZE_STRING);
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_STRING);

  if (!empty($name)) {
    $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id = ?");
    $update_name->execute([$name, $user_id]);
    $success_msg[] = 'username updated!';
  }

  if (!empty($email)) {
    $select_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $select_email->execute([$email]);
    if ($select_email->rowCount() > 0) {
      $warning_msg[] = 'email already taken!';
    } else {
      $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id = ?");
      $update_email->execute([$email, $user_id]);
      $success_msg[] = 'email updated!';
    }
  }


  if (!empty($phone)) {
    $select_phone = $conn->prepare("SELECT * FROM users WHERE phone = ?");
    $select_phone->execute([$phone]);
    if ($select_phone->rowCount() > 0) {
      $warning_msg[] = 'email already taken!';
    } else {
      $update_phone = $conn->prepare("UPDATE `users` SET phone = ? WHERE id = ?");
      $update_phone->execute([$phone, $user_id]);
      $success_msg[] = 'email updated!';
    }
  }


  $empty_pass = "6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2";
  $select_prev_pass = $conn->prepare("SELECT password FROM users WHERE id = ?");
  $select_prev_pass->execute([$user_id]);

  $fetch_prev_pass = $select_prev_pass->fetch(PDO::FETCH_ASSOC);
  $prev_pass = $fetch_prev_pass['password'];

  $old_pass = sha1($_POST['old_password']);
  $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);

  $new_pass = sha1($_POST['new_password']);
  $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);

  $c_pass = sha1($_POST['c_password']);
  $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);


  if ($old_pass != $empty_pass) {
    if ($old_pass != $prev_pass) {
      $warning_msg[] = 'old password not matched!';
    } elseif ($new_pass != $c_pass) {
      $warning_msg[] = 'confirm password not matched!';
    } else {
      if ($new_pass != $empty_pass) {
        $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
        $update_pass->execute([$c_pass, $user_id]);
        $success_msg[] = 'password updated successfully!';
      } else {
        $warning_msg[] = 'please enter a new password!';
      }
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- link swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <title>Pizza || Updata profile</title>
</head>

<body>

  <?php include 'Header.php'; ?>


  <section class="register login">
    <div class="container-re-lo">
      <form class="box" method="post">
        <h1>updata profile</h1>
        <input type="text" placeholder="<?= $fetch_profile['name'] ?>" name="name" class="input">
        <input type="number" placeholder="<?= $fetch_profile['phone'] ?>" name="phone" class="input">
        <input type="email" placeholder="<?= $fetch_profile['email'] ?>" name="email" class="input">
        <input type="password" placeholder="enter your old password" name="old_password" class="input">
        <input type="password" placeholder="enter your new password" name="new_password" class="input">
        <input type="password" placeholder="enter your confirm new password" name="c_password" class="input">
        <input type="submit" value="Updata Profile" name="updata-profile" class="btn">
      </form>
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
<?php
    include "../config/connect.php";
    session_start();
  
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        $user_id = '';
        header("location:../auth/login.php");
    }

    if(isset($_POST['updata-address'])){
      $addres = $_POST['street'].", ".$_POST['city'].", ".$_POST['city'].", ".$_POST['country'];
      $addres = filter_var($addres, FILTER_SANITIZE_STRING);

      $update_addtes = $conn->prepare("UPDATE users SET address =? WHERE id = ?");
      $update_addtes->execute([$addres, $user_id]);
      $success_msg[] = 'address updated!';
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
    <title>Pizza || Updata Address</title>
  </head>
  <body>

  <?php include 'Header.php'; ?>

  
    <section class="register login">
        <div class="container-re-lo">
            <form action="#" class="box" method="post" enctype="multipart/form-data">
                <h1>updata Address</h1>
                <input type="text" placeholder="flat no. and building name" name="name" required class="input">
                <input type="text" placeholder="street name" name="street" required class="input">
                <input type="text" placeholder="city name" name="city" required class="input">
                <input type="text" placeholder="country name" name="country" required class="input">
                <input type="submit" value="Updata Address" name="updata-address" class="btn">
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

<?php
    include "../config/connect.php";
    session_start();
  
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        $user_id = '';
    }

    if(isset($_POST["login"])){

      $email = $_POST["email"];
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $password = sha1($_POST['password']);
      $password = filter_var($password, FILTER_SANITIZE_STRING);


      $select_user = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
      $select_user->execute([$email, $password]);
      
      
      if($select_user->rowCount() > 0) {
        $fetch = $select_user->fetch(PDO::FETCH_ASSOC);

        if($fetch['type_user'] == 'user'){
          $_SESSION['user_id'] = $fetch['id'];
          header("Location:../index.php");
        }elseif($fetch['type_user'] == 'admin'){
          $_SESSION['admin_id'] = $fetch['id'];
          header("Location:../admin/dashboard.php");
        }

      }else{
        $warning_msg[] = 'Incorrect email or password!';
      }

    }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
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
    <title>Pizza || Login</title>
  </head>
  <body>

    <?php  include 'HeaderAuth.php'; ?>

    <section class="register login">
      <div class="container-re-lo">
          <form action="#" class="box" method="post" enctype="multipart/form-data">
              <h1>LOGIN now</h1>
              <input type="email" placeholder="enter your email" name="email" required class="input">
              <input type="password" placeholder="enter your password" name="password" required class="input">
              <input type="submit" value="Login now" name="login" class="btn">
              <p>don't hava an acount? <a href="register.php">Register now</a></p>
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
          <a href="../components/about.php"
            ><i class="fa-solid fa-chevron-right"></i> About</a
          >
          <a href="../components/cart.php"><i class="fa-solid fa-chevron-right"></i> Cart</a>
          <a href="../components/content.php"
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

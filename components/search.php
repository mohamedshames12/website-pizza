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
    <title>Pizza || Search</title>
  </head>
  <body>

  <?php include 'Header.php'; ?>

    <section class="search">
      <h1 class="heading">search anything..</h1>
        <form method="post" class="box">
        <input type="search" placeholder="search something..." name="search_box">
          <button type="submit" name="search_btn">  <i class="fa fa-search"></i></button>
        </form>
    </section>


    <section class="producats" style="padding-top:0; min-height:70vh;">
        <div class="box-container">
            <?php
                if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
                    $search_box = $_POST['search_box'];
               
                $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%{$search_box}%'");
                $select_products->execute();
                if($select_products->rowCount() > 0) {
                    while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <form action="#" method="post" class="box">
                <input type="hidden" name="pid" value="<?= $fetch_product['id']?>">
                <input type="hidden" name="name" value="<?= $fetch_product['name']?>">
                <input type="hidden" name="price" value="<?= $fetch_product['price']?>">
                <input type="hidden" name="image" value="<?= $fetch_product['image']?>">
                <a href="components/quick_view.php?pid=<?= $fetch_product['id']?>" class="fas fa-eye"></a>
                <button class="fas fa-shopping-cart" type="submit" name="add_to_cart"></button>
                <img src="../admin/uploaded_files/<?= $fetch_product['image']?>" alt="">
                    <a href="#" class="cat"><?= $fetch_product['category']?></a>
                    <div class="name"><?= $fetch_product['name']?></div>
                    <div class="flex">
                        <div class="price"><span>$</span><?= $fetch_product['price']?></div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
            </form>
            <?php
              }
            }else{
                echo '<p class="empty">no products found!</p>';
            }
          }
            ?>
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

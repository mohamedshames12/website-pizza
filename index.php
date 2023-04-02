<?php
    include "config/connect.php";
    session_start();
  
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }else{
        $user_id = '';
    }

    include 'components/add_to_cart.php';

    if(isset($_POST['delete_cart'])){
        $cart_id = $_POST['cart_id'];
        $cart_id = filter_var($cart_id, FILTER_SANITIZE_STRING);
        $delete_cart = $conn->prepare("DELETE FROM cart WHERE id = ?");
        $delete_cart->execute([$cart_id]);
        $success_msg[] = "cart item deleted successfully!";
      }
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- file css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- file cdnjs css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- link swiper -->
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <title>Pizza || Home</title>
</head>
<body>
    
    <?php include 'components/HeaderIndex.php'?>


    <section class="hero">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <div class="contact">
                        <span>order online</span>
                        <h3>delicious pizza</h3>
                        <a href="components/menu.php" class="btn">see munes</a>
                    </div>
                    <div class="image">
                        <img src="images/pexels-photo-1049626.jpg" alt="">
                    </div>
                </div>
                <div class="swiper-slide slide">
                    <div class="contact">
                        <span>order online</span>
                        <h3>chezzy hamburger</h3>
                        <a href="components/menu.php" class="btn">see munes</a>
                    </div>
                    <div class="image">
                        <img src="images/pexels-photo-1166120.jpg" alt="">
                    </div>
                </div>
                <div class="swiper-slide slide">
                    <div class="contact">
                        <span>order online</span>
                        <h3>rosted chichen</h3>
                        <a href="components/menu.php" class="btn">see munes</a>
                    </div>
                    <div class="image">
                        <img src="images/pexels-photo-365459.webp" alt="">
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>


    <section class="gotagory">
        <h1 class="heading">food category</h1>
        <div class="container">
            <div class="box">
                <img src="icons/fast-food (1).png" alt="">
                <h3>fast food</h3>
            </div>
            <div class="box">
                <img src="icons/fast-food.png" alt="">
                <h3>main dishes</h3>
            </div>
            <div class="box">
                <img src="icons/poinsettia.png" alt="">
                <h3>drinks</h3>
            </div>
            <div class="box">
                <img src="icons/sweets.png" alt="">
                <h3>desserts</h3>
            </div>
        </div>
    </section>

    <section class="producats">
        <h1 class="heading">latest dishes</h1>
        <div class="box-container">
            <?php

                $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
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
                <img src="admin/uploaded_files/<?= $fetch_product['image']?>" alt="">
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
                echo '<p class="empty">no products added yet!</p>';
            }
            
            
            ?>
        </div>

        <a href="components/menu.php" class="all-view">All view</a>
    </section>
    

    
    <footer>
        <div class="container-footer">
            <div class="box-footer">
                <h3>quich links</h3>
                    <a href="index.php"><i class="fa-solid fa-chevron-right"></i> Home</a>
                    <a href="components/about.php"><i class="fa-solid fa-chevron-right"></i> About</a>
                    <a href="components/cart.php"><i class="fa-solid fa-chevron-right"></i> Cart</a>
                    <a href="components/content.php"><i class="fa-solid fa-chevron-right"></i>Contact Us</a>
            </div>
            <div class="box-footer">
                <h3>extra links</h3>
                    <a href="auth/login.php"><i class="fa-solid fa-chevron-right"></i> login</a>
                    <a href="auth/register.php"><i class="fa-solid fa-chevron-right"></i> Register</a>
                    <a href="components/orders.php"><i class="fa-solid fa-chevron-right"></i> Orders</a>
                    <a href="components/search.php"><i class="fa-solid fa-chevron-right"></i> Search</a>
            </div>
            <div class="box-footer">
                <h3>follow us</h3>
                    <a href="#"><i class="fa-brands fa-facebook"></i> facebook </a>
                    <a href="#"><i class="fa-brands fa-instagram"></i>instagram</a>
                    <a href="component.php"><i class="fa-brands fa-linkedin"></i> linkedIn</a>
                    <a href="#"><i class="fa-brands fa-twitter"></i>twitter</a>
            </div>
        </div>
    </footer>

    <div class="loader">
        <img src="images/loader.gif" alt="">
    </div>

    <div class="copy">
        <h2>© copyright @2023 by <span>MR.Mohamed Shams</span> | all rights reserved</h2>
    </div>

    <!-- link swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".hero-slider", {
            loop: true,
            grabCursor: true,
            effect: "flip",
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
          });
    </script>
    <!-- file js -->
    <script src="script/script.js"></script>
    <script src="script/cart.js"></script>
        <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php
    include "php/alret.php";
    ?>
</body>
</html>
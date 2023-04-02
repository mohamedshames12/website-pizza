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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- file css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- file cdnjs css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- link swiper -->
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <title>Pizza || Home</title>
</head>
<body>
    
    <?php include 'Header.php'?>



    <section class="producats">
        <h1 class="heading">quick view</h1>
        <div class="box-container">
            <?php
                $pid = $_GET['pid'];
                $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
                $select_products->execute([$pid]);
                if($select_products->rowCount() > 0) {
                    while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <form action="#" method="post" class="box">
                <input type="hidden" name="pid" value="<?= $fetch_product['id']?>">
                <input type="hidden" name="name" value="<?= $fetch_product['name']?>">
                <input type="hidden" name="price" value="<?= $fetch_product['price']?>">
                <input type="hidden" name="image" value="<?= $fetch_product['image']?>">
                <img src="../admin/uploaded_files/<?= $fetch_product['image']?>" alt="">
                    <a href="#" class="cat"><?= $fetch_product['category']?></a>
                    <div class="name"><?= $fetch_product['name']?></div>
                    <div class="flex">
                        <div class="price"><span>$</span><?= $fetch_product['price']?></div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                    <div class="btns">
                        <button class="cart"><i class="fa-solid fa-cart-plus"></i> add to cart</button>
                    </div>
            </form>
            <?php
              }
            }else{
                echo '<p class="empty">no products found!</p>';
            }
            
            
            ?>
        </div>


    </section>
    

    
    <footer>
        <div class="container-footer">
            <div class="box-footer">
                <h3>quich links</h3>
                    <a href="index.php"><i class="fa-solid fa-chevron-right"></i> Home</a>
                    <a href="about.php"><i class="fa-solid fa-chevron-right"></i> About</a>
                    <a href="cart.php"><i class="fa-solid fa-chevron-right"></i> Cart</a>
                    <a href="content.php"><i class="fa-solid fa-chevron-right"></i>Contact Us</a>
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
                    <a href="#"><i class="fa-brands fa-facebook"></i> facebook </a>
                    <a href="#"><i class="fa-brands fa-instagram"></i>instagram</a>
                    <a href="component.php"><i class="fa-brands fa-linkedin"></i> linkedIn</a>
                    <a href="#"><i class="fa-brands fa-twitter"></i>twitter</a>
            </div>
        </div>
    </footer>
<!-- 
    <div class="loader">
        <img src="images/loader.gif" alt="">
    </div> -->

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
    <script src="../script/script.js"></script>
    <script src="../script/cart.js"></script>
        <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php
    include "../php/alret.php";
    ?>
</body>
</html>
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
    <title>Pizza || Menu</title>
  </head>
  <body>
 
  <?php include 'Header.php'; ?>

  
    <section class="producats">
        <h1 class="heading">latest dishes</h1>
        <div class="box-container">
            <form action="#" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_view"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"> </button>
                    <img src="../images/cart1.jpg" alt="">
                    <a href="#" class="cat">fast food</a>
                    <div class="name">Kickers Pizza Ranch Sauce</div>
                    <div class="flex">
                        <div class="price"><span>$</span>6</div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
               
            </form>
            <form action="#" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_view"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"> </button>
                    <img src="../images/cart2.jpg" alt="">
                    <a href="#" class="cat">fast food</a>
                    <div class="name">Kickers Pizza BBQ Sauce</div>
                    <div class="flex">
                        <div class="price"><span>$</span>7</div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                
            </form>
            <form action="#" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_view"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"> </button>
                    <img src="../images/cart3.jpg" alt="">
                    <a href="#" class="cat">fast food</a>
                    <div class="name">Chicken Legend Ranch</div>
                    <div class="flex">
                        <div class="price"><span>$</span>9</div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
               
            </form>
            <form action="#" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_view"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"> </button>
                    <img src="../images/cart4.jpg" alt="">
                    <a href="#" class="cat">fast food</a>
                    <div class="name">Chicken Legend Hot</div>
                    <div class="flex">
                        <div class="price"><span>$</span>10</div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                
            </form>
            <form action="#" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_view"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"> </button>
                    <img src="../images/cart5.jpg" alt="">
                    <a href="#" class="cat">fast food</a>
                    <div class="name">Chicken Legend BBQ</div>
                    <div class="flex">
                        <div class="price"><span>$</span>30</div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                
            </form>
            <form action="#" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_view"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"> </button>
                    <img src="../images/cart6.jpg" alt="">
                    <a href="#" class="cat">fast food</a>
                    <div class="name">Philly Cheese Steak</div>
                    <div class="flex">
                        <div class="price"><span>$</span>20</div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                
            </form>
            <form action="#" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_view"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"> </button>
                    <img src="../images/cart7.jpg" alt="">
                    <a href="#" class="cat">fast food</a>
                    <div class="name">Italiano Feast</div>
                    <div class="flex">
                        <div class="price"><span>$</span>80</div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                
            </form>
            <form action="#" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_view"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"> </button>
                    <img src="../images/cart8.jpg" alt="">
                    <a href="#" class="cat">fast food</a>
                    <div class="name">Ultimate Pepperoni</div>
                    <div class="flex">
                        <div class="price"><span>$</span>25</div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                
            </form>
            <form action="#" method="post" class="box">
                <button type="submit" class="fas fa-eye" name="quick_view"></button>
                <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"> </button>
                    <img src="../images/cart9.jpg" alt="">
                    <a href="#" class="cat">fast food</a>
                    <div class="name">Barbecue Feast</div>
                    <div class="flex">
                        <div class="price"><span>$</span>28</div>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length == 2) return false;">
                    </div>
                
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

  </body>
</html>

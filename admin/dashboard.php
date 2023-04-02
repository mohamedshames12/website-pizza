<?php
    include "../config/connect.php";
    session_start();
    $admin_id =  $_SESSION['admin_id'];


    if(!$admin_id){
        header("location:../auth/login.php");
    };
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- file cdnjs css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <!-- link swiper -->
        <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>  
        <!-- file css admin -->
        <link rel="stylesheet" href="adminStyle.css">
    <title>Dashboard</title>
</head>
<body>
    
    <?php
        include "headerAdmin.php";
    ?>




    <section class="dashboard">
        <h1 class="heading">dashboard</h1>
        <div class="container-dashboard">
          <div class="box">
            <h3 class="welcome">Welcome Admin :</h3>
            <p class="name"><?= $fetch_profile['name']; ?></p>
            <a href="updateProfileAdmin.php" class="btn">Update Profile</a>
          </div>

          <div class="box">
            <?php
                $total_pendings = 0;
                $select_pengings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
                $select_pengings->execute(['pending']);
                while($fetch_pendings = $select_pengings->fetch(PDO::FETCH_ASSOC)){
                    $total_pendings += $fetch_pendings['total_price'];
                }
            ?>
            <h3><span>$</span><?= $total_pendings; ?></h3>
            <p>total pendings</p>
            <a href="odersAdmin.php" class="btn">see orders</a>
          </div>

          <div class="box">
            <?php
                $total_completes = 0;
                $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
                $select_completes->execute(['completes']);
                while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
                    $total_completes += $fetch_completes['total_price'];
                }
            ?>
            <h3><span>$</span><?= $total_completes; ?></h3>
            <p>total completes</p>
            <a href="odersAdmin.php" class="btn">see orders</a>
          </div>

          
          <div class="box">
            <?php
                $select_orders = $conn->prepare("SELECT * FROM `orders`");
                $select_orders->execute();
                $number_of_orders =$select_orders->rowCount();
            ?>
            <h3><?= $number_of_orders; ?></h3>
            <p>total orders</p>
            <a href="odersAdmin.php" class="btn">see orders</a>
          </div>

          <div class="box">
            <?php
                $select_products = $conn->prepare("SELECT * FROM `products`");
                $select_products->execute();
                $number_of_products =$select_products->rowCount();
            ?>
            <h3><?= $number_of_products; ?></h3>
            <p>total products</p>
            <a href="productsAdmin.php" class="btn">add products</a>
          </div>

          <div class="box">
            <?php
                $select_messages = $conn->prepare("SELECT * FROM `messages`");
                $select_messages->execute();
                $number_of_messages =$select_messages->rowCount();
            ?>
            <h3><?= $number_of_messages; ?></h3>
            <p>total messages</p>
            <a href="messagesAdmin.php" class="btn">see messages</a>
          </div>


        </div>
    </section>






            <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php
       include "../php/alret.php";
    ?>

    <script src="scriptAdmin.js"></script>
</body>
</html>
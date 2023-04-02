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
    <title>Dashboard || orders</title>
</head>
<body>
    
    <?php
        include "headerAdmin.php";
    ?>

            <!-- sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php
       include "../php/alret.php";
    ?>

    <script src="scriptAdmin.js"></script>
</body>
</html>
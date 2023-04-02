<?php
    include "../config/connect.php";
    session_start();
    $admin_id =  $_SESSION['admin_id'];


    if(!$admin_id){
        header("location:../auth/login.php");
    };


    if(isset($_POST['add_product'])){
        $success_msg[] = 'Add Products';
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $price = $_POST['price'];
        $price = filter_var($price, FILTER_SANITIZE_STRING);
        $category = $_POST['category'];
        $category = filter_var($category, FILTER_SANITIZE_STRING);

        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_files/'.$image;


        if(!empty($image)){
            if($image_size > 2000000){
                $warning_msg[] = "image size is too large!";
            }else{
                move_uploaded_file($image_tmp_name, $image_folder);
            }
        }



        $select_product = $conn->prepare("SELECT * FROM products WHERE name = ?");
        $select_product->execute([$name]);

        if($select_product->rowCount() > 0){

            $warning_msg[] = "porduct already added";
        }else{
            $insert_products =  $conn->prepare("INSERT INTO products(name, category, price,image) VALUES(?,?,?,?)");
            $insert_products->execute([$name, $category, $price, $image]);
            $success_msg[] = "Product successfully!";
        }

    }
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
    <title>Dashboard || products</title>
</head>
<body>
    
    <?php
        include "headerAdmin.php";
    ?>


<section class="products">
        <form action="#" class="box" method="post" enctype="multipart/form-data">
            <h1>Add Product</h1>
            <input type="text" placeholder="enter product name" name="name" required>
            <input type="number" placeholder="enter product price" name="price" required>
            <input type="text" placeholder="fast food" name="category" required>
            <input type="file" name="image" accept="image/*" required>
            <input type="submit" value="add product" name="add_product" class="btn">
        </form>
</section>


<section class="fetch-products">
    <div class="container-products">
        <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            if($select_products->rowCount() > 0) {
                while($row = $select_products->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                        <div class="box">
                            <div class="image">
                              <img src="uploaded_files/<?= $row['image']?>" alt="">
                            </div>
                              <div class="contact">
                                <p class="price"><span>$</span><?= $row['price']?></p>
                                <p class="category"><?= $row['category']?></p>
                             </div>
                               <div class="name-product">
                                 <p><?= $row['name']?></p>
                              </div>
                              <div class="btns">
                                    <a href="#" class="update">update</a>
                                    <a href="#" class="delete">delete</a>
                              </div>
                        </div>
                    <?php
                }
            }else{
                echo '<p class="empty">no product added yet!</p>';
            }
        ?>
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
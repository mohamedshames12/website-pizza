<header class="header">
    <a href="../index.php" class="logn">Pizza</a>
    <nav class="navber">
        <a href="../index.php">Home</a>
        <a href="about.php">About</a>
        <a href="menu.php">Menu</a>
        <a href="orders.php">Orders</a>
        <a href="content.php">Content</a>
    </nav>
    <div class="icons">
        <i class="fas fa-solid fa-bars" id="menu"></i>
        <a href="search.php"><i class="fas fa-regular fa-magnifying-glass"></i></a>
        <div class="user">
            <i class="fas fa-thin fa-user" id="user"></i>
            <div class="info-user">
                <?php
                $select_profile = $conn->prepare("SELECT * FROM users WHERE id = ?");
                $select_profile->execute([$user_id]);
                if ($select_profile->rowCount() > 0) {
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div class="box">
                        <p class="name-user"><?= $fetch_profile['name'] ?></p>
                        <a href="profile.php" class="profile">profile</a>
                        <a href="../auth/logout.php" class="logout" onclick="return confirm('logout from this website?')">logout</a>
                        <div class="lo-re">
                            <a href="../auth/login.php">login</a> <span>or</span> <a href="../auth/register.php">register</a>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                     <div class="box">
                        <p class="name-user">please login first</p>
                        <div class="lo-re">
                            <a href="../auth/login.php">login</a> <span>or</span> <a href="../auth/register.php">register</a>
                        </div>
                    </div>
                <?php
                }

                ?>
            </div>
        </div>
        <?php
        $count_user_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
        $count_user_cart_items->execute([$user_id]);
        $total_user_cart_items = $count_user_cart_items->rowCount();

        ?>
       <a href="cart.php"> <div class="cart"><i class="fas fa-light fa-cart-shopping" id="carts"><span>(<?= $total_user_cart_items; ?>)</span></i></a>
</header>
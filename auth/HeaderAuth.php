<header class="header">
    <a href="../index.php" class="logn">Pizza</a>
    <nav class="navber">
        <a href="../index.php">Home</a>
        <a href="../components/about.php">About</a>
        <a href="../components/menu.php">Menu</a>
        <a href="../components/orders.php">Orders</a>
        <a href="../components/content.php">Content</a>
    </nav>
    <div class="icons">
        <i class="fas fa-solid fa-bars" id="menu"></i>
        <a href="../components/search.php"><i class="fas fa-regular fa-magnifying-glass"></i></a>
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
                        <a href="../components/profile.php" class="profile">profile</a>
                        <a href="logout.php" class="logout" onclick="return confirm('logout from this website?')">logout</a>
                        <div class="lo-re">
                            <a href="login.php">login</a> <span>or</span> <a href="register.php">register</a>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                     <div class="box">
                        <p class="name-user">please login first</p>
                        <div class="lo-re">
                            <a href="login.php">login</a> <span>or</span> <a href="register.php">register</a>
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
        <div class="cart"><i class="fas fa-light fa-cart-shopping" id="carts"><span>(<?= $total_user_cart_items; ?>)</span></i>
            <div class="your-carts">
                <h1>your Cart</h1>
                <form action="#" method="post" class="box">
                    <div class="image">
                        <img src="images/cart2.jpg" alt="">
                    </div>
                    <div class="contact">
                        <p class="name">Kickers Pizza BBQ Sauce</p>
                        <p class="price">$7</p>
                        <div class="btns">
                            <button>+</button>
                            <p>1</p>
                            <button>-</button>
                        </div>
                    </div>
                    <div class="trach">
                        <i class="fas fa-regular fa-trash"></i>
                    </div>
                </form>
                <div class="line"></div>
                <form action="#" method="post" class="box">
                    <div class="image">
                        <img src="images/cart4.jpg" alt="">
                    </div>
                    <div class="contact">
                        <p class="name">Chicken Legend Hot</p>
                        <p class="price">$10</p>
                        <div class="btns">
                            <button>+</button>
                            <p>1</p>
                            <button>-</button>
                        </div>
                    </div>
                    <div class="trach">
                        <i class="fas fa-regular fa-trash"></i>
                    </div>
                </form>
                <div class="line"></div>
                <form action="#" method="post" class="box">
                    <div class="image">
                        <img src="images/cart3.jpg" alt="">
                    </div>
                    <div class="contact">
                        <p class="name">Chicken Legend Ranch</p>
                        <p class="price">$9</p>
                        <div class="btns">
                            <button>+</button>
                            <p>1</p>
                            <button>-</button>
                        </div>
                    </div>
                    <div class="trach">
                        <i class="fas fa-regular fa-trash"></i>
                    </div>
                </form>
                <div class="line"></div>
                <form action="#" method="post" class="box">
                    <div class="image">
                        <img src="images/cart3.jpg" alt="">
                    </div>
                    <div class="contact">
                        <p class="name">Philly Cheese Steak</p>
                        <p class="price">$30</p>
                        <div class="btns">
                            <button>+</button>
                            <p>1</p>
                            <button>-</button>
                        </div>
                    </div>
                    <div class="trach">
                        <i class="fas fa-regular fa-trash"></i>
                    </div>
                </form>
                <div class="line"></div>
                <div class="total">
                    <p class="items">items</p>
                    <p class="prices">$56</p>
                </div>
                <a href="../components/cart.php" class="btn">see your cart</a>
                <i class="fs fa-solid fa-xmark" id="close-cart"></i>
            </div>
        </div>
    </div>
    <i class="fas fa-solid fa-xmark" id="close"></i>
</header>


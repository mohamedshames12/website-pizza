<header class="header">
    <a href="dashboard.php" class="logn">Admin<span>Panel</span></a>
    <nav class="navber">
        <a href="dashboard.php">Dashboard</a>
        <a href="messagesAdmin.php">messages</a>
        <a href="productsAdmin.php">Products</a>
        <a href="odersAdmin.php">Orders</a>
    </nav>
    <div class="icons">
        <i class="fas fa-solid fa-bars" id="menu"></i>
        <div class="user">
            <i class="fas fa-thin fa-user" id="user"></i>
            <div class="info-user">
                <?php
                $select_profile = $conn->prepare("SELECT * FROM users WHERE id = ?");
                $select_profile->execute([$admin_id]);
                if ($select_profile->rowCount() > 0) {
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div class="box">
                        <p class="name-user"><?= $fetch_profile['name'] ?></p>
                        <a href="../components/profile.php" class="profile">profile</a>
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
    </div>
    <i class="fas fa-solid fa-xmark" id="close"></i>
</header>
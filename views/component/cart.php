<link rel="stylesheet" href="../style/cart.css">
        <div class="cart">
            <a href="index.php?action=home&act=cart" class="cart2" >
                <?= isset($_SESSION['cart']) ? '<span class ="span">'.count($_SESSION['cart']) . '</span>' : null ?>
                <img src="./image/iconcart1.png" class="img" height="50px">
                </a>
            </div>
    
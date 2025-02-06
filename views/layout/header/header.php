<header class="navbar">
    <ul class="nav-list">
        <?php 
        $router = $_GET['router'] ?? ''; // Lấy giá trị router từ URL
        ?>
        <li><a href="/asm-php-1" class="<?= ($router == '') ? 'active' : '' ?>">Trang chủ</a></li>
        <li><a href="?router=product" class="<?= ($router == 'product') ? 'active' : '' ?>">Sản phẩm</a></li>
        <li><a href="?router=cart" class="<?= ($router == 'cart') ? 'active' : '' ?>">Giỏ hàng</a></li>
        <li><a href="?router=login" class="<?= ($router == 'login') ? 'active' : '' ?>">Đăng nhập</a></li>
    </ul>
</header>
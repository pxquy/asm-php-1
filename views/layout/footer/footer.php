<footer class="footer">
    <div class="footer-container">
        <div class="footer-about">
            <h3>Về chúng tôi</h3>
            <p>Chúng tôi cung cấp những sản phẩm chất lượng với giá tốt nhất.</p>
        </div>
        <div class="footer-links">
            <h3>Liên kết nhanh</h3>
            <ul>
                <li><a href="/asm-php-1">Trang chủ</a></li>
                <li><a href="?router=product">Sản phẩm</a></li>
                <li><a href="?router=cart">Giỏ hàng</a></li>
                <!-- <li><a href="?router=login">Đăng nhập</a></li> -->
            </ul>
        </div>
        <div class="footer-contact">
            <h3>Liên hệ</h3>
            <p>Email: support@example.com</p>
            <p>Hotline: 0123 456 789</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <span id="currentYear"></span> Bản quyền thuộc về ....</p>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("currentYear").textContent = new Date().getFullYear();
        });
    </script>
</footer>

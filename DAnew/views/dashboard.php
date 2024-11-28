<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Khách';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPA Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<style>
    /* Các quy tắc CSS để tạo giao diện và bố cục chuyên nghiệp và sống động */
    :root {
        --primary-color: #007bff;
        --secondary-color: #6c757d;
        --accent-color: #e74c3c;
        --text-color: #333;
        --background-color: #f8f9fa;
    }

    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background-color: var(--background-color);
    }

    /* Header Styles */
    header {
        background-color: var(--primary-color);
        color: white;
        padding: 10px 20px;
    }

    .header-top {
        display: flex;
        justify-content: flex-end;
        font-size: 14px;
    }

    .header-top a {
        color: white;
        text-decoration: none;
        margin-left: 20px;
    }

    .header-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }

    .logo a {
        font-size: 24px;
        font-weight: bold;
        color: white;
        text-decoration: none;
    }

    .search-bar {
        display: flex;
        align-items: center;
    }

    .search-bar input {
        padding: 8px 12px;
        border: none;
        border-radius: 20px 0 0 20px;
        width: 300px;
        font-size: 16px;
    }

    .search-bar button {
        background-color: var(--accent-color);
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 0 20px 20px 0;
        cursor: pointer;
        font-size: 16px;
    }

    .user-actions {
        display: flex;
        align-items: center;
    }

    .login-btn,
    .cart-btn {
        color: white;
        text-decoration: none;
        margin-left: 20px;
        font-size: 18px;
    }

    .cart-btn .cart-count {
        background-color: var(--accent-color);
        color: white;
        padding: 2px 6px;
        border-radius: 50%;
        font-size: 12px;
        margin-left: 5px;
    }

    /* Navigation Styles */
    nav {
        background-color: var(--secondary-color);
        padding: 10px 20px;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    nav ul li {
        margin: 0 10px;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    nav ul li a:hover {
        color: var(--accent-color);
    }

    /* Main Content Styles */
    main {
        padding: 40px 20px;
    }

    .hero-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: var(--primary-color);
        color: white;
        padding: 40px;
        border-radius: 10px;
    }

    .hero-content {
        flex: 1;
    }

    .hero-content h1 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .hero-content p {
        font-size: 18px;
        margin-bottom: 30px;
    }

    .btn {
        background-color: var(--accent-color);
        color: white;
        text-decoration: none;
        padding: 12px 24px;
        border-radius: 25px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #c0392b;
    }

    .hero-image img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .featured-products,
    .categories {
        margin-top: 40px;
    }

    .featured-products h2,
    .categories h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .product-grid,
    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    /* Footer Styles */
    footer {
        background-color: var(--secondary-color);
        color: white;
        padding: 40px 20px;
    }

    .footer-top {
        display: flex;
        justify-content: space-between;
    }

    .footer-column {
        flex: 1;
        margin-right: 40px;
    }

    .footer-column h3 {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .footer-column ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .footer-column ul li a {
        color: white;
        text-decoration: none;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    .footer-column ul li a:hover {
        color: var(--accent-color);
    }

    .social-icons a {
        color: white;
        font-size: 24px;
        margin-right: 10px;
        transition: color 0.3s ease;
    }

    .social-icons a:hover {
        color: var(--accent-color);
    }

    .footer-bottom {
        margin-top: 20px;
        text-align: center;
        font-size: 14px;
    }

    .featured-products {
        padding: 20px;
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
    }

    .featured-products h2 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }

    .product-card {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .product-card h3 {
        font-size: 16px;
        color: #333;
        margin: 10px 0;
    }

    .price {
        font-size: 18px;
        color: #e53935;
        font-weight: bold;
    }

    .original-price {
        text-decoration: line-through;
        color: #999;
        margin-left: 10px;
    }

    .discount {
        background: #e53935;
        color: #fff;
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 12px;
        margin-left: 5px;
    }

    .user-actions .username {
        color: #ffffff;
        text-decoration: none;
        margin-right: 10px;
    }

    .user-actions .logout-btn {
        color: #ffffff;
        text-decoration: none;
        margin-left: 10px;
    }

    .user-actions .cart-btn {
        color: #ffffff;
        text-decoration: none;
        margin-left: 15px;
    }
</style>

<body>
    <header>
        <div class="header-top">
            <a href="#">XBox Game Pass</a>
            <a href="#">Hướng dẫn mua hàng</a>
            <a href="#">Ưu đãi khách hàng</a>
            <a href="#">Thông tin liên hệ</a>
        </div>
        <div class="header-bottom">
            <div class="logo">
                <a href="index.html">EPA Shop</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Tìm kiếm sản phẩm">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
            <div class="user-actions">
                <?php
                if (isset($_SESSION['user_id'])): ?>
                    <!-- Hiển thị thông tin khi người dùng đã đăng nhập -->
                    <a href="#" class="username"><i class="fas fa-user"></i> Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
                    <a href="logout.php" class="logout-btn">Đăng xuất</a>
                <?php else: ?>
                    <!-- Hiển thị nút đăng nhập / đăng ký khi chưa đăng nhập -->
                    <a href="../index.php" class="login-btn"><i class="fas fa-user"></i> Đăng nhập / Đăng ký</a>
                <?php endif; ?>
                <a href="cart.html" class="cart-btn">
                    <i class="fas fa-shopping-cart"></i>
                    <?php
                    $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                    ?>
                    <span class="cart-count"><?php echo $cart_count; ?></span>

                </a>
            </div>

        </div>
    </header>

    <nav>
        <ul>
            <li><a href="#">Sản phẩm bạn vừa xem</a></li>
            <li><a href="#">Sản phẩm mua nhiều</a></li>
            <li><a href="#">Sản phẩm khuyến mãi</a></li>
            <li><a href="payment.php">Hình thức thanh toán</a></li>
        </ul>
    </nav>

    <main>
        <section class="hero-section">
            <div class="hero-content">
                <h1>Khám phá Thế Giới Của EPA Shop</h1>
                <p>Cửa hàng trực tuyến bán sách hàng đầu với các sản phẩm chất lượng và dịch vụ tuyệt vời.</p>
                <a href="#" class="btn">Mua Ngay</a>
            </div>
            <div class="hero-image">
                <img src="hero-image.jpg" alt="Hero Image">
            </div>
        </section>

        <section class="featured-products">
            <h2>Sản phẩm nổi bật</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="netflix.jpg" alt="Netflix Premium">
                    <h3>Netflix Premium 1 tháng - Tài khoản</h3>
                    <p class="price">89.000đ <span class="original-price">260.000đ</span> <span class="discount">-66%</span></p>
                </div>
                <div class="product-card">
                    <img src="spotify.jpg" alt="Spotify Premium">
                    <h3>Spotify Premium 1 năm - Gia hạn chính chủ</h3>
                    <p class="price">349.000đ <span class="original-price">708.000đ</span> <span class="discount">-51%</span></p>
                </div>
                <div class="product-card">
                    <img src="zoom.jpg" alt="Zoom Pro">
                    <h3>Zoom Pro ~1 tháng (28 ngày) - Gói nâng cấp</h3>
                    <p class="price">210.000đ <span class="original-price">350.000đ</span> <span class="discount">-40%</span></p>
                </div>
                <div class="product-card">
                    <img src="windows.jpg" alt="Windows 10">
                    <h3>Windows 10 Professional - CD Key</h3>
                    <p class="price">290.000đ <span class="original-price">400.000đ</span> <span class="discount">-28%</span></p>
                </div>
                <div class="product-card">
                    <img src="youtube.jpg" alt="YouTube Premium">
                    <h3>YouTube Premium + YouTube Music 1 năm - Gia hạn chính chủ</h3>
                    <p class="price">499.000đ <span class="original-price">6.720.000đ</span> <span class="discount">-93%</span></p>
                </div>
                <div class="product-card">
                    <img src="discord.jpg" alt="Discord Nitro">
                    <h3>Discord Nitro 3 tháng - Đăng kí lần đầu</h3>
                    <p class="price">175.000đ <span class="original-price">690.000đ</span> <span class="discount">-75%</span></p>
                </div>
                <div class="product-card">
                    <img src="canva.jpg" alt="Canva Pro">
                    <h3>Canva Pro 1 năm - Gia hạn chính chủ</h3>
                    <p class="price">295.000đ <span class="original-price">1.500.000đ</span> <span class="discount">-80%</span></p>
                </div>
                <div class="product-card">
                    <img src="chatgpt.jpg" alt="ChatGPT">
                    <h3>ChatGPT (OpenAI) - Tài khoản</h3>
                    <p class="price">29.000đ <span class="original-price">200.000đ</span> <span class="discount">-85%</span></p>
                </div>
            </div>
        </section>

        <section class="categories">
            <h2>Danh mục sản phẩm</h2>
            <div class="category-grid">
                <!-- Các danh mục sản phẩm -->
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-top">
            <div class="footer-column">
                <h3>Về chúng tôi</h3>
                <ul>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Chính sách bảo mật</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Hỗ trợ khách hàng</h3>
                <ul>
                    <li><a href="#">Hướng dẫn mua hàng</a></li>
                    <li><a href="#">Chính sách đổi trả</a></li>
                    <li><a href="#">Câu hỏi thường gặp</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Theo dõi chúng tôi</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Divine Shop. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js">
        const cartCountElement = document.querySelector('.cart-count');
        let cartCount = 0;

        function addToCart() {
            cartCount++;
            cartCountElement.textContent = cartCount;
        }

        function removeFromCart() {
            if (cartCount > 0) {
                cartCount--;
                cartCountElement.textContent = cartCount;
            }
        }
    </script>
</body>

</html>
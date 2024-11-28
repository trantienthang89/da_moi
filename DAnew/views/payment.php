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

.user-actions .login-btn,
.user-actions .cart-btn,
.user-actions .username,
.user-actions .logout-btn {
    color: white;
    text-decoration: none;
    margin-left: 20px;
    font-size: 18px;
}

.user-actions .cart-count {
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
.payment-options {
    display: flex;
    flex-direction: column; /* Sắp xếp theo cột */
    margin: 20px 0;
}

.payment-option {
    margin: 10px 0; /* Khoảng cách giữa các box */
    max-width: 1000px; /* Giới hạn chiều rộng của box */
}

summary {
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 10px; /* Điều chỉnh padding để làm cho khung nhỏ hơn */
    background-color: #4a90e2; /* Màu nền mới cho summary */
    color: white;
    border-radius: 5px;
    transition: background-color 0.3s; /* Thêm hiệu ứng chuyển màu */
}

summary:hover {
    background-color: #357ABD; /* Màu nền khi hover */
}

summary img {
    width: 30px; /* Kích thước hình ảnh */
    height: 30px;
    margin-right: 10px; /* Khoảng cách giữa hình ảnh và văn bản */
}

.payment-details {
    padding: 10px;
    background-color: #f8f9fa; /* Màu nền cho thông tin chi tiết */
    border: 1px solid #ccc;
    border-radius: 5px;
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
                <a href="./dashboard.php">EPA Shop</a>
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

    <section class="payment-methods">
    <h2>Chọn phương thức thanh toán</h2>
    <form id="paymentForm">
        <div class="payment-options">
        <details class="payment-option">
    <summary>
        <img src="momo-logo.png" alt="MoMo" />
        <span>Thanh toán qua MoMo</span>
    </summary>
    <div class="payment-details">
        <p>Thanh toán nhanh chóng và tiện lợi qua ứng dụng MoMo.</p>
        <img src="/mnt/data/image.png" alt="Payment Details" />
        <p>Lưu ý: Hệ thống sẽ xử lý tự động sau khi chuyển khoản 1-3 phút.</p>
        <ul>
            <li><strong>Nội dung chuyển khoản:</strong> CK sach</li>
            <li><strong>Ngân hàng:</strong> momo</li>
            <li><strong>Số tài khoản:</strong> 01123457875432</li>
            <li><strong>Tên tài khoản:</strong> tttttttttt</li>
            <li><strong>Chi nhánh:</strong> Hà Nội</li>
        </ul>
        <p>Hãy sử dụng hình thức chuyển tiền nhanh 24/7 và quét mã QR bên trên để tự động điền đúng số tiền và nội dung.</p>
    </div>
</details>

            <details class="payment-option">
                <summary>
                    <img src="viettel-logo.png" alt="Viettel" />
                    <span>Thanh toán qua Viettel</span>
                </summary>
                <div class="payment-details">
        <p>Thanh toán nhanh chóng và tiện lợi qua ứng dụng MoMo.</p>
        <img src="/mnt/data/image.png" alt="Payment Details" />
        <p>Lưu ý: Hệ thống sẽ xử lý tự động sau khi chuyển khoản 1-3 phút.</p>
        <ul>
            <li><strong>Nội dung chuyển khoản:</strong> CK sach</li>
            <li><strong>Ngân hàng:</strong> momo</li>
            <li><strong>Số tài khoản:</strong> 01123457875432</li>
            <li><strong>Tên tài khoản:</strong> tttttttttt</li>
            <li><strong>Chi nhánh:</strong> Hà Nội</li>
        </ul>
        <p>Hãy sử dụng hình thức chuyển tiền nhanh 24/7 và quét mã QR bên trên để tự động điền đúng số tiền và nội dung.</p>
    </div>
            </details>
            <details class="payment-option">
                <summary>
                    <img src="bank-logo.png" alt="Ngân hàng" />
                    <span>Thanh toán qua Ngân hàng</span>
                </summary>
                <<div class="payment-details">
        <p>Thanh toán nhanh chóng và tiện lợi qua ứng dụng MoMo.</p>
        <img src="/mnt/data/image.png" alt="Payment Details" />
        <p>Lưu ý: Hệ thống sẽ xử lý tự động sau khi chuyển khoản 1-3 phút.</p>
        <ul>
            <li><strong>Nội dung chuyển khoản:</strong> CK sach</li>
            <li><strong>Ngân hàng:</strong> momo</li>
            <li><strong>Số tài khoản:</strong> 01123457875432</li>
            <li><strong>Tên tài khoản:</strong> tttttttttt</li>
            <li><strong>Chi nhánh:</strong> Hà Nội</li>
        </ul>
        <p>Hãy sử dụng hình thức chuyển tiền nhanh 24/7 và quét mã QR bên trên để tự động điền đúng số tiền và nội dung.</p>
    </div>
            </details>
            <details class="payment-option">
                <summary>
                    <img src="zalopay-logo.png" alt="ZaloPay" />
                    <span>Thanh toán qua ZaloPay</span>
                </summary>
                <div class="payment-details">
        <p>Thanh toán nhanh chóng và tiện lợi qua ứng dụng MoMo.</p>
        <img src="/mnt/data/image.png" alt="Payment Details" />
        <p>Lưu ý: Hệ thống sẽ xử lý tự động sau khi chuyển khoản 1-3 phút.</p>
        <ul>
            <li><strong>Nội dung chuyển khoản:</strong> CK sach</li>
            <li><strong>Ngân hàng:</strong> momo</li>
            <li><strong>Số tài khoản:</strong> 01123457875432</li>
            <li><strong>Tên tài khoản:</strong> tttttttttt</li>
            <li><strong>Chi nhánh:</strong> Hà Nội</li>
        </ul>
        <p>Hãy sử dụng hình thức chuyển tiền nhanh 24/7 và quét mã QR bên trên để tự động điền đúng số tiền và nội dung.</p>
    </div>
            </details>
            <details class="payment-option">
                <summary>
                    <img src="paypal-logo.png" alt="Paypal" />
                    <span>Thanh toán qua Paypal</span>
                </summary>
                <div class="payment-details">
        <p>Thanh toán nhanh chóng và tiện lợi qua ứng dụng MoMo.</p>
        <img src="/mnt/data/image.png" alt="Payment Details" />
        <p>Lưu ý: Hệ thống sẽ xử lý tự động sau khi chuyển khoản 1-3 phút.</p>
        <ul>
            <li><strong>Nội dung chuyển khoản:</strong> CK sach</li>
            <li><strong>Ngân hàng:</strong> momo</li>
            <li><strong>Số tài khoản:</strong> 01123457875432</li>
            <li><strong>Tên tài khoản:</strong> tttttttttt</li>
            <li><strong>Chi nhánh:</strong> Hà Nội</li>
        </ul>
        <p>Hãy sử dụng hình thức chuyển tiền nhanh 24/7 và quét mã QR bên trên để tự động điền đúng số tiền và nội dung.</p>
    </div>
            </details>
            <details class="payment-option">
                <summary>
                    <span>Thanh toán bằng tiền mặt</span>
                </summary>
                <div class="payment-details">
                    <p>Thanh toán trực tiếp bằng tiền mặt khi nhận hàng.</p>
                </div>
            </details>
        </div>
        <button type="button" onclick="processPayment()">Xác nhận thanh toán</button>
    </form>
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
        function payWithMomo() {
    alert("Bạn đã chọn thanh toán qua MoMo.");
    // Thực hiện các hành động thanh toán qua MoMo ở đây
}

function payWithViettel() {
    alert("Bạn đã chọn thanh toán qua Viettel.");
    // Thực hiện các hành động thanh toán qua Viettel ở đây
}

function payWithBank() {
    alert("Bạn đã chọn thanh toán qua Ngân hàng.");
    // Thực hiện các hành động thanh toán qua ngân hàng ở đây
}

function processPayment() {
        const selectedPayment = document.querySelector('input[name="payment"]:checked');
        if (selectedPayment) {
            alert("Bạn đã chọn thanh toán qua " + selectedPayment.nextElementSibling.querySelector('h3').innerText);
            // Thực hiện các hành động thanh toán tại đây
        } else {
            alert("Vui lòng chọn phương thức thanh toán.");
        }
    }
    document.querySelectorAll('.payment-option').forEach(option => {
    option.addEventListener('click', function() {
        const details = this.querySelector('.payment-details');
        const allDetails = document.querySelectorAll('.payment-details');
        
        // Ẩn tất cả thông tin chi tiết trước khi hiển thị thông tin của box hiện tại
        allDetails.forEach(detail => {
            if (detail !== details) {
                detail.style.display = 'none';
            }
        });
        
        // Hiện hoặc ẩn thông tin chi tiết của box hiện tại
        details.style.display = details.style.display === 'block' ? 'none' : 'block';
    });
});
    

    </script>
</body>

</html>
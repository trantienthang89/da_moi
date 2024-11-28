<?php
session_start();
$error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
unset($_SESSION['login_error']); // Xóa thông báo lỗi sau khi hiển thị
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  <link rel="stylesheet" href="./css/index.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <title>Học Tiếng Anh - Đăng Nhập</title>
</head>
<body>
  <video autoplay muted loop class="video-background">
    <source src="./Images/video.mp4" type="video/mp4">
  </video>

  <label class="switch">
    <input type="checkbox" id="dark-mode-toggle" checked>
    <span class="slider"></span>
  </label>

  <div class="form-container">
    <h2>Đăng Nhập</h2>

    <!-- Hiển thị thông báo lỗi nếu có -->
    <?php if ($error): ?>
      <div class="error-message">
          <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <form action="./controllers/logincontroller.php" method="POST">
      <input type="text" name="username" placeholder="Tên người dùng" required>
      <input type="password" name="password" placeholder="Mật khẩu" required>
      <button type="submit">Đăng Nhập</button>
    </form>
    <a class="register-link" href="./views/register.php">Chưa có tài khoản? Đăng ký tại đây</a>

    <div class="copyright">
      © 2024 Học Tiếng Anh. Tất cả quyền được bảo lưu.
    </div>
  </div>

  <script>
    const toggleSwitch = document.getElementById('dark-mode-toggle');
    const body = document.body;
    const formContainer = document.querySelector('.form-container');
    const inputs = document.querySelectorAll('input');
    const registerLink = document.querySelector('.register-link');

    window.addEventListener('DOMContentLoaded', () => {
      body.classList.add('dark-mode');
      formContainer.classList.add('dark-mode');
      inputs.forEach(input => input.classList.add('dark-mode'));
      registerLink.classList.add('dark-mode');
    });

    toggleSwitch.addEventListener('change', function () {
      body.classList.toggle('dark-mode');
      formContainer.classList.toggle('dark-mode');
      inputs.forEach(input => input.classList.toggle('dark-mode'));
      registerLink.classList.toggle('dark-mode');
    });
  </script>
</body>
</html>

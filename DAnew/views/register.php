<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Đường dẫn CSS sử dụng hàm asset() -->
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="../css/index.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <title>Học Tiếng Anh - Đăng Nhập</title>
</head>

<body>
  <!-- Đường dẫn video sử dụng hàm asset() -->
  <video autoplay muted loop class="video-background">
    <source src="../images/video.mp4" type="video/mp4">
  </video>

  <!-- Switch chuyển đổi dark mode -->
  <label class="switch">
    <input type="checkbox" id="dark-mode-toggle" checked>
    <span class="slider"></span>
  </label>

  <div class="form-container">
    <h2>Đăng Ký</h2>
    <!-- Đường dẫn action form sử dụng route() và thêm CSRF token -->
    <form action="{{ route('register.submit') }}" method="POST">
      <input type="text" name="username" placeholder="Tên đăng nhập" required>
      <input type="email" name="email" placeholder="Email" required>
      <div class="gender" style="text-align: left; margin: 12px 0;">
        <label>Giới tính:</label><br>
        <input type="radio" name="gender" value="male" required> Nam
        <input type="radio" name="gender" value="female" required> Nữ
        <input type="radio" name="gender" value="other" required> Khác
      </div>
      <input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]{10}" required>

      <!-- Mật khẩu và xác nhận mật khẩu -->
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

      <div class="terms" style="text-align: left; margin: 12px 0;">
        <input type="checkbox" name="terms" required> I accept the <a href="#">Terms and Conditions</a>
      </div>
      <button type="submit">Đăng ký</button>
    </form>

    <!-- Đường dẫn đến trang đăng nhập sử dụng route() -->
    <a class="register-link" href="../index.php">Đăng nhập ở đây !!</a>

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

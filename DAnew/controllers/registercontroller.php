<?php
// Hiển thị lỗi để kiểm tra
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "tienganh";

// Kết nối đến database
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];  // Lấy username từ form
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash mật khẩu để bảo mật

    // Kiểm tra xem email hoặc username đã tồn tại chưa
    $checkUser = $conn->prepare("SELECT email, username FROM users WHERE email = ? OR username = ?");
    $checkUser->bind_param("ss", $email, $username);
    $checkUser->execute();
    $checkUser->store_result();

    if ($checkUser->num_rows > 0) {
        echo "Email hoặc tên đăng nhập đã tồn tại. Vui lòng chọn thông tin khác.";
    } else {
        // Thêm người dùng mới vào cơ sở dữ liệu
        $stmt = $conn->prepare("INSERT INTO users (username, email, gender, phone_number, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $email, $gender, $phone_number, $password);

        if ($stmt->execute()) {
            // Chuyển hướng đến trang index để đăng nhập
            header("Location: ../index.php");
            exit();
        } else {
            echo "Lỗi: " . $stmt->error;
        }
    }
    $checkUser->close(); // Đóng statement kiểm tra email và username
}

$conn->close();
?>

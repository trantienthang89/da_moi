<?php
session_start();
include '../models/database.php'; // Đảm bảo đường dẫn chính xác đến tệp database.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($stmt = $conn->prepare("SELECT * FROM users WHERE username = ?")) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Kiểm tra mật khẩu
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['nickname'] = $user['nickname'];

                // Lưu cookie nếu cần thiết (ví dụ để giữ đăng nhập)
                setcookie('user_id', $user['id'], time() + 86400, "/");
                setcookie('username', $user['username'], time() + 86400, "/");
                setcookie('role', $user['role'], time() + 86400, "/");
                setcookie('nickname', $user['nickname'], time() + 86400, "/");

                // Chuyển hướng đến trang dashboard hoặc trang chính
                header("Location: ../views/dashboard.php");
                exit();
            } else {
                // Mật khẩu không đúng
                $_SESSION['login_error'] = "Mật khẩu không hợp lệ!";
                header("Location: ../index.php");
                exit();
            }
        } else {
            $_SESSION['login_error'] = "Tên đăng nhập không tồn tại!";
            header("Location: ../index.php");
            exit();
        }

    } else {
        // Xử lý lỗi kết nối hoặc truy vấn
        $_SESSION['login_error'] = "Lỗi kết nối cơ sở dữ liệu!";
        header("Location: ../index.php");
        exit();
    }
}
?>

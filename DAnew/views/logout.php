<?php
session_start();
session_unset(); // Xóa tất cả session
session_destroy(); // Hủy session
setcookie('user_id', '', time() - 3600, "/"); // Xóa cookie (nếu có)
header("Location: ../index.php"); // Chuyển hướng về trang chính
exit();
?>

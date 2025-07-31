<?php
    session_start();// Khởi động session để truy cập giỏ hàng.
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;// Lấy id từ URL, nếu không có thì gán = 0
    if (isset($_SESSION['giohang'][$id])) {
        unset($_SESSION['giohang'][$id]);// Xóa sản phẩm khỏi giỏ nếu tồn tạ
    }
    header("Location: giohang.php");// Quay lại trang giỏ hàng
    exit(); 
?>
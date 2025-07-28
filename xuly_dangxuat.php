<?php
    session_start();
    session_unset(); // Xóa tất cả biến session
    session_destroy(); // Hủy session hiện tại

    // Chuyển về trang đăng nhập hoặc trang chủ
    header("Location: trangchu.php");
    exit();
?>

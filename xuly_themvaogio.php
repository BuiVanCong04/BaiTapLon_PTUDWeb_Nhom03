<?php
session_start();//bắt đầu phiên lm việc
include("connect.php");// // Kết nối cơ sở dữ liệu để truy vấn thông tin sản phẩm.

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = (int)$_POST['id'];// Kiểm tra nếu form được gửi và có id sản phẩm.

    // Lấy thông tin sản phẩm
    $sql = "SELECT * FROM san_pham WHERE id = $id"; // Câu SQL để lấy sản phẩm theo id.
    $result = mysqli_query($conn, $sql);  // Thực thi câu SQL.
    $row = mysqli_fetch_assoc($result); // Lấy 1 dòng dữ liệu dạng mảng kết hợp.

    if ($row) {
        $item = [
            'id' => $row['id'],
            'ten' => $row['ten_san_pham'],
            'gia' => (int)preg_replace('/\D/', '', $row['gia']),// Loại bỏ ký tự không phải số.
            'hinh' => $row['hinh_anh'],
            'so_luong' => 1
        ];

        // Nếu sản phẩm đã có trong giỏ thì tăng số lượng
        if (isset($_SESSION['giohang'][$id])) {
            $_SESSION['giohang'][$id]['so_luong'] += 1;
        } else {
            $_SESSION['giohang'][$id] = $item; // Thêm sản phẩm mới vào giỏ.
        }
    }
}

header("Location: giohang.php"); // Sau khi xử lý, chuyển hướng đến trang giỏ hàng.
exit();
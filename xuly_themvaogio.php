<?php
session_start();
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = (int)$_POST['id'];

    // Lấy thông tin sản phẩm
    $sql = "SELECT * FROM san_pham WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $item = [
            'id' => $row['id'],
            'ten' => $row['ten_san_pham'],
            'gia' => (int)preg_replace('/\D/', '', $row['gia']),
            'hinh' => $row['hinh_anh'],
            'so_luong' => 1
        ];

        // Nếu sản phẩm đã có trong giỏ thì tăng số lượng
        if (isset($_SESSION['giohang'][$id])) {
            $_SESSION['giohang'][$id]['so_luong'] += 1;
        } else {
            $_SESSION['giohang'][$id] = $item;
        }
    }
}

header("Location: giohang.php");
exit();
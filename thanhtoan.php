<?php
session_start();
include("connect.php");

// Bắt buộc đăng nhập
if (!isset($_SESSION["id"])) {
    echo "<script>alert('Vui lòng đăng nhập trước khi thanh toán!'); window.location.href = 'dangnhap.php';</script>";
    exit();
}

// Nếu từ 'Mua ngay'
if (isset($_POST['muangay']) && $_POST['muangay'] == '1') {
    $_SESSION['muangay'] = [
        'id' => $_POST['id'],
        'ten' => $_POST['ten'],
        'gia' => $_POST['gia'],
        'hinh_anh' => $_POST['hinh_anh'],
        'so_luong' => $_POST['soluong']
    ];
}

// Kiểm tra sản phẩm
if (!isset($_SESSION['muangay']) && empty($_SESSION["giohang"])) {
    echo "<script>alert('Không có sản phẩm để thanh toán.'); window.location.href = 'trangchu.php';</script>";
    exit();
}

$tong = 0;
$sanpham = isset($_SESSION['muangay']) ? [$_SESSION['muangay']] : $_SESSION['giohang'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán</title>
    <!-- <link rel="stylesheet" href="tainguyen/css/header.css">  -->
    <link rel="stylesheet" href="tainguyen/css/footer.css">
    <link rel="stylesheet" href="tainguyen/css/thanhtoan.css">
</head>
<body>

<div class="container-tt">
    <div class="main-content">
        <div class="left-section">
            <h2>Thông tin nhận hàng</h2>
            <p>Xin chào, <strong><?= $_SESSION["hoten"] ?></strong></p>
            <form action="xuly_thanhtoan.php" method="POST">
                <input type="email" name="email" value="<?= $_SESSION["email"] ?>" required>
                <input type="text" name="hoten" value="<?= $_SESSION["hoten"] ?>" required>
                <input type="text" name="sdt" placeholder="Số điện thoại" required>
                <input type="text" name="diachi" placeholder="Địa chỉ" required>
                <input type="text" name="tinh" placeholder="Tỉnh/TP" required>
                <input type="text" name="quan" placeholder="Quận/Huyện" required>
                <input type="text" name="phuong" placeholder="Phường/Xã" required>
                <textarea name="ghichu" placeholder="Ghi chú"></textarea>
                <label><input type="radio" name="pttt" value="bank" checked> Chuyển khoản</label>
                <label><input type="radio" name="pttt" value="cod"> COD</label>
                <button type="submit">ĐẶT HÀNG</button>
            </form>
        </div>
        <div class="right-section">
            <h3>Đơn hàng của bạn</h3>

            <?php foreach ($sanpham as $item): 
                $thanhtien = $item["gia"] * $item["so_luong"];
                $tong += $thanhtien;
            ?>
            <div class="order-item">
                <div class="order-thumb">
                    <img style="width: 100px; height: 100px" src="tainguyen/<?= htmlspecialchars($item['hinh_anh']) ?>" alt="<?= htmlspecialchars($item['ten']) ?>">
                </div>
                <div class="order-info">
                    <p class="order-title"><?= htmlspecialchars($item["ten"]) ?></p>
                    <p class="order-qty">x<?= $item["so_luong"] ?></p>
                    <p class="order-price"><?= number_format($thanhtien, 0, ",", ".") ?>₫</p>
                </div>
            </div>
            <?php endforeach; ?>
            <strong>Tổng cộng: <?= number_format($tong, 0, ",", ".") ?>₫</strong>
            <a href="giohang.php">← Quay về giỏ hàng</a>
        </div>
    </div>
</div>

</body>
</html>

<?php
session_start();
include("connect.php");

// Tính tổng tiền
$tong = 0;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Giỏ hàng</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="tainguyen/css/header.css">
  <link rel="stylesheet" href="tainguyen/css/footer.css">
  <script src="tainguyen/js/giohang.js"></script>
  <style>
    body { font-family: Arial; margin: 0; padding: 0; background: #f9f9f9; }
    .container-gh { padding: 40px 100px; background: white; margin: 40px auto; max-width: 1200px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    h1 { text-align: center; margin-bottom: 30px; color: #333; }
    .cart-table { width: 100%; border-collapse: collapse; }
    .cart-table th, .cart-table td { padding: 15px; border-bottom: 1px solid #eee; text-align: center; vertical-align: middle; }
    .cart-table th { background: #f0f0f0; color: #444; font-size: 16px; }
    .product-info { display: flex; align-items: center; gap: 15px; text-align: left; }
    .product-info img { width: 100px; height: auto; border: 1px solid #ddd; border-radius: 6px; }
    .product-name { font-weight: bold; font-size: 16px; color: #333; }
    .product-desc { font-size: 14px; color: #777; }
    .unit-price, .total-price { color: #d94e28; font-weight: bold; font-size: 15px; }
    .quantity-control { display: flex; align-items: center; justify-content: center; gap: 10px; }
    .quantity-control button { padding: 5px 12px; border: 1px solid #ccc; background: white; cursor: pointer; border-radius: 4px; font-size: 14px; }
    .quantity-control input { width: 45px; text-align: center; font-size: 14px; }
    .total { text-align: right; margin-top: 25px; font-weight: bold; font-size: 20px; color: #d94e28; }
    .checkout-btn { background: #d94e28; color: white; padding: 12px 40px; font-size: 17px; border: none; border-radius: 6px; cursor: pointer; display: block; margin: 20px 0 0 auto; }
    a.delete { color: red; font-size: 14px; display: inline-block; margin-top: 6px; text-decoration: none; }
    a.delete:hover { text-decoration: underline; }
  </style>
</head>
<body>

<?php include("thanhphanchung/header.php"); ?>

<div class="container-gh">
    <h1>Giỏ hàng</h1>
    <table class="cart-table">
        <thead>
            <tr>
                <th>Thông tin sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_SESSION['giohang'])) {
            foreach ($_SESSION['giohang'] as $item) {
                $thanhtien = $item['gia'] * $item['so_luong'];
                $tong += $thanhtien;
                echo "<tr>
                        <td class='product-info'>
                            <img src='tainguyen/{$item['hinh']}' alt=''>
<div>
                                <div class='product-name'>" . htmlspecialchars($item['ten']) . "</div>
                                <div class='product-desc'>120cm</div>
                                <a class='delete' href='xuly_xoagio.php?id={$item['id']}'>Xóa</a>
                            </div>
                        </td>
                        <td class='unit-price' data-price='{$item['gia']}'>" . number_format($item['gia'], 0, ',', '.') . "₫</td>
                        <td>
                            <div class='quantity-control'>
                                <button>-</button>
                                <input type='text' value='{$item['so_luong']}' readonly>
                                <button>+</button>
                            </div>
                        </td>
                        <td class='total-price'>" . number_format($thanhtien, 0, ',', '.') . "₫</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Giỏ hàng trống.</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <div class="total">Tổng tiền: <span id="total-amount"><?= number_format($tong, 0, ',', '.') ?>₫</span></div>
    <a href="thanhtoan.php"><button class="checkout-btn">Thanh toán</button></a>
</div>

<?php include("thanhphanchung/footer.php"); ?>
</body>
</html>
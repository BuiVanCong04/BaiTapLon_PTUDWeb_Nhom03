<?php
$conn = mysqli_connect("localhost", "root", "", "web_baitaplon");
if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Lấy dữ liệu sản phẩm
$sql = "SELECT * FROM san_pham WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Không tìm thấy sản phẩm.");
}

$ten = htmlspecialchars($row['ten_san_pham']);
$gia = number_format((int)preg_replace('/\D/', '', $row['gia']), 0, ',', '.') . "đ";
$hinh = 'tainguyen/' . $row['hinh_anh'];
$mota = isset($row['mo_ta']) ? nl2br(htmlspecialchars($row['mo_ta'])) : "Chưa có mô tả chi tiết cho sản phẩm này.";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= $ten ?> - Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="tainguyen/css/header.css">
    <link rel="stylesheet" href="tainguyen/css/footer.css">
    <link rel="stylesheet" href="tainguyen/css/chitietSP.css">

</head>
<body>

<?php include("thanhphanchung/header.php"); ?>

<div class="product-container">
    <div class="image">
        <img src="<?= $hinh ?>" alt="<?= $ten ?>">
    </div>
    <div class="details">
        <h2><?= $ten ?></h2>
        <div class="price"><?= $gia ?></div>
        <div class="buttons">
            <form method="POST" action="xuly_themvaogio.php">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit">🛒 Thêm vào giỏ</button>
            </form>
            <form method="POST" action="thanhtoan.php">
                <input type="hidden" name="muangay" value="1">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="ten" value="<?= $row['ten_san_pham'] ?>">
                <input type="hidden" name="gia" value="<?= preg_replace('/\D/', '', $row['gia']) ?>">
                <input type="hidden" name="hinh_anh" value="<?= $row['hinh_anh'] ?>">
                <input type="hidden" name="soluong" value="1">
                <button type="submit">⚡ Mua ngay</button>
            </form>
        </div>
        <div class="benefits">
            <div>✅ Miễn phí vận chuyển tại Hà Nội</div>
            <div>☑️ Đổi trả trong 7 ngày nếu lỗi</div>
            <div>🎯 Cam kết hàng chính hãng</div>
        </div>
        <a href="javascript:history.back()" class="back-link">← Quay lại</a>
    </div>
</div>

<div class="tabs">
    <h3>Mô tả sản phẩm</h3>
    <div class="tab-content">
        <?= $mota ?>
    </div>
</div>

<?php include("thanhphanchung/footer.php"); ?>
</body>
</html>
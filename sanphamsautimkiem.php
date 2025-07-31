<?php
$conn = mysqli_connect("localhost", "root", "", "web_baitaplon");
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
if ($keyword !== '') {
    $keyword_sql = mysqli_real_escape_string($conn, $keyword);
    $sql = "SELECT * FROM san_pham WHERE ten_san_pham LIKE '%$keyword_sql%'";
} else {
    $sql = "SELECT * FROM san_pham";
}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kết quả tìm kiếm</title>
    <link rel="stylesheet" href="tainguyen/css/header.css">
    <link rel="stylesheet" href="tainguyen/css/footer.css">
    <style>
        .product-listSP {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }
        .sanpham {
            width: 200px;
            background: white;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        .sanpham img {
            width: 100%;
            height: auto;
        }
        .sanpham h4 {
            font-size: 16px;
            margin: 10px 0;
        }
        .sanpham p {
            color: red;
        }
    </style>
</head>
<body>
<?php include("thanhphanchung/header.php"); ?>

<h2 style="padding: 20px;">Kết quả cho từ khóa: <em><?= htmlspecialchars($keyword) ?></em></h2>

<div class="product-listSP">
<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='sanpham'>";
    echo "<a href='chitiet.php?id={$row['id']}'>"; 

    echo "<img src='tainguyen/{$row['hinh_anh']}' alt='" . htmlspecialchars($row['ten_san_pham']) . "'>";
    echo "<h4>" . htmlspecialchars($row['ten_san_pham']) . "</h4>";
    echo "<p>" . number_format((int)preg_replace('/\D/', '', $row['gia']), 0, ',', '.') . "đ</p>";

    echo "</a>"; // 
    echo "</div>";
}
?>
</div>

<?php include("thanhphanchung/footer.php"); ?>
</body>
</html>
<?php
include('connect.php');
$id = $_GET['id'] ?? 0;

// Truy vấn dữ liệu sản phẩm
$sql = "SELECT * FROM anh_sp_mota WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            padding: 20px;
        }
        .image {
            flex: 1;
        }
        .image img {
            width: 100%;
            max-width: 600px;
        }
        .details {
            flex: 1;
            padding-left: 40px;
        }
        .details h2 {
            font-size: 28px;
        }
        .price {
            margin: 10px 0;
            font-size: 24px;
            color: red;
        }
        .price del {
            color: gray;
            margin-left: 10px;
        }
        .buttons {
            margin: 20px 0;
        }
        .buttons button {
            background-color: orange;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .benefits {
            margin: 10px 0;
        }
        .benefits div {
            margin: 5px 0;
        }
        .tabs {
            margin-top: 40px;
            border-top: 1px solid #ccc;
            padding: 10px;
        }
        .tabs ul {
            list-style: none;
            display: flex;
            padding: 0;
            font-weight: bold;
        }
        .tabs ul li {
            margin-right: 20px;
            cursor: pointer;
        }
        .tab-content {
            margin-top: 10px;
            background: #fafafa;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="image">
        <img src="<?php echo $row['anh']; ?>" alt="Sản phẩm">
    </div>
    <div class="details">
        <h2><?php echo $row['ten_san_pham']; ?></h2>
        <div class="price">
            <?php
                $gia = $row['gia'];
                echo htmlspecialchars($gia) . "đ";
            ?>
        </div>
        <div class="buttons">
            <button>Thêm vào giỏ hàng</button>
            <button>Mua ngay</button>
        </div>
        <div class="benefits">
            <div>✅ Miễn phí vận chuyển tại Hà Nội</div>
            <div>☑️ Đổi trả nếu sản phẩm lỗi</div>
            <div>✅ Cam kết chính hãng</div>
        </div>
    </div>
</div>

<div class="tabs">
    <ul>
        <li>Mô tả sản phẩm</li>
    </ul>
    <div class="tab-content">
        <?php echo $row['mo_ta']; ?>
    </div>
</div>

</body>
</html>

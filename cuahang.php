<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin cửa hàng - Lofi Furniture</title>
    <link rel="stylesheet" href="tainguyen/css/header.css">
    <link rel="stylesheet" href="tainguyen/css/footer.css">
    <style>
        .store-info {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            font-family: 'Roboto', sans-serif;
        }

        .store-info h2 {
            margin-bottom: 20px;
            color: #e85a33;
        }

        .store-info p {
            line-height: 1.7;
            font-size: 15px;
            color: #333;
            margin-bottom: 10px;
        }

        .map {
            margin-top: 30px;
            border: 1px solid #ccc;
            border-radius: 6px;
            overflow: hidden;
        }

        iframe {
            width: 100%;
            height: 400px;
            border: none;
        }
    </style>
</head>
<body>

<?php include 'thanhphanchung/header.php'; ?>

<div class="store-info">
    <h2>Thông tin cửa hàng</h2>
    <p><strong>Tên cửa hàng:</strong> Lofi Furniture</p>
    <p><strong>Địa chỉ:</strong> Số 123 Đường Nội Thất, Quận Hoàn Kiếm, Hà Nội</p>
    <p><strong>Số điện thoại:</strong> 1900 6750</p>
    <p><strong>Email:</strong> support@sapo.vn</p>
    <p><strong>Giờ mở cửa:</strong> 8:00 - 21:00 (Thứ 2 - Chủ Nhật)</p>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.925097802216!2d105.81628861538557!3d21.035761092927078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab7f6afc9c75%3A0x3f8ad0b3f9cf5c2e!2zQ8O0bmcgVHkgVGjDoG5oIFRodeG6rXQ!5e0!3m2!1svi!2s!4v1687771234567"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<?php include 'thanhphanchung/footer.php'; ?>

</body>
</html>

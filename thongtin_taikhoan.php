<?php
session_start();
include('connect.php');

if (!isset($_SESSION['id'])) {
    header('Location: dangnhap.php');
    exit();
}

$id = $_SESSION['id'];

// Lấy thông tin người dùng
$sql = "SELECT * FROM tai_khoan_nguoi_dung WHERE id = $id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="tainguyen/css/header.css">
    <link rel="stylesheet" href="tainguyen/css/footer.css">
    <style>
        * {
            font-family: Arial, sans-serif;
        }
        .user-info {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
            border-radius: 10px;
            font-size: 18px;
        }
        .user-info h2 {
            margin-bottom: 20px;
        }
        .logout-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 16px;
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout-button:hover {
            background: #c0392b;
        }
        .auth-banner {
            background-image: url("//bizweb.dktcdn.net/100/499/932/themes/926650/assets/breadcrumb-bg.jpg?1743048241538");
            background-size: cover;
            background-position: center;
            height: 250px;
            position: relative;
        }
        .auth-banner .overlay-dark {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* điều chỉnh độ tối ở đây */
            z-index: 1;
        }

        .auth-banner-overlay {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            text-align: center;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
            z-index: 2;
        }

        .auth-banner h1 {
            font-size: 28px;
            font-weight: bold;
        }

        .auth-banner p {
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <?php include('thanhphanchung/header.php'); ?>

    <!-- Banner và tiêu đề -->
    <section class="auth-banner">
        <div class="overlay-dark"></div>
        <div class="auth-banner-overlay">
            <h1>Thông tin tài khoản</h1>
            <p><a style="color:white" href="trangchu.php">Trang chủ</a> &gt; Thông tin tài khoản tài khoản</p>
        </div>
    </section>

    <div class="user-info">
        <h2>Xin chào, <?php echo htmlspecialchars($user['ho_ten']); ?>!</h2>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($user['so_dien_thoai']); ?></p>

        <a href="xuly_dangxuat.php" class="logout-button">Đăng xuất</a>
    </div>

    <?php include('thanhphanchung/footer.php'); ?>

</body>
</html>

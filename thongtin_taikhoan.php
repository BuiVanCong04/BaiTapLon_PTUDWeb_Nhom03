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
    </style>
</head>
<body>

    <?php include('thanhphanchung/header.php'); ?>

    <div class="user-info">
        <h2>Xin chào, <?php echo htmlspecialchars($user['ho_ten']); ?>!</h2>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($user['so_dien_thoai']); ?></p>

        <a href="xuly_dangxuat.php" class="logout-button">Đăng xuất</a>
    </div>

    <?php include('thanhphanchung/footer.php'); ?>

</body>
</html>

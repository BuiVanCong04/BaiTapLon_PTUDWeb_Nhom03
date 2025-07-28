<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="tainguyen/css/header.css">
    <link rel="stylesheet" href="tainguyen/css/footer.css">
    <link rel="stylesheet" href="tainguyen/css/dangki.css">
</head>

<body>
    <?php include("thanhphanchung/header.php"); ?>

    <!-- Banner và tiêu đề -->
    <section class="auth-banner">
        <div class="overlay-dark"></div>
        <div class="auth-banner-overlay">
            <h1>Đăng ký tài khoản</h1>
            <p><a href="trangchu.php">Trang chủ</a> &gt; Đăng ký tài khoản</p>
        </div>
    </section>

    <!-- Form đăng ký -->
    <main class="auth-wrapper">
        <div class="auth-form">
            <h2 class="form-heading">ĐĂNG KÝ</h2>
            <p class="form-sub">Đã có tài khoản, đăng nhập <a href="dangnhap.php">tại đây</a></p>
            <form action="xuly_dangki.php" method="POST">
                <input type="text" name="hoten" placeholder="Họ và tên" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="tel" name="sdt" placeholder="Số điện thoại" required />
                <input type="password" name="matkhau" placeholder="Mật khẩu" required />
                <input type="password" name="nhaplaimatkhau" placeholder="Nhập lại mật khẩu" required />
                <button type="submit" class="btn-login">Đăng ký</button>
            </form>
        </div>
    </main>

    <?php include("thanhphanchung/footer.php"); ?>
</body>

</html>

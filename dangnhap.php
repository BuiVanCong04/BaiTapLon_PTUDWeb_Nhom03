<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="tainguyen/css/header.css">
    <link rel="stylesheet" href="tainguyen/css/footer.css">
    <link rel="stylesheet" href="tainguyen/css/dangnhap.css">
</head>

<body>
    <?php include("thanhphanchung/header.php"); ?>

    <!-- Banner và tiêu đề -->
    <section class="auth-banner">
        <div class="overlay-dark"></div>
        <div class="auth-banner-overlay">
            <h1>Đăng nhập tài khoản</h1>
            <p><a href="trangchu.php">Trang chủ</a> &gt; Đăng nhập tài khoản</p>
        </div>
    </section>

    <!-- Form đăng nhập -->
    <main class="auth-wrapper">
        <div class="auth-form">
            <h2 class="form-heading">ĐĂNG NHẬP</h2>
            <p class="form-sub">Nếu bạn chưa có tài khoản, <a href="dangki.php">đăng ký tại đây</a></p>
            <form action="xuly_dangnhap.php" method="POST">
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Mật khẩu" required />
                <button type="submit" class="btn-login">Đăng nhập</button>
                <div class="form-links">
                    <a href="#">Quên mật khẩu</a>
                </div>
            </form>
        </div>
    </main>

    <?php include("thanhphanchung/footer.php"); ?>
</body>

</html>

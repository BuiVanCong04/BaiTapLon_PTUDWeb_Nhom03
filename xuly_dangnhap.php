<?php
include ('connect.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $matkhau = $_POST['password'];

    // Truy vấn kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM `tai_khoan_nguoi_dung` WHERE email = '$email' AND mat_khau = '$matkhau'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $row = mysqli_fetch_assoc($result); // Lấy dữ liệu người dùng

        $_SESSION["id"] = $row["id"]; // Hoặc tên cột id trong bảng của bạn
        $_SESSION["email"] = $row["email"];
        $_SESSION["hoten"] = $row["ho_ten"]; 

        echo "<script>
                alert('Đăng nhập thành công!');
                window.location.href = 'trangchu.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Tên đăng nhập hoặc mật khẩu không chính xác!');
                window.location.href = 'dangnhap.php';
              </script>";
        exit();
    }
}
?>

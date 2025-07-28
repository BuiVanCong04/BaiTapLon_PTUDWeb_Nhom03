<?php
    include('connect.php');

    //hiện lỗi chi tiết
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if(!empty($_POST['hoten'])
        && !empty($_POST['email'])
        && !empty($_POST['sdt'])
        && !empty($_POST['matkhau'])
        && !empty($_POST['nhaplaimatkhau'])
    ){
        // Lấy dữ liệu từ form: 
        $ten_khach_hang = $_POST['hoten'];
        $email= $_POST['email'];
        $sdt= $_POST['sdt'];
        $matkhau= $_POST['matkhau'];
        $nhaplaimatkhau= $_POST['nhaplaimatkhau'];

        if($matkhau != $nhaplaimatkhau){
            echo "Vui lòng nhập lại mật khẩu";
        }
        else{
            $sql = "INSERT INTO `tai_khoan_nguoi_dung`(`ho_ten`, `email`, `so_dien_thoai`, `mat_khau`) 
            VALUES ('$ten_khach_hang','$email','$sdt','$matkhau')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>
                    alert('Đăng ký thành công! Vui lòng bấm Ok để đăng nhập');
                    window.location.href = 'dangnhap.php';
                </script>";
                exit();
            } else {
                echo "Lỗi khi thêm dữ liệu: " . mysqli_error($conn);
            }
        }
    }
?>

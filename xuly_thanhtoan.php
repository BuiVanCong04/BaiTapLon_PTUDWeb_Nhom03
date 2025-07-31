<?php
session_start();
include("connect.php");

if (!isset($_SESSION["id"])) {
    echo "<script>alert('Vui lòng đăng nhập!'); window.location.href='dangnhap.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email   = $_POST["email"];
    $hoten   = $_POST["hoten"];
    $sdt     = $_POST["sdt"];
    $diachi  = $_POST["diachi"];
    $tinh    = $_POST["tinh"];
    $quan    = $_POST["quan"];
    $phuong  = $_POST["phuong"];
    $ghichu  = $_POST["ghichu"];
    $pttt    = $_POST["pttt"];
    $id_user = $_SESSION["id"];
    $ngaydat = date("Y-m-d H:i:s");
    $tong = 0;

    // Xử lý MUA NGAY
    if (!empty($_SESSION["muangay"])) {
        $sp = $_SESSION["muangay"];
        $tong = $sp["gia"] * $sp["so_luong"];

        $sql = "INSERT INTO don_hang (id_nguoi_dung, ho_ten, email, sdt, dia_chi, tinh, quan, phuong, ghi_chu, tong_tien, ngay_dat, phuong_thuc_tt)
                VALUES ('$id_user', '$hoten', '$email', '$sdt', '$diachi', '$tinh', '$quan', '$phuong', '$ghichu', '$tong', '$ngaydat', '$pttt')";
        mysqli_query($conn, $sql);
        $id_donhang = mysqli_insert_id($conn);

        $sql_ct = "INSERT INTO chi_tiet_don_hang (id_don_hang, id_san_pham, ten_san_pham, so_luong, gia, thanh_tien)
                   VALUES ('$id_donhang', '{$sp['id']}', '{$sp['ten']}', '{$sp['so_luong']}', '{$sp['gia']}', '$tong')";
        mysqli_query($conn, $sql_ct);

        unset($_SESSION["muangay"]);
    } 
    // Xử lý từ giỏ hàng
    elseif (!empty($_SESSION["giohang"])) {
        foreach ($_SESSION["giohang"] as $item) {
            $tong += $item["gia"] * $item["so_luong"];
        }

        $sql = "INSERT INTO don_hang (id_nguoi_dung, ho_ten, email, sdt, dia_chi, tinh, quan, phuong, ghi_chu, tong_tien, ngay_dat, phuong_thuc_tt)
                VALUES ('$id_user', '$hoten', '$email', '$sdt', '$diachi', '$tinh', '$quan', '$phuong', '$ghichu', '$tong', '$ngaydat', '$pttt')";
        mysqli_query($conn, $sql);
        $id_donhang = mysqli_insert_id($conn);

        foreach ($_SESSION["giohang"] as $item) {
            $tt = $item["gia"] * $item["so_luong"];
            $sql_ct = "INSERT INTO chi_tiet_don_hang (id_don_hang, id_san_pham, ten_san_pham, so_luong, gia, thanh_tien)
                       VALUES ('$id_donhang', '{$item['id']}', '{$item['ten']}', '{$item['so_luong']}', '{$item['gia']}', '$tt')";
            mysqli_query($conn, $sql_ct);
        }

        unset($_SESSION["giohang"]);
    } else {
        echo "<script>alert('Không có sản phẩm.'); window.location.href='giohang.php';</script>";
        exit();
    }

    echo "<script>alert('Đặt hàng thành công!'); window.location.href='trangchu.php';</script>";
    exit();
} else {
    header("Location: thanhtoan.php");
    exit();
}
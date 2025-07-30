<?php 
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tất cả sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="tainguyen/css/header.css">
    <link rel="stylesheet" href="tainguyen/css/footer.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f5f5;
        }

        .containerSP {
            display: flex;
            padding: 20px;
        }

        .sidebarSP {
            position: sticky;
            top: 20px;
            align-self: flex-start;
            width: 250px;
            padding: 20px;
            background: white;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        .sidebarSP h3 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .productsSP {
            width: 80%;
            padding: 20px;
        }

        .product-listSP {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .sanpham {
            background: white;
            width: calc(33.333% - 20px);
            box-shadow: 0 0 5px #ccc;
            text-align: center;
            padding: 10px;
            box-sizing: border-box;
        }

        .sanpham img {
            width: 100%;
            height: auto;
        }

        .sanpham h4 {
            font-size: 16px;
            margin: 10px 0 5px;
            color: #333;
        }

        .sanpham p {
            color: #d40000;
            font-weight: bold;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        a:hover h4 {
            color: #6a1b9a;
        }

    </style>
</head>

<body>
    <?php include("thanhphanchung/header.php"); ?>

    <main class="containerSP">
        <aside class="sidebarSP">
            <h3>DANH MỤC SẢN PHẨM</h3>
            <ul>
                <li>Bồn tắm</li>
                <li>Bồn cầu</li>
                <li>Sen tắm</li>
                <li>Tủ chậu Lavabo</li>
            </ul>

            <h3>CHỌN MỨC GIÁ</h3>
            <form>
                <label><input type="checkbox"> Dưới 500.000đ</label><br>
                <label><input type="checkbox"> 500.000đ - 3.000.000đ</label><br>
                <label><input type="checkbox"> 3.000.000đ - 100.000.000đ</label>
            </form>
        </aside>

        <section class="productsSP">
            <div class="product-listSP">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "btl");
                $sql = "SELECT * FROM anh_sp_mota";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='sanpham'>";
                    echo "<a href='chitietSP.php?id={$row['id']}'>";
                    echo "<img src='{$row['anh']}' alt='{$row['ten_san_pham']}'>";
                    echo "<h4>" . htmlspecialchars($row['ten_san_pham']) . "</h4>";
                    
                    // Chuyển giá từ chuỗi sang số trước khi định dạng
                    $gia = preg_replace('/[^0-9]/', '', $row['gia']); 
                    $gia_dinh_dang = number_format((int)$gia, 0, ',', '.') . 'đ';

                    echo "<p>$gia_dinh_dang</p>";
                    echo "</a>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>
    </main>

   <?php include("thanhphanchung/footer.php"); ?>
</body>

</html>

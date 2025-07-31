
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tất cả sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../tainguyen/css/header.css">
    <link rel="stylesheet" href="../tainguyen/css/footer.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f5f5;
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
        .sanpham{ transition: transform .25s, box-shadow .25s; }
        .sanpham:hover{ transform: translateY(-4px); box-shadow: 0 12px 24px rgba(0,0,0,.12); }
        .sanpham img{ transition: transform .4s; }
        .sanpham:hover img{ transform: scale(1.05); }

    </style>
</head>

<body>
    <?php include("../thanhphanchung/header.php"); ?>

    <!-- Banner và tiêu đề -->
    <section class="auth-banner">
        <div class="overlay-dark"></div>
        <div class="auth-banner-overlay">
            <h1>Sản phẩm</h1>
            <p>Trang chủ&gt; Tất cả sản phẩm</p>
        </div>
    </section>

    <main class="containerSP">
        <aside class="sidebarSP">
            <h3>DANH MỤC SẢN PHẨM</h3>
                <a href="/Web_BaiTapLon/danhmucsanpham/bontam.php">- Bồn tắm</a><br>
                <a href="/Web_BaiTapLon/danhmucsanpham/boncau.php">- Bồn cầu</a><br>
                <a href="/Web_BaiTapLon/danhmucsanpham/sentam.php">- Sen tắm</a><br>
                <a href="/Web_BaiTapLon/danhmucsanpham/lavabo.php">- Tủ chậu Lavabo</a><br>

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
                $boncau = "boncau";

                $conn = mysqli_connect("localhost", "root", "", "web_baitaplon");
                $sql = "SELECT * FROM san_pham WHERE `id_loai_sp`='$boncau'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='sanpham'>";
                    echo "<a href='../chitietSP.php?id={$row['id']}'>";

                    $img = '../tainguyen/' . $row['hinh_anh'];  // Đường dẫn đúng
                    echo "<img src='$img' alt='" . htmlspecialchars($row['ten_san_pham']) . "'>";

                    echo "<h4>" . htmlspecialchars($row['ten_san_pham']) . "</h4>";

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

   <?php include("../thanhphanchung/footer.php"); ?>
</body>

</html>
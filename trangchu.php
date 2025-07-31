<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lofi Furniture</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="tainguyen/css/header.css">
    <link rel="stylesheet" href="tainguyen/css/footer.css">
    <link rel="stylesheet" href="tainguyen/css/trangchu.css">
    <script src="tainguyen/js/trangchu.js"></script>
</head>

<body>

    <?php include("thanhphanchung/header.php"); ?> 

    <!-- banner  -->
    <div class="hero-banner">
        <div class="slide active">
            <img src="tainguyen/images/img_trangchu/slider_1.webp" style="width:100%; height:100%; object-fit: cover;">
            <div class="hero-content">
                <h1>Đương đại cổ điển</h1>
                <p>Những vật liệu tốt nhất kết hợp với kỹ năng truyền thống tạo nên vẻ ngoài hoàn hảo</p>
                <a href="sanpham.php" class="btn-mua">MUA NGAY</a>
            </div>
        </div>
        <div class="slide">
            <img src="tainguyen/images/img_trangchu/slider_2.webp" style="width:100%; height:100%; object-fit: cover;">
            <div class="hero-content">
                <h1>Không gian sang trọng</h1>
                <p>Thiết kế hiện đại, tinh tế cho phòng tắm đẳng cấp</p>
                <a href="sanpham.php" class="btn-mua">MUA NGAY</a>
            </div>
        </div>
    </div>

    <!-- danh mục nổi bật  -->
    <section class="danh-muc">
        <h2>Danh mục nổi bật</h2>
        <div class="danh-muc-list">
            <div class="danh-muc-item">
                <a href="/Web_BaiTapLon/danhmucsanpham/bontam.php" style="text-decoration: none; color: black">
                <img src="tainguyen/images/img_trangchu/bon-tam.webp" alt="Bồn tắm">
                <div class="title">Bồn tắm</div> </a>
            </div>
            <div class="danh-muc-item">
                <a href="/Web_BaiTapLon/danhmucsanpham/boncau.php" style="text-decoration: none; color: black">
                <img src="tainguyen/images/img_trangchu/bon-cau.webp" alt="Bồn cầu">
                <div class="title">Bồn cầu</div> </a>
                
            </div>
            <div class="danh-muc-item">
                <a href="/Web_BaiTapLon/danhmucsanpham/sentam.php" style="text-decoration: none; color: black">
                <img src="tainguyen/images/img_trangchu/sen-tam.webp" alt="Sen tắm">
                <div class="title">Sen tắm</a></div> </a>
 
            </div>
            <div class="danh-muc-item">
                <a href="/Web_BaiTapLon/danhmucsanpham/lavabo.php" style="text-decoration: none; color: black">
                <img src="tainguyen/images/img_trangchu/chau-lavabo.webp" alt="Tủ chậu Lavabo">
                <div class="title">Tủ chậu Lavabo</a></div> </a>
   
            </div>
        </div>
    </section>

    <!-- Giới thiệu ctoi  -->
    <section class="about-section">
        <div class="about-image">
            <img src="tainguyen/images/img_trangchu/about-image.webp" alt="Phòng tắm">
        </div>
        <div class="about-content">
            <h4>Về chúng tôi</h4>
            <h2>Tìm hiểu thêm về chúng tôi và lý do tại sao nên chọn chúng tôi</h2>
            <p>
            Với mong muốn mang đến cho khách hàng những sản phẩm thiết bị vệ sinh chính hãng từ các hãng sản xuất trong và ngoài nước. 
            Chúng tôi luôn lắng nghe và đưa ra cho khách hàng những lời khuyên, lời chia sẻ chân thành. 
            Cùng với đó là quy trình mua hàng, giao hàng nhanh chóng, thuận tiện cho khách hàng.
            </p>
            <ul class="features-list">
            <li>Chất lượng hàng đầu</li>
            <li>Gọn gàng và đẹp mắt</li>
            <li>Giá cả phải chăng</li>
            <li>Hỗ trợ của Chuyên gia</li>
            </ul>
        </div>
    </section>

    <!-- Sản phẩm mới -->
    <section class="san-pham-moi">
        <h2>Sản phẩm mới</h2>
        <div class="grid">
            <?php
            include("connect.php");
            $sql = "SELECT * FROM san_pham ORDER BY id DESC LIMIT 8";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="product">
                <a href="chitietSP.php?id=<?= $row['id'] ?>" style="text-decoration: none; color: inherit;" aria-label="<?= htmlspecialchars($row['ten_san_pham']) ?>">
                    <div class="image-container">
                        <img src="tainguyen/<?= htmlspecialchars($row['hinh_anh']) ?>" alt="<?= htmlspecialchars($row['ten_san_pham']) ?>" loading="lazy">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name"><?= htmlspecialchars($row['ten_san_pham']) ?></h3>
                        <p class="product-price"><?= number_format($row['gia'], 0, ",", ".") ?>đ</p>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </section>


    <!-- xây dựng phòng tắm  -->
    <section class="hero">
        <div class="hero-content">
            <h1>Xây dựng phòng tắm</h1>
            <p>Khám phá bộ sưu tập đầy đủ các sản phẩm phòng tắm của Lofi được thiết kế cho ngôi nhà của bạn.</p>
            <a href="sanpham.php" class="btn-mua">MUA NGAY</a>
        </div>
    </section>

    <!-- feedback  -->
    <section class="testimonial-section">
        <div class="testimonial-image">
            <img src="tainguyen/images/img_trangchu/anh-feedback.png" alt="Khách hàng">
        </div>

        <div class="testimonial-content">
            <h2>Khách hàng nói gì về chúng tôi</h2>
            <div class="testimonial-boxes">
                <div class="testimonial-box">
                <div class="testimonial-header">
                    <img src="tainguyen/images/img_trangchu/testimonials_image_1.webp" alt="Lưu Phương Huyền">
                    <div>
                    <div class="testimonial-name">Lưu Phương Huyền</div>
                    <div class="testimonial-role">Freelancer Designer</div>
                    </div>
                </div>
                <div class="testimonial-quote">
                    Sản phẩm tốt, thái độ phục vụ chu đáo, đây là nơi tôi luôn tin tưởng suốt thời gian qua. Tôi sẽ luôn tiếp tục ủng hộ trong thời gian tới.
                </div>
                <div class="quote-icon">❝❞</div>
                </div>

                <div class="testimonial-box">
                <div class="testimonial-header">
                    <img src="tainguyen/images/img_trangchu/testimonials_image_2.webp" alt="Trang Lou">
                    <div>
                    <div class="testimonial-name">Trang Lou</div>
                    <div class="testimonial-role">Người Mẫu</div>
                    </div>
                </div>
                <div class="testimonial-quote">
                    Nội thất LOFI FURNITURE có rất nhiều món đồ nội thất dễ thương như ghế thư giãn, ghế đơn thú màu sắc tươi mới.
                </div>
                <div class="quote-icon">❝❞</div>
                </div>
            </div>

        </div>
    </section>

    <?php include("thanhphanchung/footer.php"); ?>
    <script src="tainguyen/js/header.js"></script>
</body>

</html>

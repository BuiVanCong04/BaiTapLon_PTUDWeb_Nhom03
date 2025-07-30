<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="tainguyen/css/header.css">
    <link rel="stylesheet" href="tainguyen/css/footer.css">
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            align-items: flex-start; /* Căn top cho các item trong flex container */
        }

        .map {
            flex: 1;
            min-width: 350px;
            height: 500px;
            padding: 15px 0;
        }

        .contact {
            flex: 1;
            min-width: 350px;
            padding: 10px 60px;
        }

        .contact p {
            line-height: 2.2;
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
    <?php include("thanhphanchung/header.php"); ?>

    <!-- Banner và tiêu đề -->
    <section class="auth-banner">
        <div class="overlay-dark"></div>
        <div class="auth-banner-overlay">
            <h1>Thông tin liên hệ</h1>
            <p><a style="color:white" href="trangchu.php">Trang chủ</a> &gt; Liên hệ</p>
        </div>
    </section>

    <div class="container">
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.374205312403!2d110.67045767459476!3d-6.600331564520466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e711f90737fb315%3A0x6d5c17f2b3f134ad!2sLofi%20Furniture!5e0!3m2!1svi!2s!4v1753838796641!5m2!1svi!2s"
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
            ></iframe>
        </div>

        <div class="contact">
            <h2>Cửa hàng nội thất Lofi Furniture</h2>
            <div class="info">
                <p><strong>📍 Địa chỉ:</strong> 18 Phố Viên, P. Đức Thắng, Q. Bắc Từ Liêm, TP Hà Nội</p>
                <p><strong>📧 Email:</strong> lofifurniture@gmail.com</p>
                <p><strong>📞 Hotline:</strong> 1900 6750</p>
            </div>

            <h3>Liên hệ với chúng tôi</h3>
            <p>Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể.</p>
        </div>
    </div>

    <?php include("thanhphanchung/footer.php"); ?>
    <script src="tainguyen/js/header.js"></script>
</body>

</html>
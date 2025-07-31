<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $conn = new mysqli("localhost", "root", "", "web_baitaplon");
    $conn->set_charset("utf8mb4");

    if ($conn->connect_error) {
        die(" Kết nối thất bại: " . $conn->connect_error);
    }

    if (!empty($_POST["keyword"])) {
        $keyword = "%" . $_POST["keyword"] . "%";
        $stmt = $conn->prepare("SELECT * FROM san_pham WHERE ten_san_pham LIKE ? LIMIT 5");
        if (!$stmt) {
            die(" Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo '<div class="suggestion-item" onclick="location.href=\'chitietSP.php?id=' . $row["id"] . '\'">';
            echo '  <div class="thumbnail-wrapper">';
            echo '    <img src="tainguyen/' . htmlspecialchars($row["hinh_anh"]) . '" alt="ảnh" style="width: 50px; height: 50px; object-fit: cover;">';
            echo '  </div>';
            echo '  <div class="suggestion-text">';
            echo '    <div class="product-name">' . htmlspecialchars($row["ten_san_pham"]) . '</div>';
            echo '    <div class="product-price" style="color:#e85a33;">' . number_format($row["gia"], 0, ',', '.') . 'đ</div>';
            echo '  </div>';
            echo '</div>';
        }

        $stmt->close();
    }
    $conn->close();
?>
<!-- KẾT NỐI SANG CƠ SỞ DỮ LIỆU  -->
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "web_baitaplon";   //nối sang sql
    $port = 3306;

    // Create connection  kết nối sang database 
    $conn = mysqli_connect($servername, $username, $password, $database, $port);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());    
        // Dừng chương trình PHP ngay lập tức và hiển thị thông báo lỗi kết nối cơ sở dữ liệu nếu kết nối thất bại. 
    }
    // echo "Connected successfully"; 
?>
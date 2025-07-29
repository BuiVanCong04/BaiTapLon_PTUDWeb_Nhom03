<?php
// Hiển thị lỗi để debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "shop");
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("❌ Kết nối thất bại: " . $conn->connect_error);
}

// Lấy ID sản phẩm từ URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM san_pham WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<?php include 'thanhphanchung/header.php'; ?>

<!-- CSS riêng cho phần chi tiết -->
<style>
  .product-detail {
    text-align: center;
    max-width: 700px;
    margin: 40px auto;
    padding: 20px;
  }

  .product-detail img {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
    border-radius: 6px;
    border: 1px solid #eee;
  }

  .product-detail h2 {
    font-size: 26px;
    margin-bottom: 10px;
  }

  .product-detail .price {
    color: #e85a33;
    font-size: 22px;
    font-weight: bold;
    margin-bottom: 12px;
  }

  .product-detail .desc {
    font-size: 16px;
    color: #333;
    margin-bottom: 20px;
  }

  .btn-info-store {
    display: inline-block;
    background-color: #e44d26;
    color: #fff;
    padding: 10px 18px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    font-size: 15px;
    border: none;
    transition: background-color 0.3s ease;
    cursor: pointer;
  }

  .btn-info-store:hover {
    background-color: #d63c1b;
  }
</style>

<!-- Nội dung sản phẩm -->
<div class="product-detail">
  <?php if ($row): ?>
    <img src="tainguyen/<?php echo htmlspecialchars($row['hinh_anh']); ?>" alt="<?php echo htmlspecialchars($row['ten_san_pham']); ?>">
    <h2><?php echo htmlspecialchars($row['ten_san_pham']); ?></h2>
    <div class="price"><?php echo number_format($row['gia'], 0, ',', '.') . ' đ'; ?></div>
    <button onclick="location.href='cuahang.php'" class="btn-info-store" title="Thông tin cửa hàng">
      <i class="fas fa-store"></i> Xem cửa hàng
    </button>
  <?php else: ?>
    <p>Không tìm thấy sản phẩm.</p>
  <?php endif; ?>
</div>

<?php include 'thanhphanchung/footer.php'; ?>

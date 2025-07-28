<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="site-header">
  <!-- Phần topbar -->
  <div class="topbar">
    <div class="container">
      <div class="topbar-left">
        <i class="fas fa-phone"></i> 1900 6750
        <i class="fas fa-envelope"></i> support@sapo.vn
      </div>
      <div class="topbar-right">
        <span><i class="fas fa-box"></i> Kiểm tra đơn hàng</span>
      </div>
    </div>
  </div>

  <!-- Logo, tìm kiếm và icon -->
  <div class="middlebar">
    <div class="container">
      <div class="logo">
        <a href="trangchu.php">
          <span style="font-size: 28px; font-weight: bold;">Lofi <span style="color: #e85a33;">Furniture</span></span>
          <img src="tainguyen/images/logo-bontam.png" alt="Bồn tắm" style="height: 32px;">
        </a>
      </div>
      <div class="search-bar">
        <input type="text" placeholder="Bồn tắm">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="header-icons">
        <a href="<?php echo isset($_SESSION['id']) ? 'thongtin_taikhoan.php' : 'dangnhap.php'; ?>" class="icon-group">
          <i class="fas fa-user"></i><span>Tài khoản</span>
        </a>
        <a href="giohang.php" class="icon-group">
          <i class="fas fa-shopping-bag"></i><span>Giỏ hàng</span><span class="badge">0</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Thanh menu -->
  <nav class="main-nav">
    <div class="container">
      <ul>
        <li><a href="trangchu.php">Trang chủ</a></li>
        <li><a href="gioithieu.php">Giới thiệu</a></li>
        <li><a href="sanpham.php">Sản phẩm <i class="fas fa-caret-down"></i></a></li>
        <li><a href="lienhe.php">Liên hệ</a></li>
      </ul>
    </div>
  </nav>
</header>

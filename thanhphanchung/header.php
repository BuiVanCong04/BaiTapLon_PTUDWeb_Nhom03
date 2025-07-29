<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- HEADER -->
<header class="site-header">
  <!-- Topbar -->
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

  <!-- Middlebar: Logo - Tìm kiếm - Icon -->
  <div class="middlebar">
    <div class="container">
      <div class="logo">
        <a href="/BaiTapLon_PTUDWeb_Nhom03/trangchu.php">
          <span style="font-size: 28px; font-weight: bold;">Lofi <span style="color: #e85a33;">Furniture</span></span>
          <img src="/BaiTapLon_PTUDWeb_Nhom03/tainguyen/images/logo-bontam.png" alt="Bồn tắm" style="height: 32px;">
        </a>
      </div>

      <!-- Thanh tìm kiếm -->
      <form method="POST" action="/BaiTapLon_PTUDWeb_Nhom03/search.php" class="search-bar">
        <input type="text" name="keyword" id="search-box" placeholder="Tìm sản phẩm..." autocomplete="off">
        <button type="submit"><i class="fas fa-search"></i></button>
        <div id="suggestion-box" style="display: none;"></div>
      </form>

      <!-- Icon tài khoản và giỏ hàng -->
      <div class="header-icons">
        <a href="<?php echo isset($_SESSION['id']) ? '/BaiTapLon_PTUDWeb_Nhom03/thongtin_taikhoan.php' : '/BaiTapLon_PTUDWeb_Nhom03/dangnhap.php'; ?>" class="icon-group">
          <i class="fas fa-user"></i><span>Tài khoản</span>
        </a>
        <a href="/BaiTapLon_PTUDWeb_Nhom03/giohang.php" class="icon-group">
          <i class="fas fa-shopping-bag"></i><span>Giỏ hàng</span><span class="badge">0</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Navigation menu -->
  <nav class="main-nav">
    <div class="container">
      <ul>
        <li><a href="/BaiTapLon_PTUDWeb_Nhom03/trangchu.php">Trang chủ</a></li>
        <li><a href="/BaiTapLon_PTUDWeb_Nhom03/gioithieu.php">Giới thiệu</a></li>
        <li><a href="/BaiTapLon_PTUDWeb_Nhom03/sanpham.php">Sản phẩm <i class="fas fa-caret-down"></i></a></li>
        <li><a href="/BaiTapLon_PTUDWeb_Nhom03/lienhe.php">Liên hệ</a></li>
      </ul>
    </div>
  </nav>
</header>

<!-- Thư viện & JS -->
<link rel="stylesheet" href="/BaiTapLon_PTUDWeb_Nhom03/tainguyen/css/header.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/BaiTapLon_PTUDWeb_Nhom03/tainguyen/js/search.js"></script>

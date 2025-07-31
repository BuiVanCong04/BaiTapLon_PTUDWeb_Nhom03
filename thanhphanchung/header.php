<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="site-header" style="font-family: Arial">
  <!-- Phần topbar -->
  <div class="topbar">
    <div class="container">
      <div class="topbar-left">
        <i class="fas fa-phone"></i> 1900 6750
        <i class="fas fa-envelope"></i> lofifurniture@gmail.com
      </div>
      <div class="topbar-right">
        <span><i class="fas fa-box"></i> Nội thất đẹp</span>
      </div>
    </div>
  </div>

  <!-- Logo, tìm kiếm và icon -->
  <div class="middlebar">
    <div class="container">
      <div class="logo">
        <a href="/Web_BaiTapLon/trangchu.php">
          <span style="font-size: 28px; font-weight: bold;">Lofi <span style="color: #e85a33;">Furniture</span></span>
          <img src="tainguyen/images/logo-bontam.png" alt="Bồn tắm" style="height: 32px;">
        </a>
      </div>

      <!-- Thanh tìm kiếm / NGUYÊN-->

      <form action="sanphamsautimkiem.php" method="get" class="search-bar" id="search-form">
        <input type="text" name="keyword" id="search-box" placeholder="Tìm sản phẩm..." autocomplete="off">
        <button type="submit"><i class="fas fa-search"></i></button> 
        <div id="suggestion-box" style="display: none;"></div>
      </form>

      <!-- Icon giỏ hàng  -->
      <div class="header-icons">
        <a href="/Web_BaiTapLon/<?php echo isset($_SESSION['id']) ? 'thongtin_taikhoan.php' : 'dangnhap.php'; ?>" class="icon-group">
          <i class="fas fa-user"></i><span>Tài khoản</span>
        </a>
        <a href="/Web_BaiTapLon/giohang.php" class="icon-group">
          <i class="fas fa-shopping-bag"></i><span>Giỏ hàng</span><span class="badge">0</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Thanh menu -->
  <nav class="main-nav">
    <div class="container">
      <ul>
        <li><a href="/Web_BaiTapLon/trangchu.php">Trang chủ</a></li>
        <li><a href="/Web_BaiTapLon/gioithieu.php">Giới thiệu</a></li>

        <!-- Trỏ vào sản phẩm hiện ra danh sách đề mục các sản phẩm -->
        <li class="has-mega-menu">
          <a href="/Web_BaiTapLon/sanpham.php">Sản phẩm <i class ="fas fa-caret-down"></i></a>
          <div class="mega-menu">
            <div class="mega-column">
              <h4>Danh mục</h4>
              <ul>
                <li><a href="/Web_BaiTapLon/danhmucsanpham/bontam.php">Bồn tắm</a></li>
                <li><a href="/Web_BaiTapLon/danhmucsanpham/boncau.php">Bồn cầu</a></li>
                <li><a href="/Web_BaiTapLon/danhmucsanpham/sentam.php">Sen tắm</a></li>
                <li><a href="/Web_BaiTapLon/danhmucsanpham/lavabo.php">Tủ chậu Lavabo</a></li>
              </ul>
            </div>
          </div>
        </li>
        <li><a href="/Web_BaiTapLon/lienhe.php">Liên hệ</a></li>
      </ul>
    </div>
  </nav>
</header>

<!-- Thư viện & JS phần tìm kiếm /NGUYÊN -->
<link rel="stylesheet" href="tainguyen/css/header.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="tainguyen/js/timkiem.js"></script> 

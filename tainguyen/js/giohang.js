function dinhDangTienTe(giaTri) {
    return giaTri.toLocaleString('vi-VN') + '₫';
}

function capNhatSoLuong(nut, thayDoi) {
    const oNhap = nut.parentNode.querySelector('input');
    let soLuong = parseInt(oNhap.value);
    soLuong = isNaN(soLuong) ? 1 : soLuong + thayDoi;
    if (soLuong < 1) soLuong = 1;
    oNhap.value = soLuong;

    capNhatTongTien();
}

function xoaSanPham(link) {
    const dong = link.closest('tr');
    dong.remove();
    capNhatTongTien();
}

function capNhatTongTien() {
    const cacDong = document.querySelectorAll("tbody tr");
    let tongTien = 0;

    cacDong.forEach(dong => {
        const gia = parseInt(dong.querySelector('.unit-price').getAttribute('data-price'));
        const soLuong = parseInt(dong.querySelector('input').value);
        const thanhTien = gia * soLuong;
        dong.querySelector('.total-price').textContent = dinhDangTienTe(thanhTien);
        tongTien += thanhTien;
    });

    document.querySelector('.total span#total-amount').textContent = dinhDangTienTe(tongTien);
}

// Gán sự kiện khi DOM đã load
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.quantity-control button').forEach(btn => {
        btn.addEventListener('click', () => {
            const delta = btn.textContent === '+' ? 1 : -1;
            capNhatSoLuong(btn, delta);
        });
    });

    // Cập nhật lại tổng ngay từ đầu nếu có dữ liệu
    capNhatTongTien();
});

function switchTab(tab) {
    // Remove active class from all tabs
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));
    
    // Add active class to clicked tab
    event.target.classList.add('active');
    document.getElementById(tab + '-content').classList.add('active');
}

function selectPayment(element) {
    // Remove selected class from all payment options
    document.querySelectorAll('.payment-option').forEach(po => po.classList.remove('selected'));
    
    // Add selected class to clicked option
    element.classList.add('selected');
    
    // Check the radio button
    element.querySelector('input[type="radio"]').checked = true;
}

// Add form validation
document.querySelector('.btn-primary').addEventListener('click', function(e) {
    const email = document.querySelector('input[type="email"]').value;
    const name = document.querySelector('input[placeholder="Họ và tên"]').value;
    
    if (!email || !name) {
        e.preventDefault();
        alert('Vui lòng điền đầy đủ thông tin bắt buộc!');
        return false;
    }
    
    // Simulate order processing
    this.innerHTML = 'Đang xử lý...';
    this.disabled = true;
    
    setTimeout(() => {
        alert('Đặt hàng thành công! Cảm ơn bạn đã mua hàng.');
        this.innerHTML = 'ĐẶT HÀNG';
        this.disabled = false;
    }, 2000);
});

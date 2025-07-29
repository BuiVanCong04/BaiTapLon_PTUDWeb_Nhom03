window.onload = () => {
  // Nạp header
  fetch("/shop/thanhphanchung/header.html")
    .then((res) => res.text())
    .then((data) => {
      document.getElementById("header").innerHTML = data;
    });

  // Nạp footer
  fetch("/shop/thanhphanchung/footer.html")
    .then((res) => res.text())
    .then((data) => {
      document.getElementById("footer").innerHTML = data;
    });
};
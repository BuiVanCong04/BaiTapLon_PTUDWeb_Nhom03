document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector(".site-header");
    if (!header) return;
    window.addEventListener("scroll", () => {
        if(window.scroll > 0) {
            header.classList.add("fixed-header");
        } else {
            header.classList.remove("fixed-header");
        }
    });
}
);

// phần chuyển từ header tĩnh chưa cuộn sang cuộn mà header có thể cố định 
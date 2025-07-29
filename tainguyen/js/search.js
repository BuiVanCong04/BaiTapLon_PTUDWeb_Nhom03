

$(document).ready(function () {
  $(document).on("input", "#search-box", function () {
    let keyword = $(this).val();

    if (keyword.length > 0) {
      $.ajax({
        url: "search.php",
        type: "POST",
        data: { keyword: keyword },
        success: function (data) {
          $("#suggestion-box").html(data).show();
        },
        error: function (xhr, status, error) {
          console.log("Lỗi gọi search.php:", error);
        }
      });
    } else {
      $("#suggestion-box").hide();
    }
  });
});

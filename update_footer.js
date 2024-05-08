// File: updateFooter.js
$(document).ready(function() {
    $('#btnxacnhan').click(function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của nút submit
        var name = $('#name').val();
        var sdt = $('#sdt').val();
        var email = $('#email').val();

        $.ajax({
            type: 'POST',
            url: 'update_footer.php',
            data: {
                name: name,
                sdt: sdt,
                email: email
            },
            success: function(response) {
                // Cập nhật giá trị email và số điện thoại trong footer
                $('#footer-email').text(email);
                $('#footer-phone').text(sdt);
                alert("Cập nhật thành công!");
            },
            error: function(xhr, status, error) {
                alert("Lỗi khi cập nhật: " + error);
            }
        });
    });
});

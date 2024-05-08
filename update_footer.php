<?php
session_start();
if(isset($_POST['sdt']) && isset($_POST['email'])) {
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];

    // Cập nhật dữ liệu trong session
    $_SESSION['footer_sdt'] = $sdt;
    $_SESSION['footer_email'] = $email;

    echo "Thành công!";
} else {
    echo "Không có dữ liệu được gửi!";
}
?>

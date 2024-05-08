<?php 
require_once('entities/account.php');
require_once('entities/subject.class.php');
session_start();
if(isset($_SESSION['username']))
{
$user=$_SESSION['username'];
}
if(isset($_POST['btnxacnhan'])){
  $name=$_POST['name'];
  $sdt=$_POST['sdt'];
  $email=$_POST['email'];
  $result=User::update_User($name,$user);
  if(isset($result)){
		if(!$result){
			echo '<script>alert("không thêm được!")</script>';
			$again = true;
		}
		else{
      echo '<script>
    var sdt = $("input[name=\'sdt\']").val();
    var email = $("input[name=\'email\']").val(); 
    $.ajax({
        url: "footer.php",
        method: "post",
        data: $("#frm").serialize(), // Sử dụng serialize() với id của form
        success: function(response){
            alert("Thành công");
        },
        error: function(xhr, status, error){
            alert("Lỗi: " + error);
        }
    });
</script>';

			echo '<script>alert("Thêm thành công!")</script>';
		}
	}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="myScript/script.js"></script>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <div class="container">
        <div id="logo">
          <div>    <img src="./logo.png" alt="Logo"></div>
              
                <div><h2 style="margin-left: 6px;">ĐẠI HỌC <br> TÔN ĐỨC THẮNG</h2>
                  <h4 style="margin-left: 6px;">KHOA CÔNG NGHỆ THÔNG TIN</h4>
                </div>
            </div>
      </div>
      <div class="titleSubject">
        <h1 class=" " style="color: rgba(4, 17, 255, 0.966);">THÊM THÔNG TIN GIẢNG VIÊN</h1>
        <hr style="color: red; border-top: 2px solid red; font-weight: bold;"> </p></div>
      </div>
      <div class="row  container infor">
        <div class="col-xl-9 col-md-6 col-12">
          <div class="text-center" style="font-size: 1.8rem;font-weight: bold; color:rgba(255, 0, 0, 0.793); "><p>Thông tin<br>
            </div>
          <div class="container ">
            <form action="#" method="post" class="formSubject" id="frm">
              <div class="form-group">
                <label for="name">Tên giảng viên:</label>
                <input type="text" id="name" name="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="name">Số điện thoại:</label>
                <input type="text" id="name" name="sdt" class="form-control">
              </div>
              <div class="form-group">
                <label for="name">Email:</label>
                <input type="text" id="name" name="email" class="form-control">
              </div>
              
                            
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="btnxacnhan" id="btnxacnhan">Xác nhận</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      </div>
      <script>
$(document).ready(function(){
    $('#btnxacnhan').click(function(e){
        var sdt = $('#sdt').val();
        var email = $('#email').val();
        $.ajax({
            url: 'footer.php',
            method: 'post',
            // data: {
            //     sdt: sdt,
            //     email: email
            // },
            data:$('$frm').serialize(),
            success: function(){
              alert("thành công");
            }
        });
    });
});
</script>

      <?php require_once("footer.php") ?>

</body>
</html>
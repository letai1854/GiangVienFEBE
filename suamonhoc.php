<?php
require_once("entities/subject.class.php");
$id=$_GET['sid'];
$subject=Detail::get_Subject($id);
$name=$subject[0]['subjectName'];
$file=$subject[0]['subjectImage'];
$hinh="<br> <br> <img src='".$file."'width='100'>";


if(isset($_POST['btnSubmit'])){
    if ($_FILES['image']['name'] != '') {
        $result=Detail::update_subject($id,$_POST['namesubject'],$_FILES['image']);
        $subject=Detail::get_Subject($id);
        $file=$subject[0]['subjectImage'];
        $hinh="<br> <br> <img src='". $file."'width='100'>";
    }
    else{
        $result=Detail::update_subjectname($id,$_POST['namesubject']);
        $hinh="<br> <br> <img src='".$file."'width='100'>";
    }
    if ($result == true) {
        echo "<script>alert('Sửa thành công!');</script>";
    } else {
        echo "<script>alert('Sửa thất bại!');</script>";
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
        <h1 class=" " style="color: rgba(4, 17, 255, 0.966);">MÔN HỌC</h1>
      </div>
      <div class="row  container">
        <div class="col-xl-9 col-md-6 col-12">
          <div class="container ">
            <h2 class="text-center" style="color: rgba(255, 21, 4, 0.966);">Sửa Môn Học</h2>
            <form action="#" method="post" class="formSubject" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Tên môn học:</label>
                <input type="text" id="name" name="namesubject" class="form-control" value="<?php echo $name ?> ">
              </div>
              <div class="form-group">
                <label for="image">Chọn ảnh môn học:</label>
                <input type="file" name="image" id="txt_image" accept=".PNG,.GIF,.JPG,.JPEG,.jpg,.png,.jpeg"   >	
                <?php
                    echo $hinh
                ?>
                

              </div>
                            
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="btnSubmit">Xác nhận</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      </div>
  

  
  <footer id="footer" class="pt-4 footer divider layer-overlay  bg-theme-colored-gray mt-30" style="background-color: rgba(12, 12, 12, 0.905);">
    <div class="container">
        <div class="row ">
            <div class="col-md-4">
                <div class="widget text-white">
                  <h4 class="widget-title text-white font-16 "><b>Đại học Tôn Đức Thắng</b></h4>
                        <div class="opening-hours" style="margin-top: 13px;">
                            <ul class="list-border">
                                <li class="clearfix">
                                  <img src="./logo.png" alt="">
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-white">
                        <div class="widget ">
                            <h4 class="widget-title text-white font-17 font-weight-bold "><b>Liên hệ:</b></h4>
                            <div class="opening-hours">
                                <ul class="list-border">
                                        <li class="clearfix">
                                            <span>Thông tin liên lạc</span>
                                            <ul class="list ml-0 mt-5">
                                                <li class="m-0 pl-0 no-border"> <i class="fa fa-phone text-danger mr-3"></i> <a class="text-white">0937271234</a> </li>
                                                <li class="m-0 pl-0 no-border"> <i class="fa fa-map-marker mr-4" aria-hidden="true"></i>
                                                  <a class="text-white">123/Quận 1 TP HCM</a> </li>
                                            </ul>
                                        </li>
                                    <li class="clearfix">
                                        <span>Mạng xã hội</span>
                                        <ul class="list ml-0 mt-5">
                                            <li class="m-0 pl-0 no-border"> <i class="fab fa-facebook"></i> <i class="fab fa-instagram ml-4"></i> <i class="fab fa-facebook-messenger ml-4"></i>  </li>
                                            <li><i class="fab fa-linkedin mt-2"></i> <i class="fab fa-twitter ml-4"></i></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="text-white">
                        <div class="widget ">
                            <h4 class="widget-title text-white font-17 font-weight-bold sm-display-none"><b>&nbsp;&nbsp;&nbsp;</b></h4>
                            <div class="opening-hours">
                                <ul class="list-border">
                                    <li class="clearfix">
                                        <span>Đăng ký nhận bản tin của chúng tôi</span>
                                        <ul class="list ml-0 mt-5">
                                    
                                                  <form action="">
                                    
                                                        <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                                                          <input type="email" id="form5Example22" class="form-control" placeholder="Địa chỉ email">

                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>
                                                    
                                                        <button data-mdb-ripple-init="" type="button" class="btn btn-primary mb-4">
                                                          Đăng ký
                                                   
                                                  </form>
                                                </div>
                                        
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="footer-bottom bg-black-333">
            <div class="container pt-20 pb-20">
                <div class="row">
                    <div class="col-md-6">
                        <p class="font-11 m-0 text-white">
                            Copyright ©2020 Đại học Tôn Đức Thắng
                            <br>
                            Ứng dụng được phát triển bởi Tổ phát triển phần mềm - Trung tâm tin học
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </footer> 
    
</body>
</html>
<?php
    require_once("entities/thongtin.class.php");

    ob_start();
    if (isset($_POST['btnSubmit'])) {
        $infoTitle = $_POST['title'];
        $date = date('Y-m-d');
        $infoImage = $_FILES['image'];
        $infoType = $_POST['infotype'];
        $infoContent = $_POST['content'];

        $result = ThongTin::saveThongTin($infoTitle, $date, $infoImage, $infoType, $infoContent);
        if ($result == true)
        {
            echo "<script>alert('Thêm thành công!');</script>";
            header("Location: TrangChu.php");
            ob_end_flush();
            exit();
        } 
        else 
        {
            echo "<script>alert('Thêm thất bại!');</script>";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS cho phần message */
        #message {
            margin-top: 20px;
        }
        #text-area {
            width: 100%;
            height: 150px;
            margin-top: 10px;
        }
        .ck-editor__editable[role="textbox"] {
                /* Editing area */
                min-height: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="logo">
            <div> 
                <img src="./logo.png" alt="Logo"></div>
                <div><h2 style="margin-left: 6px;">ĐẠI HỌC <br> TÔN ĐỨC THẮNG</h2>
                  <h4 style="margin-left: 6px;">KHOA CÔNG NGHỆ THÔNG TIN</h4>
                </div>
            </div>
      </div>
      <div class="titleh1" style="text-align:center">
        <h1 class=" " style="color: rgba(4, 17, 255, 0.966);">THÔNG TIN</h1>
      </div>
      <hr style="color: red; border-top: 2px solid red; font-weight: bold;"> </p></div>
   <div class="container ct">
    <div class="text-center" style="font-size: 1.8rem;font-weight: bold; color:rgba(255, 0, 0, 0.793); "><p>Thông tin<br>
    </div>

    <div class="row container">
        <div class="col-xl-12 col-md-6 col-12">
          <div class="container ">
            <form action="#" method="post" class="formSubject" enctype="multipart/form-data" onsubmit="return validateForm()">
              <div class="form-group">
                    <label for="heading" >Tiêu đề:</label>
                    <input type="text" id="title" name = "title"><br>
              </div>
              <div class="form-group">
                <label for="job-type" style="margin-right: 26px;" >Loại:</label>
                <select id="job-type" name="infotype">
                    <option value="vieclam">Việc làm</option>
                    <option value="thongbao">Thông báo</option>
                    <option value="tintuc">Tin tức</option>
                </select>
              </div>
              <div class="form-group">
                    <label for="txt_image" >Hình đại diện:</label>
                    <input type="file" name="image" id="txt_image" accept=".PNG,.GIF,.JPG,.JPEG,.jpg,.png,.jpeg">	
              </div>
              <div class="form-group">
                    <textarea id="content" name="content" placeholder="Nhập nội dung thông tin" style="width:700px"></textarea>
              </div>              
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="btnSubmit">Xác nhận</button>
              </div>
            </form>
          </div>
        </div>
      </div>
   </div>
   <footer id="footer" class="pt-4 footer divider layer-overlay  bg-theme-colored-gray mt-30" style="background-color: rgba(12, 12, 12, 0.905); ">
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

<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
    function validateForm() {
        var fileInput = document.getElementById('txt_image');
        if (fileInput.files.length === 0) {
            alert('Vui lòng upload ảnh đại diện cho thông tin.');
            return false;
        }
        return true;
    }   
    ClassicEditor
        .create( document.querySelector( '#content' ), {
            ckfinder:
            {
                uploadUrl: 'fileupload.php'
            }
        } )
        .then (editor => {
            consol.log(editor);
        })
        .catch( error => {
            console.error( error );
        } );
</script>
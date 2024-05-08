<?php
require_once('entities/account.php');
require_once('entities/subject.class.php');
session_start();
if(isset($_SESSION['username'])){
  $userName=user::get_teacherName($_SESSION['username']);
  $owner=true;
}
else{
  $owner=false;
}

	$list_subject = Detail::list_Subject();
if(isset($_POST['Delete'])){
  $id=$_POST['Id'];
  $result = Detail::delete_Subject($id);
}
try {
	$list_subject = Detail::list_Subject();
} catch (Exception $e) {
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
        <nav class="navbar navbar-expand-lg   py-3 ">
            <div class="container">
              <?php
               if($owner){
              echo '<p>'. $userName.'</p>';
               }
              ?>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span id="bar" class="fas fa-bars"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                 <?php
                if($owner){
                  echo' <li class="nav-item">
                  <a class="nav-link" href="./themmonhoc.php" >Thêm môn học</a>
                </li>
       
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="./capnhatthongtin.html">
                    Thêm thông tin
                  </a>
                  <ul style="background-color: rgba(4, 49, 252, 0.944);" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="./themgiangvien.html" >Giảng viên</a></li>
                    <li><a class="dropdown-item" href="./capnhatthongtin.html">Thông Tin</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cập nhật thông tin
                  </a>
                  <ul style="background-color: rgba(4, 49, 252, 0.944);" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="./themgiangvien.html"  >Giảng viên</a></li>
                    <li><a class="dropdown-item" href="./Thongbaochinhsua.html">Thông báo-Tin tức</a></li>
                    <li><a class="dropdown-item" href="./suaViecLam.html">Thông tin việc làm</a></li>
                  </ul>
                </li>';
                }
                 ?>
                  <li class="nav-item">
                    <a class="nav-link" >Liên hệ</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link"  href="./login.php"><i class="fas fa-user" ></i></a>              </li>
                </ul>
              </div>
            </div>
          </nav>
      <div id="home" >
        
      </div>
      <div>
     
      </div>
      <div class="row container subject-report mt-3">
        <div class="col-xl-9 col-md-6 col-sm-12 col-12">
            <div class="text-center" style="font-size: 1.8rem;font-weight: bold; color:rgba(255, 0, 0, 0.793); "><p>Môn học <br>
            <hr style="color: red; border-top: 2px solid red; font-weight: bold;"> </p></div>
            <div class="row">
                <!-- <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
                  <div class="card shadow-sm">
                    <a href="./ChiTietMonHoc.html"><img src="./image/lthdt.png" alt=""></a>
                    <div class="card-body">
                      <p class="card-text text-center" style="color: blue;">Lập Trình Hướng Đối Tượng</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh</small>
                      </div>
                      
                      <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn"> <a href="./suaTaiLieu.html">Sửa</a></button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn">Xóa</button>
        
              <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:60px">
                <a style="color: white; text-decoration: none; width:150px" href="./themTaiLieu.html">Thêm</a>
            </button>
         
                    </div>
                  </div>
                </div> -->
                <!-- <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
                  <div class="card shadow-sm">
                    <img src="./image/ctdlgt1.jpg" alt="">
                    <div class="card-body">
                      <p class="card-text text-center" style="color: blue;">Cấu Trúc Dự Liệu Và Giải Thuật</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh</small>
                      </div>
                      
                      <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn"> Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn">Xóa</button>
        
              <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:60px">
                <a style="color: white; text-decoration: none; width:150px">Thêm</a>
            </button>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
                  <div class="card shadow-sm">
                    <img src="./image/web2.jpg" alt="">
                    <div class="card-body">
                      <p class="card-text text-center" style="color: blue;">Lập Trình Web Và Ứng Dụng</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh</small>
                      </div>
                      
                      <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn">Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn">Xóa</button>
        
              <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:60px">
                <a style="color: white; text-decoration: none; width:150px">Thêm</a>
            </button>
                    </div>
                  </div>
                </div>
             
                <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
                  <div class="card shadow-sm">
                    <img src="./image/python.jpg" alt="">
                    <div class="card-body">
                      <p class="card-text text-center" style="color: blue;">Lập Trình PyThon cùng Thầy Thanh</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh</small>
                      </div>
                      
                      <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn">Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn">Xóa</button>
        
              <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:60px">
                <a style="color: white; text-decoration: none; width:150px">Thêm</a>
            </button>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
                  <div class="card shadow-sm">
                    <img src="./image/sql.jpg" alt="">
                    <div class="card-body">
                      <p class="card-text text-center" style="color: blue;">Truy Vấn Cấu Trúc Dữ Liệu</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh</small>
                      </div>
                      
                      <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn">Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn">Xóa</button>
        
              <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:60px">
                <a style="color: white; text-decoration: none; width:150px">Thêm</a>
            </button>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
                  <div class="card shadow-sm">
                    <img src="./image/c.png" alt="">
                    <div class="card-body">
                      <p class="card-text text-center" style="color: blue;">Lập Trình C# Cùng Thầy Thanh</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh</small>
                      </div>
                      
                      <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn">Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn">Xóa</button>
        
              <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:60px">
                <a style="color: white; text-decoration: none; width:150px">Thêm</a>
            </button>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
                  <div class="card shadow-sm">
                    <img src="./image/java.jpg" alt="">
                    <div class="card-body">
                      <p class="card-text text-center" style="color: rgb(25, 25, 224);">Công Nghệ Java Cùng Thầy Thanh</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh</small>
                      </div>
                      
                      <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn">Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn">Xóa</button>
        
              <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:60px">
                <a style="color: white; text-decoration: none; width:150px">Thêm</a>
            </button>
                    </div>
                  </div>
                </div> -->
                <?php
                if(isset($list_subject))
                {
                  if(is_array($list_subject))
                  {
                    foreach($list_subject as $item)
                    {
                      echo '<div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
                      <div class="card shadow-sm"> 
                        <img src="'.htmlspecialchars($item['subjectImage']).'" alt="">
                        <div class="card-body">
                          <p class="card-text text-center" style="color: blue;">'.htmlspecialchars($item['subjectName']).'</p>
                          <div class="chitiet" style="text-align: center;">
    <p><a style="color: red; text-decoration: none;" href="ChiTietMonHoc.php?sid='.$item['subjectCode'].'">Xem chi tiết</a></p>
</div>

                      ';
                      if($owner)
                      {
                        echo '<button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn"><a style="color: white; text-decoration: none;" href="suamonhoc.php?sid='.$item['subjectCode'].'">Sửa</a></button>
                        <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn" onclick="delete_btn(\'' . htmlspecialchars($item['subjectCode']) . '\')">Xóa</button>
                        <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:60px">
                        <a style="color: white; text-decoration: none; width:150px"><a style="color: white; text-decoration: none;" href="themTaiLieu.php?sid='.$item['subjectCode'].'">Thêm</a></a>
                        </button>';
                      }
                      echo '</div>
                      </div>
                      </div>';
                  }
                }
              }
              ?>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 col-sm-12 col-12">
        <div style="display: inline-block; font-size: 1.8rem; font-weight: bold; color: rgba(255, 0, 0, 0.793);"> <!-- Container bọc quanh cả biểu tượng và văn bản -->
          <i class="fas fa-newspaper"></i> <!-- Biểu tượng -->
          <p style="display: inline; margin-left: 5px;">Thông báo</p> <!-- Văn bản -->
      </div>
      <div class="row newspaper" style="margin-top: 14px;">
        <div class="col-12">
          <h6 style="color: black;">Thông báo mở khóa học Blockchain cho tất cả sinh viên khoa công nghệ thông tin lần 1 năm 2024</h6>
        <p>10/05/2024</p>
        </div>
        <div class="col-12">
          <h6 style="color: black;">Thông báo đăng ký tham gia buổi WorkShop về game</h6>
        <p>9/05/2024</p>
        </div>
        <div class="col-12">
          <h6 style="color: black;">Chương trình thạc sĩ ngành khoa học máy tính</h6>
        <p>10/04/2024</p>
        </div>
        <div class="col-12">
          <h6 style="color: black;">Mở lớp kĩ năng mềm cho sinh viên công nghệ thông tin</h6>
        <p>28/03/2024</p>
        </div>
        <div class="col-12">
          <h6 style="color: black;">Lịch thi kỹ năng thực hành chuyên môn đợt tháng 03/2024</h6>
        <p>22/03/2024</p>
        </div>
        <div class="col-12">
          <h6 style="color: black;"><a href="./thongbao.html">Tư Vấn sức khỏe cho sinh viên năm nhất khoa công nghệ thông tin</a></h6>
        <p>19/03/2024</p>
        </div>
        <div class="col-12">
          <h6 style="color: black;">Đăng ký tham sự workShop "Kỹ năng giao tiếp hiệu quả trong doanh nghiệp"</h6>
        <p>12/02/2024</p>
        </div>
        <div class="col-12">
          <h6 style="color: black;">Đăng ký môn học khoa công nghệ thông tin</h6>
        <p>11/01/2024</p>
        </div>
      </div>
    
      </div>
    </div>
    <div class="row container mt-4">
      <div class="col-xl-9 col-md-8 col-sm-6 col-12">
        <div class="mb-3"  style="display: inline-block; font-size: 1.8rem; font-weight: bold; color: rgba(255, 0, 0, 0.793); "> <!-- Container bọc quanh cả biểu tượng và văn bản -->
          <i class=" fas fa-calendar"></i> <!-- Biểu tượng -->
          <p style="display: inline; margin-left: 5px;">Thông tin việc làm</p> <!-- Văn bản -->
      </div>
      <div class="row">
        <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
          <div class="card shadow-sm">
            <img src="./image/viec.jpg" alt="">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <a href="./vieclam.html"><small class="text-body-secondary">Ngày hội việc làm trường đại học Tôn Đức Thắng 29/02/2024</small></a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
          <div class="card shadow-sm">
            <img src="./image/ict.jpg" alt="">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-body-secondary">Hãy đến với chúng tôi! Cơ hội làm việc tại công ty TNHH ICT 21/05/2024</small>
              </div>
         
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
          <div class="card shadow-sm">
            <img src="./image/viettel.jpg" alt="">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-body-secondary">Các bạn sinh viên ơi! Đăng ký tham quan công ty Viettel 20/05/2024</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
          <div class="card shadow-sm">
            <img src="./image/hannel.jpg" alt="">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-body-secondary">Trải nghiệm làm việc tại công ty cổ phần Hannel 19/05/2024</small>
              </div>

            </div>
          </div>
        </div>
      </div>
    
      </div>
      <div class="col-xl-3 col-md-4 col-sm-6 col-12">
        <div class="mb-3"  style="display: inline-block; font-size: 1.8rem; font-weight: bold; color: rgba(255, 0, 0, 0.793); "> <!-- Container bọc quanh cả biểu tượng và văn bản -->
          <i class="fas fa-newspaper fas fa-calendar"></i> <!-- Biểu tượng -->
          <p style="display: inline; margin-left: 5px;">Tin tức</p> <!-- Văn bản -->
      </div>
      <div class="card shadow-sm" style="border: 2px solid rgba(0, 0, 0, 0.386);"> 
        <img src="./image/sk.jpg" alt="">
        <div class="card-body">
          <p class="card-text "><a href="./tintuc.html">Lễ công bố Trường Đại học Tôn Đức Thắng đạt chuẩn kiểm định chất lượng cơ sở giáo dục theo tiêu chuẩn FIBAA và thêm 18 chương trình đào tạo đạt chuẩn quốc tế: FIBAA, ASIIN, AUN - QA </a></p>
          
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
                                                <li class="m-0 pl-0 no-border"> <i class="fa fa-phone text-danger mr-3"></i> <a class="text-white">123456789</a> </li>
                                                <li class="m-0 pl-0 no-border"> <i class="fa fa-map-marker mr-4" aria-hidden="true"></i>
                                                  <a class="text-white">999/Quận 2 TP HCM</a> </li>
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
    <script>
    function delete_btn(id) {
        if (confirm('Bạn có chắc muốn xóa môn học') == true) {
            var idstr = id.toString();
            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "");

            var id = document.createElement("input");
            id.setAttribute("type", "text");
            id.setAttribute("name", "Id");
            id.setAttribute("value", '' + idstr);

            var btn = document.createElement("button");
            btn.setAttribute("type", "submit");
            btn.setAttribute("name", "Delete");
            form.appendChild(id);
            form.appendChild(btn);
            document.getElementsByTagName("body")[0]
                .appendChild(form);
            btn.click();
        }
    }
</script>


</body>
</html>

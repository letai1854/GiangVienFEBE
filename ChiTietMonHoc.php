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
$id=$_GET['sid'];
$subject=Detail::list_SubjectDtail($id);
$sub=Detail::get_Subject($id);
$nameTitle=$sub[0]['subjectName'];
$title=$subject[0]['subjectTitle'];
$file=$subject[0]['file'];
$type=$subject[0]['subjectType'];
$idMonChhiTiet=$subject[0]['id'];
if(isset($_POST['Delete'])){
  $i=$_POST['Id'];
  $result = Detail::delete_SubjectDetaile($i);
  $subject=Detail::list_SubjectDtail($id);
}
function theory($subject, $owner){
  echo '<div class="container">';
  if(isset($subject))
  {
    if(is_array($subject))
    {
      foreach($subject as $item)
      {
        if($item['subjectType']=="theory"||$item['subjectType']==" theory")
        {
          $url=htmlspecialchars($item['file']) ;
					$file_name = basename($url); 
        echo ' <p>
        <a style="text-decoration: none;" href="'.htmlspecialchars($item['file']).'">'.htmlspecialchars($item['subjectTitle']).'</a>
        <a href="'.htmlspecialchars($item['file']).'" download="'.htmlspecialchars($file_name).'">
            <img src="./image/file.png" alt="" width="20" height="20">
        </a>        
        </p>';
          if($owner)
          {
            echo '<button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn"><a style="color: white; text-decoration: none;" href="suaTaiLieu.php?sid='.$item['id'].'">Sửa</a></button>
            <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn" onclick="delete_btn(\'' . htmlspecialchars($item['id']) . '\')">Xóa</button>';
          }
        }
      }
    }
  }
  echo '</div>  ';
}
function practice($subject, $owner){
echo '<div class="container">';
  if(isset($subject))
  {
    if(is_array($subject))
    {
      foreach($subject as $item)
      {
        if($item['subjectType']=="practice"||$item['subjectType']==" practice")
        {
          $url=htmlspecialchars($item['file']) ;
					$file_name = basename($url); 
        echo ' <p>
        <a style="text-decoration: none;" href="'.htmlspecialchars($item['file']).'">'.htmlspecialchars($item['subjectTitle']).'</a>
        <a href="'.htmlspecialchars($item['file']).'" download="'.htmlspecialchars($file_name).'">
            <img src="./image/file.png" alt="" width="20" height="20">
        </a>        
        </p>';
          if($owner)
          {
            echo '<button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn"><a style="color: white; text-decoration: none;" href="suaTaiLieu.php?sid='.$item['id'].'">Sửa</a></button>
            <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn" onclick="delete_btn(\'' . htmlspecialchars($item['id']) . '\')">Xóa</button>';
          }
        }
      }
    }
  }
  echo '</div>  ';
}
function other($subject, $owner){
  echo '<div class="container">';
  if(isset($subject))
  {
    if(is_array($subject))
    {
      foreach($subject as $item)
      {
        if($item['subjectType']=="other"||$item['subjectType']==" other")
        {
        
        echo '<div style="height: 300px; width:330px;">
        <iframe width="100%" height="100%" src="'.htmlspecialchars($item['file']).'" frameborder="0" allowfullscreen></iframe>
        <div class="">
            <h5>'.htmlspecialchars($item['subjectTitle']).'</h5>
        </div>
    </div> <br><br> ';
          if($owner)
          {
              echo '<button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn"><a style="color: white; text-decoration: none;" href="suaTaiLieu.php?sid='.$item['id'].'">Sửa</a></button>
              <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn" onclick="delete_btn(\'' . htmlspecialchars($item['id']) . '\')">Xóa</button> <br><br>';
          }
        }
      }
    }
  }
  echo '</div>  ';
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
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="myScript/script.js"></script>
    <link rel="stylesheet" href="./style.css">
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
<div class="detailSubject ml-100">
 <h1 ><?php echo $nameTitle ?></h1 >
    <hr style="color: red; border-top: 2px solid red; font-weight: bold;"> </p></div>

</div>
  </div>
    <div class="title-theory ">
        <h2 >Lý Thuyết </h2>
<div class="row theory container">
  <!-- <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
    <div class="card shadow-sm">
      <img src="./image/web2.jpg" alt="">
      <div class="card-body">
        <p class="card-text text-center" style="color: blue;">1. Tìm hiều HTML </p>
        <div class="d-flex justify-content-between align-items-center">
          <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 02/05/2024</small>
        </div>
        <div>
            <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
            <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
            <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px"><a style="color: white; text-decoration: none;">Tải tài liệu</a></button>

        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
    <div class="card shadow-sm">
      <img src="./image/web2.jpg" alt="">
      <div class="card-body">
        <p class="card-text text-center" style="color: blue;">2. Tìm hiểu CSS </p>
        <div class="d-flex justify-content-between align-items-center">
          <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 02/05/2024</small>
        </div>
        <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
        <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
        <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
            <a style="color: white; text-decoration: none;">Tải tài liệu</a>
        </button>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
    <div class="card shadow-sm">
      <img src="./image/web2.jpg" alt="">
      <div class="card-body">
        <p class="card-text text-center" style="color: blue;">3. Giới Thiệu Bootstrap</p>
        <div class="d-flex justify-content-between align-items-center">
          <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 03/05/2024</small>
        </div>
        <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
        <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
        <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
            <a style="color: white; text-decoration: none;">Tải tài liệu</a>
        </button>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
    <div class="card shadow-sm">
      <img src="./image/web2.jpg" alt="">
      <div class="card-body">
        <p class="card-text text-center" style="color: blue;">4. Khám phá JS-1lide 1</p>
        <div class="d-flex justify-content-between align-items-center">
          <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 03/05/2024</small>
        </div>
        <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
        <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
        <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
            <a style="color: white; text-decoration: none;">Tải tài liệu</a>
        </button>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
    <div class="card shadow-sm">
      <img src="./image/web2.jpg" alt="">
      <div class="card-body">
        <p class="card-text text-center" style="color: blue;">5. Khám phá JS-Slide 2</p>
        <div class="d-flex justify-content-between align-items-center">
          <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 04/05/2024</small>
        </div>
        <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
        <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
        <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
            <a style="color: white; text-decoration: none;">Tải tài liệu</a>
        </button>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
    <div class="card shadow-sm">
      <img src="./image/web2.jpg" alt="">
      <div class="card-body">
        <p class="card-text text-center" style="color: blue;">5. Khám phá JS-Slide 3</p>
        <div class="d-flex justify-content-between align-items-center">
          <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 05/05/2024</small>
        </div>
        <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
        <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
        <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
            <a style="color: white; text-decoration: none;">Tải tài liệu</a>
        </button>
      </div>
    </div>
  </div> -->
  <?php
  // Gọi lại đoạn mã PHP in ra dữ liệu sau khi xoá
  theory($subject, $owner);
?>
  <?php
  
  // echo '<div class="container">';
  // if(isset($subject))
  // {
  //   if(is_array($subject))
  //   {
  //     foreach($subject as $item)
  //     {
  //       if($item['subjectType']=="theory")
  //       {
  //         $url=htmlspecialchars($item['file']) ;
	// 				$file_name = basename($url); 
  //       echo ' <p>
  //       <a style="text-decoration: none;" href="'.htmlspecialchars($item['file']).'">'.htmlspecialchars($item['subjectTitle']).'</a>
  //       <a href="'.htmlspecialchars($item['file']).'" download="'.htmlspecialchars($file_name).'">
  //           <img src="./image/file.png" alt="" width="20" height="20">
  //       </a>        
  //       </p>';
  //         if($owner)
  //         {
  //           echo '<button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn"><a style="color: white; text-decoration: none;" href="suaTaiLieu.php?sid='.$item['id'].'">Sửa</a></button>
  //           <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn" onclick="delete_btn(\'' . htmlspecialchars($item['id']) . '\')">Xóa</button>';
  //         }
  //       }
  //     }
  //   }
  // }
  // echo '</div>  ';
  
  ?>

 
</div>
<div class="title-theory1  ">
    <h2 >Thực Hành </h2>
</div>
<div class="row theory container">
    <!-- <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
      <div class="card shadow-sm">
        <img src="./image/web2.jpg" alt="">
        <div class="card-body">
          <p class="card-text text-center" style="color: blue;">Lab 1</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 02/05/2024</small>
          </div>
          <div>
              <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
              <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
              <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
                  <a style="color: white; text-decoration: none;">Tải tài liệu</a>
              </button>
  
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
      <div class="card shadow-sm">
        <img src="./image/web2.jpg" alt="">
        <div class="card-body">
          <p class="card-text text-center" style="color: blue;">Lab 2</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 02/05/2024</small>
          </div>
          <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
              <a style="color: white; text-decoration: none;">Tải tài liệu</a>
          </button>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
      <div class="card shadow-sm">
        <img src="./image/web2.jpg" alt="">
        <div class="card-body">
          <p class="card-text text-center" style="color: blue;">Lab 3</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 02/05/2024</small>
          </div>
          <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
              <a style="color: white; text-decoration: none;">Tải tài liệu</a>
          </button>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
      <div class="card shadow-sm">
        <img src="./image/web2.jpg" alt="">
        <div class="card-body">
          <p class="card-text text-center" style="color: blue;">Lab 4</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 03/05/2024</small>
          </div>
          <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
              <a style="color: white; text-decoration: none;">Tải tài liệu</a>
          </button>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
      <div class="card shadow-sm">
        <img src="./image/web2.jpg" alt="">
        <div class="card-body">
          <p class="card-text text-center" style="color: blue;">Lab 5</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 03/05/2024</small>
          </div>
          <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
              <a style="color: white; text-decoration: none;">Tải tài liệu</a>
          </button>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
      <div class="card shadow-sm">
        <img src="./image/web2.jpg" alt="">
        <div class="card-body">
          <p class="card-text text-center" style="color: blue;">Lab 6</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 04/05/2024</small>
          </div>
          <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
              <a style="color: white; text-decoration: none;">Tải tài liệu</a>
          </button>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
        <div class="card shadow-sm">
          <img src="./image/web2.jpg" alt="">
          <div class="card-body">
            <p class="card-text text-center" style="color: blue;">Lab 7</p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 06/05/2024</small>
            </div>
            <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
            <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
            <button type="button" class="btn btn-sm" style="background-color: rgb(32, 115, 40); border-radius: 3px; width:90px">
                <a style="color: white; text-decoration: none;">Tải tài liệu</a>
            </button>
          </div>
        </div>
      </div> -->
    <?php
    practice($subject, $owner);
    ?>
    <?php
  // echo '<div class="container">';
  // if(isset($subject))
  // {
  //   if(is_array($subject))
  //   {
  //     foreach($subject as $item)
  //     {
  //       if($item['subjectType']=="practice")
  //       {
  //         $url=htmlspecialchars($item['file']) ;
	// 				$file_name = basename($url); 
  //       echo ' <p>
  //       <a style="text-decoration: none;" href="'.htmlspecialchars($item['file']).'">'.htmlspecialchars($item['subjectTitle']).'</a>
  //       <a href="'.htmlspecialchars($item['file']).'" download="'.htmlspecialchars($file_name).'">
  //           <img src="./image/file.png" alt="" width="20" height="20">
  //       </a>        
  //       </p>';
  //         if($owner)
  //         {
  //           echo '<button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn"><a style="color: white; text-decoration: none;" href="suaTaiLieu.php?sid='.$item['id'].'">Sửa</a></button>
  //           <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn" onclick="delete_btn(\'' . htmlspecialchars($item['id']) . '\')">Xóa</button>';
  //         }
  //       }
  //     }
  //   }
  // }
  // echo '</div>  ';
    ?>
  
   
  </div>
  <div class="title-theory2  ">
    <h2 >Khác</h2>
</div>
<div class="row theory container">
  <?php 
  other($subject, $owner);
  ?>
<?php
  // echo '<div class="container">';
  // if(isset($subject))
  // {
  //   if(is_array($subject))
  //   {
  //     foreach($subject as $item)
  //     {
  //       if($item['subjectType']=="other")
  //       {
        
  //       echo '<div style="height: 300px; width:330px;">
  //       <iframe width="100%" height="100%" src="'.htmlspecialchars($item['file']).'" frameborder="0" allowfullscreen></iframe>
  //       <div class="">
  //           <h5>'.htmlspecialchars($item['subjectTitle']).'</h5>
  //       </div>
  //   </div> ';
  //         if($owner)
  //         {
  //             echo '<button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:50px" name="deletebtn"><a style="color: white; text-decoration: none;" href="suaTaiLieu.php?sid='.$item['id'].'">Sửa</a></button>
  //             <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:50px" name="updatebtn" onclick="delete_btn(\'' . htmlspecialchars($item['id']) . '\')">Xóa</button> <br><br>';
  //         }
  //       }
  //     }
  //   }
  // }
  // echo '</div>  ';
  ?>
  

    <!-- <div class="col-xl-3 col-md-3 col-sm-12 mb-3 item-subject">
      <div class="card shadow-sm">
       
        <div class="card-body">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VIDEO_ID_HERE" allowfullscreen></iframe>
              </div>
              <p class="card-text text-center" style="color: blue;">Tìm hiểu CSS</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-body-secondary"> Giảng viên: Dzoãn Xuân Thanh 02/05/2024</small>
          </div>
          <button type="button" class="btn btn-sm" style="background-color: rgb(213, 198, 101); border-radius: 3px; width:80px" name="deletebtn">Sửa</button>
          <button type="button" class="btn btn-sm" style="background-color: rgb(36, 36, 153); border-radius: 3px; width:80px" name="updatebtn">Xóa</button>
        </div>
      </div>
    </div> -->
</div>

</div>

<?php require_once("footer.php") ?>
    <script>
    function delete_btn(id) {
        if (confirm('Bạn có chắc muốn xóa tài liệu') == true) {
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
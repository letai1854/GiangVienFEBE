<?php
require_once("entities/subject.class.php");
$id=$_GET['sid'];
$subject=Detail::list_SubjectDetailId($id);
$name=$subject[0]['subjectTitle'];
$file=$subject[0]['file'];
$type=$subject[0]['subjectType'];
if(isset($_POST['btnAccept']))
{
  $ten=$_POST['name'];
  $loai=$_POST['type'];
  $f=$_FILES['editor'];
  $video=$_POST['video'];
  $check=false;
  if($video!='' && ($loai=="other" ||$loai==" other")){
    $result=Detail::suaVideo($id,$ten,$video,$loai);
    $check=true;
  }
  if($_FILES['editor']['name'] != '' &&($loai!="other"||$loai!=" other")) 
  {
    $result=Detail::suaTaiLieu($id,$ten,$f,$loai);
    $subject=Detail::list_SubjectDetailId($id);
    $file=$subject[0]['file'];
    $check=true;

  }
  if(!$check){
    echo '<script>alert("Hãy chọn đúng dữ liệu!")</script>';
  }
  if(isset($result))
  {
		if(!$result)
    {
			echo '<script>alert("không thêm được!")</script>';
		}
		else
    {
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
      <!-- <div class="titleSubject">
        <h1 class=" " style="color: rgba(4, 17, 255, 0.966);"><?php echo $name ?></h1>
      </div> -->
      <div class="row  container">
        <div class="col-xl-9 col-md-6 col-12">
          <div class="container ">
            <h2 class="text-center" style="color: rgba(255, 21, 4, 0.966);">Sửa tài liệu</h2>
            <form action="#" method="post" class="formSubject"enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Tên tài liệu:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $name?>">
              </div>
           
              <div class="form-group">
                <label for="type">Loại:</label>
                <select id="type" name="type" class="form-control" >
                  <option value="theory" <?php if($type == 'theory' ||$type == ' theory') echo 'selected'; ?> >Lý thuyết</option>
                  <option value="practice" <?php if($type == 'practice'||$type == ' practice') echo 'selected'; ?>>Thực hành</option>
                  <option value="other" <?php if($type == 'other'||$type == ' other') echo 'selected'; ?>>Khác</option>
                </select>
              </div>
              <div class="form-group">
                <label for="document">Chọn file:</label>
                <!-- <textarea name="editor" id="editor"></textarea> -->
                <input type="file" id="document" name="editor" accept=".pdf,.doc,.docx" class="form-control">
                <div>
                  <p><?php echo ($type!='other') ? $file : ''; ?></p>
                </div>
              </div>       
              <div class="form-group">
              <label for="video">Chọn video:</label>
              <input type="text" id="video" name="video" class="form-control" value="<?php echo ($type=='other') ? $file : ''; ?>">
              </div>      
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="btnAccept">Xác nhận</button>
              </div>
              

            </form>
          </div>
        </div>
      </div> 
      </div>




  
      <?php require_once("footer.php") ?>
</body>
</html>
<?php
// require_once("entites/chitiet.class.php");
// if(isset($_POST["submit"])){
// $ten=$_POST["editor"];
// $newchitiet= new Chitiet($ten);
// $result=$newchitiet->save();
// if(isset($result)){
//     if(!$result){
//         echo "that bai";
//     }
//     else{
//         echo "thanh cong";
//     }

// }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="form-group">
            <textarea name="editor" id="editor"></textarea>

        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="" class="btn btn-primary">
        </div>
    </form>


    <script src="ckeditor5-build-classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create(document.querySelector("#editor"),{
            ckfinder:{
                uploadUrl:'fileupload.php'
            }
        })
        .then(editor=>{
            console.log(editor);
        })

        .catch(error=>{
            console.error(error)
        });
    </script>
   <?php 
//    $ct=Chitiet::list_Chitiet();
//    foreach($ct as $item){
//     echo $item["Ten"];
// }
   
   ?>
</body>
</html>
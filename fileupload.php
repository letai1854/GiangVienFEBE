<?php
$data=array();
if(isset($_FILES['upload']['name'])){
  $file_name=$_FILES['upload']['name'];
  $file_path='upload/'.$file_name;
  $file_extenstion=strtolower((pathinfo($file_path,PATHINFO_EXTENSION)));
  if($file_extenstion=='jpg'||$file_extenstion=='png'||$file_extenstion=='jpeg'||$file_extenstion=='.pdf'||$file_extenstion=='.docx'||$file_extenstion=='.doc'){
    if(move_uploaded_file($_FILES['upload']['tmp_name'],$file_path))
    {
        $data['file']=$file_name;
        $data['url']=$file_path;
        $data['uploaded']=1;

    }
    else{
        $data['uploaded']=0;
        $data['error']['message']='Error! File not uploaded';
 
    }
 
  }
  else{
    $data['uploaded']=0;
    $data['error']['message']='Invalid extentsion';

}
}
echo json_encode($data);
?>
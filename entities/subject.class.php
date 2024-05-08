<?php 
require_once("config/db.class.php");
class Detail{



public $subjectName;
public $image;

public function __construct( $subjectName,$image){
$this->subjectName=$subjectName;
$this->image=$image;
}
public function save(){
    $pic_temp = $this->image['tmp_name'];
    $user_pic = $this->image['name'];
    $picpath = "upload/" . $user_pic;
    if (move_uploaded_file($pic_temp, $picpath) == false) {
        return false;
    }
    $db= new Db();
    $sql="INSERT INTO Subject(subjectName,subjectImage) VALUES
    ('$this->subjectName','$picpath');";
    $result=$db->query_execute($sql);
    return $result;
}
public static function saveTaiLieu($sCode,$sTitle,$file,$sType){
    $file_temp = $file['tmp_name'];
    $user_file = $file['name'];
    $filepath = "upload/" . $user_file;
    if (move_uploaded_file($file_temp, $filepath) == false) {
        return false;
    }
    $db= new Db();
    $sql = "INSERT INTO subjectDetaiil (subjectCode, subjectTitle,  file   , subjectType) 
    VALUES ($sCode, '$sTitle', '$filepath', '$sType')";
    $result=$db->query_execute($sql);
    return $result;
}
public static function saveVideo($sCode,$sTitle,$file,$sType){
    $db= new Db();
    $sql = "INSERT INTO subjectDetaiil (subjectCode, subjectTitle,  file   , subjectType) 
    VALUES ($sCode, '$sTitle', '$file', '$sType')";
    $result=$db->query_execute($sql);
    return $result;
}
public static function list_Subject()
{
    $db= new Db();
    $sql ="SELECT * FROM Subject";
    $result=$db->select_to_array($sql);
    return $result;
}
public static function get_Subject($id)
{
    $db= new Db();
    $sql ="SELECT * FROM Subject  where subjectCode=$id";
    $result=$db->select_to_array($sql);
    return $result;
}
public static function suaTaiLieu($id,$Title,$file,$Type){
    $file_temp = $file['tmp_name'];
    $user_file = $file['name'];
    $filepath = "upload/" . $user_file;
    if (move_uploaded_file($file_temp, $filepath) == false) {
        return false;
    }
    $db= new Db();
    $sql = "CALL updateDetailSubject($id,'$Title','$filepath',' $Type')";
    $result=$db->query_execute($sql);
    return $result;
}
public static function suaVideo($id,$Title,$file,$Type){
    $db= new Db();
    $sql = "CALL updateDetailSubject($id,'$Title','$file',' $Type')";
    $result=$db->query_execute($sql);
    return $result;
}
public static function list_SubjectDtail($id)
{
    $db= new Db();
    $sql ="SELECT * FROM subjectDetaiil where subjectCode=$id";
    $result=$db->select_to_array($sql);
    return $result;
}
public static function list_SubjectDetailId($id)
{
    $db= new Db();
    $sql ="SELECT * FROM subjectDetaiil where id=$id";
    $result=$db->select_to_array($sql);
    return $result;
}
//     public static function delete_Subject($id){
//         $db= new Db();
//         $sql ="DELETE  FROM Subject Where subjectCode='$id'";
//         $result=$db->query_execute($sql);
//     return $result;
//     }
//     public static function list_Subject_Update($id){
//         $db= new Db();
//         $sql ="SELECT * FROM Subject Where subjectCode=$id";
//         $result=$db->select_to_array($sql);
//         return $result;
      
//         }   



public static function update_subject($subjectCode, $subjectName,$picture)
{

    if ($picture['name'] != "") 
    {
        $pic_temp = $picture['tmp_name'];
        $user_pic = $picture['name'];
        $picpath = "upload/" . $user_pic;
        if (move_uploaded_file($pic_temp, $picpath) == false)
        {
            return false;
        }
    }
    $sql = "CALL updateSubject('$subjectCode','$subjectName',' $picpath')";
try
{
    $db = new Db();
    $db->query_execute(($sql));
    return true;
}
catch(PDOException $e)
{
    return false;
}
}
public static function update_subjectname($subjectCode, $subjectName)
{

    $sql = "CALL updateNameSubject('$subjectCode','$subjectName')";

try{
    $db = new Db();
    $db->query_execute(($sql));
    return true;
}
catch(PDOException $e){
    return false;
}
}
public static function delete_Subject($id)
{
    $db= new Db();
    $sql ="DELETE  FROM Subject Where subjectCode='$id'";
    $result=$db->query_execute($sql);
return $result;
}
public static function delete_SubjectDetaile($id)
{
    $db= new Db();
    $sql ="DELETE  FROM subjectDetaiil Where id=$id";
    $result=$db->query_execute($sql);
return $result;
}
}

?>
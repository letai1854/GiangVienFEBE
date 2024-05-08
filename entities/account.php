<?php
require_once("config/db.class.php");

class User{
public $userName;
public $password;
public function __construct($u_name,$u_pass){
    $this->userName=$u_name;
    $this->password=$u_pass;
}
// public function save(){
//     $db= new Db();
//     $sql="INSERT INTO users (UserName, Email, Password) VALUES ('".mysqli_real_escape_string($db->connect(),$this->userName)."','".mysqli_real_escape_string($db->connect(),$this->email)."',
//     '".mysqli_real_escape_string($db->connect(),$this->password)."')";
//     $result=$db->query_execute($sql);
//     return $result;

// }
public static function checkLogin($email,$password)
{
    $db=new Db();
    $sql="SELECT * FROM Login WHERE username='$email' AND password='$password' ";
    $result=$db->query_execute($sql);
    return $result;
}
public static function get_teacherName($username)
{
    try {
        $db=new Db();
        $sql="SELECT * FROM Login WHERE username='$username';";
        $result = $db->select_to_array($sql);
        $result = $result[0]['teacherName'];
        return $result;
        }
        catch (PDOException $e) {
            return false;
        }
}
public static function update_User($name,$user){
    $db=new Db();
    $sql="update Login set teacherName='$name' where username='$user'";
    $result=$db->query_execute($sql);
    return $result;
}
// public static function get_username($id, $code)
// {
//     try {
//         $db = new Db();
//     $sql = "CALL get_username('$id','$code');";
//     $result = $db->select_to_array($sql);
//     $result = $result[0]['username'];
//     return $result;
//     }
//     catch (PDOException $e) {
//         return false;
//     }
// }

// public static function get_info($userName) {
//     try {
//         $db = new Db();
//         $sql = "SELECT * FROM Login Where username = '{$userName}'";
//         $result = $db->select_to_array($sql);
//         return $result;
//     }
//     catch (PDOException $e) {
//         return false;
//     }
// }

// public static function update_info($teacherName, $linkedin, $integram, $address, $email, $phone, $facebook) {
//     try {
//         $db = new Db();
//         $sql = "CALL UpdateInfo('$teacherName', '$linkedin', '$integram', '$address', '$email', '$phone', '$facebook');";
//         $db->query_execute(($sql));
//         return true;
//     }
//     catch (PDOException $e) {
//         return false;
//     }
// }

// public static function get_id($username){
//     try {
//         $db=new Db();
//         $sql="SELECT * FROM Login WHERE username='$username';";
//         $result = $db->select_to_array($sql);
//         $result = $result[0]['id'];
//         return $result;
//         }
//         catch (PDOException $e) {
//             return false;
//         }
//     }
}
?>
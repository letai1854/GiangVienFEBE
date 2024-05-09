<?php
    require_once("config/db.class.php");
    class ThongTin {
        public $id;
        public $infoTitle;
        public $date;
        public $infoImage;
        public $infoType;
        public $infoContents;

        public function __construct($id, $infoTitle, $date, $infoImage, $infoType, $infoContents) {
            $this->id = $id;
            $this->infoTitle = $infoTitle;
            $this->date = $date;
            $this->infoImage = $infoImage;
            $this->infoType = $infoType;
            $this->infoContents = $infoContents;
        }
        public static function saveThongTin($infoTitle, $date, $infoImage, $infoType, $infoContents) {
            $pic_temp = $infoImage['tmp_name'];
            $user_pic = $infoImage['name'];
            $picpath = "upload/" . $user_pic;
            if (move_uploaded_file($pic_temp, $picpath) == false) {
                return false;
            }
            $db= new Db();
            $sql = "INSERT INTO News (infoTitle, day, infoImage, infoType, infoContents) 
            VALUES ('$infoTitle', '$date', '$picpath', '$infoType', '$infoContents')";
            $result=$db->query_execute($sql);
            return $result;
        }
        public static function updateThongTin($id, $infoTitle, $date, $infoImage, $infoType, $infoContents) {
            $pic_temp = $infoImage['tmp_name'];
            $user_pic = $infoImage['name'];
            $picpath = "upload/" . $user_pic;
            if (move_uploaded_file($pic_temp, $picpath) == false) {
                return false;
            }
            try{
                $db = new Db();
                $sql = "UPDATE News SET infoTitle ='$infoTitle', day = '$date', infoImage = '$picpath', infoType = '$infoType', infoContents ='$infoContents' WHERE id = $id";
                $db->query_execute(($sql));
                return true;
            }
            catch(PDOException $e){
                return false;
            }
        }
        public static function deleteThongTin($id) {
            $db= new Db();
            $sql = "DELETE  FROM News where id = $id";
            $result=$db->query_execute($sql);
            return $result;
        }
        public static function getListThongTinByType($infoType) {
            $db= new Db();
            $sql ="SELECT * FROM News WHERE infoType = '$infoType'";
            $result=$db->select_to_array($sql);
            return $result;
        }
        public static function getThongTinById($id) {
            $db= new Db();
            $sql ="SELECT * FROM News WHERE id = $id";
            $result=$db->select_to_array($sql);
            return $result;
        }

    }

?>
<?php
require_once("config/db.class.php");

class Chitiet
{
    public $chitiet;
    public function  __construct($chitiet){
        $this->chitiet=$chitiet;
    } 
    public static function list_Chitiet(){
        $db = new Db();
        $sql ="SELECT * FROM chitiet";
    $result = $db->select_to_array($sql);
    return $result;
    }
    public function save(){
        $db= new Db();
        $sql="INSERT INTO chitiet (Ten) VALUES
        ('$this->chitiet')";
        $result=$db->query_execute($sql);
        return $result;
    }
}
?>
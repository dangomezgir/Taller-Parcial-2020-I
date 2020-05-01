<?php

require_once LVENDORS.'MySQLiManager/MySQLiManager.php';

class Model{
    static $db;

    private static function getConnection(){
        self::$db = new MySQLiManager('localhost','root','','mmorpg');
    }
    
    public static function getModel(int $id, string $table){
        self::getConnection();
        $data = self::$db->select('*',$table,"id = $id");
        return $data[0];
    }

    public static function getByAttr(string $attrName, string $attrValue, string $table){
        self::getConnection();
        $data = self::$db->select("*",$table, "$attrName = \"$attrValue\"");
        return $data[0];
    }
    
}
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Character
 *
 * @author pabhoz
 */
require_once LVENDORS.'MySQLiManager/MySQLiManager.php';

abstract class Character implements ICharacter{
    
    protected $id;
    protected $name;
    protected $level;
    protected $str;
    protected $intl;
    protected $agi;
    protected $mDef;
    protected $fDef;
    protected $hp;
    static $db;

    function __construct($name, $level, $str, $intl, $agi, $mDef, $fDef, $hp, $id = null) {
        $this->name = $name;
        $this->level = $level;
        $this->str = $str;
        $this->intl = $intl;
        $this->agi = $agi;
        $this->mDef = $mDef;
        $this->fDef = $fDef;
        $this->hp = $hp;
        $this->id = $id;
    }

    private static function getConnection(){
        self::$db = new MySQLiManager('localhost','root','','mmorpg');
    }
    
    public static function getModel(int $id){
        self::getConnection();
        $data = self::$db->select('*',"Character","id = $id");
        return $data[0];
    }
    
    public static function getClassName(int $id){
        self::getConnection();
        $data = self::$db->select("name","CharacterClass","id = $id");
        return $data[0]["name"];
    }
    
    public static function getClassNameId(string $className){
        self::getConnection();
        $data = self::$db->select('id',"CharacterClass","name = \"$className\"");
        return $data[0]["id"];
    }
    
    public function create(){
        // print_r(get_object_vars($this));
        self::getConnection();
        $values = ["name"=>$this->getName(), "level"=>$this->getLevel(), "characterClassId"=>self::getClassNameId(get_class($this))];
        //print_r($values);
        $data = self::$db->insert("Character",$values);
    }

    public function update(){
        self::getConnection();
        $values = ["level"=>$this->getLevel()];
        // print_r($this->getId());
        $data = self::$db->update("Character",$values,"id = ".$this->getId());
    } 

    public function delete(){
        self::getConnection();
        $values1 = ["id"=>$this->getId()];
        $values2 = ["characterid"=>$this->getId()];
        // print_r($this->getId());
        $data = self::$db->delete("user_has_character",$values2,$complex = false);
        $data = self::$db->delete("Character",$values1,$complex = false);
    }

    abstract public function attack(\ICharacter $target): void;

    abstract public function getDamage(float $value, bool $isMagical): void;

    abstract public function getStat(string $statName): float;

    public function getStats(): array {
        return ["level" => $this->getLevel(),"str" => $this->getStr(),"intl" => $this->getIntl(),"agi" => $this->getAgi()
                ,"mDef" => $this->getMDef(),"fDef" => $this->getFDef(),"hp" => $this->getHp()];
    }

    public function iDie(): void{
        echo $this->getName() . " is dead </br>";
        $this->delete(); 
    }

    abstract public function setStat(string $statName, float $value): void;

    abstract public function setStats(array $stats): void;
    
    protected function isCritical(float $rate) :bool {
        echo  $this->getName()."'s rate for a critical is ".($rate * 100)."% </br>";
        $roll = mt_rand(0,100);
        echo  $this->getName()."'s roll is: $roll </br>";
        return ($roll <= $rate * 100) ? true: false;
    }
    
    function getName() {
        return $this->name;
    }

    function getLevel() {
        return $this->level;
    }

    function getStr() {
        return $this->str;
    }

    function getIntl() {
        return $this->intl;
    }

    function getAgi() {
        return $this->agi;
    }

    function getMDef() {
        return $this->mDef;
    }

    function getFDef() {
        return $this->fDef;
    }

    function getHp() {
        return $this->hp;
    }

    function getId() {
        return $this->id;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setLevel($level): void {
        $this->level = $level;
    }

    function setStr($str): void {
        $this->str = $str;
    }

    function setIntl($intl): void {
        $this->intl = $intl;
    }

    function setAgi($agi): void {
        $this->agi = $agi;
    }

    function setMDef($mDef): void {
        $this->mDef = $mDef;
    }

    function setFDef($fDef): void {
        $this->fDef = $fDef;
    }

    function setHp($hp): void {
        $this->hp = $hp;
    }

}

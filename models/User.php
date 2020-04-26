<?php

require_once LVENDORS.'MySQLiManager/MySQLiManager.php';

class User{
    private $id;
    private $username;
    private $password;
    static $db;

    function __construct($username, $password, $id = null){
        $this->username = $username;
        $this->password = $password;
        $this->id = $id;
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

    private static function getConnection(){
        self::$db = new MySQLiManager('localhost','root','','mmorpg');
    }
    
    public static function getModel(int $id){
        self::getConnection();
        $data = self::$db->select('*',"User","id = $id");
        return $data[0];
    }

    public static function getUser($id){
        $data = self::getModel($id);
        $user = new User($data["username"],$data["password"]);
        $user->setId($data["id"]);
        return $user;
    }

    public function create(){
        // print_r(get_object_vars($this));
        self::getConnection();
        $values = ["username"=>$this->getUsername(), "password"=>$this->getPassword()];
        //print_r($values);
        $data = self::$db->insert("User",$values);
    }

    public function delete(){
        self::getConnection();
        $values = ["id"=>$this->getId()];
        // print_r($this->getId());
        $data = self::$db->delete("User",$values,$complex = false);
    }



}
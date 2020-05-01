<?php

require_once LVENDORS.'MySQLiManager/MySQLiManager.php';

class User extends Model implements IUser{
    private $id;
    private $username;
    private $password;

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
        parent::getConnection();
    }
    
    public static function getModel(int $id){
        return parent::getModel($id,"User");
    }

    public static function getByAttr(string $attrName, string $attrValue){
        return parent::getByAttr($attrName,$attrValue,"User");
    }

    public static function getUser(int $id){
        $data = self::getModel($id, "User");
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
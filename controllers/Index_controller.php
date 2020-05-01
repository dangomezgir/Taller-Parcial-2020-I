<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index_controller
 *
 * @author pabhoz
 */
class Index_controller extends Controller{
    
    function __construct() {
        parent::__construct();
    }

    public function index(): void {
        /*if(!isset($_SESSION['user'])) {            
            header('Location: http://localhost/Taller-Parcial-2020-I/arena');
        }*/
        $this->view->render($this,"index","Missifus");
    }

    public function logout(): void {
        session_destroy(); //Dice que la sesion no se puede cerrar porque no se ha inicializado, pero si haces un session_start() te dice que ya esta abierta
        if(session_destroy() == true){
            echo '<script>alert("Logout hecho con exito!")</script>';
            header('Location: http://localhost/Taller-Parcial-2020-I/');
        }else{
            echo '<script>alert("No se hizo logout :c")</script>';
        }
    }

    public function login(): void {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $user = User::getByAttr("username", $username);
        if($password == $user["password"]){
            $_SESSION['user'] = $username;
            header('Location: http://localhost/Taller-Parcial-2020-I/arena');
        }else{
            echo "Nombre de usuario o contraseña incorrecta.";
        }
    }
    
    public function arena(): void{
        if(!isset($_SESSION['user'])) {            
            header('Location: http://localhost/Taller-Parcial-2020-I/');
        }
        $this->view->render($this,"arena","Missifus - Arena");
    }

}

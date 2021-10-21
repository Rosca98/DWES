<?php 
    require_once("view.php");
    require_once("models/users.php");


class UserController{
    
    /**
     * Constructor de la clase
     */
    public function __construct(){
        $this->view = new View();
        $this->user = new User();
    }

    /**
     * Muestra lista de Usuarios
     */
    public function showUserList(){
        $this->view->show("showAllUsers");
    }
}
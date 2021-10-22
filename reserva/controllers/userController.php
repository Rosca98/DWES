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
        $this->view->show("users/showAllUsers");
    }

    /**
     * Muestra el formulario para añadir usuarios
     */
    public function showAddUser(){
        $this->view->show("users/showAddUsers");
    }

    /**
     * Muestra el formulario para modificar usuarios
     */
    public function showModUser(){
        $this->view->show("users/showModUsers");
    }

    /**
     * Procesamos la informacion para añadir el nuevo recurso
     */
    public function processAddUser(){
        $username = $_REQUEST["user_username"];
        $password = $_REQUEST["user_password"];
        $realname = $_REQUEST["user_realname"];

        $this->user->addUser($username,$password,$realname);
        header('Location: index.php?action=showUserList');
    }

    /**
     * Eliminar el recurso
     */
    public function eliminarUser(){
        $id = $_REQUEST['id_user'];
        $this->user->deleteUser($id);
        //Volver a la lista de Usuarios
        header('Location: index.php?action=showUserList');
    }

    /**
     * Modificar el Usuario
     */
    public function ProcessModifyUser(){     
        $id = $_REQUEST["user_id"];
        $username = $_REQUEST["user_username"];
        $password = $_REQUEST["user_password"];
        $realname = $_REQUEST["user_realname"];
        
        $this->user->ModifyUser($id,$username,$password,$realname);
        header('Location: index.php');
    }    
}
<?php 
    require_once("view.php");
    require_once("models/users.php");
    require_once("models/security.php");


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
        header('Location: index.php?controller=userController&action=showUserList');
    }

    /**
     * Eliminar el recurso
     */
    public function eliminarUser(){
        $id = $_REQUEST['id_user'];
        $this->user->deleteUser($id);
        //Volver a la lista de Usuarios
        header('Location: index.php?controller=userController&action=showUserList');
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

    /**
     * Muestra el formulario de login
     */
    public function showLoginForm()
    {
        $this->view->show("users/showLoginForm");
    }

    /**
     * Procesa el formulario de login y, si es correcto, inicia la sesión con el id del usuario.
     * Redirige a la vista de selección de rol.
     */
    public function processLoginForm()
    {

        // Validación del formulario
        if (Security::filter($_REQUEST['username']) == "" || Security::filter($_REQUEST['password']) == "") {
            // Algún campo del formulario viene vacío: volvemos a mostrar el login
            $data['errorMsg'] = "El username y la contraseña son obligatorios";
            $this->view->show("users/showLoginForm", $data);
        }
        else {
            // Hemos pasado la validación del formulario: vamos a procesarlo
            $username = Security::filter($_REQUEST['username']);
            $password = Security::filter($_REQUEST['password']);
            $userData = $this->user->checkLogin($username, $password);

            if ($userData!=null) {
                // Login correcto: creamos la sesión y pedimos al usuario que elija su rol
                //Security::createSession($userData['idUser']);
                $this->view->show("reservation/showAllReservations");
            }
            else {
                $data['errorMsg'] = "Usuario o contraseña incorrectos";
                $this->view->show("users/showLoginForm", $data);
            }
        }
    }


}
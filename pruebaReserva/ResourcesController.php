<?php

include ("view.php");
include ("Models/Resources.php");
//include ("models/security.php");

class ResourcesController
{


    public function index(){
        View::show("Index");
    }
    public function list(){
        $data['list'] = Resources::resourceslist();
        View::show("ResourcesList", $data);
    }
    private $view, $Resources;

    /**
     * Constructor. Crea el objeto vista y los modelos
     */
    public function __construct()
    {
        //session_start(); // Si no se ha hecho en el index, claro
        $this->view = new View(); // Vistas
        $this->Resources = new Resources(); // Modelo de usuarios
    }

    /**
     * Muestra el formulario de login
     */
    public function showLoginForm()
    {
        $this->view->show("loginForm");
    }

    /**
     * Procesa el formulario de login y, si es correcto, inicia la sesión con el id del usuario.
     * Redirige a la vista de selección de rol.
     */
    public function processLoginForm()
    {

        // Validación del formulario
        if (Security::filter($_REQUEST['email']) == "" || Security::filter($_REQUEST['pass']) == "") {
            // Algún campo del formulario viene vacío: volvemos a mostrar el login
            $data['errorMsg'] = "El email y la contraseña son obligatorios";
            $this->view->show("loginForm", $data);
        }
        else {
            // Hemos pasado la validación del formulario: vamos a procesarlo
            $email = Security::filter($_REQUEST['email']);
            $pass = Security::filter($_REQUEST['pass']);
            $userData = $this->user->checkLogin($email, $pass);
            if ($userData!=null) {
                // Login correcto: creamos la sesión y pedimos al usuario que elija su rol
                Security::createSession($userData->id);
                
            }
            else {
                $data['errorMsg'] = "Usuario o contraseña incorrectos";
                $this->view->show("loginForm", $data);
            }
        }
    }

    /**
     * Muestra el menú de opciones del usuario según la tabla de persmisos
     */
    public function showMainMenu()
    {
        $data['permissions'] = $this->user->getUserPermissions(Security::getRolId());
        $this->view->show("mainMenu", $data);
    }

    /**
     * Cierra la sesión
     */    
    public function closeSession() {
        Security::closeSession();
        $this->view->show("loginForm");
    }

    
    
}
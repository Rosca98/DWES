<?php

    include ("view.php");               // Vista
    include ("models/conexion.php");    // Modelo de Conexion
    include ("models/resources.php");   // Modelo de Recursos
    //include ("models/timeSlots.php");   // Modelo de Horario
    //include ("models/users.php");       // Modelo de Usuarios

class Controller
{

    private $view, $user;

    /**
     * Constructor. Crea el objeto vista y los modelos
     */
    public function __construct()
    {
        session_start();                    // No se ha hecho en el index
        $this->view = new View();           // Vistas
        $this->db = new conexion();         // Crear conexion
        //$this->timeslot = new TimeSlot();   // Modelo de Horario
        $this->resource = new Resource();   // Modelo de Recursos
        //$this->user = new User();           // Modelo de Usuarios
    }

    /**
     * Muestra el formulario de login
     */
    public function showLoginForm()
    {
        $this->view->show("loginForm");
    }

    /**
     * Muestra lista de Recursos
     */
    public function showResourcesList(){
        $this->view->show("showAllResources");
    }

    /**
     * Muestra el formulario para añadir recursos
     */
    public function showAddResource(){
        $this->view->show("showAddResources");
    }

    /**
     * Muestra el formulario para modificar recursos
     */
    public function showModResource(){
        $this->view->show("showModResources");
    }

    /**
     * Procesamos la informacion para añadir el nuevo recurso
     */
    public function processAddResource(){
        $name = $_REQUEST['resource_name'];
        $desc = $_REQUEST['resource_desc'];
        $location = $_REQUEST['resource_location'];
    
        $img = $_FILES['img_upload']['name'];
        move_uploaded_file($img, 'assets/img/resources/');
        $img_ruta = 'assets/img/resources/' . $name;
                
        $this->resource->addResource($name,$desc,$location,$img_ruta);
        header('Location: index.php?action=showResourcesList');
    }

    /**
     * Eliminar el recurso
     */
    public function eliminarResource(){
        $id = $_REQUEST['id_resource'];
        $this->resource->deleteResource($id);
        //Volver a la lista de Resources
        header('Location: index.php?action=showResourcesList');
    }

    /**
     * Modificar el recurso
     */
    public function ProcessModifyResource(){     
        $id = $_REQUEST["resource_id"];
        $name = $_REQUEST["resource_name"];
        $desc = $_REQUEST["resource_desc"];
        $location = $_REQUEST["resource_location"];
    
        //¿Hay imagen subida?
        if (isset($_FILES["img_upload"])) {
        //Si la hay se mueve a carpeta y se establece como imagen
            $img_upload = $_FILES["img_upload"];
            move_uploaded_file($img_upload, 'assets/img/resources/');
            $img = 'assets/img/resources/' . $name;
        } else{
        // Si no la hay, será el enlace
            $img = $_REQUEST["img_link"];
        }
        $this->resource->ModifyResource($id,$name,$desc,$location,$img);
        header('Location: index.php');
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
                $this->SelectUserRolForm();
            }
            else {
                $data['errorMsg'] = "Usuario o contraseña incorrectos";
                $this->view->show("loginForm", $data);
            }
        }
    }

    /**
     * Muestra formulario de selección de rol de usuario
     */
    public function selectUserRolForm()
    {
        $data['roles'] = $this->user->getUserRoles(Security::getUserId());
        $this->view->show("selectUserRolForm", $data);
        // Posible mejora: si el usuario solo tiene un rol, la aplicación podría seleccionarlo automáticamnte
        // y saltar a $this->showMainMenu()
    }

    /**
     * Procesa el formulario de selección de rol de usuario y crea una variable de sesión para almacenarlo.
     * Redirige al menú principal.
     */
    public function processSelectUserRolForm()
    {
        Security::changeRol(Security::filter($_REQUEST['type']));
        $this->showMainMenu();
    }

    /**
     * Muestra el menú de opciones del usuario según la tabla de persmisos
     
    public function showMainMenu()
    {
        $data['permissions'] = $this->user->getUserPermissions(Security::getRolId());
        $this->view->show("mainMenu", $data);
    }
    */
    /**
     * Cierra la sesión
     */    
    public function closeSession() {
        Security::closeSession();
        $this->view->show("loginForm");
    }

    /**
     * Elimina un usuario de la base de datos
     */    
    public function deleteUser() {
        if (Security::thereIsSession()) {
            echo "Este método se supone que borra un usuario, pero está sin implementar<br>";
            echo "Solo lo utilizamos para comprobar que el control de acceso de usuarios funciona bien";
        } else {
            Security::closeSession();
            $data['errorMsg'] = 'No tienes permisos para hacer eso';
            $this->view->show("loginForm", $data);
        }
    }
}
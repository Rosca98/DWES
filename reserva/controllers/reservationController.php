<?php 
    require_once("view.php");
    require_once("models/reservation.php");


class ReservationController{
    
    /**
     * Constructor de la clase
     */
    public function __construct(){
        $this->view = new View();
        $this->reservation = new Reservation();
    }

    /**
     * Muestra lista de Reservas
     */
    public function showReservationList(){
        $this->view->show("reservation/showAllReservations");
    }

    /**
     * Muestra el formulario para añadir reservas
     */
    public function showAddReservation(){
        $this->view->show("reservation/showAddReservations");
    }

    /**
     * Muestra el formulario para modificar reservas
     */
    public function showModReservation(){
        $this->view->show("reservation/showModReservations");
    }

    /**
     * Procesamos la informacion para añadir la nueva reserva
     */
    public function processAddReservation(){
        $username = $_REQUEST["user_username"];
        $password = $_REQUEST["user_password"];
        $realname = $_REQUEST["user_realname"];

        $this->user->addUser($username,$password,$realname);
        header('Location: index.php?action=showUserList');
    }

    /**
     * Eliminar la reserva
     */
    public function eliminarReservation(){
        $id = $_REQUEST['id_user'];
        $this->user->deleteUser($id);
        //Volver a la lista de Usuarios
        header('Location: index.php?action=showUserList');
    }

    /**
     * Modificar la reserva
     */
    public function ProcessModifyReservation(){     
        $id = $_REQUEST["user_id"];
        $username = $_REQUEST["user_username"];
        $password = $_REQUEST["user_password"];
        $realname = $_REQUEST["user_realname"];
        
        $this->user->ModifyUser($id,$username,$password,$realname);
        header('Location: index.php');
    }    
}
<?php
require_once("view.php");
require_once("models/reservation.php");
require_once("models/resources.php");
require_once("models/timeslots.php");


class ReservationController {

    /**
     * Constructor de la clase
     */
    public function __construct() {
        $this->view = new View();
        $this->reservation = new Reservation();
    }

    /**
     * Muestra lista de Reservas
     */
    public function showReservationList() {
        $this->view->show("reservation/showAllReservations");
    }

    /**
     * Muestra el formulario para añadir reservas
     */
    public function showAddReservation() {
        $this->view->show("reservation/showAddReservations");
    }

    /**
     * Procesamos la informacion para añadir la nueva reserva
     */
    public function processAddReservation() {
        $user = $_REQUEST["user_id"];
        $resource = $_REQUEST["resource_id"];
        $timeslot = $_REQUEST["timeslot_id"];
        $date = $_REQUEST["date"];
        $remarks = $_REQUEST["remarks"];

        $avaliable = Reservation::isAvaliable($resource, $timeslot, $date);

        if ($avaliable) {
            $this->reservation->addReservation($resource, $user, $timeslot, $date, $remarks);
            header('Location: index.php?controller=reservationController&action=showReservationList');
        } else {
            $data['errorMsg'] = "Ya existe una reserva para ese recurso en esa hora, por favor, prueba otra";
            $this->view->show("reservation/showAddReservations", $data);
        }
    }

    /**
     * Eliminar la reserva
     */
    public function eliminarReservation() {
        $id = $_REQUEST['id_reservation'];
        $this->reservation->deleteReservation($id);
        //Volver a la lista de Usuarios
        header('Location: index.php?controller=reservationController&action=showReservationList');
    }
}

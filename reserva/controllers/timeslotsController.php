<?php 
    require_once("view.php");
    require_once("models/timeslots.php");


class TimeSlotsController{
    
    /**
     * Constructor de la clase
     */
    public function __construct(){
        $this->view = new View();
        $this->timeslot = new TimeSlot();
    }

    /**
     * Muestra lista de TimeSlots
     */
    public function showTimeSlotList(){
        $this->view->show("timeslots/showAllTimeSlots");
    }

    /**
     * Muestra el formulario para añadir TimeSlot
     */
    public function showAddTimeSlot(){
        $this->view->show("timeslots/showAddTimeSlots");
    }

    /**
     * Muestra el formulario para modificar TimeSlots
     */
    public function showModTimeSlot(){
        $this->view->show("timeslots/showModTimeSlots");
    }

    /**
     * Procesamos la informacion para añadir el nuevo TimeSlot
     */
    public function processAddTimeSlot(){
        $dayofWeek = $_REQUEST["timeslot_dayofWeek"];
        $startTime = $_REQUEST["timeslot_startTime"];
        $endTime = $_REQUEST["timeslot_endTime"];

        $this->timeslot->addTimeSlot($dayofWeek,$startTime,$endTime);
        header('Location: index.php?action=showTimeSlotList');
    }

    /**
     * Eliminar el TimeSlot
     */
    public function eliminarTimeslot(){
        $id = $_REQUEST['id_timeslots'];
        $this->timeslot->deleteTimeSlot($id);
        //Volver a la lista de TimeSlot
        header('Location: index.php?action=showTimeSlotList');
    }

    /**
     * Modificar el TimeSlot
     */
    public function ProcessModifyTimeSlot(){     
        $id = $_REQUEST["timeslot_id"];
        $dayofWeek = $_REQUEST["timeslot_dayofWeek"];
        $startTime = $_REQUEST["timeslot_startTime"];
        $endTime = $_REQUEST["timeslot_endTime"];
        
        $this->timeslot->ModifyTimeslot($id,$dayofWeek,$startTime,$endTime);
        header('Location: index.php');
    }    
}
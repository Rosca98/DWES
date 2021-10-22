<?php
    require_once("conexion.php");

class TimeSlot{

    static function TimeSlotsList(){
        $db = new conexion;
        $db->conectar();
        if ($result = $db->obtenerInformacion("SELECT * FROM timeslots")) {
                return $result;
        }else {
            return null;
        }
        $db->cerrar();
    }

    static function formModTimeSlot($id_timeslot){
        $db = new conexion;
        $db->conectar();
        $id = $id_timeslot;

        if ($result = $db->obtenerInformacion("SELECT * FROM timeslots WHERE idTimeSlot = $id")) {
            return $result;
        }else {
            return null;
        }
    }
    
    static function ModifyTimeSlot($id,$dayofWeek,$startTime,$endTime){
        $db = new conexion;
        $db->conectar();
        $sql = ("UPDATE timeslots SET dayofWeek = '$dayofWeek',startTime = '$startTime',endTime = '$endTime' WHERE idTimeSlot = $id;");
        $db->ejecutarSQL($sql);
        $db->cerrar();
    }

    static function addTimeSlot($dayofWeek,$startTime,$endTime){
        $db = new conexion;
        $db->conectar();
        $sql = ("INSERT INTO timeslots VALUES (NULL, '$dayofWeek', '$startTime', '$endTime');");
        $db->ejecutarSQL($sql);
        $db->cerrar();
    }

    static function deleteTimeSlot($id){
        $db = new conexion;
        $db->conectar();
        $sql = ("DELETE FROM timeslots WHERE idTimeSlot = $id");
        $db->ejecutarSQL($sql);
        $db->cerrar();
    }
}

?>
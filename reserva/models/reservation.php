<?php
    require_once("conexion.php");

class Reservation{
    static function ReservationList(){
        $db = new conexion;
        $db->conectar();
        if ($result = $db->dataQuery("SELECT * FROM reservations")) {
                return $result;
        }else {
            return null;
        }
        $db->cerrar();
    }
    
    static function ModifyReservation($id,$idResource,$idUser,$idTimeSlot,$remarks){
        $db = new conexion;
        $db->conectar();
        $sql = ("UPDATE reservation SET idResource = '$idResource', idUser = '$idUser', idTimeSlot = '$idTimeSlot', remarks = '$remarks' WHERE idReservation = $id;");
        $db->dataManipulation($sql);
        $db->cerrar();
    }

    static function addReservation($idResource,$idUser,$idTimeSlot,$remarks){
        $db = new conexion;
        $db->conectar();
        $sql = ("INSERT INTO reservation VALUES(NULL, '$idResource', '$idUser', '$idTimeSlot', '$remarks')");
        $db->dataManipulation($sql);
        $db->cerrar();
    }

    static function deleteReservation($id){
        $db = new conexion;
        $db->conectar();
        $sql = ("DELETE FROM reservation WHERE idReservation = $id");
        $db->dataManipulation($sql);
        $db->cerrar();
    }
}

?>
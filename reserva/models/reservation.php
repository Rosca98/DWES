<?php
    require_once("conexion.php");

class Reservation{
    static function ReservationList(){
        $db = new conexion;
        $db->connect();
        if ($result = $db->dataQuery("SELECT * FROM reservations")) {
                return $result;
        }else {
            return null;
        }
        $db->close();
    }

    static function addReservation($idResource,$idUser,$idTimeSlot,$remarks){
        $db = new conexion;
        $db->connect();
        $date = date("Y-m-d H:i:s");
        $sql = ("INSERT INTO reservations VALUES(NULL, '$idResource', '$idUser', '$idTimeSlot', '$date', '$remarks')");
        $db->dataManipulation($sql);
        $db->close();
    }

    static function deleteReservation($id){
        $db = new conexion;
        $db->connect();
        $sql = ("DELETE FROM reservations WHERE idReservation = $id");
        $db->dataManipulation($sql);
        $db->close();
    }

    static function isAvaliable($idResource, $idTimeSlot){
        $db = new conexion;
        $db->connect();
        $result = $db->dataQuery("SELECT * FROM Reservations WHERE idResource = $idResource AND idTimeSlot = $idTimeSlot;");

        if(empty($result)){
            $avaliable = true;
        }else{
            $avaliable = false;
        }
        $db->close();
        return $avaliable;
    }
}

?>
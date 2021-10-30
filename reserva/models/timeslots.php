<?php
    require_once("conexion.php");

class TimeSlot{

    static function TimeSlotsList(){
        $db = new conexion;
        $db->connect();
        if ($result = $db->dataQuery("SELECT * FROM timeslots")) {
                return $result;
        }else {
            return null;
        }
        $db->close();
    }

    static function formModTimeSlot($id_timeslot){
        $db = new conexion;
        $db->connect();
        $id = $id_timeslot;

        if ($result = $db->dataQuery("SELECT * FROM timeslots WHERE idTimeSlot = $id")) {
            return $result;
        }else {
            return null;
        }
    }
    
    static function ModifyTimeSlot($id,$dayofWeek,$startTime,$endTime){
        $db = new conexion;
        $db->connect();
        $sql = ("UPDATE timeslots SET dayofWeek = '$dayofWeek',startTime = '$startTime',endTime = '$endTime' WHERE idTimeSlot = $id;");
        $db->dataManipulation($sql);
        $db->close();
    }

    static function addTimeSlot($dayofWeek,$startTime,$endTime){
        $db = new conexion;
        $db->connect();
        $sql = ("INSERT INTO timeslots VALUES (NULL, '$dayofWeek', '$startTime', '$endTime');");
        $db->dataManipulation($sql);
        $db->close();
    }

    static function deleteTimeSlot($id){
        $db = new conexion;
        $db->connect();
        $sql = ("DELETE FROM timeslots WHERE idTimeSlot = $id");
        $db->dataManipulation($sql);
        $db->close();
    }

    static function getTimeSlotDay($id){
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT dayOfWeek FROM timeslots WHERE idTimeSlot = $id");
        $result = $db->dataQuery($sql);
        $db->close();
        foreach ($result as $name) {
            return $name["dayOfWeek"];
        }
    }
    static function getStartTime($id){
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT startTime FROM timeslots WHERE idTimeSlot = $id");
        $result = $db->dataQuery($sql);
        $db->close();
        foreach ($result as $name) {
            return $name["startTime"];
        }
    }
    static function getEndTime($id){
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT endTime FROM timeslots WHERE idTimeSlot = $id");
        $result = $db->dataQuery($sql);
        $db->close();
        foreach ($result as $name) {
            return $name["endTime"];
        }
    }

    static function showAllTimeSlots(){
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT * FROM timeslots");
        $result = $db->dataQuery($sql);
        foreach ($result as $day) {
            echo "<option value=".$day['idTimeSlot']."> Dia: ".$day['dayOfWeek']. " De ". $day['startTime'] ." a ". $day['endTime']."</option>";
        }
        $db->close();
    }

}

?>
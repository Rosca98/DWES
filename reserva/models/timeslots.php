<?php
require_once("conexion.php");

class TimeSlot {

    /**
     * Muestra una lista con todos los timeslots
     */
    static function TimeSlotsList() {
        $db = new conexion;
        $db->connect();
        if ($result = $db->dataQuery("SELECT * FROM timeslots")) {
            return $result;
        } else {
            return null;
        }
        $db->close();
    }

    /**
     * Select segun el id del timeslot para mostrar los datos a modificar
     */
    static function formModTimeSlot($id_timeslot) {
        $db = new conexion;
        $db->connect();
        $id = $id_timeslot;

        if ($result = $db->dataQuery("SELECT * FROM timeslots WHERE idTimeSlot = $id")) {
            return $result;
        } else {
            return null;
        }
    }

    /**
     * Lanza un update con todos los datos para modificar los timeslots
     */
    static function ModifyTimeSlot($id, $dayofWeek, $startTime, $endTime) {
        $db = new conexion;
        $db->connect();
        $sql = ("UPDATE timeslots SET dayofWeek = '$dayofWeek',startTime = '$startTime',endTime = '$endTime' WHERE idTimeSlot = $id;");
        $db->dataManipulation($sql);
        $db->close();
    }

    /**
     * Lanza un insert con los datos del nuevo timeslot que queremos añadir
     */
    static function addTimeSlot($dayofWeek, $startTime, $endTime) {
        $db = new conexion;
        $db->connect();
        $sql = ("INSERT INTO timeslots VALUES (NULL, '$dayofWeek', '$startTime', '$endTime');");
        $db->dataManipulation($sql);
        $db->close();
    }

    /**
     * Elimina el timeslot segun el id
     */
    static function deleteTimeSlot($id) {
        $db = new conexion;
        $db->connect();
        $sql = ("DELETE FROM timeslots WHERE idTimeSlot = $id");
        $db->dataManipulation($sql);
        $db->close();
    }

    /**
     * Muestra el dia de la semana segun el idtimeslot
     */
    static function getTimeSlotDay($id) {
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT dayOfWeek FROM timeslots WHERE idTimeSlot = $id");
        $result = $db->dataQuery($sql);
        $db->close();
        foreach ($result as $name) {
            return $name["dayOfWeek"];
        }
    }

    /**
     * Muestra la hora de inicio segun el idtimeslot
     */
    static function getStartTime($id) {
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT startTime FROM timeslots WHERE idTimeSlot = $id");
        $result = $db->dataQuery($sql);
        $db->close();
        foreach ($result as $name) {
            return $name["startTime"];
        }
    }

    /**
     * Muestra la hora final segun el idtimeslot
     */
    static function getEndTime($id) {
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT endTime FROM timeslots WHERE idTimeSlot = $id");
        $result = $db->dataQuery($sql);
        $db->close();
        foreach ($result as $name) {
            return $name["endTime"];
        }
    }

    /**
     * Muestra una opcion para un select con el valor del dia, hora de inicio y hora de fin segun el idTimeslot
     */
    static function showAllTimeSlots() {
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT * FROM timeslots");
        $result = $db->dataQuery($sql);
        foreach ($result as $day) {
            echo "<option value='" . $day['idTimeSlot'] . "'> Dia: " . $day['dayOfWeek'] . " De " . $day['startTime'] . " a " . $day['endTime'] . "</option>";
        }
        $db->close();
    }
}

<?php
require_once("conexion.php");

class Resource {

    /**
     * Select all de todos los recursos
     */
    static function ResourcesList() {
        $db = new conexion;
        $db->connect();
        if ($result = $db->dataQuery("SELECT * FROM resources")) {
            return $result;
        } else {
            return null;
        }
        $db->close();
    }

    /**
     * Select segun el id del recurso para mostrar los datos a modificar
     */
    static function formModResource($id) {
        $db = new conexion;
        $db->connect();
        if ($result = $db->dataQuery("SELECT * FROM resources WHERE idResource = $id")) {
            return $result;
        } else {
            return null;
        }
    }

    /**
     * Lanza un update con todos los datos para modificar el recurso
     */
    static function ModifyResource($id, $name, $desc, $location, $img_ruta) {
        $db = new conexion;
        $db->connect();
        $sql = ("UPDATE resources SET name = '$name',description = '$desc',location = '$location', image = '$img_ruta' WHERE idResource = $id;");
        $db->dataManipulation($sql);
        $db->close();
    }

    /**
     * Lanza un insert con los datos del nuevo recurso que queremos añadir
     */
    static function addResource($name, $desc, $location, $img_ruta) {
        $db = new conexion;
        $db->connect();
        $sql = ("INSERT INTO resources VALUES(NULL, '$name', '$desc', '$location', '$img_ruta')");
        $db->dataManipulation($sql);
        $db->close();
    }

    /**
     * Elimina el recurso segun el id
     */
    static function deleteResource($id) {
        $db = new conexion;
        $db->connect();
        $sql = ("DELETE FROM resources WHERE idResource = $id");
        $db->dataManipulation($sql);
        $db->close();
    }

    /**
     * Muestra el nombre del recurso segun su id
     */
    static function getResourceName($id) {
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT name FROM resources WHERE idResource = $id");
        $result = $db->dataQuery($sql);
        $db->close();
        foreach ($result as $name) {
            return $name["name"];
        }
    }

    /**
     * Muestra el nombre del recurso y se le da al value el id del recurso 
     */
    static function showAllResources() {
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT * FROM resources");
        $result = $db->dataQuery($sql);
        foreach ($result as $resource) {
            echo "<option value='" . $resource['idResource'] . "'>" . $resource['name'] . "</option>";
        }
        $db->close();
    }
}

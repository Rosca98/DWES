<?php
    require_once("conexion.php");

class Resource{
    static function ResourcesList(){
        $db = new conexion;
        $db->connect();
        if ($result = $db->dataQuery("SELECT * FROM resources")) {
                return $result;
        }else {
            return null;
        }
        $db->close();
    }

    static function formModResource($id_Resource){
        $db = new conexion;
        $db->connect();
        $id = $id_Resource;

        if ($result = $db->dataQuery("SELECT * FROM resources WHERE idResource = $id")) {
            return $result;
        }else {
            return null;
        }
    }
    
    static function ModifyResource($id,$name,$desc,$location,$img){
        $db = new conexion;
        $db->connect();
        $sql = ("UPDATE resources SET name = '$name',description = '$desc',location = '$location', image = '$img' WHERE idResource = $id;");
        $db->dataManipulation($sql);
        $db->close();
    }

    static function addResource($name,$desc,$location,$img_ruta){
        $db = new conexion;
        $db->connect();
        $sql = ("INSERT INTO resources VALUES(NULL, '$name', '$desc', '$location', '$img_ruta')");
        $db->dataManipulation($sql);
        $db->close();
    }

    static function deleteResource($id){
        $db = new conexion;
        $db->connect();
        $sql = ("DELETE FROM resources WHERE idResource = $id");
        $db->dataManipulation($sql);
        $db->close();
    }

    static function getResourceName($id){
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT name FROM resources WHERE idResource = $id");
        $result = $db->dataQuery($sql);
        $db->close();
        foreach ($result as $name) {
            return $name["name"];
        }
    }

    static function showAllResources(){
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT * FROM resources");
        $result = $db->dataQuery($sql);
        foreach ($result as $resource) {
            echo "<option value=".$resource['idResource'].">".$resource['name']."</option>";
        }
        $db->close();
    }
}

?>
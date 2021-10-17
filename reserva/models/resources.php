<?php
    require_once("conexion.php");

class Resource{
    static function ResourcesList(){
        $db = new conexion;
        $db->conectar();
        if ($result = $db->obtenerInformacion("SELECT * FROM resources")) {
                return $result;
        }else {
            return null;
        }
        $db->cerrar();
    }

    static function formModResource($id_Resource){
        $db = new conexion;
        $db->conectar();
        $id = $id_Resource;

        if ($result = $db->obtenerInformacion("SELECT * FROM resources WHERE idResource = $id")) {
            return $result;
        }else {
            return null;
        }
    }
    
    static function ModifyResource($id,$name,$desc,$location,$img){
        $db = new conexion;
        $db->conectar();
        $sql = ("UPDATE resources SET name = '$name',description = '$desc',location = '$location', image = '$img' WHERE idResource = $id;");
        $db->ejecutarSQL($sql);
        $db->cerrar();
    }

    static function addResource($name,$desc,$location,$img_ruta){
        $db = new conexion;
        $db->conectar();
        $sql = ("INSERT INTO resources VALUES(NULL, '$name', '$desc', '$location', '$img_ruta')");
        $db->ejecutarSQL($sql);
        $db->cerrar();
    }

    static function deleteResource($id){
        $db = new conexion;
        $db->conectar();
        $sql = ("DELETE FROM resources WHERE idResource = $id");
        $db->ejecutarSQL($sql);
        $db->cerrar();
    }
}

?>
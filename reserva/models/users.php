<?php
    require_once("conexion.php");

class User{

    static function UserList(){
        $db = new conexion;
        $db->conectar();
        if ($result = $db->obtenerInformacion("SELECT * FROM users")) {
                return $result;
        }else {
            return null;
        }
        $db->cerrar();
    }

    static function formModUser($id_User){
        $db = new conexion;
        $db->conectar();
        $id = $id_User;

        if ($result = $db->obtenerInformacion("SELECT * FROM users WHERE idUser = $id")) {
            return $result;
        }else {
            return null;
        }
    }
    
    static function ModifyUser($id,$username,$password,$realname){
        $db = new conexion;
        $db->conectar();
        $sql = ("UPDATE users SET username = '$username',password = '$password',realname = '$realname' WHERE idUser = $id;");
        $db->ejecutarSQL($sql);
        $db->cerrar();
    }

    static function addUser($username,$password,$realname){
        $db = new conexion;
        $db->conectar();
        $sql = ("INSERT INTO users VALUES (NULL, '$username', '$password', '$realname', '1');");
        $db->ejecutarSQL($sql);
        $db->cerrar();
    }

    static function deleteUser($id){
        $db = new conexion;
        $db->conectar();
        $sql = ("DELETE FROM users WHERE idUser = $id");
        $db->ejecutarSQL($sql);
        $db->cerrar();
    }
}

?>
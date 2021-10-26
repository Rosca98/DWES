<?php
    require_once("conexion.php");

class User{

    static function UserList(){
        $db = new conexion;
        $db->conectar();
        if ($result = $db->dataQuery("SELECT * FROM users")) {
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

        if ($result = $db->dataQuery("SELECT * FROM users WHERE idUser = $id")) {
            return $result;
        }else {
            return null;
        }
    }
    
    static function ModifyUser($id,$username,$password,$realname){
        $db = new conexion;
        $db->conectar();
        $sql = ("UPDATE users SET username = '$username',password = '$password',realname = '$realname' WHERE idUser = $id;");
        $db->dataManipulation($sql);
        $db->cerrar();
    }

    static function addUser($username,$password,$realname){
        $db = new conexion;
        $db->conectar();
        $sql = ("INSERT INTO users VALUES (NULL, '$username', '$password', '$realname', '1');");
        $db->dataManipulation($sql);
        $db->cerrar();
    }

    static function deleteUser($id){
        $db = new conexion;
        $db->conectar();
        $sql = ("DELETE FROM users WHERE idUser = $id");
        $db->dataManipulation($sql);
        $db->cerrar();
    }
    
    static function getUserName($id){
        $db = new conexion;
        $db->conectar();
        $sql = ("SELECT username FROM users WHERE idUser = $id");
        $result = $db->dataQuery($sql);
        $db->cerrar();
        foreach ($result as $name) {
            return $name["username"];
        }
    }

    public function checkLogin($username, $password){
        $db = new conexion;
        $db->conectar();
        $result = $db->dataQuery("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        if (count($result) > 0)
             return $result[0];
         else
             return null;
        $db->cerrar();
    }
}

?>
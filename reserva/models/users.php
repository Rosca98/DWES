<?php
    require_once("conexion.php");

class User{

    static function UserList(){
        $db = new conexion;
        $db->connect();
        if ($result = $db->dataQuery("SELECT * FROM users")) {
                return $result;
        }else {
            return null;
        }
        $db->close();
    }

    static function formModUser($id_User){
        $db = new conexion;
        $db->connect();
        $id = $id_User;

        if ($result = $db->dataQuery("SELECT * FROM users WHERE idUser = $id")) {
            return $result;
        }else {
            return null;
        }
    }
    
    static function ModifyUser($id,$username,$password,$realname){
        $db = new conexion;
        $db->connect();
        $sql = ("UPDATE users SET username = '$username',password = '$password',realname = '$realname' WHERE idUser = $id;");
        $db->dataManipulation($sql);
        $db->close();
    }

    static function addUser($username,$password,$realname){
        $db = new conexion;
        $db->connect();
        $sql = ("INSERT INTO users VALUES (NULL, '$username', '$password', '$realname', '1');");
        $db->dataManipulation($sql);
        $db->close();
    }

    static function deleteUser($id){
        $db = new conexion;
        $db->connect();
        $sql = ("DELETE FROM users WHERE idUser = $id");
        $db->dataManipulation($sql);
        $db->close();
    }
    
    static function getUserName($id){
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT username FROM users WHERE idUser = $id");
        $result = $db->dataQuery($sql);
        $db->close();
        foreach ($result as $name) {
            return $name["username"];
        }
    }

    static function isAdmin(){
        $db = new conexion;
        $db->connect();
        if (isset($_SESSION['idUser'])) {
        $idUser = $_SESSION['idUser'];
        $sql = ("SELECT type FROM users WHERE idUser = $idUser and type = 1");
        $result = $db->dataQuery($sql);
            if(empty($result)){
                $admin = false;
            }else{
                $admin = true;
            }
            return $admin;
        }
        $db->close();
    }

    static function checkLogin($username, $password){
        $db = new conexion;
        $db->connect();
        $result = $db->dataQuery("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        if (count($result) > 0){
            Security::createSession($result[0]['idUser']);
            return $result[0];
        }else{
            return null;
        }
        $db->close();
    }

    static function showAllUsers(){
        $db = new conexion;
        $db->connect();
        $sql = ("SELECT * FROM users");
        $result = $db->dataQuery($sql);
        foreach ($result as $user) {
            echo "<option value=".$user['idUser'].">".$user['username']."</option>";
        }
        $db->close();
    }
}

?>
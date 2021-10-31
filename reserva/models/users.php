<?php
    require_once("conexion.php");

class User{

    /**
     * Select all de todos los usuarios
     */
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

    /**
     * Select segun el id del usuario para mostrar los datos a modificar
     */
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
    
    /**
     * Lanza un update con todos los datos para modificar el usuario
     */
    static function ModifyUser($id,$username,$password,$realname){
        $db = new conexion;
        $db->connect();
        $passwordmd5 = md5($password);
        $sql = ("UPDATE users SET username = '$username',password = '$passwordmd5',realname = '$realname' WHERE idUser = $id;");
        $db->dataManipulation($sql);
        $db->close();
    }

    /**
     * Lanza un insert con los datos del nuevo usuario que queremos añadir
     */
    static function addUser($username,$password,$realname){
        $db = new conexion;
        $db->connect();
        $passwordmd5 = md5($password);
        $sql = ("INSERT INTO users VALUES (NULL, '$username', '$passwordmd5', '$realname', '1');");
        $db->dataManipulation($sql);
        $db->close();
    }

    /**
     * Elimina el usuario segun el id
     */
    static function deleteUser($id){
        $db = new conexion;
        $db->connect();
        $sql = ("DELETE FROM users WHERE idUser = $id");
        $db->dataManipulation($sql);
        $db->close();
    }
    
    /**
     * Muestra el username del usuario segun su id
     */
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

    /**
     * Devuelve true si el usuario es Administrador(type 1)
     */
    static function isAdmin(){
        $db = new conexion;
        $db->connect();
        if (isset($_SESSION['idUser'])) {
        $idUser = $_SESSION['idUser'];
        $sql = ("SELECT type FROM users WHERE idUser = $idUser and type = 1");
        $result = $db->dataQuery($sql);
            if(empty($result)){
                return false;
            }else{
                return true;
            }
        }
        $db->close();
    }

    /**
     * Comprueba si el usuario y contraseña coinicide con alguna de la base de datos y se crea una sesion con el id
     */
    static function checkLogin($username, $password){
        $db = new conexion;
        $db->connect();
        $result = $db->dataQuery("SELECT * FROM users WHERE username = '$username' AND password = MD5('$password')");
        if (count($result) > 0){
            Security::createSession($result[0]['idUser']);
            return $result[0];
        }else{
            return null;
        }
        $db->close();
    }

    /**
     * Muestra el nombre de usuario y se le da al value el id del usuario 
     */
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
<?php
class conexion{
    private $server;
    private $user;
    private $pass;
    private $db;

    function __construct(){
        $this->server = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->db = "reservas";
    }

    function connect(){
        $this->connection = mysqli_connect(
            $this->server,
            $this->user,
            $this->pass,
            $this->db
        );

        if (mysqli_connect_errno()) {
            echo ("Error al connectse a la base de datos");
        }
    }

    function dataQuery($sql){
        $data = array();
        $resultado = mysqli_query($this -> connection, $sql);
        $error = mysqli_error($this -> connection);

        if (empty($error)) {
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    array_push($data, $row);
                }
            }
        } else {
            throw new Exception($error);
        }
        return $data;
    }
    
    function dataManipulation($sql){
        $conectado = mysqli_query($this -> connection, $sql);

        $error = mysqli_error($this -> connection);

        if (empty($error)) {
            return $conectado;
        } else {
            throw new Exception($error);
        }
    }

    function close(){
        mysqli_close($this -> connection);
    }

}
?>
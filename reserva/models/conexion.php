<?php
class conexion{
    private $server;
    private $user;
    private $pass;
    private $db;

    /**
     * Constructor
     */
    function __construct(){
        $this->server = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->db = "reservas";
    }

    /**
     * Conecta a la base de datos con los datos ya dados en el constructor
     */
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

    /**
     * Lanza una consulta (SELECT) contra la base de datos.
     * ¡Ojo! Este método solo funcionará con sentencias SELECT.
     * @param $sql El código de la consulta que se quiere lanzar
     * @return array Un array bidimensional con los resultados de la consulta (o null si la consulta no devolvió nada)
     */
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

    /**
     * Lanza una sentencia de manipulación de datos contra la base de datos.
     * ¡Ojo! Este método solo funcionará con sentencias INSERT, UPDATE, DELETE y similares.
     * @param $sql El código de la consulta que se quiere lanzar
     */
    function dataManipulation($sql){
        $conectado = mysqli_query($this -> connection, $sql);

        $error = mysqli_error($this -> connection);

        if (empty($error)) {
            return $conectado;
        } else {
            throw new Exception($error);
        }
    }
    /**
     * Cierra la conexion con la base de datos
     */
    function close(){
        mysqli_close($this -> connection);
    }

}
?>
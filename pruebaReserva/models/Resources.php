<?php

include_once("db.php");

class Resources
{

    /**
     * Constructor de la clase.
     * Crea una conexión con la base de datos y la asigna a la variable $this->db
     */
    public function __construct()
    {
        DB::createConnection();
    }

    /**
     * Comprueba si un email y una password pertenecen a algún resources de la base  de datos.
     * @param String $email El email del resources que se quiere comprobar
     * @param String $pass La contraseña del resources que se quiere comprobar
     * @return User $resources Si el resources existe, devuelve un objeto con todos los campos del resources en su interior. Si no, devuelve un objeto null
     */
    
    public static function resourceslist() //esta funcion devuelve todos los elementos que hay en la tabla
    {
       $result = DB::dataQuery("SELECT * FROM resources");
       return $result;
    }
    public function eliminarRecurso($idResource){
        

            // Recuperamos el id del libro y lanzamos el DELETE contra la BD
            $result = DB::dataManipulation("DELETE FROM resources WHERE id = '$idResource'");

            // Mostramos mensaje con el resultado de la operación
            if ($result->affected_rows == 0) {
                echo "error no fue eliminado";
            } else {
                echo "eliminado con éxito";
            }
            

    }
    public function insertarRecurso($idResource,$name,$description,$location,$reservations){
            $result = DB::dataManipulation("INSERT INTO resources(id,name,description,location,reservations) VALUES ('$idResource','$name', '$description', '$location', '$reservations')");

            if ($result->affected_rows == 0) {
                echo "error no fue insertado";
            } else {
                echo "insertado con éxito";
            }

    }
    public function modificarRecurso($idResources,$name,$description,$location,$reservations){
        $result = DB::dataManipulation("UPDATE resources SET name='$name', description='$description', location='$location', reservations='$reservations' WHERE id='$idResources'");
    }

    }
?>
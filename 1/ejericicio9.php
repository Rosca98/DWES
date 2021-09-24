<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "videoclub";
    $conn = new mysqli($server, $user, $pass, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $tabla = "CREATE TABLE peliculas (
        id_pelicula INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(50) NOT NULL,
        genero VARCHAR(50) NOT NULL,
        pais VARCHAR(50) NOT NULL,
        ayo DATE NOT NULL,
        cartel VARCHAR(255) NOT NULL
    );

    CREATE TABLE personas (
        id_persona INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        apellidos VARCHAR(50) NOT NULL,
        fotografia VARCHAR(255) NOT NULL,
    );

    CREATE TABLE actuan (
        id_pelicula INT UNSIGNED NOT NULL,
        id_persona INT UNSIGNED NOT NULL,
        FOREIGN KEY (id_pelicula) REFERENCES peliculas(id_pelicula),
        FOREIGN KEY (id_persona) REFERENCES personas(id_persona)
    );
    ";

    if($conn->query($tabla) === TRUE){
        echo "Base de datos creada con exito";



    }else{
        echo "Error creating table: " . $conn->error;
    }

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <h1>EJERCICIO 6: CREACION DE TABLAS</h1>
</body>
</html>
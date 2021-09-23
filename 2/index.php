<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

            $db = new mysqli("localhost", "root", "", "videoclub");

            // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
            if (isset($_REQUEST["action"])) {
                $action = $_REQUEST["action"];
            } else {
                $action = "mostrarListaPeliculas";  // Acción por defecto
            }



            // CONTROL DE FLUJO PRINCIPAL
    // El programa saltará a la sección del switch indicada por la variable "action"
    switch ($action) {

        // --------------------------------- MOSTRAR LISTA DE PELICULAS ----------------------------------------

        case "mostrarListaPeliculas":
            echo "<h1>VIDEOCLUB</h1>";

            // Buscamos todos los Peliculas del Videoclub
            if ($result = $db->query("SELECT * FROM Peliculas 
                                        ORDER BY Peliculas.titulo")) {

                // La consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
                if ($result->num_rows != 0) {
                    // La consulta ha devuelto registros: vamos a mostrarlos

                    // Primero, el formulario de búsqueda
                    echo "<form action='index.php'>
                                <input type='hidden' name='action' value='buscarPeliculas'>
                                <input type='text' name='textoBusqueda'>
                                <input type='submit' value='Buscar'>
                                </form><br>";

                    // Ahora, la tabla con los datos de los Peliculas
                    echo "<table border ='1'>";
                    while ($fila = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $fila->titulo . "</td>";
                        echo "<td>" . $fila->genero . "</td>";
                        echo "<td>" . $fila->pais . "</td>";
                        echo "<td>" . $fila->anyo . "</td>";
                        echo "<td>" . $fila->cartel . "</td>";
                        echo "<td><a href='index.php?action=formularioModificarPelicula&id_pelicula=" . $fila->id_pelicula . "'>Modificar</a></td>";
                        echo "<td><a href='index.php?action=borrarPelicula&id_pelicula=" . $fila->id_pelicula . "'>Borrar</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    // La consulta no contiene registros
                    echo "No se encontraron datos";
                }
            } else {
                // La consulta ha fallado
                echo "Error al tratar de recuperar los datos de la base de datos. Por favor, inténtelo más tarde";
            }
            echo "<p><a href='index.php?action=formularioInsertarPeliculas'>Nuevo</a></p>";
            break;
        
            // --------------------------------- BORRAR PELICULAS ----------------------------------------

            case "borrarPelicula":
                echo "<h1>Borrar peliculas</h1>";

                // Recuperamos el id de pelicula y lanzamos el DELETE contra la BD
                $idLibro = $_REQUEST["id_pelicula"];
                $db->query("DELETE FROM peliculas WHERE id_pelicula = '$id_pelicula'");

                // Mostramos mensaje con el resultado de la operación
                if ($db->affected_rows == 0) {
                    echo "Ha ocurrido un error al borrar la pelicula. Por favor, inténtelo de nuevo";
                } else {
                    echo "Pelicula borrado con éxito";
                }
                echo "<p><a href='index.php'>Volver</a></p>";

                break;






















            }

    ?>
</body>
</html>
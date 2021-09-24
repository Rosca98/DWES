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

                    //Fromulario busqueda
                    
                    echo "<form action='index.php'>
                    <input type='hidden' name='action' value='buscarPelicula'>
                    <input type='text' name='textoBusqueda'>
                    <input type='submit' value='Buscar'>
                    </form><br>";


                    // Ahora, la tabla con los datos de los Peliculas
                    echo "<table border ='1'>
                    <tr><th>Titulo</th><th>Genero</th><th>Pais</th><th>Año</th><th>Cartel</th><th>Modificar</th><th>Borrar</th></tr>";
                    while ($fila = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $fila->titulo . "</td>";
                        echo "<td>" . $fila->genero . "</td>";
                        echo "<td>" . $fila->pais . "</td>";
                        echo "<td>" . $fila->anyo . "</td>";
                        echo "<td><img src='$fila->cartel' width='150px' height='200px'></td>";
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
            
            echo "<p><a href='index.php?action=formularioInsertarPelicula'>Nuevo</a></p>";
            break;
        
            // --------------------------------- BORRAR PELICULAS ----------------------------------------

            case "borrarPelicula":
                echo "<h1>Borrar peliculas</h1>";

                // Recuperamos el id de pelicula y lanzamos el DELETE contra la BD
                $id_pelicula = $_REQUEST["id_pelicula"];
                $db->query("DELETE FROM peliculas WHERE id_pelicula = '$id_pelicula'");

                // Mostramos mensaje con el resultado de la operación
                if ($db->affected_rows == 0) {
                    echo "Ha ocurrido un error al borrar la pelicula. Por favor, inténtelo de nuevo";
                } else {
                    echo "Pelicula borrado con éxito";
                }
                echo "<p><a href='index.php'>Volver</a></p>";

                break;

        // --------------------------------- BUSCAR PELICULAS ----------------------------------------
        case "buscarPelicula":
            // Recuperamos el texto de búsqueda de la variable de formulario
            $textoBusqueda = $_REQUEST["textoBusqueda"];
            echo "<h1>Resultados de la búsqueda: \"$textoBusqueda\"</h1>";

            // Buscamos los pelicula de la biblioteca que coincidan con el texto de búsqueda
            if ($result = $db->query("SELECT * FROM peliculas
                    WHERE titulo LIKE '%$textoBusqueda%'
                    OR genero LIKE '%$textoBusqueda%'
                    OR anyo LIKE '%$textoBusqueda%'
                    OR pais LIKE '%$textoBusqueda%'
                    ORDER BY titulo")) {

                // La consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
                if ($result->num_rows != 0) {
                    // La consulta ha devuelto registros: vamos a mostrarlos
                    // Primero, el formulario de búsqueda
                    echo "<form action='index.php'>
                                <input type='hidden' name='action' value='buscarpelicula'>
                                <input type='text' name='textoBusqueda'>
                                <input type='submit' value='Buscar'>
                        </form><br>";
                    // Después, la tabla con los datos
                    echo "<table border ='1'>";
                    while ($fila = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $fila->titulo . "</td>";
                        echo "<td>" . $fila->genero . "</td>";
                        echo "<td>" . $fila->pais . "</td>";
                        echo "<td>" . $fila->anyo . "</td>";
                        echo "<td><img src='$fila->cartel' width='150px' height='200px'></td>";
                        echo "<td><a href='index.php?action=formularioModificarPelicula&id_pelicuala=" . $fila->id_pelicula . "'>Modificar</a></td>";
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
            echo "<p><a href='index.php'>Volver</a></p>";
            break;
            // --------------------------------- FORMULARIO ALTA DE LIBROS ----------------------------------------

            case "formularioInsertarPelicula":
                echo "<h1>Modificación de pelicula</h1>";

                // Creamos el formulario con los campos del libro
                echo "<form action = 'index.php' method = 'get'>
                        Título:<input type='text' name='titulo'><br>
                        Género:<input type='text' name='genero'><br>
                        País:<input type='text' name='pais'><br>
                        Año:<input type='text' name='anyo'><br>
                        Cartel:<input type='text' name='cartel'><br>";

                echo "</select>";

                // Finalizamos el formulario
                echo "  <input type='hidden' name='action' value='insertarPelicula'>
                        <input type='submit'>
                    </form>";
                echo "<p><a href='index.php'>Volver</a></p>";

                break;


            // --------------------------------- INSERTAR LIBROS ----------------------------------------

            case "insertarPelicula":
                echo "<h1>Alta de pelicula</h1>";

                // Vamos a procesar el formulario de alta de Peliculas
                // Primero, recuperamos todos los datos del formulario
                $titulo = $_REQUEST["titulo"];
                $genero = $_REQUEST["genero"];
                $pais = $_REQUEST["pais"];
                $anyo = $_REQUEST["anyo"];
                $cartel = $_REQUEST["cartel"];

                // Lanzamos el INSERT contra la BD.
                echo "INSERT INTO peliculas (titulo,genero,pais,anyo,cartel) VALUES ('$titulo','$genero', '$pais', '$anyo', '$cartel')";
                $db->query("INSERT INTO peliculas (titulo,genero,pais,anyo,cartel) VALUES ('$titulo','$genero', '$pais', '$anyo', '$cartel')");
                if ($db->affected_rows == 1) {
                    // Si la inserción del la pelicula ha funcionado, continuamos insertando en la tabla "escriben"
                    // Tenemos que averiguar qué idLibro se ha asignado al libro que acabamos de insertar
                    echo "<br>Libro insertado con éxito";
                } else {
                    // Si la inserción del libro ha fallado, mostramos mensaje de error
                    echo "Ha ocurrido un error al insertar la pelicula. Por favor, inténtelo más tarde.";
                }
                echo "<p><a href='index.php'>Volver</a></p>";

                break;


                // --------------------------------- FORMULARIO MODIFICAR PELICULAS ----------------------------------------

            case "formularioModificarPelicula":
                echo "<h1>Modificación de peliculas</h1>";

                // Recuperamos el id del la pelicula que vamos a modificar y sacamos el resto de sus datos de la BD
                $id_pelicula = $_REQUEST["id_pelicula"];
                $result = $db->query("SELECT * FROM peliculas WHERE peliculas.id_pelicula = '$id_pelicula'");
                $pelicula = $result->fetch_object();

                // Creamos el formulario con los campos de la pelicula
                // y lo rellenamos con los datos que hemos recuperado de la BD
                echo "<form action = 'index.php' method = 'get'>
                        <input type='hidden' name='id_pelicula' value='$id_pelicula'>
                        Título:<input type='text' name='titulo' value='$pelicula->titulo'><br>
                        Género:<input type='text' name='genero' value='$pelicula->genero'><br>
                        País:<input type='text' name='pais' value='$pelicula->pais'><br>
                        Año:<input type='text' name='anyo' value='$pelicula->anyo'><br>
                        Cartel:<input type='text' name='cartel' value='$pelicula->cartel'><br>";

                // Finalizamos el formulario
                echo "  <input type='hidden' name='action' value='modificarPelicula'>
                        <input type='submit'>
                    </form>";
                echo "<p><a href='index.php'>Volver</a></p>";

                break;

                    // --------------------------------- MODIFICAR LIBROS ----------------------------------------

            case "modificarPelicula":
                echo "<h1>Modificación de libros</h1>";

                // Vamos a procesar el formulario de modificación de peliculas
                // Primero, recuperamos todos los datos del formulario
                $id_pelicula = $_REQUEST["id_pelicula"];
                $titulo = $_REQUEST["titulo"];
                $genero = $_REQUEST["genero"];
                $pais = $_REQUEST["pais"];
                $anyo = $_REQUEST["anyo"];
                $cartel = $_REQUEST["cartel"];

                // Lanzamos el UPDATE contra la base de datos.
                $db->query("UPDATE peliculas SET
                                titulo = '$titulo',
                                genero = '$genero',
                                pais = '$pais',
                                anyo = '$anyo',
                                cartel = '$cartel'
                                WHERE id_pelicula = '$id_pelicula'");

                if ($db->affected_rows == 1) {
                    // Si la modificación del la pelicula ha funcionado, mostramos este mensaje
                    echo "Libro actualizado con éxito";
                } else {
                    // Si la modificación del libro ha fallado, mostramos mensaje de error
                    echo "Ha ocurrido un error al modificar el libro. Por favor, inténtelo más tarde.";
                }
                echo "<p><a href='index.php'>Volver</a></p>";
                break;

        

















            }

    ?>
</body>
</html>
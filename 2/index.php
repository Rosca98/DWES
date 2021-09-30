<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIDEOCLUB</title>
</head>

<body>

    <?php
    $db = new mysqli("localhost", "root", "", "videoclub");

    // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    } else {
        $action = "mostrarListaPeliculas"; // Acción por defecto

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
                    echo "<table border='1'>
                    <tr><th>Titulo</th><th>Genero</th><th>Pais</th><th>Año</th><th>Cartel</th><th>Trailer</th><th>Modificar</th><th>Borrar</th></tr>";
                    while ($fila = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $fila->titulo . "</td>";
                        echo "<td>" . $fila->genero . "</td>";
                        echo "<td>" . $fila->pais . "</td>";
                        echo "<td>" . $fila->anyo . "</td>";
                        echo "<td><img src='$fila->cartel' width='150px' height='200px'></td>";
                        echo "<td> <a href='". $fila->trailer ."' target='_blank'>Trailer</a></td>";
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
            echo "<script>
                alert('Seguro que quieres borrar la pelicula');
            </script>";
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

            // Buscamos las peliculas del videoclub que coincidan con el texto de búsqueda
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
                                <input type='hidden' name='action' value='buscarPelicula'>
                                <input type='text' name='textoBusqueda'>
                                <input type='submit' value='Buscar'>
                        </form><br>";
                    // Después, la tabla con los datos
                    echo "<table border='1'>";
                    while ($fila = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $fila->titulo . "</td>";
                        echo "<td>" . $fila->genero . "</td>";
                        echo "<td>" . $fila->pais . "</td>";
                        echo "<td>" . $fila->anyo . "</td>";
                        echo "<td><img src='$fila->cartel' width='150px' height='200px'></td>";
                        echo "<td> <a href='". $fila->trailer ."' target='_blank'>Trailer</a></td>";
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
            // --------------------------------- FORMULARIO ALTA DE PELICULAS ----------------------------------------

        case "formularioInsertarPelicula":
            echo "<h1>Modificación de pelicula</h1>";

            // Creamos el formulario con los campos de la Pelicula
            echo "<form action = 'index.php' enctype='multipart/form-data' method ='post'>
                        Título:<input type='text' name='titulo'><br>
                        Género:<input type='text' name='genero'><br>
                        País:<input type='text' name='pais'><br>
                        Año:<input type='text' name='anyo'><br>
                        Trailer:<input type='text' name='trailer'><br>
                        Cartel:<input type='file' required name='cartel'><br>";

            echo "</select>";

            // Finalizamos el formulario
            echo "  <input type='hidden' name='action' value='insertarPelicula'>
                        <input type='submit'>
                    </form>";
            echo "<p><a href='index.php'>Volver</a></p>";

            break;

            // --------------------------------- INSERTAR PELICULAS ----------------------------------------

        case "insertarPelicula":
            echo "<h1>Alta de pelicula</h1>";

            // Vamos a procesar el formulario de alta de Peliculas
            // Primero, recuperamos todos los datos del formulario
            $titulo = $_REQUEST["titulo"];
            $genero = $_REQUEST["genero"];
            $pais = $_REQUEST["pais"];
            $anyo = $_REQUEST["anyo"];
            $trailer = $_REQUEST["trailer"];

            $target_path = "C:/xampp/htdocs/2daw/pruebaclase/2/images/";
            $target_path = $target_path . basename($_FILES['cartel']['name']);
            if (move_uploaded_file($_FILES['cartel']['tmp_name'], $target_path)) {
                $cartel = "http://localhost:8081/2daw/pruebaclase/2/images/" . basename($_FILES['cartel']['name']);
            } else {
                echo "Error";
            }
            // Lanzamos el INSERT contra la BD.
            echo "INSERT INTO peliculas (titulo,genero,pais,anyo,cartel,trailer) VALUES ('$titulo','$genero', '$pais', '$anyo', '$cartel', '$trailer')";
            $db->query("INSERT INTO peliculas (titulo,genero,pais,anyo,cartel,trailer) VALUES ('$titulo','$genero', '$pais', '$anyo', '$cartel', '$trailer')");
            if ($db->affected_rows == 1) {
                // Si la inserción del la pelicula ha funcionado, continuamos insertando en la tabla "escriben"
                // Tenemos que averiguar qué id_pelicula se ha asignado a la pelicula que acabamos de insertar
                echo "<br>Pelicula insertada con éxito";
            } else {
                // Si la inserción de la pelicula ha fallado, mostramos mensaje de error
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
            //Para que funcione la insercion de un cartel tenemos que añadir enctype='multipart/form-data' method ='post'. 
            //Con el metodo get no funcionaria
            echo "<form action = 'index.php' enctype='multipart/form-data' method ='post'>
                        <input type='hidden' name='id_pelicula' value='$id_pelicula'>
                        Título:<input type='text' name='titulo' value='$pelicula->titulo'><br>
                        Género:<input type='text' name='genero' value='$pelicula->genero'><br>
                        País:<input type='text' name='pais' value='$pelicula->pais'><br>
                        Año:<input type='text' name='anyo' value='$pelicula->anyo'><br>
                        Trailer:<input type='text' name='trailer' value='$pelicula->trailer'><br>
                        Cartel:<input type='file' name='cartel' value='$pelicula->cartel'><br>";

            // Finalizamos el formulario
            echo "  <input type='hidden' name='action' value='modificarPelicula'>
                        <input type='submit'>
                    </form>";
            echo "<p><a href='index.php'>Volver</a></p>";

            break;

            // --------------------------------- MODIFICAR PELICULAS ----------------------------------------

        case "modificarPelicula":
            echo "<h1>Modificación de Peliculas</h1>";

            // Vamos a procesar el formulario de modificación de peliculas
            // Primero, recuperamos todos los datos del formulario
            $id_pelicula = $_REQUEST["id_pelicula"];
            $titulo = $_REQUEST["titulo"];
            $genero = $_REQUEST["genero"];
            $pais = $_REQUEST["pais"];
            $anyo = $_REQUEST["anyo"];
            $trailer = $_REQUEST["trailer"];

            // Asignamos donde queremos almacenar las imagenes del cartel 
            $target_path = "C:/xampp/htdocs/2daw/pruebaclase/2/images/";
            $target_path = $target_path . basename($_FILES['cartel']['name']);
            if (move_uploaded_file($_FILES['cartel']['tmp_name'], $target_path)) {
                $cartel = "http://localhost:8081/2daw/pruebaclase/2/images/" . basename($_FILES['cartel']['name']);
            } else {
                echo "Error";
            }

            // Lanzamos el UPDATE contra la base de datos.
            $db->query("UPDATE peliculas SET
                                titulo = '$titulo',
                                genero = '$genero',
                                pais = '$pais',
                                anyo = '$anyo',
                                cartel = '$cartel',
                                trailer = '$trailer'
                                WHERE id_pelicula = '$id_pelicula'");

            if ($db->affected_rows == 1) {
                // Si la modificación del la pelicula ha funcionado, mostramos este mensaje
                echo "Pelicula actualizado con éxito";
            } else {
                // Si la modificación de la pelicula ha fallado, mostramos mensaje de error
                echo "Ha ocurrido un error al modificar la pelicula. Por favor, inténtelo más tarde.";
            }
            echo "<p><a href='index.php'>Volver</a></p>";
            break;
    }
        
    ?>

    <?php
        // --------------------------------- PERSONAS ----------------------------------------
        $db = new mysqli("localhost", "root", "", "videoclub");

        // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
        if (isset($_REQUEST["action"])) {
            $action = $_REQUEST["action"];
        } else {
            $action = "mostrarListaPersonas"; // Acción por defecto

        }

        // CONTROL DE FLUJO PRINCIPAL
        // El programa saltará a la sección del switch indicada por la variable "action"
    switch ($action) {

        case "mostrarListaPersonas":
            echo "<h1>PERSONAS</h1>";

            // Buscamos todos las Personas del Videoclub
            if ($result = $db->query("SELECT * FROM personas 
                                            ORDER BY personas.nombre")) {

                // La consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
                if ($result->num_rows != 0) {
                    // La consulta ha devuelto registros: vamos a mostrarlos
                    //Fromulario busqueda
                    echo "<form action='index.php'>
                        <input type='hidden' name='action' value='buscarPersona'>
                        <input type='text' name='textoBusqueda'>
                        <input type='submit' value='Buscar'>
                        </form><br>";

                    // Ahora, la tabla con los datos de los Personas
                    echo "<table border='1'>
                        <tr><th>Nombre</th><th>Apellido</th><th>Fotografia</th><th>Modificar</th><th>Borrar</th></tr>";
                    while ($fila = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $fila->nombre . "</td>";
                        echo "<td>" . $fila->apellidos . "</td>";
                        echo "<td><img src='$fila->fotografia' width='100px' height='150px'></td>";
                        echo "<td><a href='index.php?action=formularioModificarPersona&id_persona=" . $fila->id_persona . "'>Modificar</a></td>";
                        echo "<td><a href='index.php?action=borrarPersona&id_persona=" . $fila->id_persona . "'>Borrar</a></td>";
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

            echo "<p><a href='index.php?action=formularioInsertarPersona'>Nuevo</a></p>";
            break;

            // --------------------------------- BORRAR PERSONAS ----------------------------------------

        case "borrarPersona":
            echo "<h1>Borrar persona</h1>";

            // Recuperamos el id de la persona y lanzamos el DELETE contra la BD
            $id_persona = $_REQUEST["id_persona"];
            $db->query("DELETE FROM personas WHERE id_persona = '$id_persona'");

            // Mostramos mensaje con el resultado de la operación
            if ($db->affected_rows == 0) {
                echo "Ha ocurrido un error al borrar la persona. Por favor, inténtelo de nuevo";
            } else {
                echo "Persona borrado con éxito";
            }
            echo "<p><a href='index.php'>Volver</a></p>";

            break;

            // --------------------------------- BUSCAR PERSONAS ----------------------------------------

        case "buscarPersona":
            // Recuperamos el texto de búsqueda de la variable de formulario
            $textoBusqueda = $_REQUEST["textoBusqueda"];
            echo "<h1>Resultados de la búsqueda: \"$textoBusqueda\"</h1>";

            // Buscamos las personas que coincidan con el texto de búsqueda
            if ($result = $db->query("SELECT * FROM personas
                    WHERE nombre LIKE '%$textoBusqueda%'
                    OR apellidos LIKE '%$textoBusqueda%'
                    ORDER BY nombre")) {

                // La consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
                if ($result->num_rows != 0) {
                    // La consulta ha devuelto registros: vamos a mostrarlos
                    // Primero, el formulario de búsqueda
                    echo "<form action='index.php'>
                                <input type='hidden' name='action' value='buscarPersona'>
                                <input type='text' name='textoBusqueda'>
                                <input type='submit' value='Buscar'>
                        </form><br>";
                    // Después, la tabla con los datos
                    echo "<table border='1'>";
                    while ($fila = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $fila->nombre . "</td>";
                        echo "<td>" . $fila->apellidos . "</td>";
                        echo "<td><img src='$fila->fotografia' width='100px' height='150px'></td>";
                        echo "<td><a href='index.php?action=formularioModificarPersona&id_persona=" . $fila->id_persona . "'>Modificar</a></td>";
                        echo "<td><a  href='index.php?action=borrarPersona&id_persona=" . $fila->id_persona . "'>Borrar</a></td>";
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

            // --------------------------------- FORMULARIO ALTA DE PERSONAS ----------------------------------------

        case "formularioInsertarPersona":
            echo "<h1>Modificación de persona</h1>";

            // Creamos el formulario con los campos de persona
            echo "<form action = 'index.php' enctype='multipart/form-data' method ='post'>
                            Nombre:<input type='text' name='nombre'><br>
                            Apellidos:<input type='text' name='apellidos'><br>
                            Fotografia:<input type='file' required name='fotografia'><br>";

            echo "</select>";

            // Finalizamos el formulario
            echo "  <input type='hidden' name='action' value='insertarPersona'>
                            <input type='submit'>
                        </form>";
            echo "<p><a href='index.php'>Volver</a></p>";

            break;

            // --------------------------------- INSERTAR PERSONAS ----------------------------------------

        case "insertarPersona":
            echo "<h1>Alta de persona</h1>";

            // Vamos a procesar el formulario de alta de Personas
            // Primero, recuperamos todos los datos del formulario
            $nombre = $_REQUEST["nombre"];
            $apellidos = $_REQUEST["apellidos"];

            $target_path = "C:/xampp/htdocs/2daw/pruebaclase/2/images/";
            $target_path = $target_path . basename($_FILES['fotografia']['name']);
            if (move_uploaded_file($_FILES['fotografia']['tmp_name'], $target_path)) {
                $fotografia = "http://localhost:8081/2daw/pruebaclase/2/images/" . basename($_FILES['fotografia']['name']);
            } else {
                echo "Error";
            }
            // Lanzamos el INSERT contra la BD.
            echo "INSERT INTO personas (nombre,apellido,fotografia) VALUES ('$nombre','$apellidos', '$fotografia')";
            $db->query("INSERT INTO personas (nombre,apellidos,fotografia) VALUES ('$nombre','$apellidos','$fotografia')");
            if ($db->affected_rows == 1) {
                // Si la inserción del la persona ha funcionado
                // Tenemos que averiguar qué id_persona se ha asignado al persona que acabamos de insertar
                echo "<br>Persona insertado con éxito";
            } else {
                // Si la inserción de la persona ha fallado, mostramos mensaje de error
                echo "Ha ocurrido un error al insertar la persona. Por favor, inténtelo más tarde.";
            }
            echo "<p><a href='index.php'>Volver</a></p>";

            break;

            // --------------------------------- FORMULARIO MODIFICAR PERSONAS ----------------------------------------

        case "formularioModificarPersona":
            echo "<h1>Modificación de personas</h1>";

            // Recuperamos el id del la persona que vamos a modificar y sacamos el resto de sus datos de la BD
            $id_persona = $_REQUEST["id_persona"];
            $result = $db->query("SELECT * FROM personas WHERE personas.id_persona = '$id_persona'");
            $persona = $result->fetch_object();

            // Creamos el formulario con los campos de la persona
            // y lo rellenamos con los datos que hemos recuperado de la BD
            echo "<form action = 'index.php' enctype='multipart/form-data' method ='post'>
                            <input type='hidden' name='id_persona' value='$id_persona'>
                            Nombre:<input type='text' name='nombre' value='$persona->nombre'><br>
                            Apellidos:<input type='text' name='apellidos' value='$persona->apellidos'><br>
                            Fotografia:<input type='file' name='fotografia' value='$persona->fotografia'><br>";

            // Finalizamos el formulario
            echo "  <input type='hidden' name='action' value='modificarPersona'>
                            <input type='submit'>
                        </form>";
            echo "<p><a href='index.php'>Volver</a></p>";

            break;

            // --------------------------------- MODIFICAR PERSONAS ----------------------------------------

        case "modificarPersona":
            echo "<h1>Modificación de Personas</h1>";

            // Vamos a procesar el formulario de modificación de personas
            // Primero, recuperamos todos los datos del formulario
            $id_persona = $_REQUEST["id_persona"];
            $nombre = $_REQUEST["nombre"];
            $apellidos = $_REQUEST["apellidos"];

            $target_path = "C:/xampp/htdocs/2daw/pruebaclase/2/images/";
            $target_path = $target_path . basename($_FILES['fotografia']['name']);
            if (move_uploaded_file($_FILES['fotografia']['tmp_name'], $target_path)) {
                $fotografia = "http://localhost:8081/2daw/pruebaclase/2/images/" . basename($_FILES['fotografia']['name']);
            } else {
                echo "Error";
            }
            // Lanzamos el UPDATE contra la base de datos.
            $db->query("UPDATE personas SET
                                    nombre = '$nombre',
                                    apellidos = '$apellidos',
                                    fotografia = '$fotografia'
                                    WHERE id_persona = '$id_persona'");

            if ($db->affected_rows == 1) {
                // Si la modificación del la persona ha funcionado, mostramos este mensaje
                echo "Persona actualizado con éxito";
            } else {
                // Si la modificación de la persona ha fallado, mostramos mensaje de error
                echo "Ha ocurrido un error al modificar la persona. Por favor, inténtelo más tarde.";
            }
            echo "<p><a href='index.php'>Volver</a></p>";
            break;
    }
    ?>

    <?php
        // --------------------------------- ACTUAN ----------------------------------------
        $db = new mysqli("localhost", "root", "", "videoclub");

        // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
        if (isset($_REQUEST["action"])) {
            $action = $_REQUEST["action"];
        } else {
            $action = "mostrarListaActuan"; // Acción por defecto

        }

        // CONTROL DE FLUJO PRINCIPAL
        // El programa saltará a la sección del switch indicada por la variable "action"
    switch ($action) {

        case "mostrarListaActuan":
            echo "<h1>PERSONAS ACTUAN EN PELICULA</h1>";

            // Buscamos todos las Personas del Videoclub
            if ($result = $db->query("SELECT * FROM actuan 
                                            ORDER BY actuan.id_persona")) {

                // La consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
                if ($result->num_rows != 0) {
                    // La consulta ha devuelto registros: vamos a mostrarlos

                    // Ahora, la tabla con los datos de los Personas
                    echo "<table border='1'>
                        <tr><th>id_persona</th><th>id_pelicula</th></tr>";
                    while ($fila = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $fila->id_persona . "</td>";
                        echo "<td>" . $fila->id_pelicula . "</td>";
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

            echo "<p><a href='index.php?action=formularioInsertarActuan'>Nuevo</a></p>";
            break;
         
            // --------------------------------- FORMULARIO ALTA DE ACTUACION EN PELICULA ----------------------------------------

        case "formularioInsertarActuan":
            echo "<h1>Persona actua en pelicula</h1>";
            // Buscamos todos las Personas del Videoclub
            if ($result = $db->query("SELECT * FROM actuan 
                                            ORDER BY actuan.id_persona")) {

                // La consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
                if ($result->num_rows != 0) {
                    // La consulta ha devuelto registros: vamos a mostrarlos

                    // Ahora, la tabla con los datos de los Personas
                    echo "<table border='1'>
                        <tr><th>id_persona</th><th>id_pelicula</th></tr>";
                    while ($fila = $result->fetch_object()) {
                        echo "<tr>";
                        echo "<td>" . $fila->id_persona . "</td>";
                        echo "<td>" . $fila->id_pelicula . "</td>";
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

            // Creamos el formulario con los campos de actuacion de persona en pelicula
            echo "<form action = 'index.php' enctype='multipart/form-data' method ='post'>
                            ID_PERSONA:<input type='number' name='id_persona'><br>
                            ID_PELICULA:<input type='number' name='id_pelicula'><br>";

            echo "</select>";

            // Finalizamos el formulario
            echo "  <input type='hidden' name='action' value='insertarActuan'>
                            <input type='submit'>
                        </form>";
            echo "<p><a href='index.php'>Volver</a></p>";

            break;

            // --------------------------------- INSERTAR ALTA DE ACTUACION EN PELICULA ----------------------------------------

            case "insertarActuan":
                echo "<h1>Alta de persona</h1>";
    
                // Vamos a procesar el formulario de alta de actuacion de persona en pelicula
                // Primero, recuperamos todos los datos del formulario
                $id_pelicula = $_REQUEST["id_pelicula"];
                $id_persona = $_REQUEST["id_persona"];
    
                // Lanzamos el INSERT contra la BD.
                echo "INSERT INTO actuan (id_pelicula,id_persona) VALUES ('$id_pelicula','$id_persona')";
                $db->query("INSERT INTO actuan (id_pelicula,id_persona) VALUES ('$id_pelicula','$id_persona')");
                if ($db->affected_rows == 1) {
                    // Si la inserción del la persona ha funcionado
                    // Tenemos que averiguar qué id_persona se ha asignado al persona que acabamos de insertar
                    echo "<br>Actuacion en pelicula insertada con éxito";
                } else {
                    // Si la inserción de la persona ha fallado, mostramos mensaje de error
                    echo "Ha ocurrido un error al insertar la actuacion. Por favor, inténtelo más tarde.";
                }
                echo "<p><a href='index.php'>Volver</a></p>";
    
                break;

        }
        ?>

</body>

</html>
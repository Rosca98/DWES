<?php
include_once ("./models/resources.php");
//Mostramos una lista con diferentes recursos que tengamos listados
echo "
    <h1>Lista de Recursos</h1>
    <table border='1'>
        <thead>
            <tr>
                <th>Recurso</th>
                <th>Descripcion</th>
                <th>Ubicación</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    ";

    $resource = Resource::ResourcesList();

    foreach ($resource as $result) {
        $id = $result['idResource'];
        $name = $result['name'];
        $description = $result['description'];
        $location = $result['location'];
        $image = $result['image'];
    
        echo "<tr>";
            echo "<td scope='row'>$name</td>";
            echo "<td>$description</td>";
            echo "<td>$location</td>";
            echo "<td>$image</td>";
            echo "<td>";
                echo "<form method='post' action='index.php?action=showModResource'>";
                    echo "<input type='hidden' id='id_resource' name='id_resource' value='$id'>";
                    echo "<input type='submit' value='Modificar'>";
                echo "</form>";
                echo "<form method='post' action='index.php?action=eliminarResource'>";
                    echo "<input type='hidden' id='id_resource' name='id_resource' value='$id'>";
                    echo "<input type='submit' value='Eliminar'>";
                echo "</form>";
            echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
echo "</table>";

echo "<form method='post' action='index.php?action=showAddResource'>";
    echo "<button type='submit'>Añadir nuevo</button>";
echo "</form>";

?>
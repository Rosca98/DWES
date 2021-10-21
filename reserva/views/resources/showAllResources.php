<?php
include_once ("./models/resources.php");
//Mostramos una lista con diferentes recursos que tengamos listados
echo "
    <h1 class='text-center'>Lista de Recursos</h1>
    <div class='container-sm pt-5'>
    <table class='table table-striped table-sm'>
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
            echo "<td><img src='$image' class='img-thumbnail' heigh='100px' width='100px'></td>";
            echo "<td>";
            echo "<div class='input-group'>";
                echo "<form method='post' action='index.php?action=showModResource'>";
                    echo "<input type='hidden' id='id_resource' name='id_resource' value='$id'>";
                    echo "<input type='submit' class='btn btn-primary' value='Modificar'>";
                echo "</form>";
                echo "<form method='post' action='index.php?action=eliminarResource'>";
                    echo "<input type='hidden' id='id_resource' name='id_resource' value='$id'>";
                    echo "<input type='submit' class='btn btn-danger' value='Eliminar'>";
                echo "</form>";
            echo "</div>";
            echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
echo "</table>";
echo "</div>";

echo "<br><form method='post' action='index.php?action=showAddResource'>";
    echo "<button type='submit'>Añadir nuevo</button>";
echo "</form>";

?>
<?php
include_once ("./models/resources.php");

echo "
    <h1 class='text-center'>Lista de Recursos</h1>
    <div class='container-sm pt-5'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th class='text-center' scope='col'>Recurso</th>
                <th class='text-center' scope='col'>Descripcion</th>
                <th class='text-center' scope='col'>Ubicación</th>
                <th class='text-center' scope='col'>Imagen</th>
                <th class='text-center' scope='col'>Acciones</th>
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
            echo "<td class='text-center' scope='row'>$name</td>";
            echo "<td class='text-center'>$description</td>";
            echo "<td class='text-center'>$location</td>";
            echo "<td class='text-center'><img src='$image' class='img-thumbnail' heigh='100px' width='100px'></td>";
            echo "<td>";
            echo "<div class='d-flex flex-row justify-content-around'>";
            echo "<div class='d-flex'>";
                echo "<form method='post' action='index.php?controller=resourceController&action=showModResource'>";
                    echo "<input type='hidden' id='id_resource' name='id_resource' value='$id'>";
                    echo "<input type='submit' class='btn btn-primary' value='Modificar'>";
                echo "</form>";
                echo "</div>";
                echo "<div class='d-flex'>";
                echo "<form method='post' action='index.php?controller=resourceController&action=eliminarResource'>";
                    echo "<input type='hidden' id='id_resource' name='id_resource' value='$id'>";
                    echo "<input type='submit' class='btn btn-danger' value='Eliminar'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
echo "</table>";
echo "</div>";

echo "<br><form method='post' action='index.php?controller=resourceController&action=showAddResource'>";
echo "<div class='d-grid gap-2 d-md-flex justify-content-md-center'>";
echo "<button class='btn btn-primary' type='submit'>Añadir nuevo</button>";
echo "</div>";
echo "</form>";

?>
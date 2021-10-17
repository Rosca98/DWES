<?php

    $resources = $data["list"];

    echo "<h1>Lista de Recursos</h1>";

    echo "<table border ='1'>";
    foreach ($resources as $resource) {
        echo "<tr>";
        echo "<th>idResource</th>";
        echo "<th>Recurso</th>";
        echo "<th>Descripcion</th>";
        echo "<th>Ubicacion</th>";
        echo "<th>Imagen</th>";
        echo "<th>Acciones</th>";
        echo "<tr>";
        echo "<tr>";
        echo "<td>" . $resource['idResource'] . "</td>";
        echo "<td>" . $resource['name'] . "</td>";
        echo "<td>" . $resource['description'] . "</td>";
        echo "<td>" . $resource['location'] . "</td>";
        echo "<td>" . $resource['image'] . "</td>";
        echo "<td><a onClick='". Resources::eliminarRecurso($resource['idResource']);  "'>Modificar</a> || <a href='index.php'</a>Eliminar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
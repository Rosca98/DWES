<?php
    include_once ("./models/resources.php");

    $id = $_REQUEST["id_resource"];
    $resource = Resource::formModResource($id);

    foreach ($resource as $result) {
        $id = $result['idResource'];
        $name = $result['name'];
        $description = $result['description'];
        $location = $result['location'];
        $image = $result['image'];

        echo "<form action='index.php?controller=resourceController&action=ProcessModifyResource' method='post' enctype='multipart/form-data'>";
        echo "<div class='form-group'>";
            echo "<input type='hidden' name='resource_id' id='resource_id' value='$id'";
            echo "<label for='resource_name'>Nombre de recurso:</label>";
            echo "<input type='text' class='form-control' name='resource_name' id='resource_name' value='$name'>";
        echo "</div>";

        echo "<div class='form-group'>";
            echo "<label for='resource_name'>Descripción de recurso:</label>";
            echo "<input type='text' class='form-control' name='resource_desc' id='resource_desc' value='$description'>";
        echo "</div>";
    
        echo "<div class='form-group'>";
            echo "<label for='resource_location'>Ubicación del recurso:</label>";
            echo "<input type='text' class='form-control' name='resource_location' id='resource_location' value='$location'>";
        echo "</div>";

        echo "<div>";
            echo "<label for='resource_img'>Imagen del recurso:</label>";
            echo "<br>";
            echo "<img src='$image' class='img-thumbnail' heigh='100px' width='100px'>";
            echo "<input type='file' class='custom-file-input' name='img_upload' value='$image' required>";
            echo "<input type='text' class='form-control' name='img_link' value='$image'>";
        echo "</div>";

        echo "<div>";
            echo "<input type='submit' value='Modificar recurso'>";
        echo "</div>";
        echo "</form>";
    }
?>
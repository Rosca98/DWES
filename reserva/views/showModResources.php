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

        echo "<form action='index.php?action=ProcessModifyResource' method='post'>";
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

        echo "<div class='d-flex align-items-center justify-content-center flex-wrap flex-column'>";
            echo "<label for='resource_img'>Imagen del recurso:</label>";
            echo "<img src='$image' class='img-fluid'>";
            echo "<input type='file' class='mx-auto custom-file-input' name='img_upload' id='img_upload'>";
            echo "<input type='text' class='mt-2 form-control' name='img_link' id='img_link' value='$image'>";
        echo "</div>";

        echo "<div class='mt-2 d-flex align-items-center justify-content-center flex-wrap flex-column'>";
            echo "<input type='submit' class='btn btn-primary' value='Modificar recurso'>";
        echo "</div>";
        echo "</form>";
    }
?>
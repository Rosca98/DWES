<?php
echo "<form action='index.php?controller=resourceController&action=processAddResource' method='post' enctype='multipart/form-data'>";
    echo "<div class='form-group'>";
        echo "<label for='resource_name'>Nombre de recurso:</label>";
        echo "<input type='text' class='form-control' id='resource_name' name='resource_name' placeholder='Nombre'>";
    echo "</div>";

    echo "<div class='form-group'>";
        echo "<label for='resource_name'>Descripción de recurso:</label>";
        echo "<input type='text' class='form-control' name='resource_desc' id='resource_desc' placeholder='Descripción'>";
    echo "</div>";

    echo "<div class='form-group'>";
        echo "<label for='resource_location'>Ubicación del recurso:</label>";
        echo "<input type='text' class='form-control' name='resource_location' id='resource_location' placeholder='Ubicación'>";
    echo "</div>";

    echo "<div class='d-flex mt-2 align-items-center justify-content-center flex-wrap flex-row'>";
        echo "<label for='resource_img'>Imagen del recurso:</label>";
        echo "<input type='file' class='custom-file-input' name='img_upload' required'>";
    echo "</div>";

    echo "<div class='mt-2 d-flex align-items-center justify-content-center flex-wrap flex-column'>";
        echo "<input type='submit' class='btn btn-success' value='Añadir recurso'>";
    echo "</div>";
echo "</form>";

?>
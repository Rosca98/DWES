<?php
error_reporting(0);
?>
<?php
$target_path = "http://localhost:8081/2daw/pruebaclase/2/images/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "El archivo ".  basename( $_FILES['uploadedfile']['name']). 
    " ha sido subido";
} else{
    echo "Ha ocurrido un error, trate de nuevo!";
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
</head>

<body>
    <div id="content">

        <form enctype="multipart/form-data" action="uploader.php" method="POST">
            <input name="uploadedfile" type="file" />
            <input type="submit" value="Subir archivo" />
        </form>
    </div>
</body>

</html>
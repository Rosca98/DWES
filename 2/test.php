<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
</head>

<body>
    <div id="content">

        <form enctype="multipart/form-data" action="uploader.php" method="POST">
            <input name="uploadedfile" type="file" />
            <input onclick='alert(Seguro)' type="submit" value="Subir archivo" />
        </form>
    </div>
</body>

</html>
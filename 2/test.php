<?php
error_reporting(0);
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
		$folder = "image/".$filename;
		
	$db = mysqli_connect("localhost", "root", "", "videoclub");

		// Get all the submitted data from the form
		$sql = "INSERT INTO cartel (filename) VALUES ('$filename')";

		// Execute query
		mysqli_query($db, $sql);
		
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}
}
$result = mysqli_query($db, "SELECT cartel FROM peliculas");
?>


<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
</head>

<body>
    <div id="content">

        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="uploadfile" value="" />

            <div>
                <button type="submit" name="upload">
                    UPLOAD
                </button>
            </div>
        </form>
    </div>
</body>

</html>
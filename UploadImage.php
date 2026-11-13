<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Upload Image</title>
</head>
<body>
<h2>Upload a Zodiac Image</h2>
<?php
$uploadDir = "images/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if (isset($_POST['submit'])) {
    if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['new_image']['tmp_name'];
        $fileName = basename($_FILES['new_image']['name']);
        $destination = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $destination)) {
            echo "<p>File successfully uploaded to <strong>$destination</strong>.</p>\n";
            echo "<p><img src=\"$destination\" alt=\"Uploaded Image\" width=\"100\" height=\"100\" /></p>\n";
        } else {
            echo "<p>Error moving the uploaded file.</p>\n";
        }
    } else {
        echo "<p>Please select a valid file to upload.</p>\n";
    }
}
?>
<form method="POST" enctype="multipart/form-data" action="">
    <p>Select image to upload: <input type="file" name="new_image" /></p>
    <p><input type="submit" name="submit" value="Upload Image" /></p>
</form>
</body>
</html>
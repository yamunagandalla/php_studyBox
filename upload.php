<?php
if (isset($_POST['upload'])) {

    $fileName = $_FILES['myfile']['name'];
    $tmpName  = $_FILES['myfile']['tmp_name'];

    
    move_uploaded_file($tmpName, "uploads/" . $fileName);

    echo "File uploaded successfully.<br>";
    echo "<a href='uploads/$fileName' download>Download File</a>";
}
?>

<!DOCTYPE html>
<html>
<body>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile" required>
    <br><br>
    <button type="submit" name="upload">Upload</button>
</form>

</body>
</html>

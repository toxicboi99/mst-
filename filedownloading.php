<?php
$uploadDir = "uploads/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
    $targetFile = $uploadDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.<br>";
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
}

if (isset($_GET['file'])) {
    $file = $uploadDir . $_GET['file'];

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($file));

        readfile($file);
        exit;
    } else {
        echo "File does not exist.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload and Download</title>
</head>
<body>

    <h2>Upload a File</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Choose a file:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <h2>Download</h2>
    <ul>
        <?php
        $files = scandir($uploadDir);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                echo "<li><a href='index.php?file=$file'>$file</a></li>";
            }
        }
        ?>
    </ul>

</body>
</html>

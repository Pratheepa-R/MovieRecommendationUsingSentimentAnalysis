<?php
// Check if a file has been uploaded
if (isset($_FILES['uploaded_file'])) {
    $file = $_FILES['uploaded_file'];

    // Validate the file
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Check file type (you should add more specific file type checks)
        $allowedExtensions = array('pdf', 'doc', 'docx');
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        if (in_array($fileExtension, $allowedExtensions)) {
            // Generate a unique filename
            $fileName = uniqid() . '_' . $file['name'];
            $uploadDirectory = 'uploads/';

            // Move the file to a secure directory
            if (move_uploaded_file($file['tmp_name'], $uploadDirectory . $fileName)) {
                // File has been uploaded successfully, perform database operations here if needed
                echo "File uploaded successfully.";
            } else {
                echo "Error: Unable to move the file to the upload directory.";
            }
        } else {
            echo "Error: Invalid file type.";
        }
    } else {
        echo "Error: File upload error.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="upload.php">
        <input type="file" name="uploaded_file">
        <input type="submit" value="Upload File">
    </form>
</body>
</html>

<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employee_id = $_POST['employee_id'];

    if (isset($_FILES['document'])) {
        $fileTmpPath = $_FILES['document']['tmp_name'];
        $fileName = $_FILES['document']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $newFileName = uniqid('doc_') . '.' . $fileExtension;
        $uploadDir = '../assets/documents/';
        $destPath = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $sql = "INSERT INTO emp_documents (employee_id, mydocuments) 
                    VALUES ('$employee_id', '$newFileName')";
            
            if ($conn->query($sql) === TRUE) {
                header("Location: gallery.php?employee_id=" . $employee_id);
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "File upload failed or no file selected.";
    }
} else {
    echo "Invalid request method.";
}
?>
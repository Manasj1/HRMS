<?php
include 'edit_employee.php';

if (isset($_GET['filename']) && isset($_GET['employee_id'])) {
    $filename = $_GET['filename'];
    $employee_id = $_GET['employee_id'];

    // Delete the file from the server
    $filePath = "../assets/documents/" . $filename;
    if (file_exists($filePath)) {
        unlink($filePath); // Delete file from disk
    }

    // Delete from the database
    $sql = "DELETE FROM emp_documents WHERE employee_id = '$employee_id' AND mydocuments = '$filename'";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error: " . $conn->error;
    }
} else {
    echo "invalid request";
}
?>
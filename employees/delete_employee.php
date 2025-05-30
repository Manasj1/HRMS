<?php
include 'empdb.php';

$employee_id = $_GET['employee_id'];
$docFolderPath = "../assets/documents/";
$imgFolderPath = "../assets/images/employee/";

// 1. Delete profile image
$sqlImg = "SELECT emp_img FROM employees WHERE employee_id = '$employee_id'";
$resultImg = $conn->query($sqlImg);

if ($resultImg && $resultImg->num_rows > 0) {
    $rowImg = $resultImg->fetch_assoc();
    $profileImage = $imgFolderPath . basename($rowImg['emp_img']);
    if (file_exists($profileImage)) {
        unlink($profileImage); // Delete profile image
    }
}

// 2. Delete document files
$sqlFetch = "SELECT mydocuments FROM emp_documents WHERE employee_id = '$employee_id'";
$result = $conn->query($sqlFetch);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $filePath = $docFolderPath . basename($row['mydocuments']);
        if (file_exists($filePath)) {
            unlink($filePath); // Delete document
        }
    }
}

// 3. Delete records from emp_documents
$sqlDoc = "DELETE FROM emp_documents WHERE employee_id = '$employee_id'";

// 4. Delete employee record
$sql = "DELETE FROM employees WHERE employee_id = '$employee_id'";

if ($conn->query($sqlDoc) === TRUE && $conn->query($sql) === TRUE) {
    header("Location: employees.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
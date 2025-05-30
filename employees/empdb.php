<?php
include '../config/db.php';

if (isset($_POST['name'])) {
    // Collect form inputs
    $name = $_POST['name'];
    $employee_id = $_POST['employee_id'];
    $father_name = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $emergency_contact = $_POST['emergency_contact'];
    $permanent_address = $_POST['paddress'];
    $local_address = $_POST['laddress'];
    $department = $_POST['department'];
    $dob = $_POST['dob'];
    $blood_group = $_POST['blood_group'];
    $adhar_number = $_POST['adhar_number'];
    $pan_number = $_POST['pan_number'];
    $gender = $_POST['gender'];
    $jdate = $_POST['jdate'];

    // Upload profile image
    $img = $_FILES['myfile']['name'];
    $img_tmp = $_FILES['myfile']['tmp_name'];
    $img_target = "../assets/images/employee/" . basename($img);

    if (move_uploaded_file($img_tmp, $img_target)) {
        // Insert into employees table
        $sql = "INSERT INTO employees (
                    employee_id, name, emp_img, father_name, email, phone,
                    emergency_contact, permanent_address, local_address,
                    blood_group, adhar_number, pan_number,
                    department, dob, gender, joining_date
                ) VALUES (
                    '$employee_id', '$name', '$img', '$father_name', '$email', '$phone',
                    '$emergency_contact', '$permanent_address', '$local_address',
                    '$blood_group', '$adhar_number', '$pan_number',
                    '$department', '$dob', '$gender', '$jdate'
                )";

        if ($conn->query($sql) === TRUE) {
            // Upload documents if available
            if (isset($_FILES['mydocuments'])) {
                $uploadedFiles = $_FILES['mydocuments'];

                foreach ($uploadedFiles['name'] as $key => $docName) {
                    $docTmp = $uploadedFiles['tmp_name'][$key];
                    $docTarget = "../assets/documents/" . basename($docName);

                    if (move_uploaded_file($docTmp, $docTarget)) {
                        $safeDocName = $conn->real_escape_string($docName);
                        $sqlDoc = "INSERT INTO emp_documents (employee_id, mydocuments) VALUES ('$employee_id', '$safeDocName')";
                        $conn->query($sqlDoc);
                    } else {
                        echo "Failed to upload document: $docName<br>";
                    }
                }
            }

            echo "success";
        } else {
            echo "Error inserting employee: " . $conn->error;
        }
    } else {
        echo "Failed to upload profile image.";
    }
} else {
    echo "Invalid request.";
}
?>
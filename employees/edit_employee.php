<?php
include '../config/db.php';

if (isset($_POST['name'])) {
    $e_id = $_POST['e_id'];
    $name = $_POST['name'];
    $employee_id = $_POST['employee_id'];
    $father_name = $_POST['father_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $emergency_contact = $_POST['emergency_contact'];
    $permanent_address = $_POST['permanent_address'];
    $local_address = $_POST['local_address'];
    $department = $_POST['department'];
    $dob = $_POST['dob'];
    $blood_group = $_POST['blood_group'];
    $adhar_number = $_POST['adhar_number'];
    $pan_number = $_POST['pan_number'];
    $gender = $_POST['gender'];
    $jdate = $_POST['jdate'];

   
    $fetchImgQuery = "SELECT emp_img FROM employees WHERE employee_id = '$employee_id'";
    $imgResult = $conn->query($fetchImgQuery);
    $existingImg = '';
    if ($imgResult && $imgResult->num_rows > 0) {
        $row = $imgResult->fetch_assoc();
        $existingImg = $row['emp_img'];
    }

    // Image upload handling
    if (!empty($_FILES['myfile']['name'])) {
        $img = $_FILES['myfile']['name'];
        $target = "../assets/images/employee/" . basename($img);

        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $target)) {
            // Delete old image if it exists
            if (!empty($existingImg) && file_exists("../assets/images/employee/" . $existingImg)) {
                unlink("../assets/images/employee/" . $existingImg);
            }

            // Update with new image
            $sql = "UPDATE employees SET 
                        name = '$name',
                        employee_id = '$employee_id',
                        emp_img = '$img',
                        father_name = '$father_name',
                        email = '$email',
                        phone = '$phone',
                        emergency_contact = '$emergency_contact',
                        permanent_address = '$permanent_address',
                        local_address = '$local_address',
                        blood_group = '$blood_group',
                        adhar_number = '$adhar_number',
                        pan_number = '$pan_number',
                        department = '$department',
                        dob = '$dob',
                        gender = '$gender',
                        joining_date = '$jdate'
                    WHERE employee_id = '$employee_id'";
        } else {
            echo "Failed to upload image.";
            exit;
        }
    } else {
        // Update without changing image
        $sql = "UPDATE employees SET 
                    name = '$name',
                    employee_id = '$employee_id',
                    father_name = '$father_name',
                    email = '$email',
                    phone = '$phone',
                    emergency_contact = '$emergency_contact',
                    permanent_address = '$permanent_address',
                    local_address = '$local_address',
                    blood_group = '$blood_group',
                    adhar_number = '$adhar_number',
                    pan_number = '$pan_number',
                    department = '$department',
                    dob = '$dob',
                    gender = '$gender',
                    joining_date = '$jdate'
                WHERE employee_id = '$employee_id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
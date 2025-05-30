<?php 
  $base_url ='/hrm_system/';
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/topbar.php'; ?>
<?php include '../includes/sidebar.php'; ?>
<main class="page-content">

    <?php include '../config/db.php'; ?>

    <?php
    $sql = "SELECT * FROM users ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Employee not found!";
    }
    ?>

    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $e_id = $_POST['e_id'];
    $employee_id = $_POST['employee_id'];
    $name = $_POST['name'];
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

    $updateQuery = "UPDATE users SET 
        name='$name', employee_id='$employee_id', father_name='$father_name', email='$email', phone='$phone',
        emergency_contact='$emergency_contact', permanent_address='$permanent_address', local_address='$local_address',
        department='$department', dob='$dob', blood_group='$blood_group', adhar_number='$adhar_number',
        pan_number='$pan_number', gender='$gender', joining_date='$jdate'";

    // If image is uploaded
    if (!empty($_FILES['myfile']['name'])) {
        $img = $_FILES['myfile']['name'];
        $target = "../assets/images/employee/" . basename($img);
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $target)) {
            $updateQuery .= ", emp_img='$img'";
        } else {
            echo "<div class='alert alert-warning mt-3'>Image upload failed. Other data updated.</div>";
        }
    }

    $updateQuery .= " WHERE id='$e_id'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "<script>window.location.href = '" . $base_url . "index.php';</script>";
        exit();
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
    }
}    
    ?>
    <div class="container py-5">
        <div class="row g-4">
            <!-- Left Side Form -->
            <div class="col-lg-8">
                <div class="card shadow border-0 rounded-4">
                    <div class="card-body p-4">
                        <form class="row g-4" method="POST" enctype="multipart/form-data">
                            <h4 class="fw-bold">My Profile</h4>
                            <hr>
                            <input type="hidden" name="e_id" id="e_id" value="<?php echo $row['id']; ?>">

                            <div class="col-md-6">
                                <label class="form-label">Employee ID</label>
                                <input type="text" class="form-control" name="employee_id"
                                    value="<?php echo $row['employee_id']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Upload Image</label>
                                <input type="file" class="form-control" name="myfile">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Father Name</label>
                                <input type="text" class="form-control" name="father_name"
                                    value="<?php echo $row['father_name']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" value="<?php echo $row['dob']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone No.</label>
                                <input type="text" class="form-control" name="phone"
                                    value="<?php echo $row['phone']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Emergency Contact</label>
                                <input type="text" class="form-control" name="emergency_contact"
                                    value="<?php echo $row['emergency_contact']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email"
                                    value="<?php echo $row['email']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Blood Group</label>
                                <input type="text" class="form-control" name="blood_group"
                                    value="<?php echo $row['blood_group']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="" disabled>Select Gender</option>
                                    <option value="male" <?php if ($row['gender'] == 'male') echo 'selected'; ?>>Male
                                    </option>
                                    <option value="female" <?php if ($row['gender'] == 'female') echo 'selected'; ?>>
                                        Female</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Permanent Address</label>
                                <input type="text" class="form-control" name="permanent_address"
                                    value="<?php echo $row['permanent_address']; ?>">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Alternate Address</label>
                                <input type="text" class="form-control" name="local_address"
                                    value="<?php echo $row['local_address']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Aadhar Number</label>
                                <input type="text" class="form-control" name="adhar_number"
                                    value="<?php echo $row['adhar_number']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">PAN Number</label>
                                <input type="text" class="form-control" name="pan_number"
                                    value="<?php echo $row['pan_number']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Joining Date</label>
                                <input type="date" class="form-control" name="jdate"
                                    value="<?php echo $row['joining_date']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Department</label>
                                <select name="department" class="form-select">
                                    <option value="Marketing"
                                        <?php if ($row['department'] == 'marketing') echo 'selected'; ?>>Marketing
                                    </option>
                                    <option value="Graphic Designer"
                                        <?php if ($row['department'] == 'designer') echo 'selected'; ?>>Graphic
                                        Designer
                                    </option>
                                    <option value="Video Editor"
                                        <?php if ($row['department'] == 'editor') echo 'selected'; ?>>Video Editor
                                    </option>
                                    <option value="Website Designer"
                                        <?php if ($row['department'] == 'designer') echo 'selected'; ?>>Website
                                        Designer
                                    </option>
                                    <option value="Human Resource"
                                        <?php if ($row['department'] == 'Human Resource') echo 'selected'; ?>>
                                        Human Resource
                                    </option>
                                    <option value="Content Writer"
                                        <?php if ($row['department'] == 'content') echo 'selected'; ?>>
                                        Content Writer
                                    </option>
                                    <option value="SMM" <?php if ($row['department'] == 'SMM') echo 'selected'; ?>>
                                        Social Media Manager
                                    </option>
                                    <option value="SEO" <?php if ($row['department'] == 'SEO') echo 'selected'; ?>>
                                        SEO
                                    </option>
                                </select>
                            </div>

                            <div class="col-12 text-end mt-5">
                                <button type="submit" class="btn btn-primary px-4 py-2">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Side Profile Summary -->
            <div class="col-lg-4">
                <div class="card shadow border-0 text-center rounded-4">
                    <div class="card-body p-4">
                        <img src="../assets/images/employee/<?php echo $row['emp_img']; ?>"
                            class="rounded-circle shadow mb-3" width="120" height="120" alt="Profile">
                        <h5 class="mb-1"><?php echo $row['name']; ?></h5>
                        <p class="text-muted mb-0"><?php echo ucfirst($row['department']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>
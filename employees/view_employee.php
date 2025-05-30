<?php
$base_url = '/hrm_system/';
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/topbar.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<main class="page-content">
    <div class="container">
        <?php include '../config/db.php'; ?>
        <?php

        $employee_id = $_GET['employee_id'];
        
        $sql = "SELECT *FROM employees LEFT JOIN emp_documents ON employees.employee_id = emp_documents.employee_id  WHERE employees.employee_id = '$employee_id'";
         $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "<div class='alert alert-warning'>Employee not found!</div>";
        }
        ?>

        <h2 class="mb-4">Employee Details</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="../assets/images/employee/<?php echo $row['emp_img']; ?>" class="card-img-top"
                        alt="Profile Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text">Department: <?php echo $row['department']; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form class="row g-3" id="addEmpForm" action="edit_employee.php" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="e_id" id="e_id" value="<?php echo $row['id']; ?>">

                            <div class="col-md-6">
                                <label for="employee_id" class="form-label">Employee ID</label>
                                <input type="text" class="form-control" id="employee_id" name="employee_id"
                                    value="<?php echo $row['employee_id']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="myfile" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="myfile" name="myfile">
                                <img src="../assets/images/employee/<?php echo $row['emp_img']; ?>" alt="" width="50"
                                    height="50" class="mt-2">
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="<?php echo $row['name']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="fname" class="form-label">Father Name</label>
                                <input type="text" class="form-control" id="fname" name="father_name"
                                    value="<?php echo $row['father_name']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob"
                                    value="<?php echo $row['dob']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone No.</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="<?php echo $row['phone']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="emergency_contact" class="form-label">Emergency Contact</label>
                                <input type="text" class="form-control" id="emergency_contact" name="emergency_contact"
                                    value="<?php echo $row['emergency_contact']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo $row['email']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="blood_group" class="form-label">Blood Group</label>
                                <input type="text" class="form-control" id="blood_group" name="blood_group"
                                    value="<?php echo $row['blood_group']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" name="gender" id="gender">
                                    <option value="" disabled <?php echo empty($row['gender']) ? 'selected' : ''; ?>>
                                        Select Gender
                                    </option>
                                    <option value="male" <?php echo ($row['gender'] == 'male') ? 'selected' : ''; ?>>
                                        Male
                                    </option>
                                    <option value="female"
                                        <?php echo ($row['gender'] == 'female') ? 'selected' : ''; ?>>Female
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="permanent_address" class="form-label">Permanent Address</label>
                                <input type="text" class="form-control" id="paddress" name="permanent_address"
                                    value="<?php echo $row['permanent_address']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="local_address" class="form-label">Alternate Address</label>
                                <input type="text" class="form-control" id="laddress" name="local_address"
                                    value="<?php echo $row['local_address']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="adhar_number" class="form-label">Aadhar Card Number</label>
                                <input type="text" class="form-control" id="adhar_number" name="adhar_number"
                                    value="<?php echo $row['adhar_number']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="pan_number" class="form-label">PAN Card Number</label>
                                <input type="text" class="form-control" id="pan_number" name="pan_number"
                                    value="<?php echo $row['pan_number']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="jdate" class="form-label">Joining Date</label>
                                <input type="date" class="form-control" id="jdate" name="jdate"
                                    value="<?php echo $row['joining_date']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="department" class="form-label">Department</label>
                                <select class="form-select" name="department" id="department">
                                    <option value="executive"
                                        <?php if ($row['department'] == 'Executive') echo 'selected'; ?>>
                                        Digital Marketing Executive
                                    </option>
                                    <option value="manager"
                                        <?php if ($row['department'] == 'manager') echo 'selected'; ?>>
                                        Digital Marketing Manager
                                    </option>
                                    <option value="graphic"
                                        <?php if ($row['department'] == 'graphic') echo 'selected'; ?>>
                                        Graphic Designer
                                    </option>
                                    <option value="editor"
                                        <?php if ($row['department'] == 'editor') echo 'selected'; ?>>
                                        Video Editor
                                    </option>
                                    <option value="designer"
                                        <?php if ($row['department'] == 'designer') echo 'selected'; ?>>Website Designer
                                    </option>
                                    <option value="HR" <?php if ($row['department'] == 'HR') echo 'selected'; ?>>
                                        Human Resource
                                    </option>
                                    <option value="content"
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

                            <div class="col-md-6">
                                <label for="mydocuments" class="form-label">Documents</label>
                                <a href="gallery.php?employee_id=<?php echo $row['employee_id']; ?>
                                    " class="btn btn-secondary ms-2 p-0 px-4 py-1">
                                    View
                                </a>

                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" name="submit" id="sbtn" class="btn btn-primary">Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>

<script>
$(document).ready(function() {
    $('#sbtn').click(function(event) {
        event.preventDefault();

        var name = $('#name').val();
        if (name == '') {
            alert("Please enter your name");
            return false;
        }
        var employee_id = $('#employee_id').val();
        if (employee_id == '') {
            alert("Please enter your employee ID");
            return false;
        }
        var fname = $('#fname').val();
        if (fname == '') {
            alert("Please enter your father name");
            return false;
        }
        var phone = $('#phone').val();
        if (phone == '') {
            alert("Please enter your phone number");
            return false;
        }
        var emergency_contact = $('#emergency_contact').val();
        if (emergency_contact == '') {
            alert("Please enter your emergency contact number");
            return false;
        }
        var dob = $('#dob').val();
        if (dob == '') {
            alert("Please enter your date of birth");
            return false;
        }
        var blood_group = $('#blood_group').val();
        if (blood_group == '') {
            alert("Please enter your blood group");
            return false;
        }
        var email = $('#email').val();
        if (email == '') {
            alert("Please enter your email address");
            return false;
        }
        var paddress = $('#paddress').val();
        if (paddress == '') {
            alert("Please enter your permanent address");
            return false;
        }
        var laddress = $('#laddress').val();
        if (laddress == '') {
            alert("Please enter your alternate address");
            return false;
        }
        var adhar_number = $('#adhar_number').val();
        if (adhar_number == '') {
            alert("Please enter your adhar number");
            return false;
        }
        var pan_number = $('#pan_number').val();
        if (pan_number == '') {
            alert("Please enter your pan number");
            return false;
        }
        var department = $('#department').val();
        if (department == '') {
            alert("Please select your department");
            return false;
        }
        var gender = $('#gender').val();
        if (gender == '') {
            alert("Please select your gender");
            return false;
        }


        var form = $('#addEmpForm')[0]; // Native form element
        var formData = new FormData(form); // FormData handles files and text inputs
        $.ajax({
            type: 'POST',
            url: 'edit_employee.php',
            data: formData,
            contentType: false, // Required for file upload
            processData: false, // Don't process the data
            success: function(response) {
                console.log("Server Response:", response);
                window.location.href = 'employees.php';
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:", error);
                alert("AJAX error: " + error);
            }

        })

    })
})
</script>
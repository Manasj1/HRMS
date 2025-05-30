<?php include '../includes/header.php'; ?>
<?php include '../includes/topbar.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<main class="page-content">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card shadow border-0">
                    <div class="card-body p-4">
                        <form id="addEmpForm" action="" method="post" enctype="multipart/form-data" class="row g-3">

                            <div class="col-md-6">
                                <label for="myfile" class="form-label">
                                    <i class="bi bi-image-fill me-1"></i>Profile Image
                                </label>
                                <input type="file" class="form-control" id="myfile" name="myfile">
                            </div>

                            <div class="col-md-6">
                                <label for="employee_id" class="form-label">
                                    <i class="bi bi-person-badge-fill me-1"></i>Employee ID
                                </label>
                                <input type="text" class="form-control" id="employee_id" name="employee_id">
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="form-label">
                                    <i class="bi bi-person-fill me-1"></i>Full Name
                                </label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="col-md-6">
                                <label for="fname" class="form-label">
                                    <i class="bi bi-person-vcard-fill me-1"></i>Father's Name
                                </label>
                                <input type="text" class="form-control" id="fname" name="fname">
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">
                                    <i class="bi bi-telephone-fill me-1"></i>Phone Number
                                </label>
                                <input type="text" class="form-control" id="phone" name="phone" maxlength="15" required>
                            </div>

                            <div class="col-md-6">
                                <label for="emergency_contact" class="form-label">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>Emergency Contact
                                </label>
                                <input type="text" class="form-control" id="emergency_contact" name="emergency_contact">
                            </div>

                            <div class="col-md-6">
                                <label for="dob" class="form-label">
                                    <i class="bi bi-calendar-date-fill me-1"></i>Date of Birth
                                </label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">
                                    <i class="bi bi-envelope-fill me-1"></i>Email
                                </label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>


                            <div class="col-md-6">
                                <label for="paddress" class="form-label">
                                    <i class="bi bi-geo-alt-fill me-1"></i>Permanent Address
                                </label>
                                <textarea class="form-control" id="paddress" name="paddress" rows="2"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="laddress" class="form-label">
                                    <i class="bi bi-geo-fill me-1"></i>Alternate Address
                                </label>
                                <textarea class="form-control" id="laddress" name="laddress" rows="2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="blood_group" class="form-label">
                                    <i class="bi bi-droplet-fill me-1"></i>Blood Group
                                </label>
                                <input type="text" class="form-control" id="blood_group" name="blood_group">
                            </div>
                            <div class="col-md-6">
                                <label for="adhar_number" class="form-label">
                                    <i class="bi bi-credit-card-2-front-fill me-1"></i>Adhaar Number
                                </label>
                                <input type="text" class="form-control" id="adhar_number" name="adhar_number">
                            </div>

                            <div class="col-md-6">
                                <label for="pan_number" class="form-label">
                                    <i class="bi bi-credit-card-fill me-1"></i>PAN Number
                                </label>
                                <input type="text" class="form-control" id="pan_number" name="pan_number">
                            </div>

                            <div class="col-md-6">
                                <label for="gender" class="form-label">
                                    <i class="bi bi-gender-ambiguous me-1"></i>Gender
                                </label>
                                <select name="gender" id="gender" class="form-select">
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="jdate" class="form-label">
                                    <i class="bi bi-calendar-check-fill me-1"></i>Joining Date
                                </label>
                                <input type="date" class="form-control" id="jdate" name="jdate">
                            </div>

                            <div class="col-md-6">
                                <label for="department" class="form-label">
                                    <i class="bi bi-building me-1"></i>Department
                                </label>
                                <select name="department" id="department" class="form-select">
                                    <option value="" disabled selected>Select Department</option>
                                    <option value="manager">Digital Marketing Manager</option>
                                    <option value="executive">Digital Marketing Executive</option>
                                    <option value="graphic">Graphic Designer</option>
                                    <option value="editor">Video Editor</option>
                                    <option value="designer">Website Designer</option>
                                    <option value="HR">Human Resource</option>
                                    <option value="content">Content Writer</option>
                                    <option value="SMM">Social Media Manager</option>
                                    <option value="SEO">SEO</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="mydocuments" class="form-label">
                                    <i class="bi bi-file-earmark-arrow-up me-1"></i>Documents
                                </label>
                                <input type="file" class="form-control" id="mydocuments" name="mydocuments[]" multiple>
                            </div>

                            <div class="col-12 d-flex justify-content-end mt-3">
                                <button type="submit" id="sbtn" class="btn btn-success px-4">
                                    <i class="bi bi-check-circle-fill me-1"></i>Submit
                                </button>
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
        var fileInput = $('#myfile')[0];
        if (fileInput.files.length === 0) {
            alert("Please upload a profile image.");
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
        var password = $('#password').val();
        if (password == '') {
            alert("Please enter your password");
            return false;
        }
        var confirm_password = $('#confirm_password').val();
        if (confirm_password == '') {
            alert("Please enter your confirm password");
            return false;
        }
        if (password != confirm_password) {
            alert("Password and confirm password do not match");
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
            url: 'empdb.php',
            data: formData,
            contentType: false, // Required for file upload
            processData: false, // Don't process the data
            success: function(response) {
                alert(response);
                // console.log("Server Response:", response);
                // window.location.href = 'employees.php';

            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:", error);
                alert("AJAX error: " + error);
            }

        })

    })
})
</script>
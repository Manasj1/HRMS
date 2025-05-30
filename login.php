<?php 
$base_url = '/hrm_system/';
session_start();
?>
<?php include 'includes/header.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-dark">
    <div class="row shadow-lg rounded-4 overflow-hidden" style="max-width: 900px; width: 100%;">
        <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center bg-white">
            <img src="assets/images/brandchkra.jpg" class="img-fluid p-4" alt="Login Image">
        </div>
        <div class="col-md-6 bg-white p-5">
            <h3 class="mb-4 text-center">Sign In to StaffSphere</h3>
            <form id="loginForm" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"
                            required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Enter your password" required>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" id="btn" class="btn btn-primary btn-lg">Sign In</button>
                </div>
            </form>
        </div>
    </div>


    <footer class="text-center mt-auto py-3 w-100 bg-light position-fixed bottom-0 start-0 bg-dark text-light">
        <small>&copy; <?php echo date('Y'); ?> BrandChakra. All rights reserved.</small>
    </footer>

    <script src="<?=$base_url?>assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault();
            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: {
                    email: email,
                    password: password
                },
                success: function(res) {
                    console.log("Server Response:", res);
                    if (res.trim() === 'done') {
                        window.location.href = 'index.php';
                    } else if (res.trim() === 'SQL Error') {
                        alert("Database error. Please try again later.");
                    } else {
                        alert("Invalid email or password.");
                    }
                }
            });
        });
    });
    </script>
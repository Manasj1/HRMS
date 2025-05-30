<?php 
 $base_url ='/hrm_system/';
 ?><?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="container-fluid">
    <div class="row">

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <!-- Navbar -->


            <div class="text-center mb-5 mt-5">
                <h2 class="fw-bold">Welcome to StaffSphere</h2>
                </h2>
                <p class="text-muted">Manage your team effortlessly.</p>
            </div>

            <!-- Cards Section -->
            <div class="row g-3 ms-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-person-plus-fill fs-1 text-success mb-2"></i>
                            <h5 class="card-title">Add New Employee</h5>
                            <p class="card-text">Register a new employee</p>
                            <a href="employees/add_employee.php" class="btn btn-outline-success btn-sm">
                                <i class="bi bi-plus-circle me-1"></i>Add Employee
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-people-fill fs-1 text-success mb-2"></i>
                            <h5 class="card-title">Team</h5>
                            <p class="card-text">View your team members and roles.</p>
                            <a href="employees/employees.php" class="btn btn-outline-primary btn-sm">View Team</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-currency-rupee fs-1 text-success mb-2"></i>
                            <h5 class="card-title">Payroll</h5>
                            <p class="card-text">Manage payroll and generate payslips.</p>
                            <a href="payroll/pay.php" class="btn btn-outline-warning btn-sm">Payroll</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
<?php
$base_url = '/hrm_system/';
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/topbar.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<main class="page-content">
    <div class="container-fluid">
        <h6 class="mb-0 text-uppercase">Employees Data</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="employeeTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Email</th>
                                <th>Phone no</th>
                                <th>Permanent Address</th>
                                <th>Alternate Address</th>
                                <th>Department</th>
                                <th>Date of birth</th>
                                <th>Gender</th>
                                <th>Joining date</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../config/db.php';
                            $sql = "SELECT * FROM employees";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['employee_id']; ?></td>
                                <td><a
                                        href="view_employee.php?employee_id=<?php echo $row['employee_id']; ?>"><?php echo $row['name']; ?></a>
                                </td>
                                <td><?php echo $row['father_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['permanent_address']; ?></td>
                                <td><?php echo $row['local_address']; ?></td>
                                <td><?php echo $row['department']; ?></td>
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['joining_date']; ?></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="<?php echo $base_url; ?>payroll/payslip_generation.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-success btn-sm me-1">
                                            <i class="bi bi-receipt"></i> Slip
                                        </a>
                                        <a href="delete_employee.php?employee_id=<?php echo $row['employee_id']; ?>"
                                            class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Del
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='12' class='text-center'>No employees found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
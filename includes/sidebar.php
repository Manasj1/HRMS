<?php 
 $base_url ='/hrm_system/';
 ?>
<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?=$base_url?>assets/images/brandchkra.jpg" class="logo-icon" alt="logo icon"
                style="width: 200px; height: auto; padding:5px" />
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?=$base_url?>index.php">
                <div class="parent-icon"><i class="bi bi-house-fill"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i></div>
                <div class="menu-title">Employees</div>
            </a>
            <ul>
                <li>
                    <a href="<?=$base_url?>employees/add_employee.php"><i class="bi bi-circle"></i>Add
                        Employee</a>
                </li>
                <li>
                    <a href="<?=$base_url?>employees/employees.php"><i class="bi bi-circle"></i>All
                        Employees</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i></div>
                <div class="menu-title">Leave & Attendance</div>
            </a>
            <ul>
                <li>
                    <a href="<?=$base_url?>attendance/leave_request.php"><i class="bi bi-circle"></i>Leave
                        request</a>
                </li>
                <li>
                    <a href="<?=$base_url?>attendance/leave_app_rej.php"><i class="bi bi-circle"></i>Leave
                        Approval/rejection</a>
                </li>
                <li>
                    <a href="<?=$base_url?>attendance/attendance_track.php"><i class="bi bi-circle"></i>Attendance
                        Tracking</a>
                </li>
                <li>
                    <a href="<?=$base_url?>attendance/leave_bal_up.php"><i class="bi bi-circle"></i>Leave
                        Balance
                        Update</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i></div>
                <div class="menu-title">Payroll</div>
            </a>
            <ul>
                <li>
                    <a href="<?=$base_url?>payroll/pay.php"><i class="bi bi-circle"></i>Payslip Generation</a>
                </li>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->
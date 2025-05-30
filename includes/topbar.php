<?php 
 $base_url ='/hrm_system/';
 ?>
<header class="top-header">
    <?php include   $_SERVER['DOCUMENT_ROOT'] . $base_url . 'config/db.php';?>
    <?php
                 $sql="SELECT name,emp_img,department FROM users";
                 $result= $conn -> query($sql);
               ?>
    <nav class="navbar navbar-expand gap-3">
        <div class="top-navbar-right ms-auto">

        </div>

        <div class="dropdown dropdown-user-setting">
            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="user-setting d-flex align-items-center gap-3">

                    <?php $row= $result->fetch_assoc()
                      ?>
                    <img src="<?=$base_url?>assets/images/employee/<?php echo $row['emp_img']; ?>" class="user-img">
                    <div class=" d-none d-sm-block">
                        <p class="user-name mb-0"><?php echo $row['name'] ?></p>

                        <small class="mb-0 dropdown-user-designation"><?php echo ucfirst($row['department']); ?></small>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="<?=$base_url?>employees/profile.php">
                        <div class="d-flex align-items-center">
                            <div class=""><i class="bi bi-person-fill"></i></div>
                            <div class="ms-3"><span>Profile</span></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="<?=$base_url?>index.php">
                        <div class="d-flex align-items-center">
                            <div class=""><i class="bi bi-speedometer"></i></div>
                            <div class="ms-3"><span>Dashboard</span></div>
                        </div>
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <a class="dropdown-item" href="<?=$base_url?>logout.php">
                        <div class="d-flex align-items-center">
                            <div class=""><i class="bi bi-lock-fill"></i></div>
                            <div class="ms-3"><span>Logout</span></div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
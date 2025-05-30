<?php 
 $base_url ='/hrm_system/';
 ?>
<?php  include '../includes/header.php';?>
<?php  include '../includes/topbar.php';?>
<?php  include '../includes/sidebar.php';?>
<main class="page-content">
              <?php include '../config/db.php';?>
              <?php
                 $sql="SELECT * FROM pay";
                 $result= $conn -> query($sql);
               ?>  
        <h6 class="mb-0 text-uppercase">DataTable Import</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Emp code</th>
                                <th>Pay Period</th>
                                <th>Bank Account</th>
                                <th>Department</th>
                                <th>Working days</th>
                                <th>Leaves</th>
                                <th>Basic</th>
                                <th>HRA</th>
                                <th>Special Allowance</th>
                                <th>earning</th>
                                <th scope="col" colspan="2" class="text-center">Actions</th>
            
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row= $result->fetch_assoc()){
                                ?>
                                    <tr>
                                        <td>
                                            
                                <?php
                        
                                        $empp = $row['employee_id'];
                                        $sql1 = "SELECT name FROM employees WHERE id = '$empp'";
                                        $result1 = $conn->query($sql1);
                                
                                        if ($result && $result1->num_rows > 0) {
                                            $rowww = $result1->fetch_assoc();
                                            echo $rowww['name'];
                                        } else {
                                            echo "<span class='text-danger'>No Employee Found</span>";
                                        }
                                    ?>

                                        </td>
                                      
                                        <td><?php echo $row['emp_code'] ?></td>
                                        <td><?php echo $row['pay_period'] ?></td>
                                        <td><?php echo $row['bank_acc'] ?></td>
                                        <td><?php echo $row['department'] ?></td>
                                        <td><?php echo $row['working_days'] ?></td>
                                        <td><?php echo $row['leaves'] ?></td>
                                        <td><?php echo $row['basic'] ?></td>
                                        <td><?php echo $row['hra'] ?></td>
                                        <td><?php echo $row['special_allowance'] ?></td>
                                        <td><button class="px-2 rounded btn btn-success btn-small"><a class="text-light" href="<?=$base_url?>payroll/payslip_generation.php?id=<?=$row['id'];?>">pay slip gene</a></button></td>
                                        <td><button class="px-2 rounded btn btn-danger btn-small"><a class="text-light" href="delete_employee.php?id=<?=$row['id'];?>">del</a></button></td>
                                    </tr>
                                    <?php } ?>
                           
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
</main>
<?php  include '../includes/footer.php';?>



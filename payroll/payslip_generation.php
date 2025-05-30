<?php  include '../includes/header.php';?>
<?php  include '../includes/topbar.php';?>
<?php  include '../includes/sidebar.php';?>
<?php  include '../config/db.php';?>

<?php
   
   $id =   $_GET['id'];
   $sql = "SELECT  name, joining_date, department, pan_number FROM employees WHERE id = '$id'";
   $result=$conn -> query($sql);
   if($result->num_rows > 0){
       $row = $result->fetch_assoc();
    }
    else {
        echo "Employee not found!";
    }


?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $employee_id = $_POST['employee_id'];

    $emp_code = $_POST['emp_code'];
    $pay_period = $_POST['pay_period'];
    $bank_acc = $_POST['bank_acc'];
    $department = $_POST['department'];
    $working_days = $_POST['working_days'];
    $leaves = $_POST['leaves'];
    $basic = $_POST['basic'];
    $hra = $_POST['hra'];
    $special_allowance = $_POST['special_allowance'];
    $earning = $_POST['earning'];
    $provident_fund = $_POST['provident_fund'];
    $leav = $_POST['leav'];
    $tds = $_POST['tds'];
    $other = $_POST['other'];
    $total_deduction = $_POST['total_deduction'];
    $net_pay = $_POST['net_pay'];
    $petrol_or_diesel = $_POST['petrol_or_diesel'];
    $telephone_bill = $_POST['telephone_bill'];
    $others = $_POST['others'];
    $net_total = $_POST['net_total'];

    // Check if record already exists
    $check_query = "SELECT * FROM pay WHERE employee_id='$employee_id'";
    $result1 = $conn->query($check_query);

    if ($result1->num_rows > 0) {
        echo "Record already exists for this employee and pay period!";
    } else {
        // Insert if no existing record
        $sql1 = "INSERT INTO pay(employee_id, emp_code, pay_period, bank_acc, department, working_days, leaves, basic, hra, special_allowance, earning, provident_fund, leav, tds, other, total_deduction, net_pay, petrol_or_diesel, telephone_bill, others, net_total) 
                 VALUES ('$employee_id','$emp_code', '$pay_period', '$bank_acc', '$department', '$working_days', '$leaves', '$basic', '$hra', '$special_allowance', '$earning', '$provident_fund', '$leav', '$tds', '$other', '$total_deduction', '$net_pay', '$petrol_or_diesel', '$telephone_bill', '$others', '$net_total')";

        if ($conn->query($sql1) === TRUE) {
            echo "Success: Payslip inserted!";
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    }
}

?>


    <main class="page-content">
         <div class="container">
             <form action="" method="post">
                <input type="hidden" value="<?php echo  $id ;?>" name="employee_id">
                <div id="slipForm">
                    <div class="row">
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="">joining date</label>

                            </div>
                            <div class="mb-3">
                                <label for="">Pay period</label>
                            
                            </div>
                            <div class="mb-3">
                                <label for="">Emp code</label>
                               
                            </div>
                            <div class="mb-3">
                                <label for="">Bank A/C No.</label>
                                
                            </div>
                            <div class="mb-3">
                                <label for="">Pan</label>
                            
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="mb-3">
                              <input type="text" value="<?php echo $row['joining_date']; ?>">
                            </div> 
                            <div class="mb-3">
                                <input type="text" id="pay_period" name="pay_period">
                               
                            </div> 
                            <div class="mb-3">
                                <input type="text" id="emp_code" name="emp_code" >
                            </div> 
                            <div class="mb-3 mt-4">
                                <input type="text" id="bank_acc" name="bank_acc" >
                            </div> 
                            <div class="mb-3 mt-4">
                                <input type="text"  value="<?php echo $row['pan_number']; ?>">
                            </div> 
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                    <label for="">Employee Name</label>
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="">Designation</label>
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="">Department</label>
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="">Working days</label>
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="">Leaves</label>
                                   
                                </div>
                        </div>   
                        <div class="col-3">
                            <div class="mb-3">
                                <input type="text"  value="<?php echo $row['name']; ?>">
                            </div> 
                            <div class="mb-3"> 
                                <input type="text" >
                            </div> 
                            <div class="mb-3">
                                <input type="text" id="department" name="department" value="<?php echo $row['department']; ?>">
                            </div> 
                            <div class="mb-3 mt-4">
                                <input type="text" id="working_days" name="working_days"> 
                            </div> 
                            <div class="mb-3 mt-4">
                                <input type="text"bid="leaves" name="leaves">
                            </div> 
                        </div>       
                    </div>
                    <!-- close 1st row -->
                    <div class="row">
                        <hr>
                             <div class="col-3">Earning</div>
                             <div class="col-3">Amount</div>
                             <div class="col-3">Deduction</div>
                             <div class="col-3">Amounts</div>    
                        <hr>
                    </div>
                     <!-- close 2st row -->
                      <div class="row">
                          <div class="col-3">
                             <div class="mb-3">
                                <label for="">Basic</label>
                              </div>
                              <div class="mb-3">
                                <label for="">HRA</label>
                              </div>
                              <div class="mb-3">
                                 <label for="">Special Allowance</label>
                              </div>
                              <div class="mb-3 mt-5">
                                 <label for="">Earnings</label>
                               </div>  
                          </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <input type="text" id="basic" name="basic" >
                                    </div> 
                                    <div class="mb-3">
                                        <input type="text" id="hra" name="hra" >
                                    </div> 
                                    <div class="mb-3">
                                        <input type="text" id="special_allowance" name="special_allowance" >
                                    </div> 
                                    <div class="mb-3 mt-4">
                                        <input type="text" id="earning" name="earning" >
                                    </div> 
                               </div>
                            <div class="col-3">
                                <div class="mb-3">
                                <label for="">Provident Fund</label>
                              </div>
                              <div class="mb-3">
                                <label for="">Leave</label>
                              </div>
                              <div class="mb-3 ">
                                 <label for="">TDS</label>
                              </div>
                              <div class="mb-3 mt-5">
                                 <label for="">other</label>
                               </div>  
                               <div class="mb-3 mt-5">
                                 <label for="">Total Deduction</label>
                               </div> 
                               <div class="mb-3 ">
                                 <label for="">Netpay</label>
                               </div> 
                          </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <input type="text"id="provident_fund" name="provident_fund">
                                    </div> 
                                    <div class="mb-3">
                                        <input type="text" id="leav" name="leav">
                                    </div> 
                                    <div class="mb-3">
                                        <input type="text" id="tds" name="tds">
                                    </div> 
                                    <div class="mb-3">
                                        <input type="text" id="other" name="other">
                                    </div> 
                                    <div class="mb-3">
                                        <input type="text" id="total_deduction" name="total_deduction" >
                                    </div> 
                                    <div class="mb-3 mt-3">
                                        <input type="text" id="net_pay" name="net_pay" >
                                    </div> 
                                
                                </div> 
                              
                               
                      </div>
                       <!-- close 3st row -->
                        <div class="row">
                            <hr>
                            <div class="col-3">Reimbursement</div>
                            <div class="col-3">Amount</div>
                            <hr>
                        </div>

                        <div class="row">
                            <div class="col-3">
                               <div class="mb-3">
                                  <label for="">Petrol or Diesel</label>
                              </div>
                                <div class="mt-3 mb-3">
                                  <label for="">Telephone Bill</label>
                                 </div>
                                <div class=" mt-4 mb-3">
                                   <label for="">other</label>
                                 </div>
                                 <div class="mb-3 mt-5 ">
                                   <label for="">Net Total</label>
                               </div>  
                            </div> 
                            <div class="col-3"> 
                                <div class="mb-3">
                                    <input type="text" id="petrol_or_diesel" name="petrol_or_diesel" >
                                </div>   
                                <div class="mb-3">
                                    <input type="text" id="telephone_bill" name="telephone_bill">
                                </div>  
                                <div class="mb-3">
                                    <input type="text" id="others" name="others" >
                                </div> 
                                <div class="mb-3 mt-5">
                                    <input type="text" id="net_total" name="net_total">
                                </div> 
                                <div class="mb-3 mt-5">
                                     <button type="submit" id="sbtn" class="btn btn-primary px-5">Submit</button>

                                </div> 
                            </div>   
                        </div>
                </div>   
            </form>
         </div>
    </main>

<?php  include '../includes/footer.php';?>


<?php 
require_once "include/header.php";
?>
<?php

        // database connection
        require_once "../connection.php";

        $currentDay = date( 'Y-m-d', strtotime("today") );
        $tomorrow = date( 'Y-m-d', strtotime("+1 day") );

         $today_leave = 0;
         $tomorrow_leave = 0;
         $this_week = 0;
         $next_week = 0;
            $i = 1;
        // total department
         $select_dept = "SELECT * FROM department";
         $total_dept = mysqli_query($conn , $select_dept);

        // total employee
         $select_emp = "SELECT * FROM employee order by salary";
         $total_emp = mysqli_query($conn , $select_emp);

        // employee on leave
        $emp_leave  ="SELECT * FROM emp_leave";
        $total_leaves = mysqli_query($conn , $emp_leave);

        if( mysqli_num_rows($total_leaves) > 0 ){
            while( $leave = mysqli_fetch_assoc($total_leaves) ){
                $leave = $leave["start_date"];

                //daywise
                if($currentDay == $leave){
                    $today_leave += 1;
                }elseif($tomorrow == $leave){
                   $tomorrow_leave += 1;
                }


            }
        }else {
            // echo "No leave found";
        }

        $sql_highest_salary =  "SELECT * FROM employee ORDER BY salary DESC";
        $emp_ = mysqli_query($conn , $sql_highest_salary);

?>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-4">
            <div class="container-fluid card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"><b>Department</b></li>
                    <li class="list-group-item">Total departments : <?php echo mysqli_num_rows($total_dept); ?> </li>
                    <li class="list-group-item text-center"><a href="manage-dept.php"><b>View All Departments</b></a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="container-fluid card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"><b>Employees</b></li>
                    <li class="list-group-item">Total Employees : <?php echo mysqli_num_rows($total_emp); ?></li>
                    <li class="list-group-item text-center"><a href="manage-employee.php"> <b>View All Employees</b></a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="container-fluid card shadow " style="width:18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"><b>Employees on Leave(Daywise)</b></li>
                    <li class="list-group-item">Today :  <?php echo $today_leave; ?>  </li>
                    <li class="list-group-item">Tomorrow :  <?php echo $tomorrow_leave; ?> </li>
                    <li class="list-group-item text-center"><a href="manage-leave.php"> <b>View leave</b></a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="container-fluid card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"><b>Production data(Monthly wise)</b></li>
                    <li class="list-group-item">Month : <?php echo "December"; ?></li>
                    <li class="list-group-item">Production(in tonnes) : <?php echo "20000"; ?></li>
                    <li class="list-group-item">Waste(in tonnes) : <?php echo "29000"; ?></li>
                    <li class="list-group-item text-center"><a href="minesdata.php"> <b>View All Data</b></a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="container-fluid card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"><b>Sales data(Monthly wise)</b></li>
                    <li class="list-group-item">Month : <?php echo "December"; ?></li>
                    <li class="list-group-item">Domestic Market (in Tonnes) : <?php echo "18000"; ?></li>
                    <li class="list-group-item">Waste (in tonnes) : <?php echo "11000"; ?></li>
                    <li class="list-group-item text-center"><a href="salesdata.php"> <b>View All Data</b></a></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="container-fluid card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"><b>Finance data(Monthly wise)</b></li>
                    <li class="list-group-item">Month : <?php echo "December"; ?></li>
                    <li class="list-group-item">Expenses : <?php echo "2800000"; ?></li>
                    <li class="list-group-item">Revenue : <?php echo "72500000"; ?></li>
                    <li class="list-group-item text-center"><a href="financedata.php"> <b>View All Data</b></a></li>
                </ul>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
    <div class="container row bg-white shadow "> 
    <div class="col ms-auto">
            <div class=" text-center my-3 "> <h4>Employee Board</h4> </div>
            <table class="table table-responsive-lg table-bordered table-hover text-center">
        <thead>
            <tr class="bg-dark">
            <th scope="col">Serial.No.</th>
            <th scope="col">Employee Id</th>
            <th scope="col">Employee Name</th>
            <th scope="col">Employee Email</th>
            <th scope="col">Designation</th>
            <th scope="col">Salary</th>
            </tr>
        </thead>
        <tbody>
        <?php while( $emp_info = mysqli_fetch_assoc($emp_) ){
                    $emp_id = $emp_info["eid"];
                    $emp_name = $emp_info["ename"];
                    $emp_email = $emp_info["email"];
                    $emp_job = $emp_info["job"];
                    $emp_salary = $emp_info["salary"];
                    ?>
            <tr>
            <th ><?php echo $i; ?></th>
            <th ><?php echo $emp_id; ?></th>
            <td><?php echo $emp_name; ?></td>
            <td><?php echo $emp_email; ?></td>
            <td><?php echo $emp_job; ?></td>
            <td><?php echo $emp_salary; ?></td>
            </tr>

          <?php  
          $i++; 
                } 
            ?>
        </tbody>
        </table>
        </div>
    </div>
    </div>
    </div>
</div>

<?php 
require_once "include/footer.php";
?>
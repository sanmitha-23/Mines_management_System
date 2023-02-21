<?php 
    require_once "include/header.php";
?>


<?php  

        $nameErr = $emailErr = $eidErr = $deptErr= "";
        $eid = $ename = $email = $dob = $hiredate = $gender = $job = $salary = $dnum = $addresses= "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["eid"]) ){
                $eid = "<p style='color:red'> * ID is required</p>";
            }else {
                $eid = $_REQUEST["eid"];
            }

            if( empty($_REQUEST["ename"]) ){
                $nameErr = "<p style='color:red'> * Name is required</p>";
            }else {
                $ename = $_REQUEST["ename"];
            }

            if( empty($_REQUEST["email"]) ){
                $emailErr = "<p style='color:red'> * Email is required</p> ";
            }else{
                $email = $_REQUEST["email"];
            }

            
            if( empty($_REQUEST["dob"]) ){
                $dob = "";
            }else {
                $dob = $_REQUEST["dob"];
            }

            if( empty($_REQUEST["hiredate"]) ){
                $hiredate  = "<p style='color:red'> * Date is required</p>";
            }else {
                $hiredate = $_REQUEST["hiredate"];
            }

            if( empty($_REQUEST["gender"]) ){
                $gender ="";
            }else {
                $gender = $_REQUEST["gender"];
            }

            if( empty($_REQUEST["job"]) ){
                $job = "";
            }else{
                $job = $_REQUEST["job"];
            }

            if( empty($_REQUEST["salary"]) ){
                $salary = "";
            }else {
                $salary = $_REQUEST["salary"];
            }
            
            if( empty($_REQUEST["dnum"]) ){
                $deptErr = "<p style='color:red'> * Department No is required</p> ";
            }else{
                $dept = $_REQUEST["dnum"];
            }

            if( empty($_REQUEST["addresses"]) ){
                $addErr = "";
            }else{
                $addresses = $_REQUEST["addresses"];
            }


            if( !empty($ename) && !empty($email) && !empty($dept) && !empty($eid) ){

                // database connection
                require_once "../connection.php";

                $sql_select_query = "SELECT email FROM employee WHERE email = '$email' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $emailErr = "<p style='color:red'> * Email Already Registered</p>";
                } else{

                    $sql = "INSERT INTO `employee`(`eid`, `ename`, `email`, `dob`, `hiredate`, `gender`, `job`, `salary`, `dnum`, `addresses`)  VALUES( '$eid','$ename' , '$email' , '$dob' , '$hiredate' , '$gender','$job', '$salary','$dept','$addresses' )  ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        $eid = $ename = $email = $dob = $hiredate = $gender = $job = $salary = $dnum = $addresses= "";
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-employee.php');
                            $('#linkBtn').text('View Employees');
                            $('#addMsg').text('Employee Added Successfully!');
                            $('#closeBtn').text('Add More?');
                        })
                     </script>
                     ";
                    }
                    
                }

            }
        }

?>



<div style=""> 
<div class="login-form-bg h-100">
        <div class="container  h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-4 shadow">                       
                                    <h4 class="text-center">Add New Employee</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">

                                <div class="form-group">
                                    <label >Employee Id :</label>
                                    <input type="number" class="form-control" value="<?php echo $eid; ?>"  name="eid" >
                                   <?php echo $eidErr; ?>
                                </div>
                            
                                <div class="form-group">
                                    <label >Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $ename; ?>"  name="ename" >
                                   <?php echo $nameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Email :</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>"  name="email" >     
                                    <?php echo $emailErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Date-of-Birth :</label>
                                    <input type="date" class="form-control" value="<?php echo $dob; ?>" name="dob" >  
                                </div>


                                <div class="form-group">
                                    <label >Hire-Date :</label>
                                    <input type="date" class="form-control" value="<?php echo $dob; ?>" name="hiredate" >  
                                </div>

                                <div class="form-group">
                                    <label >Job :</label>
                                    <input type="text" class="form-control" value="<?php echo $job; ?>" name="job" >            
                                </div>

                                <div class="form-group">
                                    <label >Salary :</label>
                                    <input type="number" class="form-control" value="<?php echo $salary; ?>" name="salary" >           
                                </div>

                                <div class="form-group">
                                    <label >Department Number :</label>
                                    <input type="number" class="form-control" value="<?php echo $dept; ?>" name="dnum" >            
                                </div>

                                <div class="form-group">
                                    <label >Address :</label>
                                    <input type="text" class="form-control" value="<?php echo $addresses; ?>" name="addresses" >             
                                </div>

                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label" >Gender :</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Male" ){ echo "checked"; } ?>  value="Male"  selected>
                                    <label class="form-check-label" >Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Female" ){ echo "checked"; } ?>  value="Female">
                                    <label class="form-check-label" >Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Other" ){ echo "checked"; } ?>  value="Other">
                                    <label class="form-check-label" >Other</label>
                                </div>

                               
                                <br>

                                <button type="submit" class="btn btn-primary btn-block">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>
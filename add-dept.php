<?php 
    require_once "include/header.php";
?>

<?php  

        $dnameErr = $dnumErr =  "";
        $dname = $dept = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["dname"]) ){
                $dnameErr = "<p style='color:red'> * Name is required</p>";
            }else {
                $dname = $_REQUEST["dname"];
            }

            if( empty($_REQUEST["dnum"]) ){
                $dnumErr = "<p style='color:red'> * Number is required</p> ";
            }else{
                $dept = $_REQUEST["dnum"];
            }

            if( !empty($dname) && !empty($dept) ){

                // database connection
                require_once "../connection.php";

                $sql_select_query = "SELECT dnum FROM department WHERE dnum = '$dept' ";
                $r = mysqli_query($conn , $sql_select_query);

                // checks if dept already exists
                if( mysqli_num_rows($r) > 0 ){
                    $dnumErr = "<p style='color:red'> * Department Already Registered</p>";
                } else{

                    $sql = "INSERT INTO department (dnum, dname) VALUES ( '$dept' , '$dname' )  ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        $dname = $dept = "";
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-dept.php');
                            $('#linkBtn').text('View Departments');
                            $('#addMsg').text('Department Added Successfully!');
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
        <div class="container mt-5 h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">                       
                                    <h4 class="text-center">Add New Department</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >Department Name:</label>
                                    <input type="text" class="form-control" value="<?php echo $dname; ?>"  name="dname" >
                                   <?php echo $dnameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Department Number:</label>
                                    <input type="number" class="form-control" value="<?php echo $dept; ?>"  name="dnum" >     
                                    <?php echo $dnumErr; ?>
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
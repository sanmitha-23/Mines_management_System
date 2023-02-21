
<?php
    require_once "include/header.php";
?>


<?php  

        $id = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM department WHERE dnum = $id ";
        $result = mysqli_query($conn , $sql);
        $rows = mysqli_fetch_assoc($result);
        $name = $rows["dname"];
        $did = $rows["dnum"];


        $dnameErr = $dnumErr = "";
        $dname = $dept="";
       
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["dnum"]) ){
                $dnumErr = "<p style='color:red'> * Department number is required</p> ";
                $dept = "";
            }else{
                $dept = $_REQUEST["dnum"];
            }

            if( empty($_REQUEST["dname"]) ){
                $dnameErr = "<p style='color:red'> * Name is required</p>";
                $dname = "";
            }else {
                $dname = $_REQUEST["dname"];
            }

            if( !empty($dname) && !empty($dept) ){

                // database connection
                $sql_select_query = "SELECT dnum FROM department WHERE dnum = '$dept' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $dnumErr = "<p style='color:red'> * Department Already Registered</p>";
                } else{

                    $sql = "UPDATE `department` SET `dnum` = '$dept', `dname` = '$dname' WHERE `department`.`dnum` = $id";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready(function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-dept.php');
                            $('#linkBtn').text('View Departments');
                            $('#addMsg').text('Edited Successfully!');
                            $('#closeBtn').text('Edit Again?');
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
                                    <h4 class="text-center">Edit Department</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >Department Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="dname" >
                                   <?php echo $dnameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Department Number :</label>
                                    <input type="number" class="form-control" value="<?php echo $did; ?>"  name="dnum" >     
                                    <?php echo $dnumErr; ?>
                                </div>

                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >        
                                    </div>
                                    <div class="input-group">
                                         <a href="manage-admin.php" class="btn btn-primary w-20">Close</a>
                                    </div>
                                </div>
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

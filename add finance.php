<?php 
    require_once "include/header.php";
?>
<!--     
    <?php
    require_once "include/header.php";
?> -->


<?php  

        $idErr = $dataErr =  "";
        $month = $id = $rev = $exp = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["id"]) ){
                $idErr = "<p style='color:red'> * Number is required</p> ";
            }else {
                $id = $_REQUEST["id"];
            }

            if( empty($_REQUEST["Month"]) ){
                $dataErr = "<p style='color:red'> * Data is required</p> ";
            }else{
                $month = $_REQUEST["Month"];
            }

            if( empty($_REQUEST["Expenses"]) ){
                $dataErr = "<p style='color:red'> * Data is required</p> ";
            }else{
                $exp = $_REQUEST["Expenses"];
            }

            if( empty($_REQUEST["Revenue"]) ){
                $dataErr = "<p style='color:red'> * Data is required</p> ";
            }else{
                $rev = $_REQUEST["Revenue"];
            }

            if( !empty($rev) && !empty($exp) ){

                // database connection
                require_once "../connection.php";

                $sql_select_query = "SELECT id FROM financedata WHERE id = '$id' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $dnumErr = "<p style='color:red'> * Data Already Register</p>";
                } else{

                    $sql = "INSERT INTO `financedata`(`id`,`Month`,`Expenses`,`Revenue`) VALUES ('$id','$month','$exp','$rev') ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        $dname = $dept = "";
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'financedata.php');
                            $('#linkBtn').text('View Data');
                            $('#addMsg').text('Added Successfully!');
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
                                    <h4 class="text-center">Add New Data</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >Serial No:</label>
                                    <input type="text" class="form-control" value="<?php echo $id; ?>"  name="id" >
                                   <?php echo $idErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Month:</label>
                                    <input type="text" class="form-control" value="<?php echo $month; ?>"  name="Month" >     
                                    <?php echo $dataErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Expenses:</label>
                                    <input type="number" class="form-control" value="<?php echo $exp; ?>"  name="Expenses" >     
                                    <?php echo $dataErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Revenue:</label>
                                    <input type="number" class="form-control" value="<?php echo $rev; ?>"  name="Revenue" >     
                                    <?php echo $dataErr; ?>
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


<?php 
    require_once "include/footer.php";
?>
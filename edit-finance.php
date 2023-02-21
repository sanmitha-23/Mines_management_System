<?php
    require_once "include/header.php";
?>


<?php  


        $Sno = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM financedata WHERE id = $Sno";
        $result = mysqli_query($conn , $sql);
        $rows = mysqli_fetch_assoc($result);
        $month = $rows["Month"];
        $Expenses = $rows["Expenses"];
        $Revenue = $rows["Revenue"];
    


        $dnameErr = $dnumErr = "";
        $dname = $mon = $dept="" ;
       
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["Month"]) ){
                $dnumErr = "<p style='color:red'> * Number is required</p> ";
                $mon = "";
            }else{
                $mon = $_REQUEST["Month"];
            }

            if( empty($_REQUEST["Expenses"]) ){
                $dnumErr = "<p style='color:red'> * Number is required</p> ";
                $dept = "";
            }else{
                $dept = $_REQUEST["Expenses"];
            }

            if( empty($_REQUEST["Revenue"]) ){
                $dnameErr = "<p style='color:red'> * Number is required</p>";
                $dname = "";
            }else {
                $dname = $_REQUEST["Revenue"];
            }

            if( !empty($dname) && !empty($dept) ){
            
                // database connection
                //  $sql_select_query = "SELECT  FROM financedata WHERE id = '$Sno' ";
                //  $r = mysqli_query($conn , $sql_select_query);

                //  if(mysqli_num_rows($r) > 0 ){
                //      $dnumErr = "<p style='color:red'> * Data Already Registered</p>";
                //  } else{

                    $sql = "UPDATE `financedata` SET `Month` = '$mon',`Expenses` = '$dept', `Revenue` = '$dname' WHERE `financedata`.`id` = $Sno";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'financedata.php');
                            $('#linkBtn').text('View Data');
                            $('#addMsg').text('Updated Successfully!');
                            $('#closeBtn').text('Edit Again?');
                        })
                     </script>
                     ";
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
                                    <h4 class="text-center">Edit Data</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                    
                                <div class="form-group">
                                    <label >Month:</label>
                                    <input type="text" class="form-control" value="<?php echo $month; ?>"  name="Month" >
                                    <?php echo $dnameErr; ?> 
                                </div>
                            
                                <div class="form-group">
                                    <label >Expenses :</label>
                                    <input type="number" class="form-control" value="<?php echo $Expenses; ?>"  name="Expenses" >
                                   <!-- <?php echo $dnameErr; ?> -->
                                </div>


                                <div class="form-group">
                                    <label >Revenue :</label>
                                    <input type="number" class="form-control" value="<?php echo $Revenue; ?>"  name="Revenue" >     
                                    <!-- <?php echo $dnumErr; ?> -->
                                </div>

                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >        
                                    </div>
                                    <div class="input-group">
                                         <a href="financedata.php" class="btn btn-primary w-20">Close</a>
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
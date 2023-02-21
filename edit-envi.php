<?php
    require_once "include/header.php";
?>


<?php  


        $Sno = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM environmentdata WHERE SerialNo = $Sno";
        $result = mysqli_query($conn , $sql);
        $rows = mysqli_fetch_assoc($result);
        $month= $rows["Month"];
        $airr= $rows["Air (Permissible limit)"];
        $wat= $rows["Water (Permissible limit)"];
        $noi= $rows["Noise (Permissible limit)"];
        $plan= $rows["Plantation count"];

        $airErr = $waterErr =$noiseErr =$plantErr = "";
        $air = $water = $noise = $plant = $dept="" ;
       
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["Month"]) ){
                $dnumErr = "<p style='color:red'> * Number is required</p> ";
                $mon = "";
            }else{
                $mon = $_REQUEST["Month"];
            }


            if( empty($_REQUEST["air"]) ){
                $airErr = "<p style='color:red'> * Number is required</p> ";
                $air = "";
            }else{
                $air = $_REQUEST["air"];
            }

            if( empty($_REQUEST["noise"]) ){
                $noiseErr = "<p style='color:red'> * Number is required</p>";
                $noise = "";
            }else {
                $noise = $_REQUEST["noise"];
            }

            if( empty($_REQUEST["water"]) ){
                $waterErr = "<p style='color:red'> * Number is required</p>";
                $water = "";
            }else {
                $water = $_REQUEST["water"];
            }

            if( empty($_REQUEST["plant"]) ){
                $plantErr = "<p style='color:red'> * Number is required</p>";
                $plant = "";
            }else {
                $plant = $_REQUEST["plant"];
            }

            if( !empty($air) && !empty($water) && !empty($noise) && !empty($plant)){
            
                // database connection
                 $sql_select_query = "SELECT FROM environmentdata WHERE SerialNo = '$Sno' ";
                 $r = mysqli_query($conn , $sql_select_query);


                    $sql = "UPDATE `environmentdata` SET `Month` = '$mon',`Air (Permissible limit)` = '$air',`Water (Permissible limit)` = '$water', `Noise (Permissible limit)` = '$noise',`Plantation count`= $plant WHERE `environmentdata`.`SerialNo` = $Sno";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'environmentdata.php');
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
                                    <!-- <?php echo $dnameErr; ?>  -->
                                </div>
                            
                                <div class="form-group">
                                    <label >Air (Permissible limit) :</label>
                                    <input type="text" class="form-control" value="<?php echo $airr; ?>"  name="air" >
                                   <!-- <?php echo $dnameErr; ?> -->
                                </div>


                                <div class="form-group">
                                    <label >Water (Permissible limit) :</label>
                                    <input type="text" class="form-control" value="<?php echo $wat; ?>"  name="water" >     
                                    <!-- <?php echo $dnumErr; ?> -->
                                </div>

                                <div class="form-group">
                                    <label >Noise (Permissible limit) :</label>
                                    <input type="text" class="form-control" value="<?php echo $noi; ?>"  name="noise" >     
                                    <!-- <?php echo $dnumErr; ?> -->
                                </div>

                                <div class="form-group">
                                    <label >Plantation count :</label>
                                    <input type="number" class="form-control" value="<?php echo $plan; ?>"  name="plant" >     
                                    <!-- <?php echo $dnumErr; ?> -->
                                </div>

                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >        
                                    </div>
                                    <div class="input-group">
                                         <a href="environmentdata.php" class="btn btn-primary w-20">Close</a>
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
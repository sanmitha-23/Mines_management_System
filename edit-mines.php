<?php
    require_once "include/header.php";
?>

<?php  


        $Sno = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM minesdata WHERE SerialNo = $Sno";
        $result = mysqli_query($conn , $sql);
        $rows = mysqli_fetch_assoc($result);
        $month = $rows["Month"];
        $prod= $rows["Production (in tonnes)"];
        $was= $rows["Waste (in tonnes)"];
    


        $productionErr = $wasteErr = "";
        $production = $waste="" ;
       
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["Month"]) ){
                $dnumErr = "<p style='color:red'> * Number is required</p> ";
                $mon = "";
            }else{
                $mon = $_REQUEST["Month"];
            }

            if( empty($_REQUEST["production"]) ){
                $productionErr = "<p style='color:red'> * Number is required</p> ";
                $production = "";
            }else{
                $production = $_REQUEST["production"];
            }

            if( empty($_REQUEST["waste"]) ){
                $wasteErr = "<p style='color:red'> * Number is required</p>";
                $waste = "";
            }else {
                $waste = $_REQUEST["waste"];
            }

            if( !empty($waste) && !empty($production) ){
            
                // database connection
                 $sql_select_query = "SELECT  FROM minesdata WHERE SerialNo = '$Sno' ";
                 $r = mysqli_query($conn , $sql_select_query);


                    $sql = "UPDATE `minesdata` SET `Month` = '$mon' ,`Production (in tonnes)` = '$production', `Waste (in tonnes)` = '$waste' WHERE `minesdata`.`SerialNo` = $Sno";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'minesdata.php');
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
                                    <label >Production (in tonnes):</label>
                                    <input type="number" class="form-control" value="<?php echo $prod; ?>"  name="production" >
                                   <!-- <?php echo $dnameErr; ?> -->
                                </div>


                                <div class="form-group">
                                    <label >Waste (in tonnes) :</label>
                                    <input type="number" class="form-control" value="<?php echo $was; ?>"  name="waste" >     
                                    <!-- <?php echo $dnumErr; ?> -->
                                </div>

                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >        
                                    </div>
                                    <div class="input-group">
                                         <a href="minesdata.php" class="btn btn-primary w-20">Close</a>
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
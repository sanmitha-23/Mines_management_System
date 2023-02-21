<?php
    require_once "include/header.php";
?>


<?php  


        $Sno = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM geologydata WHERE SerialNo = $Sno";
        $result = mysqli_query($conn , $sql);
        $rows = mysqli_fetch_assoc($result);
        $month= $rows["Month"];
        $exp= $rows["Permitted extraction amount (in tonnes)"];
        $rev= $rows["Extracted amount (in tonnes)"];
        $rems= $rows["Remaining amount (in tonnes)"];


        $permittedErr = $extractedErr = $remainingErr = $idErr = $dataErr = "";
        $permitted = $extracted = $remaining="" ;
       
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["Month"]) ){
                $dnumErr = "<p style='color:red'> * Number is required</p> ";
                $mon = "";
            }else{
                $mon = $_REQUEST["Month"];
            }

            if( empty($_REQUEST["permitted"]) ){
                $permittedErr = "<p style='color:red'> * Number is required</p> ";
                $permitted = "";
            }else{
                $permitted = $_REQUEST["permitted"];
            }

            if( empty($_REQUEST["extracted"]) ){
                $extractedErr = "<p style='color:red'> * Number is required</p> ";
                $extracted = "";
            }else{
                $extracted = $_REQUEST["extracted"];
            }

            if( empty($_REQUEST["remaining"]) ){
                $remainingErr = "<p style='color:red'> * Number is required</p>";
                $remaining = "";
            }else {
                $remaining = $_REQUEST["remaining"];
            }

            if( !empty($remaining) && !empty($extracted) && !empty($permitted) ){
            
                // database connection
                 $sql_select_query = "SELECT  FROM geologydata WHERE SerialNo = '$Sno' ";
                 $r = mysqli_query($conn , $sql_select_query);

                    $sql = "UPDATE `geologydata` SET `Month` = '$mon',`Permitted extraction amount (in tonnes)` = '$permitted',`Extracted amount (in tonnes)` = '$extracted', `Remaining amount (in tonnes)` = '$remaining' WHERE `geologydata`.`SerialNo` = $Sno";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'geologydata.php');
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
                                    <label >Month :</label>
                                    <input type="text" class="form-control" value="<?php echo $month; ?>"  name="Month" >
                                    <?php echo $dataErr; ?>
                                </div>
                                
                                <div class="form-group">
                                    <label >Permitted Extracted Amount:</label>
                                    <input type="number" class="form-control" value="<?php echo $exp; ?>"  name="permitted" >
                                    <?php echo $permittedErr; ?>
                                </div>
                            
                                <div class="form-group">
                                    <label >Extracted Amount:</label>
                                    <input type="number" class="form-control" value="<?php echo $rev; ?>"  name="extracted" >
                                    <?php echo $extractedErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Remaining Amount:</label>
                                    <input type="number" class="form-control" value="<?php echo $rems; ?>"  name="remaining" >  
                                    <?php echo $remainingErr; ?>   
                                </div>

                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >        
                                    </div>
                                    <div class="input-group">
                                         <a href="geologydata.php" class="btn btn-primary w-20">Close</a>
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
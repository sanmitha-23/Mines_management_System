<?php
    require_once "include/header.php";
?>


<?php  

        $Sno = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM salesdata WHERE SerialNo = $Sno ";
        $result = mysqli_query($conn , $sql);
        $rows = mysqli_fetch_assoc($result);
        $month= $rows["Month"];
        $exp= $rows["Domestic Market (in tonnes)"];
        $rev= $rows["Export (in tonnes)"];


        $domesticErr = $exportErr = $idErr = $dataErr = "";
        $domestic = $export = $id = $mon = "" ;
       
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["Month"]) ){
                $dnumErr = "<p style='color:red'> * Number is required</p> ";
                $mon = "";
            }else{
                $mon = $_REQUEST["Month"];
            }

            if( empty($_REQUEST["domestic"]) ){
                $domesticErr = "<p style='color:red'> *Data is required</p>";
                $domestic = "";
            }else {
                $domestic = $_REQUEST["domestic"];
            }
            if( empty($_REQUEST["export"]) ){
                $exportErr = "<p style='color:red'> * Data is required</p>";
                $export = "";
            }else {
                $export = $_REQUEST["export"];
            }

            if( !empty($domestic) && !empty($export) ){
            
                // database connection
                $sql_select_query = "SELECT FROM salesdata WHERE SerialNo= '$Sno' ";
                $r = mysqli_query($conn , $sql_select_query);


                    $sql = "UPDATE `salesdata` SET  `Month` = '$mon',`Domestic Market (in tonnes)` = '$domestic', `Export (in tonnes)` = '$export' WHERE `salesdata`.`SerialNo` = $Sno";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'salesdata.php');
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
                                    <?php echo $dataErr; ?>
                                </div>
                            
                                <div class="form-group">
                                    <label >Domestic Market :</label>
                                    <input type="number" class="form-control" value="<?php echo $exp; ?>"  name="domestic" >
                                    <?php echo $domesticErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Export :</label>
                                    <input type="number" class="form-control" value="<?php echo $rev; ?>"  name="export" >
                                    <?php echo $exportErr; ?>     
                                </div>

                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >        
                                    </div>
                                    <div class="input-group">
                                         <a href="profile.php" class="btn btn-primary w-20">Close</a>
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
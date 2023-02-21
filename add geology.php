<?php 
    require_once "include/header.php";
?>
<!--     
    <?php
    require_once "include/header.php";
?> -->


<?php  

        $permittedErr = $extractedErr = $remainingErr = $idErr = $dataErr="";
        $permitted = $extracted = $remaining= $id = $mon = "" ;

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["id"]) ){
                $idErr = "<p style='color:red'> * Number is required</p> ";
            }else {
                $id = $_REQUEST["id"];
            }

            if( empty($_REQUEST["Month"]) ){
                $dataErr = "<p style='color:red'> * Number is required</p> ";
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
                require_once "../connection.php";

                $sql_select_query = "SELECT SerialNo FROM geologydata WHERE SerialNo = '$id' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $dnumErr = "<p style='color:red'> * Data Already Register</p>";
                } else{

                    $sql = "INSERT INTO `geologydata`(`SerialNo`, `Month`, `Permitted extraction amount (in tonnes)`, `Extracted amount (in tonnes)`, `Remaining amount (in tonnes)`) VALUES ('$id','$mon','$permitted','$extracted','$remaining') ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        // $dname = $dept = "";
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'geologydata.php');
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
                                    <input type="number" class="form-control" value="<?php echo $id; ?>"  name="id" >
                                   <?php echo $idErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Month :</label>
                                    <input type="text" class="form-control" value="<?php echo $mon; ?>"  name="Month" >
                                    <?php echo $dataErr; ?>
                                </div>
                                
                                <div class="form-group">
                                    <label >Permitted Extraction Amount:</label>
                                    <input type="number" class="form-control" value="<?php echo $permitted; ?>"  name="permitted" >
                                    <?php echo $permittedErr; ?>
                                </div>
                            
                                <div class="form-group">
                                    <label >Extracted Amount:</label>
                                    <input type="number" class="form-control" value="<?php echo $extracted; ?>"  name="extracted" >
                                    <?php echo $extractedErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Remaining Amount:</label>
                                    <input type="number" class="form-control" value="<?php echo $remaining; ?>"  name="remaining" >     
                                    <?php echo $remainingErr; ?>
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

<!-- <?php 
    require_once "include/footer.php";
?> -->


<?php 
    require_once "include/footer.php";
?>
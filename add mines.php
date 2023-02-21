<?php 
    require_once "include/header.php";
?>
<!--     
    <?php
    require_once "include/header.php";
?> -->


<?php  

        $idErr = $dataErr =  "";
        $month = $id =  $production = $waste = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["id"]) ){
                $idErr = "<p style='color:red'> * Number is required</p> ";
            }else {
                $id = $_REQUEST["id"];
            }

            if( empty($_REQUEST["Month"]) ){
                $dataErr = "<p style='color:red'> * Number is required</p> ";
                $month = "";
            }else{
                $month = $_REQUEST["Month"];
            }

            if( empty($_REQUEST["production"]) ){
                $dataErr = "<p style='color:red'> * Number is required</p> ";
                $production = "";
            }else{
                $production = $_REQUEST["production"];
            }

            if( empty($_REQUEST["waste"]) ){
                $dataErr = "<p style='color:red'> * Number is required</p>";
                $waste = "";
            }else {
                $waste = $_REQUEST["waste"];
            }

            if( !empty($production) && !empty($waste) ){

                // database connection
                require_once "../connection.php";

                $sql_select_query = "SELECT SerialNo FROM minesdata WHERE SerialNo = '$id' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $dnumErr = "<p style='color:red'> * Data Already Register</p>";
                } else{

                    $sql = "INSERT INTO `minesdata`(`SerialNo`, `Month`, `Production (in tonnes)`, `Waste (in tonnes)`) VALUES ('$id','$month','$production','$waste') ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        $dname = $dept = "";
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'minesdata.php');
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
                                    <label >Month:</label>
                                    <input type="text" class="form-control" value="<?php echo $month; ?>"  name="Month" >
                                    <!-- <?php echo $dataErr; ?>  -->
                                </div>
                            
                                <div class="form-group">
                                    <label >Production (in tonnes):</label>
                                    <input type="number" class="form-control" value="<?php echo $prod; ?>"  name="production" >
                                   <!-- <?php echo $dataErr; ?> -->
                                </div>


                                <div class="form-group">
                                    <label >Waste (in tonnes) :</label>
                                    <input type="number" class="form-control" value="<?php echo $was; ?>"  name="waste" >     
                                    <!-- <?php echo $dataErr; ?> -->
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
<!-- 
<?php 
    require_once "include/footer.php";
?> -->


<?php 
    require_once "include/footer.php";
?>
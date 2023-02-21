<?php 
    require_once "include/header.php";
?>

<?php  

        $airErr = $waterErr =$noiseErr =$plantErr = $idErr = $dataErr = "";
        $month = $id = $air = $water = $noise =$plant = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["id"]) ){
                $dnumErr = "<p style='color:red'> * Number is required</p> ";
            }else {
                $id = $_REQUEST["id"];
            }

            if( empty($_REQUEST["Month"]) ){
                $dataErr = "<p style='color:red'> * Number is required</p> ";
                $month = "";
            }else{
                $month = $_REQUEST["Month"];
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
                require_once "../connection.php";

                $sql_select_query = "SELECT SerialNo FROM environmentdata WHERE SerialNo = '$id' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $dnumErr = "<p style='color:red'> * Data Already Registered</p>";
                } else{

                    $sql = "INSERT INTO `environmentdata`(`SerialNo`, `Month`, `Air (Permissible limit)`, `Water (Permissible limit)`, `Noise (Permissible limit)`, `Plantation count`) VALUES('$id','$month','$air','$water','$noise','$plant') ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        $month = $id = $air = $water = $noise =$plant = "";
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'environmentdata.php');
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
                                   <!-- <?php echo $dnumErr; ?> -->
                                </div>

                                <div class="form-group">
                                    <label >Month:</label>
                                    <input type="text" class="form-control" value="<?php echo $month; ?>"  name="Month" >
                                    <!-- <?php echo $dnameErr; ?>  -->
                                </div>
                            
                                <div class="form-group">
                                    <label >Air (Permissible limit) :</label>
                                    <input type="text" class="form-control" value="<?php echo $air; ?>"  name="air" >
                                   <!-- <?php echo $dnameErr; ?> -->
                                </div>


                                <div class="form-group">
                                    <label >Water (Permissible limit) :</label>
                                    <input type="text" class="form-control" value="<?php echo $water; ?>"  name="water" >     
                                    <!-- <?php echo $dnumErr; ?> -->
                                </div>

                                <div class="form-group">
                                    <label >Noise (Permissible limit) :</label>
                                    <input type="text" class="form-control" value="<?php echo $noise; ?>"  name="noise" >     
                                    <!-- <?php echo $dnumErr; ?> -->
                                </div>

                                <div class="form-group">
                                    <label >Plantation count :</label>
                                    <input type="number" class="form-control" value="<?php echo $plant; ?>"  name="plant" >     
                                    <!-- <?php echo $dnumErr; ?> -->
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
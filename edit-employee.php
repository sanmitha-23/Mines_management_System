<?php 
    require_once "include/header.php";
?>

<?php  


        $Sno = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM employee WHERE eid = $Sno ";
        $result = mysqli_query($conn , $sql);
        $rows=mysqli_fetch_assoc($result);
        $ename=$rows["ename"];
        $addr=$rows["addresses"];
        $mail=$rows["email"];
        $gend=$rows["gender"];


        $nameErr = $emailErr = $addressErr = $genderErr= "";
        $name = $address = $email = $gender = "";
      

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["gender"]) ){
                $genderErr = "<p style='color:red'> * Gender is required</p> ";
                $gender ="";
            }else {
                $gender = $_REQUEST["gender"];
            }


            if( empty($_REQUEST["name"]) ){
                $nameErr = "<p style='color:red'> *  Name is required</p> ";
                $name = "";
            }else {
                $name = $_REQUEST["name"];
            }

            if( empty($_REQUEST["email"]) ){
                $emailErr = "<p style='color:red'> * Email is required</p> ";
                $email = "";
            }else {
                $email = $_REQUEST["email"];
            }

            if( empty($_REQUEST["addresses"]) ){
                $addressErr = "<p style='color:red'> * Address is required</p> ";
                $address = "";
            }else {
                $address = $_REQUEST["addresses"];
            }


            if( !empty($name) && !empty($email) && !empty($gender) && !empty($address) ){
  
                    $sql = "UPDATE `employee` SET `ename` = '$name' , `email` = '$email', `gender`='$gender' , `addresses`='$address' WHERE `employee`.`eid` = '$Sno'";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-employee.php');
                            $('#linkBtn').text('View Employees');
                            $('#addMsg').text('Profile Edit Successfully!');
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
                            <div class="card-body pt-4 shadow">                       
                                    <h4 class="text-center">Edit Employee profile</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >Full Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $ename; ?>"  name="name" >
                                   <?php echo $nameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Email :</label>
                                    <input type="email" class="form-control" value="<?php echo $mail; ?>"  name="email" >     
                                    <?php echo $emailErr; ?>
                                </div>

                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label" >Gender :</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Male" ){ echo "checked"; } ?>  value="Male"  selected>
                                    <label class="form-check-label" >Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Female" ){ echo "checked"; } ?>  value="Female">
                                    <label class="form-check-label" >Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Other" ){ echo "checked"; } ?>  value="Other">
                                    <label class="form-check-label" >Other</label>
                                </div>
                                
                               <div class="form-group">
                                    <label >Address :</label>
                                    <input type="text" class="form-control" value="<?php echo $addr; ?>"  name="addresses" >     
                                    <?php echo $addressErr; ?>
                                </div>
                                <br>

                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >        
                                    </div>
                                    <div class="input-group">
                                         <a href="manage-employee.php" class="btn btn-primary w-20">Close</a>
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
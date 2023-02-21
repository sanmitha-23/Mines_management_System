<?php 

require_once "include/header.php";
?>
 <?php  

    // databaseconnection
    require_once "../connection.php";

    $sql_command = "SELECT * FROM admin WHERE email = '$_SESSION[email]' ";
    $result = mysqli_query($conn , $sql_command);

    if( mysqli_num_rows($result) > 0){
       while( $rows = mysqli_fetch_assoc($result) ){
           $name = ucwords($rows["name"]);
           $gender = ucwords($rows["gender"]);
           $dob= $rows["dob"];
       }
    }
 ?>


<div class="container">
    <div class="row justify-content-center h-100">
        <div class="col-4">
            <div class="col-12  col-lg-6 col-md-6">
                <div class="py-4 mt-5">  
                    <div class="card shadow" style="width: 20rem;">
                        <div class="card-body">
                            <h2 class="text-center mb-4"><?php echo $name; ?> </h2>
                            <p class="card-text">Email: <?php echo $_SESSION["email"] ?> </p>
                            <p class="card-text">Gender: <?php echo $gender ?> </p>
                            <p class="card-text">Date of Birth: <?php echo $dob ?> </p>
                            <p class="card-text">Age: <?php 
                                                            $date1=date_create($dob);
                                                            $date2=date_create("now");
                                                            $diff=date_diff($date1,$date2);
                                                            echo $diff->format("%y Years"); ?> 
                            </p>
                            <p class="text-center">
                                <a href="edit-profile.php" class="btn btn-outline-primary">Edit Profile</a>
                                <a href="change-password.php" class="btn btn-outline-primary">Change Password</a>
                            </p>
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
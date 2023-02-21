<?php 

require_once "include/header.php";
?>
 <?php  
    
    // databaseconnection
    require_once "../connection.php";

    $sql_command = "SELECT * FROM employee WHERE email = '$_SESSION[email_emp]' ";
    $result = mysqli_query($conn , $sql_command);

    if( mysqli_num_rows($result) > 0){
       while( $rows = mysqli_fetch_assoc($result) ){
           $name = ucwords($rows["ename"]);
           $gender = ucwords($rows["gender"]);
           $dob= $rows["dob"];
           $jobs= $rows["job"];
           $salary = $rows["salary"];      
           $id = $rows["eid"];
           $address = $rows["addresses"];
       }

        $dob = date('jS F Y' , strtotime($dob) );

        $date1=date_create($dob);
        $date2=date_create("now");
        $diff=date_diff($date1,$date2);
        $age = $diff->format("%y Years"); 
    }
 ?>


<div class=container>
    <div class="row justify-content-center h-100">
        <div class="col-4 ">
            <div class="col-12 col-lg-6 col-md-6" >
                <div class="py-4 mt-5"> 
                    <div class="card shadow" style="width: 22rem;">
                        <div class="card-body">
                            <h2 class="text-center mb-4"><?php echo $name; ?> </h2>
                            <p class="card-text">Email: <?php echo $_SESSION["email_emp"] ?> </p>
                            <p class="card-text">Employee Id: <?php echo $id ?> </p>
                            <p class="card-text">Gender: <?php echo $gender ?> </p>
                            <p class="card-text">Age: <?php echo $age; ?> </p>
                            <p class="card-text">Date of Birth: <?php echo $dob; ?> </p>
                            <p class="card-text">Designation: <?php echo $jobs ; ?> </p>
                            <p class="card-text">Salary: Rs <?php echo $salary; ?> </p>
                            <p class="card-text">Address: <?php echo $address ; ?> </p>
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
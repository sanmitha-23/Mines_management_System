<?php 

require_once "../connection.php";

$dept =  $_GET["id"];

$sql = "DELETE FROM department WHERE dnum = $dept ";

mysqli_query($conn , $sql); 

header("Location: manage-dept.php?delete-success-where-dnum=" .$dept );


?>
<?php 

require_once "../connection.php";

$id =  $_GET["id"];

$sql = "DELETE FROM employee WHERE eid = $id ";

mysqli_query($conn , $sql); 

header("Location: manage-employee.php?delete-success-where-eid=" .$id );


?>

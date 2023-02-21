<?php 

require_once "../connection.php";

$id =  $_GET["id"];

$sql = "DELETE FROM financedata WHERE `financedata`.`id` =  $id";

mysqli_query($conn , $sql); 

header("Location: financedata.php?delete-success-where-id=" .$id );


?>
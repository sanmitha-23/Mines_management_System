<?php 

require_once "../connection.php";

$id =  $_GET["id"];

$sql = "DELETE FROM minesdata WHERE `minesdata`.`SerialNo` =  $id";

mysqli_query($conn , $sql); 

header("Location: minesdata.php?delete-success-where-SerialNo=" .$id );

?>
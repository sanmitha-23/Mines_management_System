<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mineit";

$conn = mysqli_connect($dbhost , $dbuser , $dbpass , $dbname);

if(!isset($conn)){
    die("Database connection failed");
}
?>
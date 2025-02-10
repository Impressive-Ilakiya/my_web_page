<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "javascript_learn";

$conn = mysqli_connect($hostnaem, $username, $password, $databasename);

if(!conn){
    die("Unable to connect database...", mysqli_connect_error());
}
?>
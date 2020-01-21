<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "user_management_system";

// Create connection
$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
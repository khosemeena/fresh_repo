<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "event";

$conn = mysqli_connect($servername, $username, $password, $database_name);
if (!$conn){
    die("Connection error");
}
?>
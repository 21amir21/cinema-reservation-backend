<?php
require __DIR__ . "/../data/validate.php";

$hostName = "localhost";
$userName = "root";
$password = "2121";
$dbName = "cinema_reservation_db";
$conn = new mysqli($hostName, $userName, $password, $dbName);

$id = $_GET['id'];
$deletionsql="UPDATE movie SET removedFlag=1 WHERE id= $id";
$conn->query($deletionsql); 

header("Location: AdminMovieDashboard.php");
      

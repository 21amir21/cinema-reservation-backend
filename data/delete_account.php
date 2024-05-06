<?php
session_start();
$custID = $_SESSION["customer"]["customerID"];

$hostName = "localhost";
$userName = "root";
$password = "2121";
$dbName = "cinema_reservation_db";
$conn = new mysqli($hostName, $userName, $password, $dbName);

$sql = "DELETE FROM customer WHERE id= $custID";
$conn->query($sql);

header("Location: /data/logout.php");

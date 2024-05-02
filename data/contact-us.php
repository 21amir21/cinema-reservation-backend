<?php

require __DIR__ . "/validate.php";
session_start();

$hostName = "localhost";
$userName = "root";
$password = "2121";
$dbName = "cinema_reservation_db";
$conn = new mysqli($hostName, $userName, $password, $dbName);

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// calling the validate function
$name = validate($name);
$email = validate($email);
$message = validate($message);

// Escape variables to protect against SQL injection
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$message = mysqli_real_escape_string($conn, $message);

// get customer id from the cookies and put it in the customerId variable
if (isset($_SESSION["customer"])) {
  $customerId = $_SESSION["customer"]["customerID"];
  $sql = "INSERT INTO inquiry(customerId, message) VALUES($customerId, '$message')";
} else {
  $sql = "INSERT INTO inquiry(customerId, message) VALUES(null, '$message')";
}

$conn->query($sql);

$conn->close();
header("Location: /");

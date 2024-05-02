<?php
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
$customerId = $_SESSION["customer"]["id"];
$sql = "INSERT INTO inquiry(customerId, message) VALUES('$customerId', '$message')";

$conn->query($sql);

$conn->close();
header("Location: login.html");

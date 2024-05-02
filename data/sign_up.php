<?php

require __DIR__ . "/validate.php";

$hostName = "localhost";
$userName = "root";
$password = "2121";
$dbName = "cinema_reservation_db";
$conn = new mysqli($hostName, $userName, $password, $dbName);


$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$emailAddress = $_POST["emailAddress"];
$password = $_POST["password"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];

// calling the validate function
$firstName = validate($firstName);
$lastName = validate($lastName);
$emailAddress = validate($emailAddress);
$password = validate($password);
$dob = validate($dob);
$gender = validate($gender);

// Escape variables to protect against SQL injection
$firstName = mysqli_real_escape_string($conn, $firstName);
$lastName = mysqli_real_escape_string($conn, $lastName);
$emailAddress = mysqli_real_escape_string($conn, $emailAddress);
$password = mysqli_real_escape_string($conn, $password);
$dob = mysqli_real_escape_string($conn, $dob);
$gender = mysqli_real_escape_string($conn, $gender);

$sql = "INSERT INTO customer(firstName, lastName, email, password, gender, dob) VALUES('$firstName', '$lastName', '$emailAddress', '$password', '$gender', '$dob')";

$conn->query($sql);


$conn->close();
header("Location: login.html");

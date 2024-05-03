<?php

session_start();

$customerId = $_SESSION["id"];

require __DIR__ . "/validate.php";

$hostName = "localhost";
$userName = "root";
$password = "2121";
$dbName = "cinema_reservation_db";
$conn = new mysqli($hostName, $userName, $password, $dbName);


$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$dob = $_POST["dob"];

// calling the validate function
$firstName = validate($firstName);
$lastName = validate($lastName);
$email = validate($email);
$password = validate($password);
$confirmPassword = validate($confirmPassword);
$dob = validate($dob);

if ($password !== $confirmPassword) {
    header("Location: /?error=Password must match!!");
    exit();
}

// Escape variables to protect against SQL injection
$firstName = mysqli_real_escape_string($conn, $firstName);
$lastName = mysqli_real_escape_string($conn, $lastName);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
$dob = mysqli_real_escape_string($conn, $dob);

$sql = "UPDATE customer 
        SET firstName = '$firstName', 
            lastName = '$lastName', 
            email = '$email', 
            password = '$password', 
            dob = '$dob' 
        WHERE id = $customerId";

$_SESSION["firstName"] = $firstName;
$_SESSION["lastName"] = $lastName;
$_SESSION["email"] = $email;
$_SESSION["dob"] = $dob;

$conn->query($sql);
$conn->close();
header("Location: /views/accountMenu.php");

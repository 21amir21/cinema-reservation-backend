<?php

require __DIR__ . "/../data/validate.php";

$hostName = "localhost";
$userName = "root";
$password = "2121";
$dbName = "cinema_reservation_db";
$conn = new mysqli($hostName, $userName, $password, $dbName);

$poster = $_POST["poster"];
$moviename = $_POST["moviename"];
$releasedate = $_POST["releasedate"];

// validataion
$poster = validate($poster);
$moviename = validate($moviename);
$releasedate =validate($releasedate);



// Escape variables to protect against SQL injection
$poster = mysqli_real_escape_string($conn, $poster);
$moviename = mysqli_real_escape_string($conn, $moviename);
$releasedate = mysqli_real_escape_string($conn, $releasedate);

$sql = "INSERT INTO comingsoon (name, releaseDate, posterURL) values('$moviename','$releasedate','$poster')";
    
$conn->query($sql);

$conn->close();

header("Location: AdminMovieDashboard.php");

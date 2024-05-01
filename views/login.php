<?php
$hostName = "localhost";
$userName = "root";
$password = "2121";
$dbName = "cinema_reservation_db";
$conn = new mysqli($hostName, $userName, $password, $dbName);



if (isset($_POST['emailAddress']) && isset($_POST['password'])) {
    $emailAddress = $_POST['emailAddress'];
    $password = $_POST['password'];
    // $sql = "SELECT email, password FROM customer WHERE email = " + "'" + $emailAddress + "'" +  
    $sql = "SELECT email, password FROM customer WHERE email = '{$emailAddress}' AND password = '{$password}'";
    $conn->execute_query($sql);
    header("Location: /");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "w assar 3abita";
}

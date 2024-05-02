<?php

require __DIR__ . "/validate.php";

session_start();

$hostName = "localhost";
$userName = "root";
$password = "2121";
$dbName = "cinema_reservation_db";
$conn = new mysqli($hostName, $userName, $password, $dbName);



if (isset($_POST['emailAddress']) && isset($_POST['password'])) {
    $emailAddress = validate($_POST['emailAddress']);
    $password = validate($_POST['password']);
}

if (empty($emailAddress)) {
    header("Location: /?error=User Name is required");
    exit();
} else if (empty($password)) {
    header("Location: /?error=Password is required");
    exit();
} else {

    $sql = "SELECT * FROM customer WHERE email = '{$emailAddress}' AND password = '{$password}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if ($row["email"] === $emailAddress && $row["password"] === $password) {

            // Successufull Login!

            $_SESSION["firstName"] = $row["firstName"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["id"] = $row["id"];

            $_SESSION["customer"] = [
                "customerName" => $row["firstName"],
                "customerID" => $row["id"]
            ];

            header("Location: /");

            exit();
        } else {
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }
    } else {
        header("Location: index.php?error=Incorect User name or password");
        exit();
    }
}

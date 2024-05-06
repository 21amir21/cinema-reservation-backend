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

    // new part to know if customer or admin
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the value of the selected radio button from the $_POST array
        $userType = $_POST['user-type'];

        // Now you can use $userType variable in your logic
        if ($userType === "Customer") {
            // Logic for Customer login
            $sql = "SELECT * FROM customer WHERE email = '{$emailAddress}' AND password = '{$password}'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {

                $row = mysqli_fetch_assoc($result);

                if ($row["email"] === $emailAddress && $row["password"] === $password) {

                    // Successufull Login!

                    $_SESSION["id"] = $row["id"];
                    $_SESSION["firstName"] = $row["firstName"];
                    $_SESSION["lastName"] = $row["lastName"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["password"] = $row["password"];
                    $_SESSION["gender"] = $row["gender"];
                    $_SESSION["dob"] = $row["dob"];


                    $_SESSION["customer"] = [
                        "customerName" => $row["firstName"],
                        "customerID" => $row["id"]
                    ];

                    header("Location: /");
                    exit();
                } else {
                    echo '<script>alert("Incorrect User name or password");</script>';
                }
            } else {
                echo '<script>alert("Incorrect User name or password");</script>';
            }
        } elseif ($userType === "Admin") {
            // Logic for Admin login
            $sql = "SELECT * FROM admin WHERE email = '{$emailAddress}' AND password = '{$password}'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {

                $row = mysqli_fetch_assoc($result);

                if ($row["email"] === $emailAddress && $row["password"] === $password) {

                    // Successufull Login!

                    $_SESSION["id"] = $row["id"];
                    $_SESSION["firstName"] = $row["firstName"];
                    $_SESSION["lastName"] = $row["lastName"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["password"] = $row["password"];
                    $_SESSION["gender"] = $row["gender"];
                    $_SESSION["dob"] = $row["dob"];


                    $_SESSION["admin"] = [
                        "adminName" => $row["firstName"],
                        "adminID" => $row["id"]
                    ];

                    header("Location: /admin/AdminMovieDashboard.php");

                    exit();
                } else {
                    echo '<script>alert("Incorrect User name or password");</script>';
                }
            } else {
                echo '<script>alert("Incorrect User name or password");</script>';
            }
        }
    }
}

<?php
  require __DIR__ . "/validate.php";

  session_start();

  $hostName = "localhost";
  $userName = "root";
  $password = "2121";
  $dbName = "cinema_reservation_db";
  $conn = new mysqli($hostName, $userName, $password, $dbName);

  file_put_contents("log.txt", "");

  $movieID = $_GET['id'];
  $encodedSeats = $_GET['seats'];
  $seats = json_decode($encodedSeats);

  $sql = "SELECT * FROM movie WHERE id = $movieID";
  $row = $conn->query($sql);
  $movie = mysqli_fetch_assoc($row);

  $moviePriceSql = "SELECT price FROM movie WHERE id = $movieID";
  $result = $conn->query($moviePriceSql);
  $moviePriceRow = mysqli_fetch_assoc($result);

  $moviePrice = $moviePriceRow['price'];

  $totalPrice = $moviePrice * sizeof($seats);

  foreach ($seats as $seat) {
    $seatSql = "UPDATE seat SET reserved = 1 WHERE id = $seat";
    $conn->query($seatSql);
  }

  if (isset($_SESSION["customer"])) {
    $customerId = $_SESSION["customer"]["customerID"];

    $paymentSql = "INSERT INTO payment(customerId, movieId, paymentAmount) values($customerId, $movieID, $totalPrice)";
  }
  $conn->query($paymentSql);
  $conn->close();
  header("Location: /");



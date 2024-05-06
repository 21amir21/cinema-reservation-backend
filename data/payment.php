<?php
  require __DIR__ . "/validate.php";

  session_start();

  $hostName = "localhost";
  $userName = "root";
  $password = "2121";
  $dbName = "cinema_reservation_db";
  $conn = new mysqli($hostName, $userName, $password, $dbName);

  $offerPercentage = 1;
  if (isset($_POST['offerCode'])) {
    $offerCode = validate($_POST["offerCode"]);

    if ($offerCode !== "") {

      if (isset($_SESSION["customer"])) {
        $customerId = $_SESSION["customer"]["customerID"];
        $doesOfferExistSql = "SELECT * FROM customeroffer WHERE customerId = $customerId AND offerCode = $offerCode";
        $row = $conn->query($doesOfferExistSql);
        // if the customer already used the code
        if (mysqli_num_rows($row) !== 0) {
          $_SESSION['redirected'] = true;
          header('Location: ' . $_SERVER['HTTP_REFERER']);
          exit();
        } else {
          $addOfferAndCustomerToDatabase = "INSERT INTO customeroffer VALUES ($customerId, $offerCode)";
          $conn->query($addOfferAndCustomerToDatabase);
        }
      }


      $offerSql = "SELECT offerPercentage FROM offer WHERE offerCode = '$offerCode'";
      $row = $conn->query($offerSql);
      if (mysqli_num_rows($row) !== 0) {
        $offerRow = mysqli_fetch_assoc($row);
        $offerPercentage = $offerRow['offerPercentage'];
      }
    }
  }

  $movieID = $_GET['id'];
  $theatreID = $_GET['theatreID'];
  $encodedSeats = $_GET['seats'];
  $seats = json_decode($encodedSeats);

  $sql = "SELECT * FROM movie WHERE id = $movieID";
  $row = $conn->query($sql);
  $movie = mysqli_fetch_assoc($row);

  $moviePriceSql = "SELECT price FROM movie WHERE id = $movieID";
  $result = $conn->query($moviePriceSql);
  $moviePriceRow = mysqli_fetch_assoc($result);

  $moviePrice = $moviePriceRow['price'];

  $totalPrice = $moviePrice * sizeof($seats) * $offerPercentage;

  foreach ($seats as $seat) {
    $seatSql = "UPDATE seat SET reserved = 1 WHERE id = $seat AND theatreID = $theatreID";
    $conn->query($seatSql);
  }

  if (isset($_SESSION["customer"])) {
    $customerId = $_SESSION["customer"]["customerID"];

    $paymentSql = "INSERT INTO payment(customerId, movieId, paymentAmount) values($customerId, $movieID, $totalPrice)";
  }
  $conn->query($paymentSql);
  $conn->close();
  header("Location: /");

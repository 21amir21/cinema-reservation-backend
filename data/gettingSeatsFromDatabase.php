<?php
  function gettingSeatsFromDatabase($theaterID): array
  {
    $hostName = "localhost";
    $userName = "root";
    $password = "2121";
    $dbName = "cinema_reservation_db";
    $conn = new mysqli($hostName, $userName, $password, $dbName);

    $sql = "SELECT * FROM seat WHERE theatreID = $theaterID";
    $result = mysqli_query($conn, $sql);

    foreach ($result as $row) {
      $allSeats[] = $row['reserved'];
    }

    $conn->close();

    return $allSeats;
  }

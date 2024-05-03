<?php 
require __DIR__ . "/validate.php";


session_start();

$hostName = "localhost";
$userName = "root";
$password = "2121";
$dbName = "cinema_reservation_db";
$conn = new mysqli($hostName, $userName, $password, $dbName);


$movieid = $_GET['id'];

$sql = "SELECT * FROM movie WHERE id = $movieid";
$row = $conn->query($sql);
$movie = mysqli_fetch_assoc($row);



if (isset($_SESSION["customer"])) {
  $customerId = $_SESSION["customer"]["customerID"];
  

  // movie price for payment amount --> get it using a query using the id
  //$sql= "INSERT INTO payment(customerId,movieId, ticketId, paymentAmount) values($customerId,$movieId,$moviePrice)";
}
 $conn->query($sql);

$conn->close();
header("Location: /");



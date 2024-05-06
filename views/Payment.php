<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment</title>
  <link rel="stylesheet" href="./../styles/payment.css"/>
  <!-- Fontawesome CDN Link For Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<?php
  session_start();

  $id = $_GET['id'];
  $encodedIds = $_GET['seats'];
  $theatreID = $_GET['theatreID'];

  $hostName = "localhost";
  $userName = "root";
  $password = "2121";
  $dbName = "cinema_reservation_db";
  $conn = new mysqli($hostName, $userName, $password, $dbName);

  $sql = "SELECT * FROM movie WHERE id = $id";
  $row = $conn->query($sql);
  $movie = mysqli_fetch_assoc($row);
?>

<body>
<form id="submit-form" method="POST"
      action="../data/payment.php?id=<?= $id ?>&seats=<?= $encodedIds ?>&theatreID=<?= $theatreID ?>">
  <h2>Personal Information</h2>
  <div class="form-group">
    <label for="firstname">First Name *</label>
    <input type="text" id="firstname" placeholder="Enter your First Name"/>
  </div>
  <div class="form-group">
    <label for="surname">Surname *</label>
    <input type="text" id="surname" placeholder="Enter your Surname"/>
  </div>
  <div class="form-group">
    <label for="email">Email Address *</label>
    <input type="text" id="email" placeholder="Enter your Email address"/>
  </div>
  <div class="form-group">
    <label for="mobilephone">Mobile Phone *</label>
    <input type="tel" id="mobilephone" value="+20"/>
  </div>
  <div class="form-group confirm_details-btn">
    <input type="button" value="Confirm Details" id="confirm-btn"/>
    <a href="/"><input type="button" value="Cancel" class="cancel-btn-1" id="cancel-btn"/></a>
  </div>

  <div class="payment-form">
    <h2>Payment Details</h2>
    <div class="form-group">
      <label for="cardnumber">Card Number *</label>
      <input type="text" id="cardnumber" placeholder="**** **** **** ****"/>
    </div>
    <div class="form-group">
      <label for="expirydate">Expiry Date *</label>
      <input type="text" id="expirydate" placeholder="MM/YYYY"/>
    </div>
    <div class="form-group">
      <label for="cardsecuritycode">Card Security Code *</label>
      <input type="text" id="cardsecuritycode" placeholder="***"/>
    </div>
    <div class="form-group">
      <label for="offercode">Offer Code</label>
      <input type="text" id="offercode" name="offerCode" placeholder="Enter Offer Code if any"/>
    </div>
    <div class="form-group">
      <label for="movieName">Movie: <?php echo $movie['name'] ?></label>
    </div>
    <div class="form-group confirm_details-btn">
      <input type="submit" value="Complete Payment"/>
      <a href="/"><input type="button" value="Cancel" id="cancel-btn"/></a>
    </div>
  </div>
</form>

<?php
  if (isset($_SESSION['redirected']) && $_SESSION['redirected'] == true) {
    echo '<script>alert("That code has already been used")</script>';
    // unset or reset the session variable if needed
    unset($_SESSION['redirected']);
  }
?>
<script src="./../validations/paymentForm.js"></script>
</body>

</html>